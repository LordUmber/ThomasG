<?php
session_start();
$page_title = 'Artifacts';

if($_SESSION['auth'] == 0) { header('Location:login.php'); }

//-----------REGISTER ARTIFACT------------------//
if (isset($_POST['submit'])) {   
	$error = "";
	$name = stripslashes(trim($_POST['name']));
	$collection = stripslashes(trim($_POST['collection']));
	$desc = stripslashes(trim($_POST['desc']));
	$dateFound = stripslashes(trim($_POST['dateFound']));
	
	// Are any fields empty?
	if (empty($name) || empty($dateFound) ) { $error++; }
	
	// Checks if artifact is already in database
	require ('functions.php');
	$artexist = checkArtifact($_POST['name']);
	
	// If there are no errors and user is logged in, do this
	if($error == 0 && $_SESSION['auth'] == 1 && $artexist == 0) {
		require ('database.php');
		if($collection == '') {
			$query = "INSERT INTO artifact (name, description, dateFound, dateRegistered) VALUES ('$name', '$desc', '$dateFound', NOW()) ";
		} else {
			$query = "INSERT INTO artifact (name, collection, description, dateFound, dateRegistered) VALUES ('$name', '$collection', '$desc', '$dateFound', NOW()) ";
		}
		$result = mysql_query($query) OR trigger_error("Query MySQL Error: " . mysql_error() );
		
		if (mysql_affected_rows() == 1) { echo "You registered an artifact!"; } 
		else { echo "Something went wrong."; }
		
	// If there is an error of some kind
	} else { echo 'The artifact was not registered due to a system error.'; }
} 
//---------UPDATE ARTIFACT-------//
if (isset($_POST['submit2'])) {  
	$n1 = stripslashes(trim($_POST['n1']));
	$d2 = stripslashes(trim($_POST['d2']));
	$c2 = stripslashes(trim($_POST['c2']));
		
	if($d2 == "" && $c2 == "") {
		echo "The artifact was not updated because you did not submit any new information.";
	} else {
		if($_SESSION['auth'] == 1) {
			require ('database.php');
			$q = "UPDATE artifact SET description = '$d2', collection = '$c2' WHERE name = '$n1'";
			$r = mysql_query($q) OR trigger_error('Query MySQL Error: ' . mysql_error() );
			
				
			if (mysql_affected_rows() == 1) { //you updated the artifact
				echo 'The artifact has been updated.';
				mysql_close();
			} else { //if db did not get updated
				echo 'The artifact was not updated due to a system error.';
				mysql_close();
			}
		}
	}
}
//---------DELETE ARTIFACT-------//
if (isset($_POST['delete']) && $_SESSION['auth'] == 1) {  
	$n2 = stripslashes(trim($_POST['n2']));
	
	require ('database.php');
	$q = "DELETE FROM artifact WHERE name = '$n2'";
	$r = mysql_query($q) OR trigger_error('Query MySQL Error: ' . mysql_error() );
			
	if (mysql_affected_rows() == 1) { //you updated the artifact
		echo 'The artifact has been deleted.';
		mysql_close();
	} else { //if db did not get updated
		echo 'The artifact was not deleted due to a system error.';
		mysql_close();
	}
}
?>
<!---------------------------------------H T M L----------------------------------------------->
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="styles/css/reset.css"/>
	<title><?php echo $page_title; ?></title>
</head>
<body>
<div id="wrapper">
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
<html>
	<main>
	<div class="right">
		<?if ($_SESSION['auth'] == 1) { echo $_SESSION['username'] . ' is logged in.<br>'; } else { echo 'You are not logged in.<br>'; }?>
	</div>
	<h4>Register an Artifact:</h4>
	<form action="artifact.php" method="post">
		<label>Artifact Name: </label><input type="text" name="name" value=""/>
		<label>Collection: </label><input type="text" name="collection" value=""/>
		<label>Description: </label><textarea name="desc" value=""></textarea>
		<label>Date found:</label><input type="date" name="dateFound">

		<input class="floatRight" type="submit" name="submit" value="Submit" />
	</form>
	<?php 
	//--------PRINT ALL ARTIFACTS------//
	require ('database.php');
	$q = "SELECT name, collection, description, DATE_FORMAT(dateFound, '%M %d, %Y') AS df FROM artifact ORDER BY dateFound ASC";
	$r = mysql_query($q);
	$row = mysql_fetch_array($r, MYSQL_ASSOC);
	$num_row = mysql_num_rows($r);

	if ($num_row > 0) {
		// Counts the number of entries in artifact table
		echo "<p>There are $num_row artifacts registered.</p>\n";
		echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
		<tr><td align="left"><b>Name</b></td><td align="left"><b>Collection</b></td>
		<td align="left"><b>Description</b></td><td align="left"><b>Date Found</b></td></tr>';
		do { // Echoes all entries
			if($row['collection'] == NULL) { $row['collection'] = '--'; }
			if($row['description'] == NULL) { $row['description'] = '--'; }
			echo '<tr><td>' . $row['name'] . '</td><td>' . $row['collection'] . '</td><td>' . $row['description'] . '</td><td>'. $row['df'] . '</td></tr>'; 
		}	while ($row = mysql_fetch_assoc($r));
		
		echo '</table>';
		mysql_free_result($r);
		unset($r);
	} else { echo '<p>There are currently no registered artifacts.</p>'; }
	?>
	<h4>Update an Artifact:</h4>
	<form action="artifact.php" method="post">
		<label>Artifact Name: </label><input type="text" name="n1" /><br>
		<label>New collection: </label><input type="text" name="c2" />
		<label>New description: </label><input type="text" name="d2" />
		<input type="submit" name="submit2" value="Submit" />
	</form>
	<h4>Delete an Artifact:</h4>
	<h5>This cannot be undone!</h5>
	<form action="artifact.php" method="post">
		<label>Artifact Name: </label><input type="text" name="n2" />
		<input type="submit" name="delete" value="Delete" />
	</form>
	</main>
</div id="wrapper">
</body>
</html>