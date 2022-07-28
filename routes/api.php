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
 
    Route::group(['prefix' => 'administrator'],function (){

         //login administrator
         Route::post('login', [App\Http\Controllers\Auth\Administrator\AuthController::class, 'login']);

         Route::group(['middleware' => 'auth.guard:administrator-api'], function () {
 
             //logout administrator
             Route::post('logout',[App\Http\Controllers\Auth\Administrator\AuthController::class, 'logout']);
 
             //show all groups for administrator
             Route::get( 'groups',[App\Http\Controllers\User\GroupController::class, 'groupsforadministrator']);
    
             //show all classesfor administrator
             Route::get( 'classes',[App\Http\Controllers\User\ClassController::class, 'classesforadministrator']);
     
             //show all classes
             Route::get( 'classes/all',[App\Http\Controllers\User\ClassController::class, 'all']);
    
             //show all studends in group
             Route::get( 'group/students/{class_id}/{group_id}',[App\Http\Controllers\User\StudentController::class, 'groupstudents']);
     
             //show all sent complaints for administrator
             Route::get( 'complaints/sent',[App\Http\Controllers\User\ComplaintController::class, 'AdministratorSentComplaints']);
    
             //show all received complaints for administrator
             Route::get( 'complaints/received',[App\Http\Controllers\User\ComplaintReceiverController::class, 'AdministratorReceivedComplaints']);
    
             //add administrator complaint
             Route::post( 'complaints/add',[App\Http\Controllers\User\ComplaintController::class, 'AddAdministratorComplaint']);

             //show attendance checks for a specific student
             Route::get( 'attendances/all/{id}',[App\Http\Controllers\User\AttendanceCheckController::class, 'studentAttendances']);

             //show all marks for a specific student
            Route::get('marks/all/{semester_id}/{student_id}', [App\Http\Controllers\User\MarkController::class, 'studentMarks']);

             //show all scheduales for administrator's groups
             Route::get( 'scheduales/all/{semester_id}',[App\Http\Controllers\User\ScheduleController::class, 'admineSchedules']);

            //show all events for administrator's classes
            Route::get( 'events/all',[App\Http\Controllers\User\EventController::class, 'admineEvents']);

            //add attendance for student
            Route::post( 'attendance/add',[App\Http\Controllers\User\AttendanceCheckController::class, 'store']);

            //add event for class
            Route::post( 'event/add',[App\Http\Controllers\User\EventController::class, 'store']);

            //add schedule for group
            Route::post( 'schedule/add',[App\Http\Controllers\User\ScheduleController::class, 'store']);

            //add educational content for class
            Route::post( 'educational-content/add',[App\Http\Controllers\User\EducationalContentController::class, 'store']);
 
         });
    });

    Route::group(['prefix' => 'student'], function () {

        //login student
        Route::post('login', [App\Http\Controllers\Auth\Student\AuthController::class, 'login']);

        //for logged in student
        Route::group(['middleware' => 'auth.guard:student-api'], function () {

            //logout student
            Route::post('logout', [App\Http\Controllers\Auth\Student\AuthController::class, 'logout']);
    
            //show all educational content for subject
            Route::get('educational-contents/all/{subject_id}', [App\Http\Controllers\User\EducationalContentController::class, 'all']);
            
            //show all events
            Route::get('events/all', [App\Http\Controllers\User\EventController::class, 'all']);
            
            //show all justifications
            Route::get('justifications/all', [App\Http\Controllers\User\JustificationController::class, 'all']);
            
            //show justification of specific attendance
            Route::get('justifications/{attendance_check_id}', [App\Http\Controllers\User\JustificationController::class, 'showJustification']);
            
            //show all scheduales
            Route::get('scheduales/all/{semester_id}', [App\Http\Controllers\User\ScheduleController::class, 'all']);
    
            //show all subjects
            Route::get('subjects/all', [App\Http\Controllers\User\SubjectController::class, 'all']);
            
            //show all marks
            Route::get('marks/all/{semester_id}', [App\Http\Controllers\User\MarkController::class, 'all']);

            //add justification
            Route::post('justifications/add/{attendance_check_id}', [App\Http\Controllers\User\JustificationController::class, 'store']);

            //show all attendances for one student 
            Route::get( 'attendances',[App\Http\Controllers\User\AttendanceCheckController::class, 'Attendances']);
    
            //show type attendances for student 
            Route::get( 'attendancestype/{type}',[App\Http\Controllers\User\AttendanceCheckController::class, 'AttendancesType']);
    
            //show all sent complaints for student
            Route::get( 'complaints/sent',[App\Http\Controllers\User\ComplaintController::class, 'StudentSentComplaints']);
   
            //show all received complaints for student
            Route::get( 'complaints/received',[App\Http\Controllers\User\ComplaintReceiverController::class, 'StudentReceivedComplaints']);
    
            //add student complaint
            Route::post( 'complaints/add',[App\Http\Controllers\User\ComplaintController::class, 'AddStudentComplaint']);
    
        });
    
    });



    //add student
    Route::post( '/student/add',[App\Http\Controllers\User\StudentController::class, 'add']);
    //add class
    Route::post( '/class/add',[App\Http\Controllers\User\ClassController::class, 'add']);
    

Route::get('/test-online',function(){dd('i am online ^-^');});






