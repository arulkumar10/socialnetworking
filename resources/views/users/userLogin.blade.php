<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
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
                        <a href="{{route('register')}}">
                            Register
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

        @if (Session::has('message'))
            <p class="alert alert-warning">
                {{ Session::get('message') }}
            </p>
        @endif 
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                <form id="loginform" action="{{route('Postlogin')}}" method="POST" class="form-horizontal" role="form">
                  {{ csrf_field() }}            
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="email">                                        
                    </div>
                            
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="password">
                    </div>                                   
                            
                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" class="btn btn-success">
                                <span>Login</span>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Don't have an account! 
                            <a href="{{route('register')}}" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                Sign Up Here
                            </a>
                            </div>
                        </div>
                    </div>    
                </form>     
            </div>                     
        </div>  
    </div>
       