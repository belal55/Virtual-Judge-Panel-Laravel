<?php
    $user=session()->get('user');
	$users=session()->get('users');
?>

@extends('Layouts.Admin.header')
@section('content')

<div class="col-md-9 col-sm-12">
	
	<div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">All Users </div>
        </div> 
	    <div class="panel-body">
            <div class="panel panel-default">
              <div class="panel-body">
                  <div class="col-md-6 col-sm-12">
                      <form method="post">
                          <div class="col-md-8">
                              <select class="form-control" name="userTypeId" >
                                <option value="">Search By User Type</option>
                                <option value="3">Student</option>
                                <option value="2">Judge</option>
                                <option value="">All</option>
                              </select>
                          </div>
                          <div class="col-md-4">
                              <button class="btn btn-md btn-primary btn-block" type="submit">Search</button></br>
                          </div>
                      </form>
                  </div>
              </div>
            </div>
            @foreach($users as $usr)
            	<div class="panel panel-default">
                  <div class="panel-body">
                    <div class="row">
                            <div class="col-md-2 col-sm-12">
                                @if($usr->img_path!=null)
                                    <img src="{{asset('userProfilePhoto')}}/{{$usr->img_path}}" class="img-rounded" style="height: 100px; width: 100px;" alt="Profile Photo"  /> <br>
                                    <p><span style="font-size: 16px; font-weight: bold;">Profile Photo</span></p>
                                @else
                                    <img src="{{asset('userProfilePhoto')}}/defaultProfile.jpg" class="img-rounded img-responsive" style="height: 100px; width: 100px;" alt="Profile Photo" /> <br>
                                    <p><span style="font-size: 16px; font-weight: bold;">Profile Photo</span></p>
                                @endif
                            </div>
                            <div class="col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p><span style="font-size: 16px; font-weight: bold;">Id: </span>{{$usr->id}}</p>
                                             </div>
                                            <div class="col-md-12">
                                                <p><span style="font-size: 16px; font-weight: bold;">Name: </span>{{$usr->name}}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p><span style="font-size: 16px; font-weight: bold;">Email: </span>{{$usr->email}}</p>
                                            </div>
                                        </div>
                                     </div>

                                    <div class="col-md-4 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p><span style="font-size: 16px; font-weight: bold;">Gender: </span>{{$usr->gender}}</p>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <p><span style="font-size: 16px; font-weight: bold;">User Type: </span>{{$usr->type_name}}</p>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="{{route('admin.destroyUser',[$usr->id])}}" style="text-decoration:none;">
                                                   <button type="button" class="btn btn-danger">Delete</button>
                                                </a>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
 
                            </div>
                    </div>
                     
                  </div>
                </div>

            @endforeach

            @if(session()->get('message'))
              <br><p class="alert alert-info">{{session()->get('message')}}</p>
            @endif

		</div>
	
	</div>
</div>

@endsection
