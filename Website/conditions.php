<?php

session_start();
$page_title = 'Conditional Form Guffery';
require("functions.php");


if (isset ($_POST['submitAll']))	{ 

	$equalTo = $_POST['equalTo'];
	$equalTo2 = $_POST['equalTo2'];
	
	$notEqual = $_POST['notEqual'];
	$notEqual2 = $_POST['notEqual2'];
	
	$lessThan = $_POST['lessThan'];
	$lessThan2 = $_POST['lessThan2'];
	
	$greaterThan = $_POST['greaterThan'];
	$greaterThan2 = $_POST['greaterThan2'];
	
	$greaterOrEqualTo = $_POST['greaterOrEqualTo'];
	$greaterOrEqualTo2 = $_POST['greaterOrEqualTo2'];
	
	$lessOrEqualTo = $_POST['lessOrEqualTo'];
	$lessOrEqualTo2 = $_POST['lessOrEqualTo2'];
	
	$notSign = $_POST['notSign'];
	
	$andSign = $_POST['andSign'];
	$andSign2 = $_POST['andSign2'];
	
	$orSign = $_POST['orSign'];
	$orSign2 = $_POST['orSign2'];
	
	$and = $_POST['and'];
	$and2 = $_POST['and2'];
	
	$or = $_POST['or'];
	$or2 = $_POST['or2'];
	
	$xor = $_POST['xor'];
	$xor2 = $_POST['xor2'];

	
	if (empty($equalTo) || empty($equalTo2)) {
		$equalToLabel = "One or both of the values are undefined";
	}
	else if ($equalTo == $equalTo2) {
		$equalToLabel = $equalTo . " is equal to " . $equalTo2;
	}
	else {
		$equalToLabel = $equalTo . " is not equal to " . $equalTo2;
	}
	

	if ($notEqual != $notEqual2) {
		$notEqualToLabel = $notEqual . " is not equal to " . $notEqual2;
	}
	else if (empty($notEqual) || empty($notEqual2)) {
		$notEqualToLabel = "One or both of the values are undefined";
	}
	else if ($notEqual == $notEqual2) {
		$notEqualToLabel = $notEqual . "is equal to " . $notEqual2;
	}
	

	if (empty($lessThan) || empty($lessThan2)) {
		$lessThanLabel = "One or both of the values are undefined";
	}
	else if ($lessThan < $lessThan2) {
		$lessThanLabel = $lessThan . " is less than " . $lessThan2;
	}
	else {
		$lessThanLabel = $lessThan . " is not less than " . $lessThan2;
	}


	if ($greaterThan > $greaterThan2) {
		$greaterThanLabel = $greaterThan . " is greater than " . $greaterThan2;
	}
	else {
		$greaterThanLabel = $greaterThan . " is not greater than " . $greaterThan2;
	}


	if ($greaterThanOrEqualTo >= $greaterThanOrEqualTo2) {
		$greaterThanLabel = $greaterThanOrEqualTo . " is greater than or equal to " . $greaterThanOrEqualTo2;
	}
	else {
		$greaterThanOrEqualToLabel = $greaterThanOrEqualTo . " is not greater than or equal to " . $greaterThanOrEqualTo2;
	}


	if ($lessThanOrEqualTo <= $lessThanOrEqualTo2) {
		$lessThanOrEqualToLabel = $lessThanOrEqualTo . " is less than or equal to " . $lessThanOrEqualTo2;
	}
	else {
		$lessThanOrEqualToLabel = $lessThanOrEqualTo . " is not less than or equal to " . $lessThanOrEqualTo2;
	}

	
	if ($notSign === "-select-") {
		$notSignLabel = "Variable is undefined";
	}
	else if ($notSign !== "TRUE") {
		$notSignLabel = "if a variable is false, and evaluated by a NOT logical operator, it must be true";
	}
	else {
		$notSignLabel = "if a variable is true, and evaluated by a NOT logical operator, it must be false";
	}

	
	if ($andSign == "-select-" || $andSign2 == "-select-") {
		$andSignLabel = "one or both variables are undefined";
	}
	else if ($andSign && $andSign2) {
		$andSignLabel = "both variables are true, so it is true";
	}
	else {
		$andSignLabel = "either one variable, or both variables, are not true, so it is false";
	}

	if ($and == "-select-" || $and2 == "-select-") {
		$andLabel = "one or both variables are undefined";
	}
	else if ($and AND $and2) {
		$andLabel = "both variables are true, so it is true";
	}
	else {
		$andLabel = "either one variable, or both variables, are true, so it is false";
	}

	
	if ($orSign == "-select-" || $orSign2 == "-select-") {
		$orSignLabel = "one or both variables are undefined";
	}
	else if ($orSign || $orSign2) {
		$orSignLabel = "one or both variables are true, so it is true";
	}
	else {
		$orSignLabel = "neither variable is true, so it is false";
	}


	if ($or == "-select-" || $or == "-select-") {
		$orLabel = "one or both variables are undefined";
	}
	else if ($or OR $or2) {
		$orLabel = "one or both variables are true, so it is true";
	}
	else {
		$orLabel = "neither variable is true, so it is false";
	}

	if ($xor == "-select-" || $xor2 == "-select-") {
		$xorLabel = "one or both variables are undefined";
	}
	else if ($xor XOR $xor2) {
		$xorLabel = "the first variable is true, and the second variable is false, so it is true";
	}
	else {
		$xorLabel = "the first variable is false, the second variable is true, or both are true, so it is false";
	}



}
?>

