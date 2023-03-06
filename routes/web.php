<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});


 //==============================Translate all pages============================
 Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

Route::group(['prefix' => 'admin'],function (){

    //بدون صلاحيات
    //login student
    Route::post('login', [App\Http\Controllers\Auth\Admin\AuthController::class, 'login'])->name('login');
    
    Route::post('logout', [App\Http\Controllers\Auth\Admin\AuthController::class, 'logout'])->name('logout');
    Route::get('test',function(){dd('Hello Iam Admin ^-^');})->name('test');
    
   //==============================dashboard============================
    Route::get('dashboard', [App\Http\Controllers\Auth\Admin\AuthController::class, 'dashboard'])->name('dashboard');
    
     //==============================Classrooms============================
       
        Route::get('show/classes', [App\Http\Controllers\Admin\Classrooms\ClassroomController::class, 'index'])->name('show_classes');

        Route::post('add/classes', [App\Http\Controllers\Admin\Classrooms\ClassroomController::class, 'store'])->name('add_classes');
      
        // Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');

    //    Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');

      //==============================Grades============================

      Route::get('show/groups', [App\Http\Controllers\Admin\Groups\GroupController::class, 'index'])->name('show_groups');

      Route::post('add/groups', [App\Http\Controllers\Admin\Groups\GroupController::class, 'store'])->name('add_groups');
    
    //==============================Students============================

    Route::get('students/create', [App\Http\Controllers\Admin\Students\StudentController::class, 'create'])->name('create_students');
    Route::post('add/student', [App\Http\Controllers\Admin\Students\StudentController::class, 'store'])->name('add_students');
    Route::get('show/students', [App\Http\Controllers\Admin\Students\StudentController::class, 'index'])->name('show_students');

     //==============================Admins============================
     Route::get('admins/create', [App\Http\Controllers\Admin\AdminController::class, 'create'])->name('create_admins');
     Route::post('add/admin', [App\Http\Controllers\Admin\AdminController::class, 'store'])->name('add_admin');
     Route::get('show/admins', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('show_admins');



    Route::group(['middleware' => ['auth:sanctum', 'abilities:admin-api']], function () {
       
        //من صلاحيات المدير

        //logout student
   
    });
});

   
});

