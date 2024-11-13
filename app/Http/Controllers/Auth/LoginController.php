<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Utility;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        $logo = Utility::get_superadmin_logo();
        $logos = \App\Models\Utility::get_file('uploads/logo/');
        $setting = \App\Models\Utility::settings();
    
        // Get the current language (you can modify this based on your application logic)
        $lang = app()->getLocale(); // This will return the current locale, e.g., 'en', 'ar', etc.
        if(Auth::check()){
            return redirect('/form');
        }
    
        return view('authhome.login', compact('logo', 'logos', 'setting', 'lang'));
    }

    // Handle login request
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     $validator = Validator::make($credentials, [
    //         'email' => 'required|email',
    //         'password' => 'required|min:8',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect('/')
    //             ->withErrors($validator)
    //             ->withInput();
    //     }

    //     if (Auth::attempt($credentials)) {
    //         // Authentication passed, redirect to home
    //         return redirect()->intended('/home');
    //     }

    //     // Authentication failed
    //     return redirect('/')
    //         ->with('error', 'Invalid credentials.')
    //         ->withInput();
    // }

    public function loginhome(Request $request)
{
    //dd($request);
    // Validate the credentials
    $credentials = $request->only('email', 'password');

    $validator = Validator::make($credentials, [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ]);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
        return redirect('/')->withErrors($validator)->withInput();
    }

    // Attempt to authenticate the user
    if (Auth::attempt($credentials)) {
       
        session()->regenerate();
        $user = Auth::user();
        if ($user->role_id === 1) { // Admin role (assuming 1 is for admin)
            return redirect()->route('admin.dashboard');
        } elseif ($user->role_id === 3) { // User role (assuming 2 is for user)
            return redirect()->intended('/form');
        }
       // return redirect()->intended('/form');
    }

    // If authentication fails, return with an error message
    return redirect()->back()->with('error', 'Invalid credentials.')->withInput();
}
public function destroy(Request $request)
{
    Auth::logout(); // Log out the user
    $request->session()->invalidate(); // Invalidate the session
    $request->session()->regenerateToken(); // Regenerate the CSRF token

    return redirect('/'); // Redirect to the homepage or login page
}

}
