<?php 

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\SchoolClass;

class ClassController extends Controller 
{

  public function classesforadministrator($id)
  {
     $classes = schoolClass::whereHas('class_group', function($q)use($id){
      $q->where('administrator_id',$id);
    })->get();
    if (isset($classes)) {
    $response['data'] =$classes->values();
    $response['message'] = "success";
    $response['status_code'] = 200;
    return response()->json($response,200) ;
    }
    $response['data'] =$classes->values();
    $response['message'] = "error";
    $response['status_code'] = 404;
    return response()->json($response,404) ;
  }


  public function all()
  {
    $classes = schoolClass::all();
    if (isset($classes)) {
    $response['data'] =$classes->values();
    $response['message'] = "success";
    $response['status_code'] = 200;
    return response()->json($response,200) ;
    }
    $response['data'] =$classes->values();
    $response['message'] = "error";
    $response['status_code'] = 404;
    return response()->json($response,404) ;
  }

  public function add(Request $request)
  {
     $class =new SchoolClass;
   
     $class->name= $request->name;

     $class->save();

    $response['data'] =$class;
    $response['message'] = "stor success";
    $response['status_code'] = 200;
    return response()->json($response,200) ;
 
  }

}

?>