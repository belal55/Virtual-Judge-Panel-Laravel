<?php
  $user=session()->get('user');
	$users=session()->get('users');
  $events=session()->get('events');
  $projects=session()->get('projects');
  $eventCategories=session()->get('eventCategories');
?>

@extends('Layouts.Admin.header')
@section('content')

<div class="col-md-9 col-sm-12">
	
	<div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">Projects </div>
        </div> 
	    <div class="panel-body">
            <div class="panel panel-default">
              <div class="panel-body">
                  <div class="col-md-6 col-sm-12">
                      <form method="post">
                          <div class="col-md-8">
                              <select class="form-control" name="Events" >
                                <option value="">Select an event</option>
                                  @foreach($events as $event)
                                    <option value="{{$event->id}}">{{$event->title}}</option>
                                  @endforeach 
                              </select>
                          </div>
                          <div class="col-md-4">
                              <button class="btn btn-md btn-primary btn-block" type="submit">Search</button></br>
                          </div>
                      </form>
                  </div>
              </div>
            </div>
            @foreach($projects as $project)
         
                <div class="panel panel-default">
                  <div class="panel-body">
                      <div class="col-md-12">
                          <p><span style="font-size: 16px; font-weight: bold;">Project Title:</span> {{$project->title}}</p>
                          <hr>
                      </div>

                      <div class="col-md-12">
                          <div class="row">
                             
                              <div class="col-md-3 col-sm-12">
                                @foreach($eventCategories as $eventCat)
                                  @if($eventCat->id==$project->category_id)
                                    <p><span style="font-size: 16px; font-weight: bold;">Category:</span> {{$eventCat->category_name}}</p>
                                  @endif   
                                @endforeach 
                                  
                              </div>

                              <div class="col-md-3 col-sm-12">
                                  <p><span style="font-size: 16px; font-weight: bold;">Average Rating:</span> {{$project->avg_rate}}</p>
                              </div>

                              <div class="col-md-3 col-sm-12">
                                @foreach($users as $usr)
                                  @if($usr->id==$project->student_id)
                                    <p><span style="font-size: 16px; font-weight: bold;">Upload By:</span> {{$usr->name}}</p>
                                  @endif   
                                @endforeach
                              </div>

                              <div class="col-md-3 col-sm-12">
                                  <p><span style="font-size: 16px; font-weight: bold;">Publish Time:</span> {{$project->upload_date}}</p>

                              </div>

                              <div class="col-md-12">
                                <hr>
                                  <a href="{{route('admin.viewProjectAdmin',[$project->id])}}" style="text-decoration:none;">
                                        <button type="button" class="btn btn-success">View Project</button>
                                    </a>
                              </div>
                          </div>

                          
                      </div>
                  </div>
                </div>
            @endforeach

            @if(session()->get('message'))
              <br><p class="alert alert-info">{{session()->get('message')}}</p>
            @endif

		</div>
	
	</div>
</div>

@endsection