<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="styles/css/bootstrap.css">
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="styles/js/bootstrap.js"></script>

<link href="styles/css/stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">
	<nav class="navbar navbar-default navbar-fixed-top">
	<!--[if IE]><div style='clear: both; height: 112px; padding:0; position: relative;'><a href="http://www.theie7countdown.com/ie-users-info"><img src="http://www.theie7countdown.com/assets/badge_iecountdown.png" border="0" height="112" width="348" alt="" /></a></div><![endif]-->
		<div class="container-fluid">
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li role="navigation" class="active"><a href="home.html">Home</a></li>
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Projects <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="temperature.html">Clothing Picker</a></li>
							<li><a href="countdown.html">Countdown</a></li>
						</ul>
						</li>
					<li role="navigation"><a href="contact.php">Contact Me</a></li>
					<li role="navigation"><a href="https://github.com/LordUmber/ThomasG.git">My GitHub</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li role="navigation"><a href="login.php">Login</a></li>
					<li class="navbar-text">Thomas Garcia</li>
				</ul>
			</div>
		</div>
	</nav>
<div id="content">
<h2>Comparative and Logical Operators</h2>
	<form action="conditions.php" method="post">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
				<label for="equalTo">is equal to conditional: 
				</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<input type="text" name="equalTo" class="form-control" value = "<?php if (isset($equalTo)) { echo $equalTo; } ?>"/> 
				</div>
				<div class="col-md-2 text-center">
					==			
				</div>
				<div class="col-md-6">
					<input type="text" name="equalTo2" class="form-control" value="<?php if (isset($equalTo2)) { echo $equalTo2; } ?>"/>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<label for="equalTo"> <?php if (isset($equalToLabel)) { echo $equalToLabel; } ?></label>
				</div>
			</div>


			<div class="row">
				<div class="col-md-12">
				<label for="notEqual">is not equal to conditional: 
				</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<input type="text" name="notEqual" class="form-control" value="<?php if (isset($notEqual)) { echo $notEqual; } ?>"/> 
				</div>
				<div class="col-md-2 text-center">
					!=			
				</div>
				<div class="col-md-6">
					<input type="text" name="notEqual2" class="form-control" value="<?php if (isset($notEqual2)) { echo $notEqual2; } ?>"/>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<label for="notEqual"> <?php if (isset($notEqualToLabel)) { echo $notEqualToLabel; } ?></label>
				</div>
			</div>

			 
			<br>
			<br>
			
			
			less than conditional: 
			<br>
			<input type="text" name="lessThan" value = "<?php if (isset($lessThan)) { echo $lessThan; } ?>"/> <br>
			< 
			<br>
			<input type="text" name="lessThan2" value = "<?php if (isset($lessThan2)) { echo $lessThan2; } ?>"/>
			<br>
			<label for="lessThan" /> <?php if (isset($lessThanLabel)) { echo $lessThanLabel; } ?></label>


			<br>
			<br>
			
			
			greater than conditional: 
			<br>
			<input type="text" name="greaterThan" value = "<?php if (isset($greaterThan)) { echo $greaterThan; } ?>"/> 
			<br>
			>
			<br>
			<input type="text" name="greaterThan2" value = "<?php if (isset($greaterThan2)) { echo $greaterThan2; } ?>"/>
			<br>
			<label for="greaterThan" /> <?php if (isset($greaterThanLabel)) { echo $greaterThanLabel; } ?></label>

			
			<br>
			<br>
			
			
			greater than or equal to conditional:
			<br>
			<input type="text" name="greaterThanOrEqualTo" value = "<?php if (isset($greaterThanOrEqualTo)) { echo $greaterThanOrEqualTo; } ?>"/> 
			<br>
			>=
			<br>
			<input type="text" name="greaterThanOrEqualTo2" value = "<?php if (isset($greaterThanOrEqualTo2)) { echo $greaterThanOrEqualTo2; } ?>"/>
			<br>
			<label for="greaterThanOrEqualTo" /> <?php if (isset($greaterThanOrEqualToLabel)) { echo $greaterThanOrEqualToLabel; } ?></label>

			
			<br>
			<br>
			
			
			less than or equal to conditional: 
			<br>
			<input type="text" name="lessThanOrEqualTo" value = "<?php if (isset($lessThanOrEqualTo)) { echo $lessThanOrEqualTo; } ?>"/> <br>
			<=
			<br>
			<input type="text" name="lessThanOrEqualTo2" value = "<?php if (isset($lessThanOrEqualTo2)) { echo $lessThanOrEqualTo2; } ?>"/>
			<br>
			<label for="lessThanOrEqualTo" /> <?php if (isset($lessThanOrEqualToLabel)) { echo $lessThanOrEqualToLabel; } ?></label>
			

			<br>
			<br>
			
			
			not logical operator: 
			<br>
			<select name="notSign" class="form-control">
			  <option value="-select-">-select-</option>
			  <option value="TRUE">TRUE</option>
			  <option value="FALSE">FALSE</option>
			</select>		
			<br>
			! 
			<br>
			<label for="notSign" /> <?php if (isset($notSignLabel)) { echo $notSignLabel; } ?></label>
			<?php echo $notSign; ?>

			<br>
			<br>
			
			
			and logical operator: 
			<br>
			<select name="andSign" class="form-control">
			  <option value="-select-">-select-</option>
			  <option value="TRUE">TRUE</option>
			  <option value="FALSE">FALSE</option>
			</select>
			<br>
			&&
			<br>
			<select name="andSign2" class="form-control">
			  <option value="-select-">-select-</option>
			  <option value="TRUE">TRUE</option>
			  <option value="FALSE">FALSE</option>
			</select>		
			<br>
			<label for="andSign" /> <?php if (isset($andSignLabel)) { echo $andSignLabel; } ?></label>
			

			<br>
			<br>
			
			
			and logical operator: 
			<br>
			<select name="and" class="form-control">
			  <option value="-select-">-select-</option>
			  <option value="TRUE">TRUE</option>
			  <option value="FALSE">FALSE</option>
			</select>
			<br>
			AND
			<br>
			<select name="and2" class="form-control">
			  <option value="-select-">-select-</option>
			  <option value="TRUE">TRUE</option>
			  <option value="FALSE">FALSE</option>
			</select>		
			<br>
			<label for="and" /> <?php if (isset($andLabel)) { echo $andLabel; } ?></label>
		

			<br>
			<br>
		
		
			or logical operator: 
			<br>
			<select name="orSign" class="form-control">
			  <option value="-select-">-select-</option>
			  <option value="TRUE">TRUE</option>
			  <option value="FALSE">FALSE</option>
			</select>
			<br>
			||
			<br>
			<select name="orSign2" class="form-control">
			  <option value="-select-">-select-</option>
			  <option value="TRUE">TRUE</option>
			  <option value="FALSE">FALSE</option>
			</select>
			<br>
			<label for="orSign" /> <?php if (isset($orSignLabel)) { echo $orSignLabel; } ?></label>


			<br>
			<br>
			
			
			or logical operator: 
			<br>
			<select name="or" class="form-control">
			  <option value="-select-">-select-</option>
			  <option value="TRUE">TRUE</option>
			  <option value="FALSE">FALSE</option>
			</select>
			<br>
			OR
			<br>
			<select name="or2" class="form-control">
			  <option value="-select-">-select-</option>
			  <option value="TRUE">TRUE</option>
			  <option value="FALSE">FALSE</option>
			</select>
			<br>
			<label for="or" /> <?php if (isset($orLabel)) { echo $orLabel; } ?></label>
			
			<br>
			<br>
			
			
			and not logical operator: 
			<br>
			<select name="xor" class="form-control">
			  <option value="-select-">-select-</option>
			  <option value="TRUE">TRUE</option>
			  <option value="FALSE">FALSE</option>
			</select>
			<br>
			XOR
			<br>
			<select name="xor2" class="form-control">
			  <option value="-select-">-select-</option>
			  <option value="TRUE">TRUE</option>
			  <option value="FALSE">FALSE</option>
			</select>
			<br>
			<label for="xor" /> <?php if (isset($xorLabel)) { echo $xorLabel; } ?></label>
			
			<br>
			<br>

			<input type="submit" name="submitAll" value="Submit All" />
		</div>
	</form>
	</div>
<div id="footer">
Copyright© 2014 Thomas Garcia
</div>
</div>

</body>
</html>