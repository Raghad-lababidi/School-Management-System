<?php


namespace App\Http\Controllers\Admin\Students;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Models\SchoolClass;
use App\Models\Group;
use App\Models\ClassGroup;
use Illuminate\Http\Request;


class StudentController extends Controller
{


  public function create()
  {
    $data['Classes']= SchoolClass::all();
    $data['Groups']= Group::all();
      
    return view('pages.Students.add', $data);
  }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $data['students'] = Student::all();
    return view('pages.Students.index',$data);
      
  }



  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    try {
      $user = new User();
      $student = new Student();
  
      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->email = $request->email;
  
      $user->save();
  
      $class_group_id = ClassGroup::where('school_class_id', $request->Classroom_id)
        ->where('group_id', $request->group_id)->pluck('id');
  
      $student->father_name = $request->father_name;
      $student->mother_name = $request->mother_name;
      $student->phone = $request->phone;
      $student->user_id = $user->id;
      $student->user_name =  $user->first_name . "-" . $user->last_name . $user->id . mt_rand(0, 100);
      $student->password = $request->password ;
      $student->class_group_id = $class_group_id[0];
  
      $student->save();

          toastr()->success(trans('messages.success'));
          return redirect()->route('create_students');
      }

      catch (\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }


  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
   public function update(StoreGrades $request)
 {
   try {

       $validated = $request->validated();
       $Grades = Grade::findOrFail($request->id);
       $Grades->update([
         $Grades->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
         $Grades->Notes = $request->Notes,
       ]);
       toastr()->success(trans('messages.Update'));
       return redirect()->route('Grades.index');
   }
   catch
   (\Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
   }
 }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
      $MyClass_id = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');

      if($MyClass_id->count() == 0){

          $Grades = Grade::findOrFail($request->id)->delete();
          toastr()->error(trans('messages.Delete'));
          return redirect()->route('Grades.index');
      }

      else{

          toastr()->error(trans('Grades_trans.delete_Grade_Error'));
          return redirect()->route('Grades.index');

      }


  }

}
