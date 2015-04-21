<?php
session_start();

$error=0;

if (isset($_POST['submit'])) {  // We are checking for form submission
	$p1 = $_POST['password']; //these two lines put the POST variables in simple vars
	$p2 = $_POST['password2'];
	$username = $_POST['username'];
	
	if (empty($username)) {  // validate username to make sure it is not empty
		echo 'Please enter your username!';
		$error++;
		echo '<br>';
	}
	else {
	$username = stripslashes(trim($_POST['username']));
	}

	if (empty($p1)) {  //validate password to make sure it is not empty
		echo 'Please enter a password!';
		$error++;
		echo '<br>';
	}
	
	if (empty($p2)) {  //validate password to make sure it is not empty
		echo 'Please confirm your password!';
		$error++;
		echo '<br>';
	}
	
	else if ($p1 != $p2) { 
		echo 'Passwords do not match.';
		$error++;
		echo '<br>';
	}
	if ($error==0) {
		session_start();
		require ('database.php');
		$query = "UPDATE user SET password='$p1' WHERE username='$u';";
		$result = mysql_query($query) or trigger_error("Query MySQL Error: " . mysql_error());
		
		if (mysql_affected_rows() == 1) {
					echo "Your password has been updated, click <a href="http://thomasg.smtchs.org/php/login.php"> here </a> to login.";
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
<title>Password Reset</title>
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
	<div id="content">
	<form action = "passwordreset.php" method="post">

	Username: <br>
	<input type="text" name="username" />
	<br>
	Password: <br>
	<input type="text" name="password" />
	<br>
	Confirm Password: <br>
	<input type="text" name="password2" />
	<br>
	<input type = "submit" name="submit" value="Submit" />
	</form>
	</div>
	


<div id="footer">
	Copyright© 2015 Thomas Garcia
</div>
</div>
</body>
</html>