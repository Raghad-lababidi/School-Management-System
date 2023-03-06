<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\User;
use App\Models\SchoolClass;
use App\Models\Group;
use App\Models\ClassGroup;
use Illuminate\Http\Request;


class AdminController extends Controller
{


  public function create()
  {
    $data['Classes']= SchoolClass::all();
    $data['Groups']= Group::all();
      
    return view('pages.Admin.add', $data);
  }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $data['admins'] = Administrator::all();
    return view('pages.Admin.index',$data);
      
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
      $admin = new Administrator();
      $class_group =new ClassGroup();
  
      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->email = $request->email;
  
      $user->save();
  
      $admin->age = $request->age;
      $admin->certification = $request->certification;
      $admin->user_id = $user->id;
      $admin->user_name =  $user->first_name . "-" . $user->last_name . $user->id . mt_rand(0, 100);
      $admin->password = $request->password ;
  
      $admin->save();

      $class_group->school_class_id = $request->Classroom_id;
      $class_group->group_id = $request->group_id;
      $class_group->administrator_id =$admin->id;

          toastr()->success(trans('messages.success'));
          return redirect()->route('create_admins');
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
