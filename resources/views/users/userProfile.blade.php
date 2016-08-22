<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>

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

	         </div>
	        <!-- /.navbar-collapse -->
	    </div>
	    <!-- /.container-fluid -->
	</nav>
	<!-- alert message -->
	@if (Session::has('message'))
		<p class="alert alert-warning">
			{{ Session::get('message') }}
		</p>

	@endif
		
	<div class="container">
		<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">

				<!-- SIDEBAR USERPIC -->
				
			
				<div class="profile-userpic">
					<img src="img.png" class="img-responsive" alt="">
					<!-- <input type="file" class="filestyle" name="image" f>
					<input type="submit"> -->
				</div>
				
				<!-- END SIDEBAR USERPIC -->

				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						Marcus Doe
					</div>

					<div class="profile-usertitle-job">
						<a href="{{route('show')}}">Edit Profile</a>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->

				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<a href="#"><button type="button" class="btn btn-success btn-sm">Upload Pic</button></a>					
				</div>
				<!-- END SIDEBAR BUTTONS -->

				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>

		<!-- post -->
		<div class="col-md-9">
            <div class="profile-content">
			   <h2>Form control: textarea</h2>
				  <p>The form below contains a textarea for comments:</p>
				  <form action="{{url('userPost').$user}}" method="POST">
				  {{csrf_field()}}
				    <div class="form-group">
						<label for="post">Comment:</label>
						<textarea class="form-control" rows="5" id="comment" name="post"></textarea>

						<div class="profile-userbuttons">
						<button type="submit" class="btn btn-success btn-sm">Post</button>

				    </div>

				  </form>
            </div>
		</div>
		<!-- post -->

	</div>
</div>
<center>
<strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">KeenThemes</a></strong>
</center>
<br>
<br>
	</div>	
	
</body>
</html>

