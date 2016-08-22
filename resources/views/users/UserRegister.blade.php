<!DOCTYPE html>
<html>
<head>
	<title>User Register</title>
</head>
<body>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="{{ asset('js/script.js') }}"></script>
</body>
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
	                    <a href="{{route('dashboard')}}">
	                        Home
	                    </a>
	                </li>
	            </ul>
	        </div>
	        <!-- /.navbar-collapse -->
	       
	</nav>


<div class="container">		

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	
	<!-- alert message -->
	@if (Session::has('message'))
		<p class="alert alert-warning">
			{{ Session::get('message') }}
		</p>
	@endif

	<form action="{{ route('userStore') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control"/>
		</div>

		<div class="form-group">
			<label for="email">Mail-id</label>
			<input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control"/>
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password"  class="form-control"/>
		</div>

		<div class="form-group">
			<label for="cpassword">Confirm Password</label>
			<input type="password" name="password_confirmation" id="cpassword"  class="form-control"/>
		</div>
		
		<div class="form-group">
			<button type="submit" class="btn btn-success">
				<span>Register</span>
			</button>
		</div>
	</form>
</div>