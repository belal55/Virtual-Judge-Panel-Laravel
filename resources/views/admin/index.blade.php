<?php
	$user=session()->get('user');
	$TotalStudent=session()->get('TotalStudent');
	$TotalJudge=session()->get('TotalJudge');
	$TotalProject=session()->get('TotalProject');
?>

@extends('Layouts.Admin.header')
@section('content')

<div class="col-md-9 col-sm-12">
	
	<div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title"> Dashboard </div>
        </div> 
	    <div class="panel-body">
	   		 
            <div class="row">
            	<div class="col-md-4">

            		<div class="panel panel-primary">
            			<div class="panel-heading">
				            <div class="panel-title text-center"> Total Students </div>
				        </div> 
					  	<div class="panel-body">
					  		<p style="text-align: center; font-size: 20px; font-weight: bold;">{{$TotalStudent}}</p>
					  	</div>
					</div>
            		
            	</div>

            	<div class="col-md-4">

            		<div class="panel panel-primary">
            			<div class="panel-heading">
				            <div class="panel-title text-center"> Total Judges </div>
				        </div> 
					  	<div class="panel-body">
					  		<p style="text-align: center; font-size: 20px; font-weight: bold;">{{$TotalJudge}}</p>
					  	</div>
					</div>
            		
            	</div>

            	<div class="col-md-4">

            		<div class="panel panel-primary">

            			<div class="panel-heading">
				            <div class="panel-title text-center"> Total Projects </div>
				        </div> 
            			
					  	<div class="panel-body">
					  		<p style="text-align: center; font-size: 20px; font-weight: bold;">{{$TotalProject}}</p>
					  	</div>

					</div>
            		
            	</div>
            </div>

		</div>
	
	</div>
</div>

@endsection
