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

    Route::group(['middleware' => 'auth.guard:student-api'], function () {

        Route::post('logout', [App\Http\Controllers\Auth\Student\AuthController::class, 'logout']);

        Route::get('educational_contents/all/{subject_id}', [App\Http\Controllers\User\EducationalContentController::class, 'all']);
        
        Route::get('events/all', [App\Http\Controllers\User\EventController::class, 'all']);
        
        Route::get('justifications/all', [App\Http\Controllers\User\JustificationController::class, 'all']);
        
        Route::get('justification/{attendance_check_id}', [App\Http\Controllers\User\JustificationController::class, 'showJustification']);
        
        Route::get('scheduales/all/{semester_id}', [App\Http\Controllers\User\ScheduleController::class, 'all']);

        Route::get('subjects/all', [App\Http\Controllers\User\SubjectController::class, 'all']);
        
        Route::get('marks/all/{semester_id}', [App\Http\Controllers\User\MarkController::class, 'all']);
    });
});



Route::get('/groups/groupsforadministrator/{administrator_id}', [App\Http\Controllers\User\GroupController::class, 'groupsforadministrator']);
Route::get('/classes/classesforadministrator/{administrator_id}', [App\Http\Controllers\User\ClassController::class, 'classesforadministrator']);
Route::get('/classes/allclasses', [App\Http\Controllers\User\ClassController::class, 'allclasses']);
Route::get('/students/groupstudents/{group_id}', [App\Http\Controllers\User\StudentController::class, 'groupstudents']);
Route::get('/attendances/groupstudstudent_attendanceents/{student_id}', [App\Http\Controllers\User\AttendanceCheckController::class, 'studentAttendance']);
Route::get('/compaints/student_sentcomplaints/{user_id}', [App\Http\Controllers\User\ComplaintController::class, 'student_sentcomplaints']);


