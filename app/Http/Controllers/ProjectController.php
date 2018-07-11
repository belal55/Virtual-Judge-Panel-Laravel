<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ProjectUpdateRequest;
use Illuminate\Support\Facades\DB;
use App\user;
use App\event;
use App\eventCategory;
use App\project;
use App\comment;
use App\rating;

class ProjectController extends Controller
{
    public function addProject(Request $request){
        date_default_timezone_set('Asia/Dhaka');
        $event = event::find($request->id);
        if($event->judgement_Datetime>date('Y-m-d H:i:s')){
            $request->session()->put('eventId',$request->id);
            $eventCategory = eventCategory::all(); 
            $request->session()->put('eventCategories',$eventCategory);
            return view('student.addProject');
        }else{
            $request->session()->flash('message', 'Judgement hour started!! You can not add new project now.');
            return redirect()->back();
        }

        
    }

    public function insertProject(ProjectRequest $request){
    	
    		date_default_timezone_set('Asia/Dhaka');
    		$Projectfile=$request->file('projectFile');
    		$ProjectVideo=$request->file('projectVideo');
    		$ProjectfileName=date('YmdHis').$Projectfile->getClientOriginalName();
    		$ProjectVideoName=date('YmdHis').$ProjectVideo->getClientOriginalName();

			$Projectfile->move('ProjectFiles',$ProjectfileName);
			$ProjectVideo->move('ProjectVideos',$ProjectVideoName);

			$project = new project();
			$project->title=$request->title;
			$project->short_desc=$request->short_desc;
			$project->file_path=$ProjectfileName;
			$project->video_path=$ProjectVideoName;
			$project->student_id=$request->uid;
			$project->event_id=$request->id;
			$project->category_id=$request->category;
			$project->avg_rate=0.0;
			$project->upload_date=date('Y-m-d H:i:s');
	    	$project->save();
	        $request->session()->flash('message', 'Project added successfully!!');
	    	return redirect()->back();
    		
    }





    public function showProjectForStudent(Request $request){

        $users = user::all(); 
    	$request->session()->put('users',$users);

    	$user=session()->get('user');
    	$projects = DB::table('projects')
            ->where('student_id','=',$user->id)
            ->get();
    	$request->session()->put('projects',$projects);

    	$eventCategory = eventCategory::all(); 
        $request->session()->put('eventCategories',$eventCategory);

    	return view('student.project');
    }

    public function showProjectForAdmin(Request $request){
        $users = user::all(); 
        $request->session()->put('users',$users);
    	$events = event::all(); 
    	$request->session()->put('events',$events);
    	$eventCategory = eventCategory::all(); 
        $request->session()->put('eventCategories',$eventCategory);

    	$projects = project::all(); 
    	$request->session()->put('projects',$projects);
        return view('admin.project');
    }

    public function showProjectByEvent(Request $request){
    	$events = event::all(); 
    	$request->session()->put('events',$events);
    	$eventCategory = eventCategory::all(); 
        $request->session()->put('eventCategories',$eventCategory);

        $projects = DB::table('projects')
            ->where('event_id','=',$request->Events)
            ->get(); 
    	$request->session()->put('projects',$projects);
        return view('admin.project');
    }


    public function viewProjectAdmin(Request $request){
        $comments = DB::table('comments')
            ->where('project_id','=',$request->id)
            ->get(); 
        $request->session()->put('comments',$comments);

        $users = user::all(); 
        $request->session()->put('users',$users);

        $events = event::all(); 
        $request->session()->put('events',$events);

        $eventCategory = eventCategory::all(); 
        $request->session()->put('eventCategories',$eventCategory);

        $project = project::find($request->id);
        $request->session()->put('project',$project);
        return view('admin.viewProject');
    }

    public function viewProjectStudent(Request $request){
        $comments = DB::table('comments')
            ->where('project_id','=',$request->id)
            ->get(); 
        $request->session()->put('comments',$comments);

        $users = user::all(); 
        $request->session()->put('users',$users);

        $events = event::all(); 
        $request->session()->put('events',$events);

        $eventCategory = eventCategory::all(); 
        $request->session()->put('eventCategories',$eventCategory);

        $project = project::find($request->id);
        $request->session()->put('project',$project);
        return view('student.viewProject');
    }

    public function destroyProject(Request $request)
    {
        
        project::destroy($request->id);
        $request->session()->flash('message', 'Project Deleted Successfully!!');
        return redirect()->back();
    }

    public function editProject(request $request){
        date_default_timezone_set('Asia/Dhaka');
        $project = project::find($request->id);

        $eventCategory = eventCategory::find($project->category_id);
        $event = event::find($eventCategory->event_id);
        if($event->judgement_Datetime>date('Y-m-d H:i:s')){
            $request->session()->put('eventId',$event->id);
            $request->session()->put('project',$project);

            $eventCategorys = eventCategory::all(); 
            $request->session()->put('eventCategories',$eventCategorys);
            return view('student.editProject');
        }else{
            $request->session()->flash('message', 'Judgement hour started!! You can not update project now.');
            return redirect()->back();
        }

        
    }

