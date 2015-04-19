<!DOCTYPE html>
<html lang="en" ng-app="ResumeGenerator">
<head>
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<!-- Javascript libraries -->
	<script src="node_modules/jquery/dist/jquery.min.js"></script>
	<script src="node_modules/angular/angular.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="node_modules/less/dist/less.js"></script> 
	<script src="node_modules/responsive-nav/responsive-nav.min.js"></script>
	<script src="node_modules/jquery-ui-browserify/dist/jquery-ui.min.js"></script>
	<script src="node_modules/angular-ui-sortable/src/sortable.js"></script>
	<script src="js/resume_angular_app.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="node_modules/responsive-nav/responsive-nav.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<header class="bg-primary">
		<div class="container">
			<div class="menu-custom">
				<a href="sign_up.html">
					<button type="button" class="btn btn-default navbar-btn hidden-xs">Sign up</button>
				</a>
				<a href="login.html">
					<button type="button" class="btn btn-default navbar-btn hidden-xs">Log in</button>
				</a>
				<a id="toggle" class="visible-xs">
					<img src="img/ham.svg" alt="Menu" width="70" height="70"/>
				</a>
			</div>
			<h1>Resume Generator</h1>
		</div>
	</header>
	<nav class="nav-collapse mob-nav">
		<ul class="nav nav-pills visible-xs">
			<li><a href="index.html">Home</a></li>
			<li><a href="index.html">About</a></li>
			<li><a href="sign_up.html">Sign Up</a></li>
			<li class="active"><a href="login.html">Login</a></li>
		</ul>
	</nav>