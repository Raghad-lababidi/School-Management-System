<?php 

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\ComplaintReceiver;
use App\Models\User;

class ComplaintController extends Controller 
{
  public function StudentSentComplaints($id)
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
 
  public function AdministratorSentComplaints($id)
  {
     $compaints = Complaint::where('sender_id',$id)
     ->join('complaints_receivers','complaints.id','=','complaint_id')
     ->join('users','complaint_receivers.receiver_id','=','users.id')
     ->select('complaints.*','complaint_receivers.receiver_id','first_name','last_name')
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

  public function AddAdministratorComplaint(Request $request)
  {
  
    $compaint =new Complaint;
    $compaint->title = $request->title;
    $compaint->text = $request->text;
    $compaint->date = $request->date;
    $compaint->sender_id = $request->sender_id;

    $compaint->save();

    $receive = new ComplaintReceiver;
    $receive->complaint_id=$compaint->id;
    $receive->receiver_id=$request->receiver_id;

    $receive->save();

     $response['data'] =$compaint;
     $response['message'] = "store success";
     $response['status_code'] = 200;
     return response()->json($response,200) ;
     
  }

  public function AddStudentComplaint(Request $request)
  {
  
    $compaint =new Complaint;
    $compaint->title = $request->title;
    $compaint->text = $request->text;
    $compaint->date = $request->date;
    $compaint->sender_id = $request->sender_id;

    $compaint->save();

    $receiver_id=User::where('users.id',$request->sender_id)
    ->join('students','users.id','=','students.user_id')
    ->join('class_group','students.class_group_id','=','class_group.id')
    ->pluck('class_group.administrator_id');

    $receive = new ComplaintReceiver;
    $receive->complaint_id=$compaint->id;
    $receive->receiver_id=$receiver_id[0];

    $receive->save();

     $response['data'] =$compaint;
     $response['message'] = "store success";
     $response['status_code'] = 200;
     return response()->json($response,200) ;
     
  }

}

?>