<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
//Route::post('/register', [UserController::class, "register"]);
Route::post('/register', [RegisteredUserController::class, "store"]);
Route::post('/login', [AuthenticatedSessionController::class, "store"])->name('login');
//Route::post('email/verification-notification', [EmailVerificationNotificationController::class, "store"]);
//Route::get('email/verify/{id}/{hash}', [VerifyEmailController::class, "__invoke"]);
Route::post('forgot-password', [PasswordResetLinkController::class, "store"]);
//Route::post('/reset-password', [NewPasswordController::class, "store"])->middleware('guest')->name('password.update');


Route::group(['middleware' => 'auth:sanctum'], function () {
});
