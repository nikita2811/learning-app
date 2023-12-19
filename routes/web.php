<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/{slug?}', function () {
    return view('welcome');
});
Route::get('reset-password/{token}', function ($token) {
    $vueRoute = 'reset-password?token=' . $token . '&email=' . request()->email;
    return redirect($vueRoute);
})->middleware(['guest:' . config('fortify.guard')])
    ->name('password.reset');


Route::get('email.verify', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('verification/verify', [VerifyEmailController::class, '__invoke'])
    ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard'), 'signed', 'throttle:5'])
    ->name('verification.verify');

// Route::post('verification.send', [EmailVerificationNotificationController::class, 'store'])
//     ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard'), 'throttle:5'])
//     ->name('verification.send');
