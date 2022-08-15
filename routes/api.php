<?php

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


//add student
Route::post( '/student/add',[App\Http\Controllers\User\StudentController::class, 'add']);
//add class
Route::post( '/class/add',[App\Http\Controllers\User\ClassController::class, 'add']);


// Route::get('/test-online',function(){dd('i am online ^-^');});



Route::group(['prefix' => 'admin'],function (){

    //بدون صلاحيات

    Route::group(['middleware' => ['auth:sanctum', 'abilities:admin-api']], function () {
       
        Route::get('/',function(){dd('Hello Iam Admin ^-^');});
        //من صلاحيات المدير
    });
});




