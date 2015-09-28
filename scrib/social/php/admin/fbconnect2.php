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

 

 



$_SESSION['SESS_LAST_NAME'] = $user_info['last_name'];



$_SESSION['SESS_GENDER'] = $user_info['gender'];



$_SESSION['SESS_EMAIL'] = $user_info['email'];



$_SESSION['SESS_USERNAME'] = $user_info['username'];



$_SESSION['SESS_USER'] = $user;



$fname = $user_info['first_name'];



$lname =  $user_info['last_name'];



$fb_username = $user_info['username'];



$gender = $user_info['gender'];



$login = $user_info['email'];







$_SESSION['SESS_FRIENDS'] = $friends_list['data'];


$fb_frnds_count = sizeof($friends_list['data']); 


if(isset($login)) {






 
	$qry = "SELECT * FROM member WHERE login='$login'";



	$result = mysql_query($qry);







	if($result) {


			$qry_update_fb_count=mysql_query("update member set fb_frnds_count='$fb_frnds_count' where login='$login'");

$i_score;

		if(mysql_num_rows($result) > 0) {
		
		
		if($fb_frnds_count >50 && $fb_frnds_count <150)
		{
		$i_score=4;
		}
		
		else if ($fb_frnds_count >=150 && $fb_frnds_count <400)
		{
		$i_score=8;
		}
		else if ($fb_frnds_count >=400 && $fb_frnds_count <1000)
		{
		$i_score=12;
		}
		else if ($fb_frnds_count >=1000 && $fb_frnds_count <5000)
		{
		$i_score=16;
		}
		else if ($fb_frnds_count >=5000 )
		{
		$i_score=20;
		}
		
		$qry_update_i_score=mysql_query("update member set i_score = '$i_score' where login='$login'");

			if($i_score>0 && $i_score<=20)
			{
			$influential_score=1;
			}
			else if($i_score>20 && $i_score<=40) {
			$influential_score=2;
			}
			else if($i_score>40 && $i_score<=60) {
			$influential_score=3;
			}
			else if($i_score>60 && $i_score<=80) {
			$influential_score=4;
			}
			else if($i_score>80 && $i_score<=100) {
			$influential_score=5;
			}
			
			
		$qry_update_influential_score=mysql_query("update member set influential_score = '$influential_score' where login='$login'");
		
			
		
 

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



          



			header("location:main_timeline.php");



			exit;



			



		        



		}







		else {

header("location:main_timeline.php");
/*
//send the email

		$toEmail = $login;
		$fromname = $result_mail['firstname'];
		$subject= "shared a testimonial";
		$fromemail = "Scribzoo@scribzoo.com";
		$testimonialid= $testimonial_to_share;

#####################################

# Function to send email

#####################################

function sendEmail ($fromName, $fromEmail, $toEmail, $subject, $emailBody) {

	$mail = new PHPMailer();

	$mail->FromName = $fromName;

	$mail->From = $fromEmail;

	$mail->AddAddress("$toEmail");

		

	$mail->Subject = $subject;

	$mail->Body = $emailBody;

	$mail->isHTML(true);

	$mail->WordWrap = 150;

		

	if(!$mail->Send()) {

		return false;

	} else {

		return true;

	}

}



#####################################

# Function to Read a file 

# and store all data into a variable

#####################################

function readTemplateFile($FileName) {

		$fp = fopen($FileName,"r") or exit("Unable to open File ".$FileName);

		$str = "";

		while(!feof($fp)) {

			$str .= fread($fp,1024);

		}	

		return $str;

}





#####################################

# Finally send email

#####################################



	//Data to be sent (Ideally fetched from Database)

	$NameOfUser ="scribzoo";

	$Username = $sharer_name;

	$UserEmail = $toEmail;

	

	//Send email to user containing username and password

	//Read Template File 

	$emailBody = readTemplateFile("template.html");

			

	//Replace all the variables in template file

	$emailBody = str_replace("#username#",$Username,$emailBody);

	$emailBody = str_replace("#password#",$password,$emailBody);
    $emailBody = str_replace("#image#",$image,$emailBody);
$emailBody = str_replace("#activity#","shared",$emailBody);
$emailBody = str_replace("#testimonialid#",$testimonialid,$emailBody);
	//Send email

	$emailStatus = sendEmail ( $NameOfUser ,$fromemail, $UserEmail,$subject, $emailBody);

	

	//If email function return false

	if ($emailStatus != 1) {

		echo "An error occured while sending email. Please try again later.";

	} else {

		echo "Email with account details were sent successfully.";

	}



*/


/*		//send the email



			$to = $login;







			$subject= "Welcome to Scribzoo";







			$from = "Scribzoo@scribzoo.com";







			$headers = "From: " . strip_tags($from) . "\r\n";



			$headers .= "MIME-Version: 1.0\r\n";



			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";







			$body = "<html><body>";



			$body .= "<h1>Hi,  $fname, <br/></h1><h2 style='font-color:green font-size:10px '>  It gives us immense pleasure when a user joins the community of testimonial lovers. Scribzoo team is working hard to make your bonding strong with people you know in life. <br/> We love you and hope you'll love us back. :)  <br/> Scribzoo team</h2>";



			$body .= '</body></html>';















			mail($to, $subject, $body,$headers);







			//testing msgs







			$qry = mysql_query("insert into tbl_message set sent_on = NOW(), sent_from = 'scribzoo', sent_to = '$stalked_id', message = 'Hi, Welcome to scribzoo', read_status = 'no'");







			//



		// Function to validate against any email injection attempts



			function IsInjected($str)







			{



				$injections = array('(\n+)',



             '(\r+)',



             '(\t+)',



              '(%0A+)',



              '(%0D+)',



              '(%08+)',



             '(%09+)'



				);







				$inject = join('|', $injections);



				$inject = "/$inject/i";



				if(preg_match($inject,$str))



				{



					return true;



				}



				else



				{







					return false;



				}



			}









*/





			$qry = "INSERT INTO member(firstname, lastname, login, gender, user,fb_username,fb_date_of_joining,fb_frnds_count) VALUES('$fname','$lname','$login','$gender','$user','$fb_username',NOW(),'$fb_frnds_count')";


			
 

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



				header("location:image_upload_fb.php");



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