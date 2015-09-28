<?php
$host="68.178.217.9"; // Host name 

$username="scribzoonew"; // Mysql username 

$password="New@12345"; // Mysql password 

$db_name="scribzoonew"; // Database name 



// Connect to server and select databse.

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 

mysql_select_db("$db_name")or die("cannot select DB");

?>