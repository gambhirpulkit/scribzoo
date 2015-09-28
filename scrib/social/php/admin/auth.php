<?php ob_start(); ?>

<?php



	//Start session

	session_start();

	

	//Check whether the session variable SESS_MEMBER_ID is present or not

	if(!isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) == '')) {

	

	    $page = $_SERVER['REQUEST_URI'];

	$_SESSION['SESS_PAGE'] = $page;

		header("location: login.php");

		exit();

	}

?>