    public function updateProject(ProjectUpdateRequest $request){
        
            date_default_timezone_set('Asia/Dhaka');
            if($request->hasFile('projectFile') && $request->hasFile('projectVideo')){
                $Projectfile=$request->file('projectFile');
                $ProjectVideo=$request->file('projectVideo');
                $ProjectfileName=date('YmdHis').$Projectfile->getClientOriginalName();
                $ProjectVideoName=date('YmdHis').$ProjectVideo->getClientOriginalName();

                $Projectfile->move('ProjectFiles',$ProjectfileName);
                $ProjectVideo->move('ProjectVideos',$ProjectVideoName);

                $project = project::find($request->id);
                $project->title=$request->title;
                $project->short_desc=$request->short_desc;
                $project->file_path=$ProjectfileName;
                $project->video_path=$ProjectVideoName;
                $project->category_id=$request->category;
                $project->upload_date=date('Y-m-d H:i:s');
                $project->save();
                $request->session()->flash('message', 'Project updated successfully!!');
                return redirect()->back();
            }elseif ($request->hasFile('projectFile')) {
                $Projectfile=$request->file('projectFile');
                $ProjectfileName=date('YmdHis').$Projectfile->getClientOriginalName();
                $Projectfile->move('ProjectFiles',$ProjectfileName);

                $project = project::find($request->id);
                $project->title=$request->title;
                $project->short_desc=$request->short_desc;
                $project->file_path=$ProjectfileName;
                $project->category_id=$request->category;
                $project->upload_date=date('Y-m-d H:i:s');
                $project->save();
                $request->session()->flash('message', 'Project updated successfully!!');
                return redirect()->back();
            }elseif ($request->hasFile('projectVideo')) {
                $ProjectVideo=$request->file('projectVideo');
                $ProjectVideoName=date('YmdHis').$ProjectVideo->getClientOriginalName();
                $ProjectVideo->move('ProjectVideos',$ProjectVideoName);

                $project = project::find($request->id);
                $project->title=$request->title;
                $project->short_desc=$request->short_desc;
                $project->video_path=$ProjectVideoName;
                $project->category_id=$request->category;
                $project->upload_date=date('Y-m-d H:i:s');
                $project->save();
                $request->session()->flash('message', 'Project updated successfully!!');
                return redirect()->back();
            }else{
                $project = project::find($request->id);
                $project->title=$request->title;
                $project->short_desc=$request->short_desc;
                $project->category_id=$request->category;
                $project->upload_date=date('Y-m-d H:i:s');
                $project->save();
                $request->session()->flash('message', 'Project updated successfully!!');
                return redirect()->back();
            }
            
            
    }

    public function ProjectComment(Request $request){
        date_default_timezone_set('Asia/Dhaka');

        if($request->comment_text){
            $comment = new comment();
            $comment->uid=$request->uid;
            $comment->project_id=$request->id;
            $comment->comment_text=$request->comment_text;
            $comment->time=date('Y-m-d H:i:s');
            $comment->save();
            $request->session()->flash('message', 'Comment added successfully!!');
            return redirect()->back();
        }else if($request->ratingbar){
            $project = project::find($request->id);
            $eventCategory = eventCategory::find($project->category_id);
            $event = event::find($eventCategory->event_id);
            if($event->judgement_Datetime<date('Y-m-d H:i:s')){
                $rating = DB::table('ratings')
                ->where('uid','=',$request->uid)
                ->where('project_id','=',$request->id)
                ->first();

                if($rating){
                    $rating = rating::find($rating->id);
                    $rating->rate=$request->ratingbar;
                    $rating->time=date('Y-m-d H:i:s');
                    $rating->save();

                    $totalRating = 0.0;
                    $counter = 0;
                    $ratings = DB::table('ratings')
                        ->where('project_id','=',$request->id)
                        ->get();
                    foreach ($ratings as $rat) {
                        $totalRating = $totalRating + $rat->rate;
                        $counter = $counter + 1;
                    }
                    $avgRating=$totalRating/$counter;

                    $project = project::find($request->id);
                    $project->avg_rate=$avgRating;
                    $project->save();


                    $request->session()->flash('message', 'Project rated again successfully!!');
                    return redirect()->back();
                }else{
                    $rating = new rating();
                    $rating->uid=$request->uid;
                    $rating->project_id=$request->id;
                    $rating->rate=$request->ratingbar;
                    $rating->time=date('Y-m-d H:i:s');
                    $rating->save();

                    $totalRating = 0.0;
                    $counter = 0;
                    $ratings = DB::table('ratings')
                        ->where('project_id','=',$request->id)
                        ->get();
                    foreach ($ratings as $rat) {
                        $totalRating = $totalRating + $rat->rate;
                        $counter = $counter + 1;
                    }
                    $avgRating=$totalRating/$counter;

                    $project = project::find($request->id);
                    $project->avg_rate=$avgRating;
                    $project->save();

                    $request->session()->flash('message', 'Project rated successfully!!');
                    return redirect()->back();
                }
            }else{
                $request->session()->flash('message', 'Judgement hour not started yet!!');
                return redirect()->back();
            }
            
        }else{
            $request->session()->flash('message', 'Comment or rating can not be empty!!');
            return redirect()->back();
        }
        
    }

    public function viewProjectByEventJudge(Request $request){
        $users = user::all(); 
        $request->session()->put('users',$users);

        $user=session()->get('user');
        $projects = DB::table('projects')
            ->where('event_id','=',$request->id)
            ->get();
        $request->session()->put('projects',$projects);

        $eventCategory = eventCategory::all(); 
        $request->session()->put('eventCategories',$eventCategory);

        return view('judge.project');
    }

    public function viewProjectJudge(Request $request){
        $comments = DB::table('comments')
            ->where('project_id','=',$request->id)
            ->get(); 
        $request->session()->put('comments',$comments);

        $users = user::all(); 
        $request->session()->put('users',$users);

        $events = event::all(); 
        $request->session()->put('events',$events);

        $eventCategory = eventCategory::all(); 
        $request->session()->put('eventCategories',$eventCategory);

        $project = project::find($request->id);
        $request->session()->put('project',$project);
        return view('judge.viewProject');
    }

   
}
