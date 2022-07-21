<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\ComplaintReceiver;

class ComplaintReceiverController extends Controller
{

  public function StudentReceivedComplaints($id)
  {
     $compaints = ComplaintReceiver::where('receiver_id',$id)
    ->join('complaints','complaints_receivers.complaint_id','=','complaints.id')
    ->select('complaints.*','complaints_receivers.receiver_id')
     ->get();
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

  public function AdministratorReceivedComplaints($id)
  {
     $compaints = ComplaintReceiver::where('receiver_id',$id)
    ->join('complaints','complaints_receivers.complaint_id','=','complaints.id')
    ->join('users','complaints.sender_id','=','users.id')
    ->select('complaints.*','complaints_receivers.receiver_id','first_name','last_name')
     ->get();
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
