<?php
    $to = "lordumber4@gmail.com";
    $subject = "Contact Message from Portfolio Site:" . $_REQUEST['subject'];
    $body = "From: " . $_REQUEST['name'] . "\n E-Mail: " . $_REQUEST['email'] . "\n Message: " . $_REQUEST['message'];

    mail($to, $subject, $body, $from);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Contact Us</title>

<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

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
<!--[if IE]><div style='clear: both; height: 112px; padding:0; position: relative;'><a href="http://www.theie7countdown.com/ie-users-info"><img src="http://www.theie7countdown.com/assets/badge_iecountdown.png" border="0" height="112" width="348" alt="" /></a></div><![endif]-->

<div class="jumbotron jumbotron-sm" id="outerForm">
<div class="container">
Thank you for contacting me. I will respond as quickly as possible.
</div>
</div>
</div>
<div id="footer">
Copyright© 2015 Thomas Garcia
</div>
</div>
</body>
</html>
