<!DOCTYPE html>
<html lang="en">
<head>
  <title>UET-SUPPORTER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{!!asset('templates/css/bootstrap.min.css')!!}">
  <link rel="stylesheet" type="text/css" href="{!!asset('templates/css/mystyle.css')!!}">
  <link rel="stylesheet" type="text/css" href="{!!asset('templates/css/bootstrap-social.css')!!}">
  <link rel="stylesheet" type='text/css' href="{!!asset('templates/css/font-awesome.css')!!}">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script   src="{!! asset('templates/js/myscript.js')!!}"></script>
  
</head>
<body>


<nav class="navbar navbar-inverse fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{!!url('/signup')!!}"><span class="glyphicon glyphicon-log-in"></span> SignUp</a></li>
      </ul>
    </div>
  </div>
</nav>
@include('error.error')
<form class="form-horizontal" role="form" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email" >Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="txtMail">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd" >Password:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="txtPass">
    </div>
  </div>
 
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Login</button>
		<a class="btn btn-social-icon btn-facebook" href="{!!url('facebook/redirect')!!}">
		<span class="fa fa-facebook"></span>
		</a>
		<a class="btn btn-social-icon btn-google" href="{!!url('google/redirect')!!}">
		<span class="fa fa-google" ></span>
		</a>
    </div>
  </div>
</form>

<footer class="container-fluid text-center">
  <p>UET-SUPORTER</p>
  <p>Liên hệ:supporteruet@gmail.com</p>
</footer>


</body>

</html>
