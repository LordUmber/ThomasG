<?php
// CHECKS ARTIFACT
function checkArtifact($name) {
		require("database.php");
		$q = "SELECT name FROM artifact WHERE name = '$name';";
		$r = mysql_query($q);
		
		$row = mysql_fetch_array($r, MYSQL_NUM);
		
		if (@mysql_num_rows($r) == 1) {
			$artcheck = 1; //1 means there is a user in database
			return $artcheck;
			mysql_close();
		} else {
			$artcheck = 0;
			return $artcheck;
			mysql_close();
		}
	}
// LOG OUT
function logOut() {
	$_SESSION['auth'] = 0;
	session_unset();
	session_destroy();
	header("Location:login.php");
	exit();
}
// CHECKS USERNAME
function checkUsername($username) {
	require("database.php");
	$query = "SELECT username FROM user WHERE username = '$username';";
	$result = mysql_query($query);
	
	$row = mysql_fetch_array($result, MYSQL_NUM);
	
	if (@mysql_num_rows($result) == 1) {
		$usercheck = 1; //1 means there is a user in database
		return $usercheck;
		mysql_close();
	} else {
		$usercheck = 0;
		return $usercheck;
		mysql_close();
	}
}
?>