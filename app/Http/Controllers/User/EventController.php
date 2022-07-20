<?php 

namespace App\Http\Controllers\User;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;


class EventController extends Controller 
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
     $class_id = auth()->user()->classGroup->school_class_id;
     $events = Event::join('class_event', 'events.id', '=', 'class_event.event_id')->where('school_class_id', $class_id)->select('title', 'date', 'description')->get();

    if(!$events)
      return this->returnError('E000', 'No Event Found');

    return $this->returnData('Events', $events);
    
  }
  
}

?>