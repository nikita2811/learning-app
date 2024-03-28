<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});
// Route::post('/tokens/create', function (Request $request) {
//     $token = $request->user()->createToken('MyApp');

//     return ['token' => $token->plainTextToken];
// });

Route::post('/register', [RegisteredUserController::class, "store"]);
Route::post('/login', [AuthenticatedSessionController::class, "store"]);
Route::post('forgot-password', [PasswordResetLinkController::class, "store"]);
Route::post('/reset-password', [NewPasswordController::class, "store"]);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('test', [UserController::class, 'test']);
    Route::resource('tasks', TaskController::class);
});
