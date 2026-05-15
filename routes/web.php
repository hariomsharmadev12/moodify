<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


Route::get('/', [App\Http\Controllers\FrontPageController::class, 'index'])->name('frontpage');
Route::get('/signup', [App\Http\Controllers\AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [App\Http\Controllers\AuthController::class, 'signup'])->name('signup.submit');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.submit');
Route::get('/customer/dashboard', [App\Http\Controllers\customer::class, 'dashboard'])->name('customer.dashboard');
Route::get('/otp-verification', [App\Http\Controllers\AuthController::class, 'showOtpForm'])->name('otp_verification');
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->middleware('role:admin')->name('admin.dashboard');
Route::get('/manage-customers', [App\Http\Controllers\Manage_CustomerController::class, 'index'])->middleware('role:admin')->name('manage.customers');
Route::post('/update-role', [App\Http\Controllers\Manage_CustomerController::class, 'updateRole'])->middleware('role:admin')->name('update.role');
Route::post('/otp-verification', function (Request $request) {
    $inputOtp = $request->input('otp');
    $sessionOtp = session('otp');
    if ($inputOtp == $sessionOtp) {
        $user = User::find(session('user_id'));
        Auth::login($user);

        session()->forget('otp');
        return redirect()->route('customer.dashboard')->with('success', 'OTP verified successfully!');
    } else {
        return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
    }
})->name('otp_verification.submit');
Route::post('/resend-otp', function (Request $request) {
    $otp = rand(100000, 999999);
    session(['otp' => $otp]);
    Mail::raw("Your OTP for registration is: $otp", function ($message) use ($request) {
        $message->to(session('otp_email'))
            ->subject('OTP Verification for Registration');
    });
    return redirect()->back()->with('success', 'OTP resent successfully!');
})->name('resend_otp');
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('frontpage');
})->name('logout');
