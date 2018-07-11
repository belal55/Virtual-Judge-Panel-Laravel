<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EventRequest;
use App\user;
use App\event;
use App\eventCategory;

class eventController extends Controller
{
    public function CreateEvent(Request $request){
    	$events = event::all(); 
    	$request->session()->put('events',$events);

        return view('admin.createEvent');
    }



    public function insertEvent(EventRequest $request){

    	$event = new event();
    	$event->title = $request->title;
    	$event->short_desc = $request->short_desc;
    	$event->start_date=$request->startDateTime;
    	$event->end_date=$request->endDateTime;
    	$event->judgement_Datetime=$request->JudgmentDateTime;
    	$event->save();
        $request->session()->put('event',$event);

        $request->session()->flash('message', 'Event created successfully!! Add Category to this event.');
    	return redirect()->route('admin.addEventCategory',[$event->id]);
    }

    public function editEvent(Request $request){
        $event = event::find($request->id);
        $request->session()->put('event',$event);
        return view('admin.editEvent');
    }

    public function updateEvent(EventRequest $request){
        $event = event::find($request->id);
        $event->title = $request->title;
        $event->short_desc = $request->short_desc;
        $event->start_date=$request->startDateTime;
        $event->end_date=$request->endDateTime;
        $event->judgement_Datetime=$request->JudgmentDateTime;
        $event->save();
        $request->session()->put('event',$event);

        $request->session()->flash('message', 'Event updated successfully!!');
        return redirect()->route('admin.CurrentEvents');
    }


    public function CurrentEvents(Request $request){
    	$events = event::all(); 
        $request->session()->put('events',$events);
        $eventCategory = eventCategory::all(); 
    	$request->session()->put('eventCategories',$eventCategory);

        return view('admin.currentEvents');
    }

    public function destroy(Request $request)
    {
    	
    	event::destroy($request->id);
    	$request->session()->flash('message', 'Event Deleted Successfully!!');
		return redirect()->back();
    }


    public function StudentCurrentEvents(Request $request){
        date_default_timezone_set('Asia/Dhaka');
        $today=date('Y-m-d H:i:s');
        

        $events = DB::table('events')
            ->where('start_date','<=',$today)
            ->where('end_date','>=',$today)
            ->get();

        $request->session()->put('events',$events);
        $eventCategory = eventCategory::all(); 
        $request->session()->put('eventCategories',$eventCategory);
        return view('student.currentEvents');
    }

    public function addEventCategory(Request $request){
        return view('admin.addEventCategory');
    }

    public function insertCategory(Request $request){
        $eventCategory = new eventCategory();
        $eventCategory->category_name=$request->CatgeoryName;
        $eventCategory->event_id=$request->id;
        $eventCategory->save();

        $request->session()->flash('message', 'Category added successfully!! Add more category to this event.');
        return redirect()->route('admin.addEventCategory',[$request->id]);


    }

    public function JudgeCurrentEvents(Request $request){
        date_default_timezone_set('Asia/Dhaka');
        $today=date('Y-m-d H:i:s');
        

        $events = DB::table('events')
            ->where('start_date','<=',$today)
            ->where('end_date','>=',$today)
            ->get();

        $request->session()->put('events',$events);
        $eventCategory = eventCategory::all(); 
        $request->session()->put('eventCategories',$eventCategory);
        return view('judge.currentEvents');
    }
}
