<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'customers', 'middleware' => ['auth']], function(){
    Route::get('/', [CustomersController::class, 'getAll']);
    Route::post('/', [CustomersController::class, 'create']);
    Route::get('/{id}', [CustomersController::class, 'get']);
    Route::patch('/{id}', [CustomersController::class, 'update']);
    Route::delete('/{id}', [CustomersController::class, 'delete']);
});

Route::group(['prefix' => 'auth'], function(){
    Route::post('/login', [UserController::class, 'login']);

    Route::group(['middleware' => ['auth']], function(){
        Route::get('/logout', [UserController::class, 'logout']);
        Route::get('/check', function(){});
    });
});

Route::group(['prefix' => 'sms', 'middleware' => ['auth']], function(){
    Route::get('/balance', [SMSController::class, 'getBalance']);
    Route::post('/send', [SMSController::class, 'send']);
});