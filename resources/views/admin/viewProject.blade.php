<?php
    $user=session()->get('user');
    $project=session()->get('project');
    $users=session()->get('users');
    $events=session()->get('events');
    $eventCategories=session()->get('eventCategories');
    $comments=session()->get('comments');
?>

@extends('Layouts.Admin.header')
@section('content')

<div class="col-md-9 col-sm-12">
	
	<div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title"> Prject View </div>
        </div> 
	    <div class="panel-body">

        	<div class="panel panel-default">
                <div class="panel-body">
                    <p><span style="font-size: 16px; font-weight: bold;">Title: </span>{{$project->title}}</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
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
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <p><span style="font-size: 16px; font-weight: bold;">Description: </span>{{$project->short_desc}}</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <p><span style="font-size: 16px; font-weight: bold;">Project Video </span></p>
                    <div align="center" class="embed-responsive embed-responsive-16by9">
                        <video class="embed-responsive-item" controls>
                            <source src="{{asset('ProjectVideos')}}/{{$project->video_path}}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{asset('ProjectFiles')}}/{{$project->file_path}}" style="text-decoration:none;">
                        <button type="button" class="btn btn-success">Download Project File</button>
                    </a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title"> Comment Box </div>
                </div> 

                <div class="panel-body">
                    
                    @foreach($comments as $comment)

                        @if($comment->uid==$user->id)
                            <div class="panel panel-default text-right">
                                <div class="panel-body">
                                    <p style="font-size: 18px;">{{$comment->comment_text}}</p>
                                    @foreach($users as $usr)
                                        @if($comment->uid==$usr->id)
                                            <small><cite>by {{$usr->name}} on {{$comment->time}}</cite></small>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="panel panel-default text-left">
                                <div class="panel-body">
                                    <p style="font-size: 18px;">{{$comment->comment_text}}</p>
                                    @foreach($users as $usr)
                                        @if($comment->uid==$usr->id)
                                            <small><cite>by {{$usr->name}} on {{$comment->time}}</cite></small>
                                        @endif
                                    @endforeach
                                    
                                </div>
                            </div>
                        @endif

                        
                    @endforeach
                     
                    <form method="post">
                        <input type="hidden" name="uid" value="{{$user->id}}">
                        <textarea name="comment_text" class="form-control"  placeholder="Type your comment here..." style="width:100%;height:100px;margin-top:10px;" >{{old('comment_text')}}</textarea></br>

                        <button type="submit" class="btn btn-success">Add Comment</button> 
 
                    </form></br>

                    @if(session()->get('message'))
                       <div class="panel panel-default">
                            <div class="panel-body">
                                <p class="alert alert-info">{{session()->get('message')}}</p>
                            </div>
                        </div>
                     @endif
                    
                </div>
            </div>

		</div>
	
	</div>
</div>

@endsection
