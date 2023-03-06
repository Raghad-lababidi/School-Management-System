<?php 

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Models\Complaint;
use App\Models\ComplaintReceiver;
use App\Models\Administrator;

class ComplaintController extends Controller 
{
  use GeneralTrait;
  public function StudentSentComplaints()
  {
    $user_id = auth()->user()->user_id;
     $compaints = Complaint::where('sender_id',$user_id)->get();
     if(!$compaints)
     return $this->returnError('E000', 'No Sent Compaints Found');
 
   return $this->returnData('Compaints',$compaints); 
  }
 
  public function AdministratorSentComplaints()
  {
    $user_id = auth()->user()->user_id;
     $compaints = Complaint::where('sender_id', $user_id)
     ->join('complaint_receivers','complaints.id','=','complaint_id')
     ->join('users','complaint_receivers.receiver_id','=','users.id')
     ->select('complaints.*', 'complaint_receivers.receiver_id','first_name','last_name')
     ->get();

     if(!$compaints)
     return $this->returnError('E000', 'No Sent Compaints Found');
 
   return $this->returnData('Compaints',$compaints); 
  }

  public function AddAdministratorComplaint(Request $request)
  {
      $sender_id = auth()->user()->user_id;
      $compaint = Complaint::create([
      'title' => $request->title,
      //'text' =>  Crypt::encryptString($request->text),
      'text' => $request->text,
      'date' => $request->date,
      'sender_id' => $sender_id,
    ]);
  

      $receive = ComplaintReceiver::create([
      'complaint_id'=> $compaint->id,
      'receiver_id' => $request->receiver_id,
    ]);

    return $this->returnSuccessMessage('Complaint Add Successfully');
  }

  public function AddStudentComplaint(Request $request)
  {
    $sender_id = auth()->user()->user_id;

    $compaint = Complaint::create([
      'title' => $request->title,
      //'text' =>  Crypt::encryptString($request->text),
      'text' => $request->text,
      'date' => $request->date,
      'sender_id' => $sender_id,
    ]);
 
    $administrator_id= auth()->user()->classGroup->administrator_id;

    $receiver_id = Administrator::where('id', $administrator_id)->pluck('user_id')[0];
   
    $receive = ComplaintReceiver::create([
      'complaint_id' => $compaint->id,
      'receiver_id' => $receiver_id ,
    ]);
  
    return $this->returnSuccessMessage('Complaint Add Successfully');
     
  }
}

?>