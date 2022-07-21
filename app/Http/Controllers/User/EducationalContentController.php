<?php

namespace App\Http\Controllers\User;

use App\Models\EducationalContent;
use Illuminate\Http\Request;

use App\Traits\GeneralTrait;


class EducationalContentController extends Controller
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

  public function all($subject_id)
  {
    $class_id = auth()->user()->classGroup->school_class_id;

    $files = EducationalContent::join('class_subject', 'educational_contents.class_subject_id', '=', 'class_subject.id')
    ->select('title', 'file')->where('class_subject.school_class_id', $class_id)->where('class_subject.subject_id' ,$subject_id)->get();

    if(!$files)
      return $this->returnError('E000', 'No Educational Content Found');

     return $this->returnData('Educational Content', $files); 
  }

}
