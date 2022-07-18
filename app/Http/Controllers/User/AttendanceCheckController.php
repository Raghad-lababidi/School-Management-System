<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\AttendanceCheck;

class AttendanceCheckController extends Controller
{

  public function student_attendance($id)
  {
     $attendances = AttendanceCheck::where('student_id',$id)->get();
    if (isset($attendances)) {
    $response['data'] =$attendances->values();
    $response['message'] = "success";
    $response['status_code'] = 200;
    return response()->json($response,200) ;
    }
    $response['data'] =$attendances->values();
    $response['message'] = "error";
    $response['status_code'] = 404;
    return response()->json($response,404) ;
  }

  }

?>
