<?php 

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller 
{

  public function groupstudents($id)
  {
     $students = Student::whereHas('class_group', function($q)use($id){
      $q->where('group_id',$id);
    })->join('users','students.user_id','=','users.id')
    ->select('students.id','first_name','last_name','father_name','mother_name','students.phone')
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