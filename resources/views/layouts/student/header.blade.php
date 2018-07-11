<?php
	$user=session()->get('user');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Virtual Judge Panel | Student</title>

	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <script type="text/javascript" src="{{asset('ajax/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.datetimepicker.full.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/purify.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  

	
</head>
<body>

	<div class="container">
		
		<nav class="navbar navbar-default">

	        <div class="container-fluid">
	            
	            <div class="navbar-header">
	            	<div class="col-md-12">
	            		<h1>Virtual Judge Panel</h1>
	            	</div>
	            </div>

	            
			    <ul class="nav navbar-nav navbar-right">
			      <li><a href="{{route('student.profile')}}"><span class="glyphicon glyphicon-user"></span> {{session()->get('user')->name}}</a></li>

			      <li><a href="{{route('student.settings')}}"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>

			      <li><a href="{{route('user.logout')}}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			    </ul>
	               

	        </div>
		</nav>
		<div class="Main_body">
			<div class="row">
				<div class="col-md-3 col-sm-12">
					<div class="panel panel-primary" >
		                <div class="panel-heading">
		                    <div class="panel-title"> Menu </div>
		                </div> 
					    <div class="panel-body">
					   		 
				            <div class="row">
				            	<a href="{{route('student.index')}}" class="list-group-item"><span class="glyphicon glyphicon-certificate"></span>&nbsp; Dashboard</a>

				                <a href="{{route('student.CurrentEvents')}}" class="list-group-item"><span class="glyphicon glyphicon-certificate"></span>&nbsp; Current Events</a>

				                <a href="{{route('student.showProjectForStudent')}}" class="list-group-item"><span class="glyphicon glyphicon-certificate"></span>&nbsp; Project</a>

				            </div>
        
						</div>
					</div>
				</div>

				@yield('content')
				
			</div>
		</div>
	</div>

	
	
	

</body>
</html>