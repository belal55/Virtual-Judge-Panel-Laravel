<!DOCTYPE html>
<html>
<head>
	<title>Virtual Judge Panel | Login</title>
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
                    <div class="panel-title">Virtual Judge Panel | Sign In</div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                        <div class="wrapper">
                            <form method="POST" class="form-signin">       
                                  
                                  <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" /></br>

                                  <input type="password" class="form-control" name="password" placeholder="Password" required=""/>

                                  <label class="checkbox">
                                    <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
                                  </label>

                                  <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button></br>

                                  <a href="{{route('registration.index')}}" style="text-decoration:none;">
                                    <button class="btn btn-lg btn-success btn-block" type="button">Registration</button>
                                  </a>    
                            </form> </br>
                            @if(session()->get('message'))
                              <p class="alert alert-info">{{session()->get('message')}}</p>
                            @endif
                        </div>

                </div>                     
            </div>  
        </div>
        
	</div>

</body>
</html>