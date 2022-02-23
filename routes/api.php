<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AtratoController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\CustomerController;

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

Route::post('/user/register', [UserController::class, 'register']);
Route::post('/user/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user/logout', [UserController::class, 'logout']);
    Route::resource('/customers', CustomerController::class);
    Route::resource('/books', BookController::class);
    Route::resource('/borrows', BorrowController::class);
});

// Route::post('test-webhook', [WebhookController::class, 'handle']);
Route::webhooks('test-webhook');
Route::post('webhook-atrato', [AtratoController::class, 'receive']);