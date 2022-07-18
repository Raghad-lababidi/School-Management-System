<?php 

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller 
{

  public function groupsforadministrator($id)
  {
     $groups = Group::whereHas('class_group', function($q)use($id){
      $q->where('administrator_id',$id);
    })->get();
    if (isset($groups)) {
    $response['data'] =$groups->values();
    $response['message'] = "success";
    $response['status_code'] = 200;
    return response()->json($response,200) ;
    }
    $response['data'] =$groups->values();
    $response['message'] = "error";
    $response['status_code'] = 404;
    return response()->json($response,404) ;
  }

 
}

?>