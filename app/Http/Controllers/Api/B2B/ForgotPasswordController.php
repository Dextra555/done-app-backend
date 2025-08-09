<?php

namespace App\Http\Controllers\Api\B2B;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator; // ✅ Correct usage
use App\Models\B2BUser;

class ForgotPasswordController extends Controller
{
    public function sendOtp(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:b2b_users,email',
    ], [
        'email.required' => 'Email is required.',
        'email.email' => 'Please provide a valid email address.',
        'email.exists' => 'The provided email is not registered.',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ], 422); // ❗ Send proper error code
    }

    $otp = rand(1000, 9999);

    DB::table('b2b_users')
        ->where('email', $request->email)
        ->update([
            'email_otp' => $otp,
            'updated_at' => now()
        ]);

    // Send OTP
    Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
        $message->to($request->email)->subject('Password Reset OTP');
    });

    return response()->json([
        'status' => true,
        'message' => 'OTP sent to your email',
    ]);
}


    public function verifyOtp(Request $request)
{
    // Validate with custom messages
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:b2b_users,email',
        'email_otp' => 'required|digits:4',
    ], [
        'email.required' => 'Email is required.',
        'email.email' => 'Enter a valid email.',
        'email.exists' => 'This email is not registered.',
        'email_otp.required' => 'OTP is required.',
        'email_otp.digits' => 'OTP must be 4 digits.',
    ]);

    // Return 422 if validation fails
    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ], 422);
    }

    // Check if email and OTP match in b2b_users
    $record = DB::table('b2b_users')
        ->where('email', $request->email)
        ->where('email_otp', $request->email_otp)
        ->first();

    if (!$record) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid OTP',
        ], 422);
    }

    return response()->json([
        'status' => true,
        'message' => 'OTP verified',
    ]);
}


public function resetPassword(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:b2b_users,email',
        'new_password' => 'required|string|min:6',
        'conform_password' => 'required|same:new_password',
    ], [
        'email.required' => 'Email is required',
        'email.exists' => 'This email is not registered',
        'new_password.required' => 'New password is required',
        'new_password.min' => 'New password must be at least 6 characters',
        'conform_password.required' => 'Confirmation password is required',
        'conform_password.same' => 'Confirmation password does not match the new password',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ], 422);
    }

    $record = DB::table('b2b_users')
        ->where('email', $request->email)
        //->where('email_otp', $request->email_otp)
        ->first();

    if (!$record) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid email or OTP',
        ], 422);
    }

    B2BUser::where('email', $request->email)->update([
        'password' => Hash::make($request->new_password),
        'email_otp' => null
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Password updated successfully',
    ]);
}


}
