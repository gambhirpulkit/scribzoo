<?php
include("image.php");
if($_POST['id'])
{
$id=$_POST['id'];
$title=$_POST['title'];
$id = mysql_escape_String($id);
mysql_query("update images set title='$title' where id='$id'");
}
?>