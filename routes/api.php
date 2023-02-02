<?php

use App\Auth\Controllers\AuthController;
use App\Framework\Http\Controllers\HomeController;
use App\Subscription\Controllers\SubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/status', [HomeController::class, 'status']);

Route::prefix('/auth')->name('auth.')->group(function () {
    Route::post('/login-by-email', [AuthController::class, 'loginByEmail']);
    Route::post('/register-by-email', [AuthController::class, 'registerByEmail']);
});

Route::prefix('/subscription')->name('subscription.')->group(function () {
    Route::post('/', [SubscriptionController::class, 'index']);
    Route::post('/save', [SubscriptionController::class, 'save']);
    Route::get('/search', [SubscriptionController::class, 'search']);
});
