<?php
	$user=session()->get('user');
?>

@extends('Layouts.Admin.header')
@section('content')

<div class="col-md-9 col-sm-12">
	
	<div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title"> Add Event Category </div>
        </div> 
	    <div class="panel-body">
	   		 
            <div class="row">

            	<div class="col-md-6">
                    <div class="wrapper">
                        <form method="POST"  class="form-signin">   

                           

                            <input type="text" class="form-control" name="CatgeoryName" placeholder="Enter Category Name"/></br>


                            <button class="btn btn-sm btn-primary btn-block" type="submit">Add Category</button></br>
                        
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
