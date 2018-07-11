<?php
    $user=session()->get('user');
?>

@extends('Layouts.Admin.header')
@section('content')

<div class="col-md-9 col-sm-12">

    
	
	<div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title"> Create New Event </div>
        </div> 
	    <div class="panel-body">
	   		 
            <div class="row">

            	<div class="col-md-6">
                    <div class="wrapper">
                        <form method="POST"  class="form-signin">   
                                 

                            <input type="text" name="title" class="form-control" placeholder="Event Title" autofocus="" value="{{old('title')}}" /></br>

                            @if($errors->first('title'))
                                <p class="alert alert-danger">{{$errors->first('title')}}</p>
                            @endif  

                            <textarea name="short_desc" class="form-control"  placeholder="Short Description" style="width:100%;height:100px;margin-top:10px;" ></textarea></br>

                            @if($errors->first('short_desc'))
                                <p class="alert alert-danger">{{$errors->first('short_desc')}}</p>
                            @endif 

                            <div class='input-group date' id='datetimepicker1'>
                                <input name="startDateTime" placeholder="Enter Start Datetime" type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div></br>
                            <script type="text/javascript">
                                $(function () {
                                    $('#datetimepicker1').datetimepicker({
                                        format: 'YYYY-MM-DD HH:mm:ss'
                                    });
                                });
                            </script>

                            @if($errors->first('startDateTime'))
                                <p class="alert alert-danger">{{$errors->first('startDateTime')}}</p>
                            @endif 



                            <div class='input-group date' id='datetimepicker2'>
                                <input name="endDateTime" placeholder="Enter End Datetime" type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div></br>
                            <script type="text/javascript">
                                $(function () {
                                    $('#datetimepicker2').datetimepicker({
                                        format: 'YYYY-MM-DD HH:mm:ss'
                                    });
                                });
                            </script>

                            @if($errors->first('endDateTime'))
                                <p class="alert alert-danger">{{$errors->first('endDateTime')}}</p>
                            @endif 

                            <div class='input-group date' id='datetimepicker3'>
                                <input name="JudgmentDateTime" placeholder="Enter Judgment Datetime" type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div></br>
                            <script type="text/javascript">
                                $(function () {
                                    $('#datetimepicker3').datetimepicker({
                                        format: 'YYYY-MM-DD HH:mm:ss'
                                    });
                                });
                            </script>

                            @if($errors->first('JudgmentDateTime'))
                                <p class="alert alert-danger">{{$errors->first('JudgmentDateTime')}}</p>
                            @endif

                            <button class="btn btn-sm btn-primary btn-block" type="submit">Create Event</button></br>
                        
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
