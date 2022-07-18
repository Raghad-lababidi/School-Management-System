<?php 

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller 
{

  public function groupstudents($class_id,$group_id)
  {
     $students = Student::whereHas('class_group', function($q)use($class_id,$group_id){
      $q->where('school_class_id',$class_id)
        ->where('group_id',$group_id);
    })->join('users','students.user_id','=','users.id')
    ->select('students.id','students.user_id','first_name','last_name','father_name','mother_name','students.phone')
    ->get();
    if (isset($students)) {
    $response['data'] =$students->values();
    $response['message'] = "success";
    $response['status_code'] = 200;
    return response()->json($response,200) ;
    }
    $response['data'] =$students->values();
    $response['message'] = "error";
    $response['status_code'] = 404;
    return response()->json($response,404) ;
  }
 
}

?>