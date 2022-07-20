<?php 

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Justification;
use App\Traits\GeneralTrait;

class JustificationController extends Controller 
{
  use GeneralTrait;

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
  public function store(Request $request)
  {
    
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
    $justifications = Justification::join('attendances_check','justifications.attendance_check_id','=','attendances_check.id')->where('attendances_check.student_id', $student_id)->select('text', 'file')->get();

    if(!$justifications)
      return this->returnError('E000', 'No Justifications Found');

      return $this->returnData('Justifications', $justifications); 
  }

  public function showJustification($attendance_check_id)
  {
    $justification = Justification::join('attendances_check','justifications.attendance_check_id','=','attendances_check.id')->where('attendances_check.id', $attendance_check_id)->select('text', 'file')->get();
   
    if(!$justification)
      return this->returnError('E000', 'No Justification Found');

      return $this->returnData('Justification', $justification); 
  }

}

?>