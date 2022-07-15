<?php

use App\Http\Controllers\Auth\Administrator\AuthController;
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


    Route::post('nagham', [App\Http\Controllers\Auth\Administrator\AuthController::class, 'nagham']);


 
    Route::group(['prefix' => 'administrator'],function (){

        Route::post('login', [App\Http\Controllers\Auth\Administrator\AuthController::class, 'login']);

        Route::post('logout',[App\Http\Controllers\Auth\Administrator\AuthController::class, 'logout']) -> middleware(['auth.guard:administrator-api']);

    });

     Route::group(['prefix' => 'student'],function (){

        Route::post('login', [App\Http\Controllers\Auth\Student\AuthController::class, 'login']);
        
        Route::post('logout',[App\Http\Controllers\Auth\Student\AuthController::class, 'logout']) -> middleware(['auth.guard:student-api']);

    });







