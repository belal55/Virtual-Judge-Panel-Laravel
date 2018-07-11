<!DOCTYPE html>
<html>
<head>
	<title>Virtual Judge Panel | Registration</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}">

    <script type="text/javascript" src="{{asset('ajax/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</head>
<body>

	<div class="container">
		<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                <div class="panel-heading">
                    <div class="panel-title">Virtual Judge Panel | Sign Up</div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

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

                                  <button class="btn btn-lg btn-success btn-block" type="submit">Confirm Registration</button></br>

                                  <a href="{{route('login.index')}}" style="text-decoration:none;">
                                    <button class="btn btn-lg btn-danger btn-block" type="button">Cancel</button> 
                                  </a>    
                            </form>
                        </div>

                </div>                     
            </div>  
        </div>
        
	</div>

</body>
</html>