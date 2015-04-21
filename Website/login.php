<?php
$page_title = 'First User Login Form';

if (isset($_POST['submit'])) // We are checking for form submission
	{  
	$error=0;
	$u = $_POST['username']; //these two lines put the POST variables in simple vars
	$p = $_POST['password'];
	
	
	if (empty($u)) // validate username to make sure it is not empty
	{  
		echo 'Please enter a username.';
		$error++;
		echo '<br>';
	}
	
	if (empty($p)) //validate password to make sure it is not empty
	{  
		echo 'Please enter a password.';
		$error++;
		echo '<br>';
	}
	
	if ($error==0) {
		session_start();
		require ('database.php');
		
		$query = "SELECT * FROM user WHERE (username='$u' and password='$p')";
		$result = mysql_query($query);
		
		if (@mysql_num_rows($result) == 1) {
			//If one row is returned we have a valid user. If 0 rows are return we have invalid user.
			$row = mysql_fetch_array($result, MYSQL_NUM);
			
	$_SESSION[auth] = 1;						
			header("Location: landing.php");
			
			exit();
			// database and session and header
		} else {
		echo "You are not in the database";
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/css/bootstrap.css">
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="styles/js/bootstrap.js"></script>

<link href="styles/css/stylesheet.css" rel="stylesheet" type="text/css">
<title>Register</title>
</head>
<body>
<div id="wrapper">
	<nav class="navbar navbar-default navbar-fixed-top">
	<!--[if IE]><div style='clear: both; height: 112px; padding:0; position: relative;'><a href="http://www.theie7countdown.com/ie-users-info"><img src="http://www.theie7countdown.com/assets/badge_iecountdown.png" border="0" height="112" width="348" alt="" /></a></div><![endif]-->
		<div class="container-fluid">
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li role="navigation"><a href="home.html">Home</a></li>
					<li role="navigation"><a href="about.html">About Me</a></li>
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Projects <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="conditions.php">True or False Conditionals</a></li>
							<li><a href="temperature.html">Clothing Picker</a></li>
							<li><a href="countdown.html">Countdown</a></li>
							<li><a href="fileuploader.html">File Uploader</a></li>
						</ul>
						</li>
					<li role="navigation"><a href="contact.php">Contact Me</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li role="navigation"><a href="login.html">Login</a></li>
					<li class="navbar-text">Thomas Garcia</li>
				</ul>
			</div>
		</div>
	</nav>

<title><?php echo $page_title; ?></title>

<form action = "login.php" method="post">
Username: <br>
<input type="text" name="username" />
<br>
Password: <br>
<input type="password" name="password" />
<br>
<input type = "submit" name="submit" value="Login" />
</form>

<a href="register.php">Register here</a>
<div id="footer">
	Copyright© 2015 Thomas Garcia
</div>
</div>
