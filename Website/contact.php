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
                    <li role="navigation" class="active"><a href="contact.php">Contact Me</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li role="navigation"><a href="login.html">Login</a></li>
                    <li class="navbar-text">Thomas Garcia</li>
                </ul>
            </div>
        </div>
    </nav>
<div id="content">
<!--[if IE]><div style='clear: both; height: 112px; padding:0; position: relative;'><a href="http://www.theie7countdown.com/ie-users-info"><img src="http://www.theie7countdown.com/assets/badge_iecountdown.png" border="0" height="112" width="348" alt="" /></a></div><![endif]-->

<div class="jumbotron jumbotron-sm" id="outerForm">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm" id="innerForm">
                <form action="thanks.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" 
                                required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <input id="subject" name="subject" class="form-control" placeholder="Enter Subject" required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="btnContactMe">
                            Send Message</button>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div id="footer">
Copyright© 2015 Thomas Garcia
</div>
</div>
</body>
</html>
