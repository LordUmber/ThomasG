<?php
$page_title = 'Login Form';
session_start();

if (isset($_POST['submit'])) {   //checking for form submission
	$error = 0;
	$_SESSION['auth'] = 0;
	$u = $_POST['username'];
	$p = $_POST['password'];

	if (empty($u)) { echo 'Please enter a username!<br>'; $error++; }
	if (empty($p)) { echo 'Please enter a password!'; $error++; }
	
	if ($error == 0) {
		require ('database.php');
		$query = "SELECT * FROM user WHERE (username = '$u' and password = '$p')";
		$result = mysql_query($query);
		
		if (@mysql_num_rows($result) == 1) {
		//if one row is returned we have a valid user.
			$row = mysql_fetch_array($result, MYSQL_NUM);
			mysql_close();
			
			$_SESSION['userid'] = $row[0];
			$_SESSION['username'] = $row[1];
			$_SESSION['password'] = $row[2];
			$_SESSION['auth'] = 1; //authentication is set to 1
			
			header ("Location: index.php");
		
		} else {
			echo "That's the wrong login, buddy!";
			$_SESSION['auth'] = 0; //wrong login! authentication is set to 0
		}
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
	<h4>Please Log In:</h4>
		<div>
			<form action= "login.php" method="post">
			<label>Username:</label> <input type="text" name="username" /><br>
			<label>Password:</label> <input type="password" name="password" /><br>
			<input class="floatRight" id="submitButton" type = "submit" name="submit" value="Login" />
			</form>
		Do you not have an account? <a href="register.php">Register here</a>
		</div>
	</main>
</div id="wrapper">
</body>
</html>