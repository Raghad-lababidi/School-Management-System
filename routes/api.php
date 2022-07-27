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

        Route::group(['middleware' => 'auth.guard:administrator-api'], function () {

            //logout student
            Route::post('logout',[App\Http\Controllers\Auth\Administrator\AuthController::class, 'logout']);

            
    
           
        });

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



    //show all group for administrator
    Route::get( '/groups/groupsforadministrator/{administrator_id}',[App\Http\Controllers\User\GroupController::class, 'groupsforadministrator']);
    //show all classesfor administrator
    Route::get( '/classes/classesforadministrator/{administrator_id}',[App\Http\Controllers\User\ClassController::class, 'classesforadministrator']);
    //show all classes
    Route::get( '/classes/all',[App\Http\Controllers\User\ClassController::class, 'all']);
    //show all studends in group
    Route::get( '/students/groupstudents/{class_id}/{group_id}',[App\Http\Controllers\User\StudentController::class, 'groupstudents']);
    //show all attendances for one student 
    Route::get( '/attendances/studentAttendance/{student_id}',[App\Http\Controllers\User\AttendanceCheckController::class, 'studentAttendance']);
    //show type attendances for student 
    Route::get( '/attendances/AttendanceType/{student_id}/{type}',[App\Http\Controllers\User\AttendanceCheckController::class, 'AttendanceType']);
    //show all sent complaints for student
    Route::get( '/compaints/StudentSentComplaints/{user_id}',[App\Http\Controllers\User\ComplaintController::class, 'StudentSentComplaints']);
    //show all sent complaints for administrator
    Route::get( '/compaints/AdministratorSentComplaints/{user_id}',[App\Http\Controllers\User\ComplaintController::class, 'AdministratorSentComplaints']);
    //show all received complaints for student
    Route::get( '/compaints/StudentReceivedComplaints/{user_id}',[App\Http\Controllers\User\ComplaintReceiverController::class, 'StudentReceivedComplaints']);
    //show all received complaints for administrator
    Route::get( '/compaints/AdministratorReceivedComplaints/{user_id}',[App\Http\Controllers\User\ComplaintReceiverController::class, 'AdministratorReceivedComplaints']);
    //add administrator complaint
    Route::post( '/compaints/AddAdministratorComplaint',[App\Http\Controllers\User\ComplaintController::class, 'AddAdministratorComplaint']);
    //add student complaint
    Route::post( '/compaints/AddStudentComplaint',[App\Http\Controllers\User\ComplaintController::class, 'AddStudentComplaint']);
    //add student
    Route::post( '/student/add',[App\Http\Controllers\User\StudentController::class, 'add']);
    //add class
    Route::post( '/class/add',[App\Http\Controllers\User\ClassController::class, 'add']);
    

Route::get('/test-online',function(){dd('i am online ^-^');});






