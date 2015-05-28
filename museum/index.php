<?php
include('header.html');
ob_start();
session_start();

if ($_SESSION['auth'] == 1) { echo $_SESSION['username'] . ' is logged in.<br>'; } 
else { echo 'You are not logged in.<br>'; }
ob_end_clean();
?>

<body>
<main>
<div class="right">
	<?if ($_SESSION['auth'] == 1) { echo $_SESSION['username'] . ' is logged in.<br>'; } else { echo 'You are not logged in.<br>'; }?>
</div>
<h4>Home</h4>
	You made it.
</main>
</body>
</html>