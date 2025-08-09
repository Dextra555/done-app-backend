<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /**
     * Show the admin login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        try {
            return view('admin.auth.login');
        } catch (\Exception $e) {
            Log::error('Error showing login form: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while loading the login page.');
        }
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        Log::info('Admin login attempt started', ['email' => $request->email, 'ip' => $request->ip()]);
        
        try {
            // Validate the form data
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'string', 'min:8'],
            ]); 

            Log::debug('Login credentials validated', ['email' => $credentials['email']]);

            // Attempt to log the admin in
            if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
                Log::info('Admin login successful', [
                    'admin_id' => Auth::guard('admin')->id(),
                    'email' => $credentials['email']
                ]);
                
                $request->session()->regenerate();
                
                return redirect()->intended(route('admin.dashboard'))
                    ->with('status', 'You are now logged in!');
            }

            Log::warning('Admin login failed - invalid credentials', [
                'email' => $credentials['email'],
                'ip' => $request->ip()
            ]);

            return back()->withErrors([
                'email' => 'These credentials do not match our records.',
            ])->withInput($request->only('email', 'remember'));

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Login validation failed', [
                'errors' => $e->errors(),
                'email' => $request->email,
                'ip' => $request->ip()
            ]);
            throw $e;
            
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage(), [
                'exception' => $e,
                'email' => $request->email ?? 'unknown',
                'ip' => $request->ip()
            ]);
            
            return back()->with('error', 'An error occurred during login. Please try again.');
        }
    }

    /**
     * Log the admin out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        try {
            $adminId = Auth::guard('admin')->id();
            
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            Log::info('Admin logged out', ['admin_id' => $adminId]);
            
            return redirect()->route('admin.login')
                ->with('status', 'You have been logged out successfully.');
                
        } catch (\Exception $e) {
            Log::error('Logout error: ' . $e->getMessage());
            return redirect()->route('admin.login')
                ->with('error', 'An error occurred during logout.');
        }
    }
}
