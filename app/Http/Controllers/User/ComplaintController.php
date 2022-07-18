<?php 

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintController extends Controller 
{
  public function student_sentcomplaints($id)
  {
     $compaints = Complaint::where('sender_id',$id)->get();
    if (isset($compaints)) {
    $response['data'] =$compaints->values();
    $response['message'] = "success";
    $response['status_code'] = 200;
    return response()->json($response,200) ;
    }
    $response['data'] =$compaints->values();
    $response['message'] = "error";
    $response['status_code'] = 404;
    return response()->json($response,404) ;
  }
 
}

?>