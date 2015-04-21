<?php

function check_username($username) {
	echo 'this' . $username;
if(empty($username)) {
		echo "Please enter your username.";
		echo '<br>';
		return 'Empty1';
		exit;
	}

include ('database.php');
$query = "SELECT username FROM user WHERE username = '$username';";
$result = mysql_query($query);
echo 'THIS IS THE RESULT: ' . $result;
	echo 'RESULT: ' . $result;
	if (mysql_num_rows($result)==0) {
	echo 'User not in db';
		
		return 'SQLEmpty';


	}


}





function check_username2($username) {

	if(empty($username)) {
		echo "Please enter your username.";
		echo '<br>';
		return 'Empty';
	}
	else {
	// $username = stripslashes(trim($_POST['username']));
		$query = "SELECT username FROM user WHERE username = '$username';";
		
		
		$result = mysql_query($query);
		
		if (isset($result)) {
		echo 'User not in db';
		
		return 'Empty';
		
		
		
		} else {
		
		echo "2";
		$row = mysql_fetch_array($result, MYSQL_NUM);
		
		
		
		if (@mysql_num_rows($result) == 1) {
			echo "That username has already been taken.";
			echo '<br>';
			$error++;
			return "Taken";
			}				
		} 
	}
}


function check_password() {
	if (empty($password)) {
		echo "Please enter your password.";
		echo '<br>';
		$error++;
	}
	else { // record password
		$password = stripslashes(trim($_POST['password']));
		if (empty($password2)) { // check if password has been confirmed
			echo "Please confirm your password.";
			echo '<br>';
			$error++;
		}
		else { // record confirmed password
			if ($password != $password2) { // check if passwords match
				echo "Passwords do not match.";
				echo '<br>';
				$error++;
			}
			else { 
				$password2 = stripslashes(trim($_POST['password2']));
				return $password2;
			}
		}
	}
}
function check_email() {
	$email = trim(stripslashes(filter_var($email, FILTER_SANITIZE_EMAIL)));
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL === false)) {
		$error++;
		echo "Email address is invalid.";
		echo "<br>";
	}
	return $email;
}

function register() {		

		$query = "INSERT INTO user (username, password, email, fname, lname, addressone, addresstwo, city, state, telnumber) VALUES ('$username', '$password', '$email', '$fname', '$lname', '$address1', '$address2', '$city', '$state', '$phone');";
		
	
		$result = mysql_query($query) or trigger_error("Query MySQL Error: " . mysql_error());
				
		if (mysql_affected_rows() == 1) {
			echo "You have been entered into the database, click <a href = '<?php echo $linkname; ?>' > >here</a> to login.";
			$_SESSION['password'] = $_POST['password'];
			$_SESSION['password2'] = $_POST['password2'];
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['email2'] = $_POST['email2'];
			$_SESSION['fname'] = $_POST['fname'];
			$_SESSION['lname'] = $_POST['lname'];
			$_SESSION['address1'] = $_POST['address1'];
			$_SESSION['address2'] = $_POST['address2'];
			$_SESSION['city'] = $_POST['city'];
			$_SESSION['phone'] = $_POST['phone'];
			$_SESSION['state'] = $_POST['state'];
		}
	else {
			echo "Sorry, an error has occurred.";
	}
}
?>