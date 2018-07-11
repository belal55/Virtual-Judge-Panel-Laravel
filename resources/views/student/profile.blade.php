<?php
	$user=session()->get('user');
?>

@extends('Layouts.student.header')
@section('content')

<div class="col-md-9 col-sm-12">
	
	<div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title"> Profile </div>
        </div> 
	    <div class="panel-body">
	   		 
            <div class="row">
                <form method="POST" enctype="multipart/form-data" class="form-signin">
                    <div class="col-md-4">
                        @if($user->img_path!=null)
                            <img src="{{asset('userProfilePhoto')}}/{{$user->img_path}}" class="img-rounded img-responsive" alt="Profile Photo"  />
                        @else
                            <img src="{{asset('userProfilePhoto')}}/defaultProfile.jpg" class="img-rounded img-responsive" alt="Profile Photo" />
                             

                        @endif

                        </br><input name="photo" type="file"/></br>
                    </div>

                	<div class="col-md-8">
                        <div class="wrapper">
                                       
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <input type="text" class="form-control" name="name" placeholder="Name" autofocus="" value="{{$user->name}}" /></br>

                            <input type="text" class="form-control" name="email" placeholder="Email Address" value="{{$user->email}}"/></br>

                            <button class="btn btn-sm btn-primary btn-block" type="submit">Update Profile</button></br>
                            
                             
                            @if(session()->get('message'))
                              <p class="alert alert-info">{{session()->get('message')}}</p>
                            @endif
                            </div>
                	</div>
                </form>
                

                
            </div>

		</div>
	
	</div>
</div>

@endsection
