<?php ob_start(); 

session_start();

?>


<html>

<head>

<title>No content</title>
<script src="reallocation.js" type="text/javascript" charset="utf-8"></script>
 <meta property="og:image" content="https://graph.facebook.com/me/picture?type=large" />

</head>

<body>



<?php

include('auth.php'); 

 include('config.php'); 
require("class.phpmailer.php");
 ?>



<?php



if(isset($_POST['mode'])) { $mode = addslashes($_POST['mode']); }

if(isset($_POST['comment_id'])) { $comment_id = addslashes($_POST['comment_id']); }


switch($mode)

	{


		case 'report_comment':

		mysql_query("insert into tbl_report set entity_type = 'comment', entity_id = '$comment_id', report_date=NOW(), sender_id='{$_SESSION['SESS_MID']}'");
		break;
	
		
	
	}





?>



</body>

</html>