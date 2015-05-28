<?php 
session_start();
$page_title = 'Borrowing History';

if($_SESSION['auth'] == 0) { header('Location:login.php'); }

?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<link rel="stylesheet" type="text/css" href="reset.css"/>
	<title>Index</title>
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
	<main>
	<div class="right">
		<?if ($_SESSION['auth'] == 1) { echo $_SESSION['username'] . ' is logged in.<br>'; } else { echo 'You are not logged in.<br>'; }?>
	</div>
	<h4>Borrowing History</h4>
	<?php 
	//--------PRINT ALL ARTIFACTS------//
	require ('database.php');
	$q = "SELECT name, checkOut, datediff(NOW(), checkOut) AS 'checked' FROM artifact JOIN borrowingHistory ON ID = artifactID"; 
	//GROUP BY GROUPING SETS((collection, name), (name, ))";
	$qCount = "SELECT COUNT(*) AS 'counted' FROM borrowingHistory";
	$q2 = "SELECT name, checkOut, datediff(NOW(), checkOut) AS 'checked' FROM artifact JOIN borrowingHistory ON ID = artifactID GROUP BY name, checkOut HAVING checked > 30";
	
	$r = mysql_query($q); 
	$rCount = mysql_query($qCount);
	$r2 = mysql_query($q2); 
	$row = mysql_fetch_array($r, MYSQL_ASSOC); 
	$row2 = mysql_fetch_array($r2, MYSQL_ASSOC); 
	$rowCount = mysql_fetch_array($rCount, MYSQL_ASSOC);
	$num_row = mysql_num_rows($r);
	$num_row2 = mysql_num_rows($r2);

	if ($num_row > 0) {
		// Counts the number of entries in artifact table
		echo "<p>There are " . $rowCount['counted'] . " artifacts being borrowed.</p>";
		echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
		<tr><td align="left"><b>Name</b></td><td align="left"><b>Check Out</b></td><td align="left"><b>Days Checked Out</b></td></tr>';
		
		// Echo out all borrow records
		do { echo '<tr><td>' . $row['name'] . '</td><td>' . $row['checkOut'] . '</td><td>' . $row['checked'] . '</td></tr>'; }
		while ($row = mysql_fetch_assoc($r));
		
		echo '</table>';
		mysql_free_result($r);
		unset($r);
	} else { echo '<p>There are currently no artifacts being borrowed.</p>'; }
	echo '<hr><h4>Overdue Artifacts</h4>';
	//Overdue artifact table
	if ($num_row2 > 0) {
		echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
		<tr><td align="left"><b>Name</b></td><td align="left"><b>Check Out</b></td><td align="left"><b>Days Checked Out</b></td></tr>';
		
		// Echo out all borrow records
		do { echo '<tr><td>' . $row2['name'] . '</td><td>' . $row2['checkOut'] . '</td><td>' . $row2['checked'] . '</td></tr>'; }
		while ($row2 = mysql_fetch_assoc($r2));
		
		echo '</table>';
		mysql_free_result($r2);
		unset($r2);
	} else { echo '<p>There are no artifacts overdue.</p>'; }
	?>
	</main>
</div id="wrapper">
</body>
</html>