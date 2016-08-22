<!DOCTYPE html>
<html>
<head>
	<title>User Listing)</title>

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
	                    <a href="{{route('Logout')}}">
	                        Logout
	                    </a>
	                </li>
	            </ul>
	            <ul class="nav navbar-nav navbar-right">
	                <li>
	                    <a href="{{route('Profile')}}">
	                        Profile
	                    </a>
	                </li>
	            </ul>
	        </div>
	        <!-- /.navbar-collapse -->
	    </div>
	    <!-- /.container-fluid -->
	</nav>
	
	<div class="container">
		@if (count($user)) 
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>						
						<th>Name</th>
						<th>Email</th>
						<th>Password</th>						
						<th>Action</th>						
					</tr>
				</thead>
				<tbody>
					@foreach($user as $users)
					<tr>					
						<td>{{ $users->name }}</td>
						<td>{{ $users->email }}</td>
						<td>{{ $users->password }}</td>
						
						<td>
							<a class="btn btn-primary btn-xs" href="{{ route('userEdit', $users->id) }}">Edit</a>
							<form action="{{ route('userDestroy', $users->id) }}" method="POST" style="display:inline">
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
								<button class="btn btn-info btn-xs">
									<span>Delete</span>
								</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>		
	
		@else
			<p class="alert alert-info">
			Records are Empty
			</p>
		@endif

	</div>	