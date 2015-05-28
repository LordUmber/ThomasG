<?php

session_start();
$page_title = 'Registration Form';

//Are you allowed to be here?
//if ($_SESSION['auth'] == 1) { header("Location: page1.php"); }


//Checks for form submission
if (isset($_POST['submit'])) {   
	// VARIABLES
	$error = "";

	$username = stripslashes(trim($_POST['username']));
	$p1 = stripslashes(trim($_POST['password1']));
	$p2 = stripslashes(trim($_POST['password2']));
	
	// Are any fields empty?
	if (empty($username) || empty($p1) || empty($p2) ) {	 
		echo 'You left something empty.';
		$error++;
	}
	

	if ($p1 != $p2) {   // do passwords match?
		echo 'Passwords do not match.';
		$error++;	
	}
	
	// Checks if username or email is taken
	require("functions.php");
	$userexist = checkUsername($_POST['username']);
	
	if ( !empty($username) ) {
		if ($userexist == 1) {
			echo 'That username already exists.';
			$error++;
		}
	}
	
	
	//If there are no errors and everything is A-OK
	if($error == 0) {
		require ('database.php');
		$query = "INSERT INTO user (username, password) VALUES ('$username', '$p1') ";
		$result = mysql_query($query) OR trigger_error("Query MySQL Error: " . mysql_error() );
		//Successful Registration
		if (mysql_affected_rows() == 1) { echo 'You did it! You registered.'; }
		else { echo 'Something went wrong.'; }
	}
} 
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<link rel="stylesheet" type="text/css" href="reset.css"/>
	<title>Index</title>
</head>
<header>
	<h1>Artifacts!</h1>
</header><br>
<nav><ul>
	<li class="left"><a href="index.php">Home</a></li>
	<li class="left"><a href="artifact.php">Artifact</a></li>
	<li class="left"><a href="borrowing.php">Borrowing History</a></li>
	<li class="right"><a href="register.php">Register</a></li>
	<li class="right"><a href="login.php">Login</a></li>
</ul></nav>
	<main>
	<div class="right">
		<?if ($_SESSION['auth'] == 1) { echo $_SESSION['username'] . ' is logged in.<br>'; } else { echo 'You are not logged in.<br>'; }?>
	</div>
	<h4>Please Register Below:</h4>
	<div>
	<form action= "register.php" method="post">
		<label>Username:</label><input type="text" name="username" value=""/><br>
		<label>Password:</label><input type="password" name="password1" value=""/><br>
		<label>Re-enter Password:</label><input type="password" name="password2" value="" /><br>
		
		<input class="floatRight" type="submit" name="submit" value="Submit" />
	</form>
	Already have an account? <a href="login.php">Login here</a>
	</div>	
	</main>
</div id="wrapper">
</body>
</html>