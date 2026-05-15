<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        return view('auth.signup');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function showOtpForm()
    {
        return view('auth.otp_verification');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            $user->last_login_at = now();

            $user->save();
            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('customer.dashboard');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }


    public function signup(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|string|size:10|unique:users',
            'branch' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'branch' => $request->branch,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('customer');
        $otp = rand(100000, 999999);
        session(['otp' => $otp, 'otp_email' => $request->email, 'user_id' => $user->id]);

        Mail::raw("Your OTP for registration is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                ->subject('OTP Verification for Registration');
        });

        Log::info("OTP sent for user: {$user->email}, OTP: {$otp}");

        return redirect()->route('otp_verification');;
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('frontpage');
    }
}
