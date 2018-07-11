<?php
	$user=session()->get('user');
    $eventId=session()->get('eventId');
    $eventCategories=session()->get('eventCategories');
?>

@extends('Layouts.student.header')
@section('content')

<div class="col-md-9 col-sm-12">
	
	<div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title"> Add Project </div>
        </div> 
	    <div class="panel-body">
	   		 
            <div class="row">

            	<div class="col-md-6">
                    <div class="wrapper">
                        <form method="POST" enctype="multipart/form-data" class="form-signin">   
                                 
                            <input type="hidden" name="uid" value="{{$user->id}}">

                            <input type="text" class="form-control" name="title" placeholder="Title" autofocus="" value="{{old('title')}}" /></br>

                            @if($errors->first('title'))
                                <p class="alert alert-danger">{{$errors->first('title')}}</p>
                            @endif  

                            <textarea name="short_desc" class="form-control"  placeholder="Short Description" style="width:100%;height:100px;margin-top:10px;" >{{old('short_desc')}}</textarea></br>

                            @if($errors->first('short_desc'))
                                <p class="alert alert-danger">{{$errors->first('short_desc')}}</p>
                            @endif  

                            <select class="form-control" name="category" >
                                <option value="">Available Categories</option>
                                @foreach($eventCategories as $eventCat)
                                  @if($eventCat->event_id==$eventId)
                                    <option value="{{$eventCat->id}}">{{$eventCat->category_name}}</option>
                                  @endif   
                                @endforeach 
                            <select/>
                            </br>

                            @if($errors->first('category'))
                                <p class="alert alert-danger">{{$errors->first('category')}}</p>
                            @endif 

                            <label for="input-1">Upload Project File</label>
                            <input id="input-1" type="file" name="projectFile" class="file" data-show-upload="false"  data-show-preview="false" ></br>

                            @if($errors->first('projectFile'))
                                <p class="alert alert-danger">{{$errors->first('projectFile')}}</p>
                            @endif 


                            <label for="input-2">Upload Video</label>
                            <input id="input-1" type="file" name="projectVideo" class="file" data-show-upload="false"  data-show-preview="false" ></br>

                            @if($errors->first('projectVideo'))
                                <p class="alert alert-danger">{{$errors->first('projectVideo')}}</p>
                            @endif 

                            <button class="btn btn-sm btn-primary btn-block" type="submit">Add Project</button></br>
                        
                        </form>   
                        @if(session()->get('message'))
                          <p class="alert alert-info">{{session()->get('message')}}</p>
                        @endif
                    </div>
            	</div>
                
            </div>

		</div>
	
	</div>
</div>

@endsection
