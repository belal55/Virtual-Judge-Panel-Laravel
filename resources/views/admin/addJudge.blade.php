<?php
    $user=session()->get('user');
?>

@extends('Layouts.Admin.header')
@section('content')

<div class="col-md-9 col-sm-12">
	
	<div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title"> Add Judge </div>
        </div> 
	    <div class="panel-body">
	   		 
            <div class="row">

            	<div class="col-md-6">

            		<div class="wrapper">
                            <form method="POST" class="form-signin"> 

                                  <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Name" autofocus="" /></br>
                                  @if($errors->first('name'))
                                    <p class="alert alert-danger">{{$errors->first('name')}}</p>
                                  @endif      
                                  
                                  <input type="text" class="form-control" value="{{old('email')}}" name="email" placeholder="Email Address" autofocus="" /></br>

                                  @if($errors->first('email'))
                                    <p class="alert alert-danger">{{$errors->first('email')}}</p>
                                  @endif 

                                  <select class="form-control" id="gender" name="gender" >
                                    <option value="">Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select></br>

                                  @if($errors->first('gender'))
                                    <p class="alert alert-danger">{{$errors->first('gender')}}</p>
                                  @endif

                                  <input type="password" class="form-control"  value="{{old('password')}}" name="password" placeholder="Password"/></br>

                                  @if($errors->first('password'))
                                    <p class="alert alert-danger">{{$errors->first('password')}}</p>
                                  @endif

                                  <input type="password" class="form-control"  value="{{old('cpassword')}}" name="cpassword" placeholder="Confirm Password"/></br>

                                  @if($errors->first('cpassword'))
                                    <p class="alert alert-danger">{{$errors->first('cpassword')}}</p>
                                  @endif

                                  <button class="btn btn-lg btn-success btn-block" type="submit">Add Judge</button></br>

                                      
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