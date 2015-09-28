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

if(isset($_POST['title'])) { $title = addslashes($_POST['title']); }

if(isset($_POST['s_name'])) { $s_name = addslashes($_POST['s_name']); }

if(isset($_POST['s_email'])) { $sender_email = addslashes($_POST['s_email']); }

if(isset($_POST['receiver'])) { $receiver = addslashes($_POST['receiver']); }

if(isset($_POST['header_title'])) { $header_title = addslashes($_POST['header_title']); }

if(isset($_POST['header_receiver'])) { $header_receiver = addslashes($_POST['header_receiver']); }

if(isset($_POST['header_pid'])) { $header_pid = addslashes($_POST['header_pid']); }

if(isset($_POST['body_info'])) { $body_info = addslashes($_POST['body_info']); }

if(isset($_POST['body_pid'])) { $body_pid = addslashes($_POST['body_pid']); }

if(isset($_POST['discard_pid'])) { $discard_pid = addslashes($_POST['discard_pid']); }

if(isset($_POST['name_editor_email'])) { $name_editor_email = addslashes($_POST['name_editor_email']); }

if(isset($_POST['firstname'])) { $firstname = addslashes($_POST['firstname']); }

if(isset($_POST['lastname'])) { $lastname = addslashes($_POST['lastname']); }

if(isset($_POST['aboutme_editor_email'])) { $aboutme_editor_email = addslashes($_POST['aboutme_editor_email']); }

if(isset($_POST['aboutme'])) { $aboutme = addslashes($_POST['aboutme']); }

if(isset($_POST['hide'])) { $hide = addslashes($_POST['hide']); }

if(isset($_POST['pid'])) { $pid = addslashes($_POST['pid']); }

if(isset($_POST['anonymous'])) { $anonymous = addslashes($_POST['anonymous']); }

if(isset($_POST['append_receiver'])) { $append_receiver = addslashes($_POST['append_receiver']); }

if(isset($_POST['append_sender'])) { $append_sender = addslashes($_POST['append_sender']); }

if(isset($_POST['receiver_string'])) { $receiver_string = addslashes($_POST['receiver_string']); }

if(isset($_POST['receiver_string_sender'])) { $receiver_string_sender = addslashes($_POST['receiver_string_sender']); }

if(isset($_POST['return_tagging_pid'])) { $return_tagging_pid = addslashes($_POST['return_tagging_pid']); }

if(isset($_POST['string'])) { $string = addslashes($_POST['string']); }

if(isset($_POST['receiver_nav'])) { $receiver_nav = addslashes($_POST['receiver_nav']); }

if(isset($_POST['receiver_mid_nav'])) { $receiver_mid_nav = addslashes($_POST['receiver_mid_nav']); }

if(isset($_POST['sender_nav'])) { $sender_nav = addslashes($_POST['sender_nav']); }

if(isset($_POST['testimonial'])) { $testimonial = addslashes($_POST['testimonial']); }

if(isset($_POST['sender_email_id'])) { $sender_email_id = addslashes($_POST['sender_email_id']); }

if(isset($_POST['receiver_email_id'])) { $receiver_email_id = addslashes($_POST['receiver_email_id']); }

if(isset($_POST['profile_email_body'])) { $profile_email_body = addslashes($_POST['profile_email_body']); }

if(isset($_POST['youtube_video_id'])) { $youtube_video_id = addslashes($_POST['youtube_video_id']); }


switch($mode)

