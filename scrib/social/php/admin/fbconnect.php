<?php
ob_start();
session_start();
include_once "fbaccess.php";
require("class.phpmailer.php");
require_once('config.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml"

	xmlns:fb="http://www.facebook.com/2008/fbml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Scribzoo | facebook connection</title>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />

</head>

<body>

<?php if(!$user) { ?>

<?php

header("location:$loginUrl");

//echo $loginUrl;

?><?php } else { ?>

<?php

$_SESSION['SESS_FIRST_NAME'] = $user_info['first_name'];

$_SESSION['SESS_HOMETOWN'] = $user_info['hometown']['name'];

$_SESSION['SESS_LAST_NAME'] = $user_info['last_name'];

$_SESSION['SESS_GENDER'] = $user_info['gender'];

$_SESSION['SESS_EMAIL'] = $user_info['email'];

$_SESSION['SESS_USERNAME'] = $user_info['username'];

$_SESSION['SESS_USER'] = $user;

$fname = $user_info['first_name'];

$lname =  $user_info['last_name'];

$hometown = $user_info['hometown']['name'];

$fb_username = $user_info['username'];

if($fb_username != ''){
$username = $fb_username;

}else{

$username = $user;
}

$gender = $user_info['gender'];

$login = $user_info['email'];

$_SESSION['SESS_FRIENDS'] = $friends_list['data'];

$fb_frnds_count = sizeof($friends_list['data']); 

if(isset($login)) {

			//$qry_update_fb_count=mysql_query("update member set fb_frnds_count='$fb_frnds_count', hometown='$hometown' where login='$login'");

$i_score;
	   
		//$qry_update_data=mysql_query("update member set i_score = '$i_score' where login='$login'");

		
		$qry_update_influential_score=mysql_query("update member set firstname = '{$_SESSION['SESS_FIRST_NAME']}', lastname = '{$_SESSION['SESS_LAST_NAME']}', fb_frnds_count='$fb_frnds_count', hometown='$hometown' where login='$login'");
 
	$qry = "SELECT * FROM member WHERE login='$login'";

	$result = mysql_query($qry);

	if($result) {

		if(mysql_num_rows($result) > 0) {

			$member = mysql_fetch_assoc($result);

			$_SESSION['SESS_ABOUT_ME'] = $member['aboutme'];

            $_SESSION['twitter_handle'] = $member['twitter_handle'];

			$_SESSION['SESS_MID'] = $member['m_id'];

			$visitor_id = $member['m_id'];

			foreach($friends_list['data'] as $frnd)

			{

				$friend_id = $frnd['id'];

				$result = mysql_fetch_array(mysql_query("select m_id from member where user = '$friend_id'"));

				$accepter = $result['m_id'];

				if($accepter != '')

				{

					$result_connect = mysql_fetch_array(mysql_query("select count(id) as count from tbl_connect where (accepter = '$accepter' and requester = '$visitor_id') or (accepter = '$visitor_id' and requester = '$accepter') "));
					$count = $result_connect['count'];

					if($count == '0')

					$qry = mysql_query("insert into tbl_connect set accepter = '$accepter', requester = '$visitor_id', facebook = '1', connection_time = NOW()");

				}

			}

			if($_SESSION['SESS_PAGE'] != '')

			{

				header("location: ".$_SESSION['SESS_PAGE']);

				exit;

			}

//echo "got logged in--".$user_info['email'];

			header("location:fill_details_login.php");
			exit;

		}

		else {
				if($gender == 'male'){
			$qry = "INSERT INTO member(username,firstname, lastname, login, gender, user,fb_username,profile_pic,fb_frnds_count,date_of_joining,hometown,verified) VALUES('$username','$fname','$lname','$login','$gender','$user','$fb_username','male_user.png','$fb_frnds_count',NOW(),'$hometown','verified')";
			}else{
			$qry = "INSERT INTO member(username,firstname, lastname, login, gender, user,fb_username,profile_pic,fb_frnds_count,date_of_joining,hometown,verified) VALUES('$username','$fname','$lname','$login','$gender','$user','$fb_username','female_user.png','$fb_frnds_count',NOW(),'$hometown','verified')";
			}

			$result = @mysql_query($qry);

			$qry_fetch_mid = mysql_query("select m_id from member where login= '$login'");

			$result_fetch_mid = mysql_fetch_array($qry_fetch_mid);



			$_SESSION['SESS_MID'] = $result_fetch_mid['m_id'];

			//Check whether the query was successful or not

			if($result) {
				if($_SESSION['SESS_PAGE'] != '')
				{
					header("location: ".$_SESSION['SESS_PAGE']);

					exit;

				}
				//header("location: stream.php?type=friends");
				
				
				header("location:people_you_may_know.php");

				exit();

			}else {

				die("Query failed");

			}

		}

	}

	else {

		die("Query failed");

	}

}

}

?>

</body>

</html>