<?php 

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Justification;
use App\Traits\GeneralTrait;
use App\Traits\FileTrait;

class JustificationController extends Controller 
{
  use GeneralTrait;
  use FileTrait;

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request, $attendance_check_id)
  {
    //save file in folder.
    $file = $this -> saveFile($request -> file , 'justification');

    $justification = Justification::create([
         'text'=> $request->text,
         'file'=> $file,
         'attendance_check_id'=> $attendance_check_id,
     ]);

      return $this->returnSuccessMessage('Justification Add Successfully');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }

  public function all()
  {
    $student_id = auth()->user()->id;
    $justifications = Justification::join('attendance_checks','justifications.attendance_check_id','=','attendance_checks.id')->where('attendance_checks.student_id', $student_id)->select('text', 'file')->get();

    if(!$justifications)
      return $this->returnError('E000', 'No Justifications Found');

      return $this->returnData('Justifications', $justifications); 
  }

  public function showJustification($attendance_check_id)
  {
    echo "heeeereeeee";
    $justification = Justification::join('attendance_checks','justifications.attendance_check_id','=','attendance_checks.id')->where('attendance_checks.id', $attendance_check_id)->select('text', 'file')->get();
   
    if(!$justification)
      return $this->returnError('E000', 'No Justification Found');

      return $this->returnData('Justification', $justification); 
  }

}

?>