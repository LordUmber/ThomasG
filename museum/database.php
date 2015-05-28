<?php

DEFINE( 'DB_USER', 'kiradavi_kira' );
DEFINE( 'DB_PASSWORD', 'fishtaco' );
DEFINE( 'DB_HOST', 'localhost' );
DEFINE( 'DB_NAME', 'kiradavi_museum' );

$dbc = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) OR die ( 'Could not connect to DB' . mysql_error() );

@mysql_select_db (DB_NAME) OR die ( 'Could not connect to DB' . mysql_error() );
?>