<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Models\AttendanceCheck;

class AttendanceCheckController extends Controller
{
  use GeneralTrait;
  public function Attendances()
  {
    $student_id = auth()->user()->id;

    $attendances = AttendanceCheck::where('student_id',$student_id)->get();

    if(! $attendances)
    return $this->returnError('E000', 'No Attendances Found');

  return $this->returnData('Attendances', $ $attendances); 
   
  }

  public function AttendanceType($id,$type)
  {
     $attendances = AttendanceCheck::where('student_id',$id)
     ->where('type',$type)->get();
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
