<?php

define('DB_SERVER', '68.178.217.9');
define('DB_USERNAME', 'scribzoonew');
define('DB_PASSWORD', 'New@12345');
define('DB_DATABASE', 'scribzoonew');

//connect to the database
mysql_connect('DB_SERVER', 'DB_USERNAME', 'DB_PASSWORD') or die("I couldn't connect to your database, please make sure your info is correct!");
mysql_select_db('DB_DATABASE') or die("I couldn't find the database table ($table) make sure it's spelt right!");


?>