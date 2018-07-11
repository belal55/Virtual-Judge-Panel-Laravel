<?php
    $user=session()->get('user');
  $events=session()->get('events');
	$eventCategories=session()->get('eventCategories');
?>

@extends('Layouts.Admin.header')
@section('content')

<div class="col-md-9 col-sm-12">

    <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title"> Current Events </div>
        </div> 
        <div class="panel-body">
            @foreach($events as $event)
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">

                              <div class="col-md-12">
                                <p><span style="font-size: 16px; font-weight: bold;">Event Title:</span> {{$event->title}}</p>
                              </div>

                              <div class="col-md-12">
                                <p><span style="font-size: 16px; font-weight: bold;">Start Date:</span> {{$event->start_date}}</p>
                              </div>

                              <div class="col-md-12">
                                <p><span style="font-size: 16px; font-weight: bold;">End Date:</span> {{$event->end_date}}</p>
                              </div>
                              
                              <div class="col-md-12">
                                <p><span style="font-size: 16px; font-weight: bold;">Judgement Hour:</span> {{$event->judgement_Datetime}}</p>
                              </div>

                            </div>
                            <div class="col-md-6 col-sm-12">

                                <div class="col-md-12">
                                    <textarea name="short_desc" class="form-control"  placeholder="Short Description" style="width:100%;height:120px;" >{{$event->short_desc}} </textarea> 
                                </div>
                                <div class="col-md-12">
                                  </br>
                                  <select class="form-control" name="category" >
                                    <option value="">Available Categories</option>
                                    @foreach($eventCategories as $eventCat)
                                      @if($eventCat->event_id==$event->id)
                                        <option value="{{$eventCat->id}}">{{$eventCat->category_name}}</option>
                                      @endif   
                                    @endforeach 
                                  <select/>
                                </div> 
                            </div>
                        </div>
                    </div>
                      

                    <div class="col-md-12">
                               
                        <div class="col-md-6 col-sm-12">
                            <br>
                           <a href="{{route('admin.editEvent',[$event->id])}}" style="text-decoration:none;">
                                <button type="button" class="btn btn-success">Edit</button>
                            </a>
                            <a href="{{route('admin.destroyEvent',[$event->id])}}" style="text-decoration:none;">
                               <button type="button" class="btn btn-danger">Delete</button>
                            </a> 
                            <a href="{{route('admin.addEventCategory',[$event->id])}}" style="text-decoration:none;">
                               <button type="button" class="btn btn-primary">Add Category</button>
                            </a>  
                       </div>
                       
                    </div>
                      
                  </div>
                </div>
            @endforeach

            <br>

            @if(session()->get('message'))
              <p class="alert alert-info">{{session()->get('message')}}</p>
            @endif

        </div>
    </div>
	
	


</div>



@endsection