{


	  case 'setTestimonialSession':

		$_SESSION['TestimonialInSession']=$testimonial;

	break;
	
 	case 'save_video':

    $_SESSION['video_id']=$youtube_video_id;
	mysql_query("update posts set video_id = '$youtube_video_id' where pid = '$pid'");
	$video_id = explode('=',$_SESSION['video_id']);
	?>
	<iframe width="600" height="450"
src="http://www.youtube.com/embed/<?php echo $video_id[1];?>">
</iframe>
	<?php
	break;

     case 'inserttitle':


   $qry_insert_title = mysql_query("insert into posts set s_email = '$sender_email',s_name='$s_name',title = '$title',date_posts = NOW(),hide='0', deactive_status='1'");
    
	?>
	<div class="pull-right" style="margin-right:5px">
	<ul class="pagination margin-bottom-none pull-right" id="enable_next">
    <li class="next primary"><a href="create_testimonial.php" class="no-ajaxify" style="color:white">Next >></a></li>
	</ul>
	</div>
	<?php
	
	break;
	
	

     case 'insertreceiver':


   $qry_insert_receiver = mysql_query("update posts set name = '$receiver' where s_email = '$sender_email' order by pid desc limit 1");
    
	break;

     case 'edit_header':
	 ?>
	
      <?php echo $header_title; ?>
		

<?php
 $qry_edit_receiver = mysql_query("update posts set title = '$header_title' where pid = '$header_pid'");
  
	break;
	
	 case 'edit_old_header':
	 ?>
	
<a href="testimonial.php?id=<?php echo $header_pid;?>" class="lead strong display-block margin-none" style="font-size:36px"><?php echo $header_title; ?></a>
<?php
 $qry_edit_receiver = mysql_query("update posts set title = '$header_title' where pid = '$header_pid'");
  
	break;

    case 'edit_body':
	
	$track_hashtag = $body_info;
$body_info = preg_replace('/#([\\d\\w]+)/', '<a href="http://scribzoo.com/scrib/social/php/admin/search.php?keyword=%$1&src=hashtag">$0</a>', $body_info);
       
				  	
    $matches = array();
    preg_match_all('/#\S*\w/i', $track_hashtag, $matches);
	 $match = $matches[0];
    foreach($match as $hashtag=>$value){
	$qry_check_hashtag = mysql_query("select id from tbl_hashtags where h_name = '$value'");
	$result_check_hashtag = mysql_fetch_array($qry_check_hashtag);
	if($result_check_hashtag['id'] == '')
	   {
	    mysql_query("insert into tbl_hashtags set h_name = '$value', number = '1',pid=',$body_pid,', latest_update = NOW()");
	   }else
	   {
	    mysql_query("update tbl_hashtags set number = number+1, pid = CONCAT(pid, ',$body_pid,'), latest_update = NOW() where id='{$result_check_hashtag['id']}' "); 
	   }
	}


   echo $body_info;
   
   $qry_insert_receiver = mysql_query("update posts set description = '$body_info' where pid = '$body_pid'");
    
	break;

    case 'discard_testimonial':

   
   $qry_insert_receiver = mysql_query("delete from posts where pid = '$discard_pid'");
    
	break;
	
	case 'edit_name':

   ?>
   <a href="#"><?php echo $firstname.' '.$lastname;?></a> 
   <?php
   $qry_edit_name = mysql_query("update member set firstname = '$firstname', lastname='$lastname' where login = '$name_editor_email'");
    
	break;


     case 'edit_aboutme':
	 
    echo "<i class='fa fa-comment-o text-muted'></i>&nbsp;&nbsp;".$aboutme;
   
   $qry_edit_aboutme = mysql_query("update member set aboutme='$aboutme' where login = '$aboutme_editor_email'");
    
	break;
	
	case 'hide':


   $qry_insert_receiver = mysql_query("update posts set hide = '$hide' where pid='$pid'");
    
	break;
	
	case 'anonymous':


   $qry_insert_receiver = mysql_query("update posts set anonymous = '$anonymous' where pid='$pid'");
    
	break;
	
	case 'delete_testimonial':


   $qry_insert_receiver = mysql_query("update posts set deactive_status ='1' where pid='$pid'");
    $qry_delete_testimonial = mysql_query("delete from tbl_activity where p_id = '$pid'");
	break;

     case 'append':
	 $qry_append_before = mysql_query("update posts set allowed = '' where s_email = '$append_sender' order by pid desc limit 1");
	$str = $append_receiver;	
	
	
$doc = new DOMDocument();
$doc->loadHTML($str);
$divs = $doc->getElementsByTagName('div');

if ( count($divs ) ) {
    foreach ( $divs as $div ) {
    
	 $qry_append_before = mysql_query("update posts set allowed = CONCAT(allowed, ',$div->nodeValue,') where s_email = '$append_sender' order by pid desc limit 1");
    }
}


	break;
	
	
	case 'save_testimonial':
	
	$sender=$_SESSION['SESS_MID'];
	$sender_email = $_SESSION['SESS_EMAIL'];
	$qry_activate = mysql_query("update posts set deactive_status = '0' where s_email = '$sender_email' order by pid desc limit 1");
$qry_myfriends=mysql_query("SELECT m_id FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$_SESSION['SESS_MID']}' union SELECT requester FROM tbl_connect WHERE accepter =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1'))");
		$id_string =',';
		while($result_myfriends=mysql_fetch_array($qry_myfriends))
		{
		$id_string = $id_string.$result_myfriends['m_id'].',';
		}
		
		$qry_activity=mysql_query("INSERT INTO `tbl_activity`(s_id,p_id,verb,activity_id,date) VALUES ('$sender','$pid','Wrote a Testimonial','$id_string',now())"); 
    
	break;
	
	
	case 'receiver_string':


   $qry_insert_receiver = mysql_query("update posts set receiver_string ='$receiver_string' where s_email = '$receiver_string_sender' order by pid desc limit 1");
    
	break;
	
	case 'add_user':

   $qry_insert_receiver = mysql_query("update posts set name = '$receiver_nav',r_email='$receiver_mid_nav' where s_email = '$sender_nav' order by pid desc limit 1");
   echo "You are writing this for " ?><strong><?php echo $receiver_nav; ?></strong>
  
  <?php  
	break;
	case 'fetch_testimonial_image':
	 ?>
	
<?php
 $result_fetch_image = mysql_fetch_array(mysql_query("select imgname from posts where pid = '$pid'"));
  
  ?>
  <img src="imageupload/uploads_testimonial/<?php echo $result_fetch_image['imgname']; ?>" align="middle" class="img-responsive">
  <?php
	break;

   case 'return_tagging':


   $result_return_tagging = mysql_fetch_array(mysql_query("select allowed from posts where pid = '$return_tagging_pid'"));
    ?>
	 <div class="select2-container select2-container-multi" style="width: 100%; font-size:10px"> 
				       <ul class="select2-choices"> 
					   <?php 
		$friends_array_return_tagging = explode(",,", $result_return_tagging['allowed']);
		foreach($friends_array_return_tagging as $friend_array_return_tagging){
		$friend_data = explode(":",$friend_array_return_tagging);
		
		?>
					   <li class="select2-search-choice">  
					     <div><?php echo $friend_data['0']; ?></div> 
						 </li>
						 
						 <?php } ?>
					   <li class="select2-search-field">    <input type="text" autocomplete="off" class="select2-input" style="width: 22px;">  </li></ul>		
					   <a href="#" onClick="show_tagging_friends(); return false;">retag friends</a>	
			        		</div>	
	<?php
	
	break;
		
		case 'search_people':


  
   $qry_search_people = mysql_query("SELECT firstname,lastname,m_id,user,login FROM member WHERE (m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1') union SELECT requester FROM tbl_connect WHERE accepter =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1'))) and (firstname like '%$string%' or lastname like '%$string%' or login like '%$string%') limit 5");
   
   
    while($result_search_people = mysql_fetch_array($qry_search_people)){
	?>
	<li class="media" style="padding:5px;margin:0px;font-size:12px"><a href="#" onClick="add_user('<?php echo  $result_search_people['firstname'].' '.$result_search_people['lastname'];?>','<?php echo $_SESSION['SESS_EMAIL']?>','<?php echo $result_search_people['m_id']; ?>');return false;"><?php echo  $result_search_people['firstname'].' '.$result_search_people['lastname'];?></a></li>
	
	<?php } ?>
	<li class="media" style="padding:5px;margin:0px;font-size:12px"><a href="#" onClick="add_user('<?php echo $string; ?>','<?php echo $_SESSION['SESS_EMAIL']?>');return false;">add '<?php echo $string; ?>' as it is.</a></li>
	<?php
	break;
		
		case 'search_keyword':
		
		$first_letter=substr($string,0,1);
		$rest_letters=substr($string,1,10);
		if($first_letter=='@'){
		$qry_people = mysql_query("select firstname,lastname,m_id,user,profile_pic from member where firstname like '%$rest_letters%' or lastname like '%$rest_letters%' or login like '%$rest_letters%' limit 5");
		while($result_people = mysql_fetch_array($qry_people)){
		if($result_people['profile_pic']==''){
		?>
		<li class="media" style="padding:5px;margin-top:0px;font-size:22px"><a href="profile.php?user=<?php echo $result_people['m_id'];?>" class="no-ajaxify" >
		<img src="https://graph.facebook.com/<?php echo $result_people['user']; ?>/picture?type=small" height="50" width="50" class="pull-left media-object">
		<?php echo  $result_people['firstname'].' '.$result_people['lastname'];  ?></a></li>
	<?php	}else{  ?>
		<li class="media" style="padding:5px;margin-top:0px;font-size:22px"><a href="profile.php?user=<?php echo $result_people['m_id'];?>" class="no-ajaxify" >
		<img src="imageupload/uploads/<?php echo $result_people['profile_pic']; ?>" height="50" width="50" class="pull-left media-object">
		<?php echo  $result_people['firstname'].' '.$result_people['lastname'];  ?></a></li>
		
		
		
		 
		<?php
		}
		}
		?>
		<li class="media" style="padding:10px;margin-top:0px;font-size:22px"><a href="search.php?keyword=<?php echo $rest_letters;?>&src=people" class="no-ajaxify" >Find all people named '<?php echo $rest_letters; ?>'</a></li>
		<?php
		}elseif($first_letter=='#'){
		$qry_hashtag = mysql_query("select h_name from tbl_hashtags where h_name like '%$rest_letters%'");
		while($result_hashtag = mysql_fetch_array($qry_hashtag)){
		?>
		 <li class="media" style="padding:5px;margin-top:0px;font-size:22px"><a href="search.php?keyword=<?php echo substr($result_hashtag['h_name'],1,20); ?>&src=hashtag" class="no-ajaxify" ><?php echo $result_hashtag['h_name']; ?></a></li>
		 
		<?php
		}
		
		}elseif($first_letter=='$'){
		$qry_title = mysql_query("select title,pid from posts where title like '%$rest_letters%' and hide != '1' and deactive_status != '1' limit 5");
		while($result_title = mysql_fetch_array($qry_title)){
		?>
		 <li class="media" style="padding:5px;margin-top:0px;font-size:22px"><a href="testimonial.php?id=<?php echo $result_title['pid']; ?>&src=testimonial" class="no-ajaxify" ><?php echo $result_title['title']; ?></a></li>
		 
		<?php
		}
		
		}else{
		?>
		
		<?php
		}
		break;
		
		case 'send_email':

        $result_sender_name = mysql_fetch_array(mysql_query("select firstname, lastname, m_id,profile_pic from member where login = '$sender_email_id'"));
			
		$toEmail = $receiver_email_id;
		$fromname = "scribzoo_n";
		$subject= "You have received an email from ".$result_sender_name['firstname'].' '.$result_sender_name['lastname'].' '."in scribzoo";
		$fromemail = "scribzoo@scribzoo.com";
		$sender_id = $result_sender_name['m_id'];
		$sender_firstname = $result_sender_name['firstname'];
		$sender_lastname = $result_sender_name['lastname'];
		$sender_pic = $result_sender_name['profile_pic'];

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

	

	$UserEmail = $toEmail;

	

	//Send email to user containing username and password

	$emailBody = readTemplateFile("mailer_template/email_from_scribzoo.html");

	$code=base64_encode($code);		

	//Replace all the variables in template file
	$emailBody = str_replace("#receiver#",$receiver_email_id,$emailBody);
	$emailBody = str_replace("#sender_firstname#",$sender_firstname,$emailBody);
	$emailBody = str_replace("#sender_lastname#",$sender_lastname,$emailBody);
	$emailBody = str_replace("#sender_profile_pic#",$sender_pic,$emailBody);
	$emailBody = str_replace("#sender_id#",$sender_id,$emailBody);
	$emailBody = str_replace("#profile_email_body#",$profile_email_body,$emailBody);

	//Send email

	$emailStatus = sendEmail ( $NameOfUser ,$fromemail, $UserEmail,$subject, $emailBody);

	

	//If email function return false

	if ($emailStatus != 1) {

		echo "An error occured while sending email. Please try again later.";

	} else {

		echo "...";

	}

			
			
			
			
			exit;
			
    
	break;




}





?>



</body>

</html>