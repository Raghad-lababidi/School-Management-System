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
 
    Route::group(['prefix' => 'administrator'],function (){

        Route::post('login', [App\Http\Controllers\Auth\Administrator\AuthController::class, 'login']);

        Route::post('logout',[App\Http\Controllers\Auth\Administrator\AuthController::class, 'logout']) -> middleware(['auth.guard:administrator-api']);

    });

    Route::group(['prefix' => 'student'], function () {

        //login student
        Route::post('login', [App\Http\Controllers\Auth\Student\AuthController::class, 'login']);
    
        Route::group(['middleware' => 'auth.guard:student-api'], function () {

            //logout student
            Route::post('logout', [App\Http\Controllers\Auth\Student\AuthController::class, 'logout']);
    
            //show all educational content for subject
            Route::get('educational-contents/all/{subject_id}', [App\Http\Controllers\User\EducationalContentController::class, 'all']);
            
            //show all events
            Route::get('events/all', [App\Http\Controllers\User\EventController::class, 'all']);
            
            //show all justifications
            Route::get('justifications/all', [App\Http\Controllers\User\JustificationController::class, 'all']);
            
            //show justification of one attendance
            Route::get('justifications/{attendance_check_id}', [App\Http\Controllers\User\JustificationController::class, 'showJustification']);
            
            //show all scheduales
            Route::get('scheduales/all/{semester_id}', [App\Http\Controllers\User\ScheduleController::class, 'all']);
    
            //show all subjects
            Route::get('subjects/all', [App\Http\Controllers\User\SubjectController::class, 'all']);
            
            //show all marks
            Route::get('marks/all/{semester_id}', [App\Http\Controllers\User\MarkController::class, 'all']);

            //add justification
            Route::post('justifications/add/{attendance_check_id}', [App\Http\Controllers\User\JustificationController::class, 'store']);
        });
    
    });



    Route::get('/groups/groupsforadministrator/{administrator_id}', [App\Http\Controllers\User\GroupController::class, 'groupsforadministrator']);
    Route::get('/classes/classesforadministrator/{administrator_id}', [App\Http\Controllers\User\ClassController::class, 'classesforadministrator']);
    Route::get('/classes/allclasses', [App\Http\Controllers\User\ClassController::class, 'allclasses']);
    Route::get('/students/groupstudents/{group_id}', [App\Http\Controllers\User\StudentController::class, 'groupstudents']);
    Route::get('/attendances/groupstudstudent_attendanceents/{student_id}', [App\Http\Controllers\User\AttendanceCheckController::class, 'studentAttendance']);
    Route::get('/compaints/student_sentcomplaints/{user_id}', [App\Http\Controllers\User\ComplaintController::class, 'student_sentcomplaints']);

    Route::get( '/groups/groupsforadministrator/{administrator_id}',[App\Http\Controllers\User\GroupController::class, 'groupsforadministrator']);
    Route::get( '/classes/classesforadministrator/{administrator_id}',[App\Http\Controllers\User\ClassController::class, 'classesforadministrator']);
    Route::get( '/classes/allclasses',[App\Http\Controllers\User\ClassController::class, 'allclasses']);
    Route::get( '/students/groupstudents/{class_id}/{group_id}',[App\Http\Controllers\User\StudentController::class, 'groupstudents']);
    Route::get( '/attendances/groupstudstudent_attendanceents/{student_id}',[App\Http\Controllers\User\AttendanceCheckController::class, 'student_attendance']);
    Route::get( '/compaints/student_sentcomplaints/{user_id}',[App\Http\Controllers\User\ComplaintController::class, 'student_sentcomplaints']);
    Route::get( '/compaints/administrator_sentcomplaints/{user_id}',[App\Http\Controllers\User\ComplaintController::class, 'administrator_sentcomplaints']);
    Route::get( '/compaints/student_receivedcomplaints/{user_id}',[App\Http\Controllers\User\ComplaintReceiverController::class, 'student_receivedcomplaints']);
    Route::get( '/compaints/administrator_receivedcomplaints/{user_id}',[App\Http\Controllers\User\ComplaintReceiverController::class, 'administrator_receivedcomplaints']);
    Route::post( '/compaints/add_administrator_complaint',[App\Http\Controllers\User\ComplaintController::class, 'add_administrator_complaint']);
    Route::post( '/compaints/add_student_complaint',[App\Http\Controllers\User\ComplaintController::class, 'add_student_complaint']);
    Route::post( '/student/add_student',[App\Http\Controllers\User\StudentController::class, 'add_student']);
    Route::post( '/class/add_class',[App\Http\Controllers\User\ClassController::class, 'add_class']);
    








