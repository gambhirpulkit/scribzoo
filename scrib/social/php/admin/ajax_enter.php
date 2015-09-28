<?php ob_start(); 

session_start();

?>





<html>

<head>

<title>No content</title>

 <meta property="og:image" content="https://graph.facebook.com/me/picture?type=large" />

</head>

<body>



<?php

include('auth.php'); 

 include('config.php'); 

 ?>



<?php



if(isset($_POST['mode'])) { $mode = addslashes($_POST['mode']); }

if(isset($_POST['username'])) { $username = addslashes($_POST['username']); }

if(isset($_POST['firstname'])) { $firstname = addslashes($_POST['firstname']); }

if(isset($_POST['lastname'])) { $lastname = addslashes($_POST['lastname']); }

if(isset($_POST['gender'])) { $gender = addslashes($_POST['gender']); }

if(isset($_POST['aboutme'])) { $aboutme = addslashes($_POST['aboutme']); }

if(isset($_POST['hometown'])) { $hometown = addslashes($_POST['hometown']); }

if(isset($_POST['register_email'])) { $register_email = addslashes($_POST['register_email']); }




switch($mode)

{
   case 'check_username':

   $qry_check_user = mysql_query("select username from member where username = '$username'");
	$result_check_user = mysql_fetch_array($qry_check_user);
	if($result_check_user['username'] == '')
    {
	?><p style="color:green">available</p>
	<?php }else{
	?><p style="color:red">not available</p>
	<?php }
	
	break;


    case 'update_form_data':
   
   if($gender == 'male')
   {
   $qry_update_user = mysql_query("update member set firstname = '$firstname', lastname = '$lastname', gender = '$gender', aboutme = '$aboutme', profile_pic = 'male_user.png', hometown = '$hometown' where login = '$register_email'");
	}else{
	$qry_update_user = mysql_query("update member set firstname = '$firstname', lastname = '$lastname', gender = '$gender', aboutme = '$aboutme',  profile_pic = 'female_user.png', hometown = '$hometown' where login = '$register_email'");
	}



	
	break;


   case 'update_form_data_login':
    $qry_check_username = mysql_query("select m_id from member where username = '$username' and login != '$register_email' ");
	$result_check_username = mysql_fetch_array($qry_check_username);
	if($result_check_username['m_id'] == '')
	{
	
	   
   $qry_check_user = mysql_query("update member set username = '$username', firstname = '$firstname', lastname = '$lastname', aboutme = '$aboutme', hometown = '$hometown' where login = '$register_email'");
	
     }
	 $_SESSION['SESS_FIRST_NAME'] = $firstname;

 

	 $_SESSION['SESS_HOMETOWN'] = $hometown;



	$_SESSION['SESS_LAST_NAME'] = $lastname;



	$_SESSION['SESS_EMAIL'] = $register_email;



	$_SESSION['SESS_USERNAME'] = $username;

	
	break;

}





?>



</body>

</html>