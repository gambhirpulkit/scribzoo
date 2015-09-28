<?php
//include('auth.php');
 include('config.php');

function clearnoti($owner)
{alert();

$qry = mysql_query("update tbl_noti set seen = 'yes' where owner = '$owner'");


 }
?>