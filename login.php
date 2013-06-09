<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username'])) {
header('Location: landingpage.php');
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Log in to Map-Mark</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="1.css" rel="stylesheet" />
		<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet" /> -->
		<script src="js/jquery-1.8.3.min.js"></script>
		<script src="css/5grid/init.js?use=mobile,desktop,1000px"></script>
		<script src="js/init.js"></script>
		
		<noscript>
			<link rel="stylesheet" href="css/5grid/core.css" />
			<link rel="stylesheet" href="css/5grid/core-desktop.css" />
			<link rel="stylesheet" href="css/5grid/core-1200px.css" />
			<link rel="stylesheet" href="css/5grid/core-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/reset.css" />
			<link rel="stylesheet" href="css/structure.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->
		
	</head>
	<body>
	<nav id="nav">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="register.php">Register</a></li>
					<li><a href="#">Login</a></li>
					<li><a href="credits.html">Credits</a></li>
				</ul>
			</nav>
<div class="wrapper wrapper-style2">
				<article id="Intel">
					<header>
						<h1><strong>Log-in</strong></h1>
						<span>Map-Mark</span>
					</header>
					
	<form method="POST" action="checklogin.php" name="login_frm" id="login_frm"  method="post" class="box login">
	<fieldset class="boxBody">
	  <label>Username:</label><br/>
	  <input type="text" tabindex="1" name="username" id="login_id" placeholder="Username" required><br/>
	  <label>Password:</label><br/>
	  <input type="password" tabindex="2" name="password" id="password" placeholder="Password" required>
	</fieldset><br/><div id="msgbox"></div>
	<footer>
	  
	  <input type="submit" class="button button-big" value="Login" tabindex="4">
	</footer>
</form>

				
				</article>
			</div>
</body>
</html>
