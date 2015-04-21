<?php

// File contains database access information.
// File establishes connection to MySQL,
// selects database, sets encoding.


DEFINE('DB_USER', 'tgarcia_logger');
DEFINE('DB_PASSWORD', 'dimagine');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'tgarcia_test');

$dbc = mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) OR die ('Could not connect to MySQL:' . mysql_error() );
mysql_select_db(DB_NAME) OR die ('Could not connect to DB ' . mysql_error());
?>