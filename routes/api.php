<?php

use App\Http\Controllers\Auth\Administrator\AuthController;
use App\Http\Controllers\User\GroupController;
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

Route::group(['prefix' => 'administrator'], function () {

    Route::post('login', [App\Http\Controllers\Auth\Administrator\AuthController::class, 'login']);

    Route::post('logout', [App\Http\Controllers\Auth\Administrator\AuthController::class, 'logout'])->middleware(['auth.guard:administrator-api']);

});

Route::group(['prefix' => 'student'], function () {

    Route::post('login', [App\Http\Controllers\Auth\Student\AuthController::class, 'login']);

    Route::post('logout', [App\Http\Controllers\Auth\Student\AuthController::class, 'logout'])->middleware(['auth.guard:student-api']);

    Route::post('event/all', [App\Http\Controllers\User\AttendanceCheckController::class, 'all'])->middleware(['auth.guard:student-api']);


});



Route::get('/groups/groupsforadministrator/{administrator_id}', [App\Http\Controllers\User\GroupController::class, 'groupsforadministrator']);
Route::get('/classes/classesforadministrator/{administrator_id}', [App\Http\Controllers\User\ClassController::class, 'classesforadministrator']);
Route::get('/classes/allclasses', [App\Http\Controllers\User\ClassController::class, 'allclasses']);
Route::get('/students/groupstudents/{group_id}', [App\Http\Controllers\User\StudentController::class, 'groupstudents']);
Route::get('/attendances/groupstudstudent_attendanceents/{student_id}', [App\Http\Controllers\User\AttendanceCheckController::class, 'student_attendance']);
Route::get('/compaints/student_sentcomplaints/{user_id}', [App\Http\Controllers\User\ComplaintController::class, 'student_sentcomplaints']);


