<?php
ob_start();
//print_r($_POST); exit;
session_start();
include('config.php');

//print_r($_POST); exit;
 $firstname=$_POST['firstname'];
 $lastname = $_POST['lastname'];
 $hometown = $_POST['hometown']; 
 $aboutme = $_POST['aboutme'];
 $email= $_SESSION['SESS_EMAIL'];
$username = $_SESSION['SESS_USERNAME'];

 //Check whether the session variable SESS_MEMBER_ID is present or not

	if(!isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) == '')) {

	
echo "I am in this section"; exit;
	    $page = $_SERVER['REQUEST_URI'];

	$_SESSION['SESS_PAGE'] = $page;

		header("location:register.php");

		exit();

	}
 
 else{
 mysql_query("update member set username = '$username', firstname='$firstname', lastname='$lastname', hometown = '$hometown', aboutme = '$aboutme' where login = '{$_SESSION['SESS_EMAIL']}'");
 
 
		header("location:main_timeline.php");

		exit();

 
 }
?>