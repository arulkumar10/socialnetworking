<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ asset('style.css') }}">
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="{{ asset('assets/js/script.js') }}"></script>

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
			@if (count($posts)) 
			<div class="table-responsive">
				<table class="table">
					<tbody>
						@foreach($posts as $post)
						<div id="comment-message" class="form-row">
							<textarea class="comments" name = "comment" placeholder = "Message" id = "comment" >{{ $post->posts }}</textarea>
						</div>
						<div>
							<div>
							<a href="{{route('like')}}" class="btn btn-primary btn-xs" href="javascript:void(0)" data-href="<?php echo url('/')."/like"; ?>"
									 data-id="<?php echo $post['id']; ?>">Like</a>
							<strong  class="countlike"><?php echo $countlike;?></strong>
							</div>

							<div>
							<a  href="{{route('dislike')}}" class="btn btn-primary btn-xs" href="javascript:void(0)" data-href="<?php echo url('/')."/unlike"; ?>" 
								data-id="<?php echo $post['id']; ?>">Dislike</a>
							<strong  class="countlike"><?php echo $countdislike;?></strong>
							</div>

							<div>
							<a class="btn btn-primary btn-xs" href="#">Comments</a>
							</div>

						</div>
						@endforeach
					</tbody>
				</table>
			</div>	
			@endif	
		</div>		
	</body>
</html>
