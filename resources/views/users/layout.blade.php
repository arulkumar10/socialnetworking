<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ asset('style.css') }}">
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="{{ asset('js/script.js') }}"></script>
</head>
	<body>
	<nav class="navbar navbar-default">
	    <div class="container">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#my-navigation" aria-expanded="false">
	                <span class="sr-only">
	                    Toggle navigation
	                </span>
	                <span class="icon-bar">
	                </span>
	                <span class="icon-bar">
	                </span>
	                <span class="icon-bar">
	                </span>
	            </button>
	            <a class="navbar-brand" href="#">
	                User
	            </a>
	        </div>
	        <!-- Collect the nav links, forms, and other content for toggling -->
	        <div class="collapse navbar-collapse" id="my-navigation">
	            <ul class="nav navbar-nav navbar-right">
	                <li>
	                    <a href="{{route('login')}}">
	                        Login
	                    </a>
	                </li>
	            </ul>

	            <ul class="nav navbar-nav navbar-right">
	                <li>
	                    <a href="{{route('register')}}">
	                        Register
	                    </a>
	                </li>
	            </ul>
	        </div>
	        <!-- /.navbar-collapse -->
	    </div>
	    <!-- /.container-fluid -->
	</nav>

	
	<div class="container">
		@yield('content')
	</div>	
	
</body>
</html>
