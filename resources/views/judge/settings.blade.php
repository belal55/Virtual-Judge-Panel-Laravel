<?php
	$user=session()->get('user');
?>

@extends('Layouts.judge.header')
@section('content')

<div class="col-md-9 col-sm-12">
	
	<div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title"> Settings </div>
        </div> 
	    <div class="panel-body">
	   		 
            <div class="row">

            	<div class="col-md-6">
                    <div class="wrapper">
                        <form method="POST"  class="form-signin">   
                                 
                            <input type="hidden" name="id" value="{{$user->id}}">

                            <input type="password" class="form-control" placeholder="Password" autofocus="" value="{{$user->password}}" /></br>

                            <input type="password" class="form-control" name="password" placeholder="New Password"/></br>

                            @if($errors->first('password'))
                                <p class="alert alert-danger">{{$errors->first('password')}}</p>
                             @endif   

                            <input type="password" class="form-control" name="cpassword" placeholder="Confirm New Password"/></br>

                            @if($errors->first('cpassword'))
                                <p class="alert alert-danger">{{$errors->first('cpassword')}}</p>
                             @endif  

                            <button class="btn btn-sm btn-primary btn-block" type="submit">Change Password</button></br>
                        
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
