<?php
ob_start();
session_start();
include('config.php'); 
$email = $_POST['email'];
$password = $_POST['password'];

$email = mysql_real_escape_string($email);
$query = "SELECT login,passwd,m_id,firstname,lastname FROM member WHERE login = '$email';";
 
$result = mysql_query($query);
$firstname = $result['firstname'];
$lastname = $result['lastname'];
$_SESSION['SESS_MID'] = $result['m_id']; 
if(mysql_num_rows($result) == 0) // User not found. So, redirect to login_form again.
{
    header('Location:login.php');
}
 
$userData = mysql_fetch_array($result, MYSQL_ASSOC);
$hash = md5($password);

if($hash != $userData['passwd']) // Incorrect password. So, redirect to login_form again.
{
    header('Location:login.php');
}else{ // Redirect to home page after successful login.
	session_regenerate_id();
	$_SESSION['M_ID'] = $userData['m_id'];
	$_SESSION['SESS_EMAIL'] = $userData['login'];
	
	//session_write_close();
	header('Location:fill_details_login.php');

}
?>