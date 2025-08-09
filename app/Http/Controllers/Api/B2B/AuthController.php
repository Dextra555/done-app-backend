<?php

namespace App\Http\Controllers\Api\B2B;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Models\B2BUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;


class AuthController extends Controller
{
    /**
     * Register a new B2B user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:b2b_users,email'],
            'mobile_number' => ['required', 'string', 'max:20', 'unique:b2b_users,mobile_number'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'company_name' => ['required', 'string', 'max:255'],
            'registration_id_file' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'company_license_file' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'gst_file' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'pan_file' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'aadhar_file' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        ]);

        // Create b2b/documents directory if it doesn't exist
        $storage = Storage::disk('public');
        $storage->makeDirectory('b2b/documents');

        // Upload files and get their paths
        $filePaths = [];
        $fileFields = [
            'registration_id_file',
            'company_license_file',
            'gst_file',
            'pan_file',
            'aadhar_file'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $fileName = Str::random(20) . '_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('b2b/documents', $fileName, 'public');
                // Store relative path in database, we'll generate full URL when needed
                $filePaths[$field] = $path;
            }
        }

        // Create the user
        $user = B2BUser::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'mobile_number' => $validated['mobile_number'],
            'password' => Hash::make($validated['password']),
            'company_name' => $validated['company_name'],
            'registration_id_file' => $filePaths['registration_id_file'] ?? null,
            'company_license_file' => $filePaths['company_license_file'] ?? null,
            'gst_file' => $filePaths['gst_file'] ?? null,
            'pan_file' => $filePaths['pan_file'] ?? null,
            'aadhar_file' => $filePaths['aadhar_file'] ?? null,
            'is_approved' => false, // Admin needs to approve
            'login_status' => false,
        ]);

        // Create token
        $token = $user->createToken('b2b-token')->plainTextToken;

        return response()->json([
            'message' => 'Registration successful. Please wait for admin approval.',
            'user' => $user,
            'token' => $token
        ], 201);
    }



   public function fetchProfile(Request $request)
{
    try {
        $validated = $request->validate([
            'id' => 'required|integer|exists:b2b_users,id',
        ]);

        $user = B2BUser::find($validated['id']);

        return response()->json([
            'status' => true,
            'message' => 'Profile fetched successfully',
            'user' => $user,
        ], 200);
    } catch (ValidationException $e) {
        return response()->json([
            'status' => false,
            'message' => 'Validation failed',
            'errors' => $e->errors(),
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Something went wrong. Please try again later.',
            'error' => $e->getMessage(),
        ], 500);
    }
}



public function editProfile(Request $request)
{
    try {
        $validated = $request->validate([
            'id' => 'required|integer|exists:b2b_users,id',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:b2b_users,email,' . $request->id,
            'mobile_number' => 'nullable|string|max:20|unique:b2b_users,mobile_number,' . $request->id,
            'password' => 'nullable|string|min:6',
            'company_name' => 'nullable|string|max:255',

            'registration_id_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'company_license_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'gst_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'pan_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'aadhar_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png',

            'is_approved' => 'nullable|boolean',
            'login_status' => 'nullable|boolean',
        ]);

        $user = B2BUser::findOrFail($validated['id']);

        // Update text fields
        foreach ($validated as $key => $value) {
            if (!in_array($key, ['id', 'password']) && $value !== null) {
                $user->$key = $value;
            }
        }

        // Handle password update
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // Handle file uploads
        $fileFields = [
            'registration_id_file',
            'company_license_file',
            'gst_file',
            'pan_file',
            'aadhar_file',
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('b2b/documents', 'public');
                $user->$field = 'b2b/documents/' . basename($path);
            }
        }

        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Profile updated successfully',
            'user' => $user,
        ]);
    } catch (ValidationException $e) {
        return response()->json([
            'status' => false,
            'message' => 'Validation failed',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Something went wrong',
            'error' => $e->getMessage()
        ], 500);
    }
}


//     public function login(Request $request)
// {
//     try {
//         $request->validate([
//             'full_name' => 'required|string|max:255',
//             'last_name' => 'nullable|string|max:255',
//             'email' => 'required|email',
//             'mobile_number' => 'required|string|max:20',
//             'password' => 'required|string|min:6',
//         ]);

//         $user = B2BUser::where('email', $request->email)->first();

//         if (!$user) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Email not registered. Please sign up first.',
//                 'login_status' => false,
//             ], 404);
//         }

//         if ($user->first_name !== $request->full_name) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Full name is incorrect.',
//                 'login_status' => false,
//             ], 401);
//         }

//         if (!empty($request->last_name) && $user->last_name !== $request->last_name) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Last name is incorrect.',
//                 'login_status' => false,
//             ], 401);
//         }

//         if ($user->mobile_number !== $request->mobile_number) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Mobile number is incorrect.',
//                 'login_status' => false,
//             ], 401);
//         }

//     //    if (!Hash::check($request->password, $user->password)) {
//     //             return response()->json([
//     //                 'status' => false,
//     //                 'message' => 'Password is incorrect.',
//     //             ], 401);
//     //         }

//         if (!$user->is_approved) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Your account is not approved yet. Please wait for admin approval.',
//                 'login_status' => false,
//             ], 403);
//         }

//         // ✅ Set login_status to true and save
//         $user->login_status = true;
//         $user->save();

//         // ✅ Refresh user to get updated values
//         $user->refresh();

//         // Generate token
//         $token = $user->createToken('b2b-token')->plainTextToken;

//         return response()->json([
//             'status' => true,
//             'message' => 'Login successful',
//             'user' => $user,
//             'token' => $token,
//             'login_status' => true,  // Explicit login status in response
//         ], 200);

//     } catch (ValidationException $e) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Validation error',
//             'errors' => $e->errors(),
//             'login_status' => false,
//         ], 422);
//     } catch (\Exception $e) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Something went wrong. Please try again later.',
//             'error' => $e->getMessage(),
//             'login_status' => false,
//         ], 500);
//     }
// }

// public function login(Request $request)
// {
//     try {
//         $request->validate([
//             'full_name' => 'required|string|max:255',
//             'last_name' => 'nullable|string|max:255',
//             'email' => 'required|email',
//             'mobile_number' => 'required|string|max:20',
//             'password' => 'required|string|min:6',
//         ]);

//         $user = B2BUser::where('email', $request->email)->first();

//         if (!$user) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Email not registered. Please sign up first.',
//                 'login_status' => false,
//             ], 404);
//         }

//         if ($user->first_name !== $request->full_name) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Full name is incorrect.',
//                 'login_status' => false,
//             ], 401);
//         }

//         if (!empty($request->last_name) && $user->last_name !== $request->last_name) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Last name is incorrect.',
//                 'login_status' => false,
//             ], 401);
//         }

//         if ($user->mobile_number !== $request->mobile_number) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Mobile number is incorrect.',
//                 'login_status' => false,
//             ], 401);
//         }

//         // Uncomment password check when ready
//         // if (!Hash::check($request->password, $user->password)) {
//         //     return response()->json([
//         //         'status' => false,
//         //         'message' => 'Password is incorrect.',
//         //         'login_status' => false,
//         //     ], 401);
//         // }

//         if (!$user->is_approved) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Your account is not approved yet. Please wait for admin approval.',
//                 'login_status' => false,
//             ], 403);
//         }

//         // ✅ Detect if it's the first login
//         $isFirstLogin = !$user->login_status;

//         // ✅ Update login_status if first time
//         if ($isFirstLogin) {
//             $user->login_status = true;
//             $user->save();
//         }

//         $token = $user->createToken('b2b-token')->plainTextToken;

//         return response()->json([
//             'status' => true,
//             'message' => 'Login successful',
//             'user' => $user,
//             'token' => $token,
//             'first_time_login' => $isFirstLogin, // ✅ Useful in frontend to show onboarding
//             'login_status' => true
//         ], 200);

//     } catch (ValidationException $e) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Validation error',
//             'errors' => $e->errors(),
//             'login_status' => false,
//         ], 422);
//     } catch (\Exception $e) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Something went wrong. Please try again later.',
//             'error' => $e->getMessage(),
//             'login_status' => false,
//         ], 500);
//     }
// }


public function login(Request $request)
{
    try {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email',
            'mobile_number' => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        $user = B2BUser::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Email not registered. Please sign up first.',
                'login_status' => false,
            ], 404);
        }

        if ($user->first_name !== $request->full_name) {
            return response()->json([
                'status' => false,
                'message' => 'Full name is incorrect.',
                'login_status' => false,
            ], 401);
        }

        if (!empty($request->last_name) && $user->last_name !== $request->last_name) {
            return response()->json([
                'status' => false,
                'message' => 'Last name is incorrect.',
                'login_status' => false,
            ], 401);
        }

        if ($user->mobile_number !== $request->mobile_number) {
            return response()->json([
                'status' => false,
                'message' => 'Mobile number is incorrect.',
                'login_status' => false,
            ], 401);
        }

        // Optional: enable password check if needed
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Password is incorrect.',
                'login_status' => false,
            ], 401);
        }

        if (!$user->is_approved) {
            return response()->json([
                'status' => false,
                'message' => 'Your account is not approved yet. Please wait for admin approval.',
                'login_status' => false,
            ], 403);
        }

        // ✅ Check if it's the first login
        $isFirstLogin = !$user->login_status;

        // ✅ Copy user data before updating login_status
        $responseUser = clone $user;

        // ✅ Generate token
        $token = $user->createToken('b2b-token')->plainTextToken;

        // ✅ Build response
        $response = [
            'status' => true,
            'message' => 'Login successful',
            'user' => $responseUser,
            'token' => $token,
            'first_time_login' => $isFirstLogin,
            'login_status' => $isFirstLogin ? false : true
        ];

        // ✅ Update login_status in DB if it's the first time
        if ($isFirstLogin) {
            $user->login_status = true;
            $user->save();
        }

        return response()->json($response, 200);

    } catch (ValidationException $e) {
        return response()->json([
            'status' => false,
            'message' => 'Validation error',
            'errors' => $e->errors(),
            'login_status' => false,
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Something went wrong. Please try again later.',
            'error' => $e->getMessage(),
            'login_status' => false,
        ], 500);
    }
}








//     public function login(Request $request)
// {
//     try {
//         $request->validate([
//             'full_name' => 'required|string|max:255',
//             'last_name' => 'nullable|string|max:255',
//             'email' => 'required|email',
//             'mobile_number' => 'required|string|max:20',
//             'password' => 'required|string|min:6',
//         ]);

//         $user = B2BUser::where('email', $request->email)->first();

//         if (!$user) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Email not registered. Please sign up first.',
//                 'login_status' => false, // Explicit false when login fails
//             ], 404);
//         }

//         if ($user->first_name !== $request->full_name) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Full name is incorrect.',
//                 'login_status' => false,
//             ], 401);
//         }

//         if (!empty($request->last_name) && $user->last_name !== $request->last_name) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Last name is incorrect.',
//                 'login_status' => false,
//             ], 401);
//         }

//         if ($user->mobile_number !== $request->mobile_number) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Mobile number is incorrect.',
//                 'login_status' => false,
//             ], 401);
//         }

//         if (!Hash::check($request->password, $user->password)) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Password is incorrect.',
//                 'login_status' => false,
//             ], 401);
//         }

//         if ($user->is_approved != 1) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Your account is not approved yet. Please wait for admin approval.',
//                 'login_status' => false,
//             ], 403);
//         }

//         // ✅ Set login_status to true and save
//         $user->login_status = true;
//         $user->save();

//         // Generate token
//         $token = $user->createToken('b2b-token')->plainTextToken;

//         return response()->json([
//             'status' => true,
//             'message' => 'Login successful',
//             'user' => $user,
//             'token' => $token,
//             'login_status' => true  // ✅ Explicit login status
//         ], 200);

//     } catch (ValidationException $e) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Validation error',
//             'errors' => $e->errors(),
//             'login_status' => false,
//         ], 422);
//     } catch (\Exception $e) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Something went wrong. Please try again later.',
//             'error' => $e->getMessage(),
//             'login_status' => false,
//         ], 500);
//     }
// }



//     public function login(Request $request)
// {
//     try {
//         $request->validate([
//             'full_name' => 'required|string|max:255',
//             'last_name' => 'nullable|string|max:255',
//             'email' => 'required|email',
//             'mobile_number' => 'required|string|max:20',
//             'password' => 'required|string|min:6',
//         ]);

//         $user = B2BUser::where('email', $request->email)->first();

//         if (!$user) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Email not registered. Please sign up first.',
//             ], 404);
//         }

//         if ($user->first_name !== $request->full_name) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Full name is incorrect.',
//             ], 401);
//         }

//         if (!empty($request->last_name) && $user->last_name !== $request->last_name) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Last name is incorrect.',
//             ], 401);
//         }

//         if ($user->mobile_number !== $request->mobile_number) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Mobile number is incorrect.',
//             ], 401);
//         }

//         if (!Hash::check($request->password, $user->password)) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Password is incorrect.',
//             ], 401);
//         }

//         if ($user->is_approved != 1) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Your account is not approved yet. Please wait for admin approval.',
//             ], 403);
//         }

//         // Set login status to true
//         $user->login_status = true;
//         $user->save();

//         // Generate token
//         $token = $user->createToken('b2b-token')->plainTextToken;

//         return response()->json([
//             'status' => true,
//             'message' => 'Login successful',
//             'user' => $user,
//             'token' => $token
//         ], 200);

//     } catch (ValidationException $e) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Validation error',
//             'errors' => $e->errors(),
//         ], 422);
//     } catch (\Exception $e) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Something went wrong. Please try again later.',
//             'error' => $e->getMessage(),
//         ], 500);
//     }
// }


    // public function login(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'full_name' => 'required|string|max:255',
    //             'last_name' => 'nullable|string|max:255',
    //             'email' => 'required|email',
    //             'mobile_number' => 'required|string|max:20',
    //             'password' => 'required|string|min:6',
    //         ]);

    //         // Step 1: Check if email exists
    //         $user = B2BUser::where('email', $request->email)->first();

    //         if (!$user) {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Email not registered. Please sign up first.',
    //             ], 404);
    //         }

    //         // Step 2: Check full_name (first_name)
    //         if ($user->first_name !== $request->full_name) {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Full name is incorrect.',
    //             ], 401);
    //         }

    //         // Step 3: Check last_name if given
    //         if (!empty($request->last_name) && $user->last_name !== $request->last_name) {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Last name is incorrect.',
    //             ], 401);
    //         }

    //         // Step 4: Check mobile_number
    //         if ($user->mobile_number !== $request->mobile_number) {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Mobile number is incorrect.',
    //             ], 401);
    //         }

    //         // Step 5: Check password
    //         if (!Hash::check($request->password, $user->password)) {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Password is incorrect.',
    //             ], 401);
    //         }

    //         // Step 6: Check approval
    //         if ($user->is_approved != 1) {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Your account is not approved yet. Please wait for admin approval.',
    //             ], 403);
    //         }

    //         // Step 7: Generate token
    //         $token = $user->createToken('b2b-token')->plainTextToken;

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Login successful',
    //             'user' => $user,
    //             'token' => $token
    //         ], 200);

    //     } catch (ValidationException $e) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Validation error',
    //             'errors' => $e->errors(),
    //         ], 422);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Something went wrong. Please try again later.',
    //             'error' => $e->getMessage(),
    //         ], 500);
    //     }
    // }


    /**
     * Login the B2B user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'device_name' => 'required',
    //     ]);

    //     $user = B2BUser::where('email', $request->email)->first();

    //     if (!$user || !Hash::check($request->password, $user->password)) {
    //         throw ValidationException::withMessages([
    //             'email' => ['The provided credentials are incorrect.'],
    //         ]);
    //     }

    //     if (!$user->is_approved) {
    //         return response()->json([
    //             'message' => 'Your account is pending approval. Please contact support.',
    //         ], 403);
    //     }

    //     $token = $user->createToken($request->device_name)->plainTextToken;

    //     return response()->json([
    //         'message' => 'Login successful',
    //         'user' => $user,
    //         'token' => $token
    //     ]);
    // }

    /**
     * Logout the B2B user (Revoke the token)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated B2B user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        $user = $request->user();

        // Add full URLs for file fields
        $fileFields = [
            'registration_id_file',
            'company_license_file',
            'gst_file',
            'pan_file',
            'aadhar_file'
        ];

        foreach ($fileFields as $field) {
            if ($user->$field) {
                $user->$field = Storage::disk('public')->url($user->$field);
            }
        }

        return response()->json($user);
    }


}
