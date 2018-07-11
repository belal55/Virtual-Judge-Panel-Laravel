<?php
	$user=session()->get('user');
    $eventId=session()->get('eventId');
    $eventCategories=session()->get('eventCategories');
    $project=session()->get('project');
?>

@extends('Layouts.student.header')
@section('content')

<div class="col-md-9 col-sm-12">
	
	<div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title"> Edit Project </div>
        </div> 
	    <div class="panel-body">
	   		 
            <div class="row">

            	<div class="col-md-6">
                    <div class="wrapper">
                        <form method="POST" enctype="multipart/form-data" class="form-signin">   
                                 

                            <input type="text" class="form-control" name="title" placeholder="Title" autofocus="" value="{{$project->title}}" /></br>

                            @if($errors->first('title'))
                                <p class="alert alert-danger">{{$errors->first('title')}}</p>
                            @endif  

                            <textarea name="short_desc" class="form-control"  placeholder="Short Description" style="width:100%;height:100px;margin-top:10px;" >{{$project->short_desc}}</textarea></br>

                            @if($errors->first('short_desc'))
                                <p class="alert alert-danger">{{$errors->first('short_desc')}}</p>
                            @endif  

                            <select class="form-control" name="category" >
                                <option value="">Available Categories</option>
                                @foreach($eventCategories as $eventCat)
                                  @if($eventCat->event_id==$eventId)
                                    @if($eventCat->id==$project->category_id)
                                        <option value="{{$eventCat->id}}" selected>{{$eventCat->category_name}}</option>
                                    @else
                                        <option value="{{$eventCat->id}}">{{$eventCat->category_name}}</option>
                                    @endif
                                  @endif   
                                @endforeach 
                            <select/>
                            </br>

                            @if($errors->first('category'))
                                <p class="alert alert-danger">{{$errors->first('category')}}</p>
                            @endif 

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href="{{asset('ProjectFiles')}}/{{$project->file_path}}" style="text-decoration:none;">
                                        <button type="button" class="btn btn-success">Current Project File</button>
                                    </a>
                                </div>
                            </div>

                            <label for="input-1">Upload Project File</label>
                            <input id="input-1" type="file" name="projectFile" class="file" data-show-upload="false"  data-show-preview="false" ></br>

                            @if($errors->first('projectFile'))
                                <p class="alert alert-danger">{{$errors->first('projectFile')}}</p>
                            @endif 


                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <p><span style="font-size: 16px; font-weight: bold;">Current Project Video </span></p>
                                    <div align="center" class="embed-responsive embed-responsive-16by9">
                                        <video class="embed-responsive-item" controls>
                                            <source src="{{asset('ProjectVideos')}}/{{$project->video_path}}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>


                            <label for="input-2">Upload Video</label>
                            <input id="input-1" type="file" name="projectVideo" class="file" data-show-upload="false"  data-show-preview="false" ></br>

                            @if($errors->first('projectVideo'))
                                <p class="alert alert-danger">{{$errors->first('projectVideo')}}</p>
                            @endif 

                            <button class="btn btn-sm btn-primary btn-block" type="submit">Update Project</button></br>
                        
                        </form>   
                        @if(session()->get('message'))
                          <p class="alert alert-danger">{{session()->get('message')}}</p>
                        @endif
                    </div>
            	</div>

                
                
            </div>

		</div>
	
	</div>
</div>

@endsection
