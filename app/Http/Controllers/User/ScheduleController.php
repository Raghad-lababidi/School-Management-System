<?php 

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Traits\GeneralTrait;

class ScheduleController extends Controller 
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

  public function all($semester_id)
  {
    $student_class_group_id = auth()->user()->class_group_id;

    $scheduals = Schedule::where('class_group_id', $student_class_group_id)->where('semester', $semester_id)->select('type', 'file')->get();

    if(!$scheduals)
      return this->returnError('E000', 'No Scheduals Found');

      return $this->returnData('Scheduals', $scheduals); 
  }
}

?>