<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Shamcey - Metro Style Admin Template</title>
<link rel="stylesheet" href="/admin/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="/admin/css/style.navyblue.css" type="text/css" />
<!-- <link rel="stylesheet" href="/admin/css/style.shinyblue.css" type="text/css" /> -->

<script type="text/javascript" src="/admin/js/jquery-1.9.1.min.js"></script>
<!-- <script type="text/javascript" src="/admin/js/jquery-migrate-1.1.1.min.js"></script> -->
<script type="text/javascript" src="/admin/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="/admin/js/modernizr.min.js"></script>
<script type="text/javascript" src="/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/admin/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/admin/js/custom.js"></script>

</head>

<body class="loginpage">

	<div class="loginpanel">
	    <div class="loginpanelinner">
	        <div class="logo animate0 bounceIn"><img src="/admin/images/logo.png" alt="" /></div>
	        <form id="login" action="/auth/login" method="post">
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	        	@if (count($errors) > 0)
	            <div class="inputwrapper">
	                <div class="alert alert-error">
	                	<strong>Whoops!</strong> There were some problems with your input.<br><br>
	                	<ul>
	                		@foreach ($errors->all() as $error)
	                			<li>{{ $error }}</li>
	                		@endforeach
	                	</ul>
	                </div>
	            </div>
	            @endif
	            <div class="inputwrapper animate1 bounceIn">
	                <input type="email" name="email" value="{{ old('email')}}" placeholder="Email Address" />
	            </div>
	            <div class="inputwrapper animate2 bounceIn">
	                <input type="password" name="password" id="password" placeholder="Password" />
	            </div>
	            <div class="inputwrapper animate3 bounceIn">
	                <button name="submit">Log In</button>
	            </div>
	            <div class="inputwrapper animate4 bounceIn">
	                <label><input type="checkbox" class="remember" name="remember" /> Remember Me</label>
	            </div>
				<div class="inputwrapper animate5 bounceIn">
		            <a href="/password/email">Forgot Your Password?</a>
		        </div>
	            
	        </form>
	    </div><!--loginpanelinner-->
	</div><!--loginpanel-->
	<div class="loginfooter">
	    <p>&copy; 2013. Shamcey Admin Template. All Rights Reserved.</p>
	</div>

</body>
</html>


