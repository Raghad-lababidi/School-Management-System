<?php 

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Models\Mark;

class MarkController extends Controller 
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
    $student_id = auth()->user()->id;  
    
    $marks = Mark::join('subjects', 'subjects.id', '=', 'marks.subject_id')
    ->where('marks.semester', $semester_id)->where('marks.student_id', $student_id)
    ->select('marks.type', 'marks.value', 'subjects.name')->get();
    if(!$marks)
      return $this->returnError('E000', 'No Marks Found');

    return $this->returnData('marks', $marks);
  }

  public function studentMarks($semester_id, $student_id)
  {
    $marks = Mark::join('subjects', 'subjects.id', '=', 'marks.subject_id')
    ->where('marks.semester', $semester_id)->where('marks.student_id', $student_id)
    ->select('marks.type', 'marks.value', 'subjects.name')->get();
    if(!$marks)
      return $this->returnError('E000', 'No Marks Found');

    return $this->returnData('marks', $marks);
  }
  
}

?>