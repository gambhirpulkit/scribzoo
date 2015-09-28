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


		case 'delete_comment':

		mysql_query("update tbl_comment set status = 'deleted' where id = '$comment_id'");
		break;
	
		
	
	}





?>



</body>

</html>