<html>
<head>
<script>
</script>
<title>No content</title>
 <meta property="og:image" content="https://graph.facebook.com/me/picture?type=large" />
</head>
<body>
<?php ob_start(); 
session_start();

?>


<?php
include('auth.php'); 
 include('config.php'); 
 require("class.phpmailer.php");
 ?>

<?php

if(isset($_POST['mode'])) { $mode = addslashes($_POST['mode']); }
if(isset($_POST['visitor'])) { $visitor = addslashes($_POST['visitor']); }
if(isset($_POST['receiver'])) { $receiver = addslashes($_POST['receiver']); }
if(isset($_POST['request'])) { $request = addslashes($_POST['request']); }
if(isset($_POST['sender'])) { $user = addslashes($_POST['sender']); }
if(isset($_POST['sendername'])) { $sendername = addslashes($_POST['sendername']); }
if(isset($_POST['sendto'])) { $sendto = addslashes($_POST['sendto']); }
if(isset($_POST['owner'])) { $owner = addslashes($_POST['owner']); }
if(isset($_POST['accepter'])) { $accepter = addslashes($_POST['accepter']); }
if(isset($_POST['requester'])) { $requester = addslashes($_POST['requester']); }
if(isset($_POST['test_owner_id'])) { $test_owner_id = addslashes($_POST['test_owner_id']); }
if(isset($_POST['test_requester_id'])) { $test_requester_id = addslashes($_POST['test_requester_id']); }
if(isset($_POST['pid'])) { $pid = addslashes($_POST['pid']); }
if(isset($_POST['board'])) { $board = addslashes($_POST['board']); }
if(isset($_POST['follower'])) { $follower = addslashes($_POST['follower']); }
if(isset($_POST['unfollower'])) { $unfollower = addslashes($_POST['unfollower']); }
if(isset($_POST['unfollow_board'])) { $unfollow_board = addslashes($_POST['unfollow_board']); }
if(isset($_POST['testimonial'])) { $testimonial_to_vote = addslashes($_POST['testimonial']); }
if(isset($_POST['testimonial'])) { $testimonial_to_share = addslashes($_POST['testimonial']); }
if(isset($_POST['voter'])) { $voter = addslashes($_POST['voter']); }
if(isset($_POST['sharer'])) { $sharer = addslashes($_POST['sharer']); }
if(isset($_POST['videoid'])) { $videoid = addslashes($_POST['videoid']); }


 //echo $board ;exit;

switch($mode)
{

     case 'follow_request':
    $qry_follow = "insert into board_follow set board = '$board', follower = '$follower', followed_on = NOW()"; 
	 $insert_follow = mysql_query($qry_follow);
	 $qry_timeline="insert into tbl_activity set boardname ='$board',verb='subscribed to board',s_id ='$follower', date=NOW()";
	 $insert_timeline = mysql_query($qry_timeline);
	 $qry_select_board = mysql_query("select testimonial_id from board_pin where board_name = '$board'");
	 while($result_select_board = mysql_fetch_array($qry_select_board))
	 {
	 $pid = $result_select_board['testimonial_id'];
	 
	$qry_add_stream = mysql_query("UPDATE posts SET stream_id = CONCAT( stream_id, ',$follower,') where pid = '$pid'");
	
	
	}
	
	break;

    case 'unfollow_request':
    
	$qry_unfollow = "delete from board_follow where board = '$unfollow_board' and follower = '$unfollower'";
	 $delete_unfollow = mysql_query($qry_unfollow);
	
	break;





   case 'insertrequest':
     $sel1 = "select id from matches where sender = '$visitor' and receiver = '$receiver'";   
     $qry1 = mysql_query($sel1);
	 $count = mysql_num_rows($qry1);
	 
	 if($count == '0'){
	  $sel = "insert into matches set sender = '$visitor', receiver = '$receiver', request = '$request'";
	 $qry = mysql_query($sel);
	  
	 }else{
	 $update = "update matches set sender = '$visitor', receiver = '$receiver', request = '$request'";
	 $update_qry = mysql_query($update);
	 
	 }
	
	 
	  
	  
	break;
	 
	 case 'insertvideoid':
    
	  $sel = "insert into visits set home_page = '$videoid'";
	  $sel2="insert into posts set vid_link = '$videoid'";
	 $qry = mysql_query($sel);
	  $qry2 = mysql_query($sel2);
	
	  
	break; 
	
	 case 'fetchconvo':
	
	?> 
   <div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header well" data-original-title>
					
						<h2><i class="icon-user"></i> <?php echo $sendername ?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed" id="convo">
							  <thead>
							 <tr>
							<form action="" method="post" >
							<input type="hidden" id="sender" name="sender" value="<?php echo $sendto ?>" />
							<input type="hidden" id="receiver" name="receiver" value="<?php echo $user ?>" />
							<textarea placeholder="Write your message here" rows="1" name="message" id="replymessage" style="height:40px; width:700px;"></textarea>
						
							  <button type="submit" class="btn btn-primary" value="send" name="send">send</button>
							 </form>
						
							 </tr>
								  <tr>
									  <th style="width:100px">sent on</th>
									   <th>from</th>
									  <th>message </th>
									                                           
								  </tr>
							  </thead>   
							   <?php 
							  $qry_ok = mysql_query("update tbl_message set read_status = 'yes' where sent_to = '$sendto' and sent_from = '$user'"); 
							  
							  
						 $sel = "select * from tbl_message where (sent_to = '$user' and sent_from = '$sendto') or (sent_from = '$user' and sent_to = '$sendto')  order by sent_on desc ";
                               $qry = mysql_query($sel);
							  while($result = mysql_fetch_array($qry))
							  {
							  ?>
							  <tbody>
							  
								<tr>
									
									<td class="center"><?php echo $result['sent_on'];  ?></td>
									<td><?php if($result['sent_from'] == $user)
									 { 
									 echo $sendername;
									  } else 
									  { echo "you"; } ?></td>
									<td><?php echo $result['message']; ?></td>
									                                    
								</tr>
								                        
							  </tbody>
							   <?php } ?>      
						 </table>  
						      
					</div>
				</div><!--/span-->
			</div>
<?php	  
	  
	break; 
     case 'clearnoti':
    
	//echo "update tbl_noti set seen = 'yes' where owner = '$owner'"; exit;
	 $qry = mysql_query("update tbl_noti set seen = 'yes' where owner = '$owner'");
	  header('Location: /stream.php');
	  
	break;
	 case 'connect_request':
	
    $qry_connect = mysql_query("insert into tbl_connect set accepter = '$accepter', requester = '$requester', scribzoo = '0', connection_time = NOW()");
	//echo "update tbl_noti set seen = 'yes' where owner = '$owner'"; exit;

	 $qry = mysql_query("insert into tbl_noti set owner = '$accepter',object='$requester', subject = 'new connection request', link_to='connections.php',field_time = NOW(), seen = 'no'");
	 
	 $qry_activity = mysql_query("update tbl_activity set activity_id = CONCAT( activity_id, ',$requester,') where s_id = '$accepter'");
	 
	 $result_accepter_email = mysql_fetch_array(mysql_query("select login from member where m_id='$accepter'"));
	 $result_sender_email = mysql_fetch_array(mysql_query("select firstname,lastname,m_id,profile_pic from member where m_id='$requester'"));
	 
	 $toEmail = $result_accepter_email['login'];
		$fromname = "scribzoo_n";
		$subject= $result_sender_email['firstname'].' '.$result_sender_email['firstname']." sent you a connection request on scribzoo";
		$fromemail = "scribzoo@scribzoo.com";
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

	

	$UserEmail = $toEmail;

	

	//Send email to user containing username and password

	$emailBody = readTemplateFile("mailer_template/connection.html");

	$code=base64_encode($code);		

	//Replace all the variables in template file
	$emailBody = str_replace("#receiver#",$result_accepter_email['login'],$emailBody);
	$emailBody = str_replace("#sendername#",$result_sender_email['firstname'].' '.$result_sender_email['lastname'],$emailBody);
	$emailBody = str_replace("#sender_id#",$result_sender_email['m_id'],$emailBody);
	$emailBody = str_replace("#senderpic#",$result_sender_email['profile_pic'],$emailBody);

	//Send email

	$emailStatus = sendEmail ( $NameOfUser ,$fromemail, $UserEmail,$subject, $emailBody);

	

	//If email function return false

	if ($emailStatus != 1) {

		echo "An error occured while sending email. Please try again later.";

	} else {

		echo "...";

	}

	 
	 
	  
	break;   
	 case 'unconnect_request':
    $qry_connect = mysql_query("delete from tbl_connect where (accepter = '$accepter' and requester = '$requester') or (requester = '$accepter' and accepter = '$requester')");
	
	  
	break; 
	 case 'connect_approve':
	 
    $qry_connect = mysql_query("update tbl_connect set scribzoo = '1' where accepter = '$accepter' and requester = '$requester'");
	 

	 			$qry_myfriends=mysql_query("SELECT m_id FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$_SESSION['SESS_MID']}' union SELECT requester FROM tbl_connect WHERE accepter =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1'))");
		$id_string =',';
		while($result_myfriends=mysql_fetch_array($qry_myfriends))
		{
		$id_string = $id_string.$result_myfriends['m_id'].',';
		}
	
		
	
	//echo "update tbl_noti set seen = 'yes' where owner = '$owner'"; exit;
		$verb="connected to a person";
	 $qry_activity = mysql_query("insert into tbl_activity set r_id = '$accepter', s_id = '$requester', activity_id='$id_string', verb='$verb', date = NOW()");
	 $qry = mysql_query("insert into tbl_noti set owner = '$requester', subject = 'connection confirmed', object = '$accepter', link_to='connections.php', seen = 'no', field_time = NOW()");
	 
	 $qry_frnds_count=mysql_query("count(id) as count from tbl_connect where ((accepter = '$accepter' and requester = '$visitor_id') or (accepter = '$visitor_id' and requester = '$accepter')) and (scribzoo='1' or facebook='1') ");

	  //send the email
	
	  
	break;   
	
	 case 'view_testimonial':
	$qry_v_t = mysql_query("select firstname,lastname from member where m_id = '$test_requester_id'");
	$result_v_t = mysql_fetch_array($qry_v_t);
    $requester_name = $result_v_t['firstname'].' '.$result_v_t['lastname']; 
	
	 $qry = mysql_query("insert into tbl_noti set owner = '$test_owner_id', subject = '$requester_name', verb =' asked to see a testimonial', link_to='testimonial.php?id=$pid&request=approval&stalker_id=$test_requester_id&stalker_name=$requester_name', seen = 'no', field_time = NOW()");
	  header('Location: /stream.php');
	  
	break;   
	
	 case 'approve_view_req':
	 $qry_connect = mysql_query("UPDATE posts SET allowed = CONCAT(allowed,',$test_requester_id') WHERE pid = '$pid'");
	
	 $qry = mysql_query("insert into tbl_noti set owner = '$test_requester_id', verb =' request to view the testimonial has been approved', link_to='testimonial.php?id=$pid', seen = 'no', field_time = NOW()");
	  header('Location: /stream.php');
	  
	break;
	
	case 'share':
		
				$qry_myfriends=mysql_query("SELECT m_id FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$_SESSION['SESS_MID']}' union SELECT requester FROM tbl_connect WHERE accepter =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1'))");
		$id_string =',';
		while($result_myfriends=mysql_fetch_array($qry_myfriends))
		{
		$id_string = $id_string.$result_myfriends['m_id'].',';
		}
		
		
    $qry_voteup = mysql_query("UPDATE posts SET share = share+1 WHERE pid = '$testimonial_to_share'");
	$qry_track_vote = mysql_query("Insert into track_share set sharer = '$sharer', testimonial_id = '$testimonial_to_share', updatetime = NOW()");
	$verb="shared a testimonial";
	$qry_activity=mysql_query("INSERT INTO `tbl_activity`(s_id,p_id,verb,activity_id,date) VALUES ('$sharer','$testimonial_to_share','$verb','$id_string',now())"); 
	$result_select_owner = mysql_fetch_array(mysql_query("select m_id,login,firstname from member where login in (select s_email from posts where pid = '$testimonial_to_share')"));
	$notify_sender = $result_select_owner['m_id'];
	$email_sender = $result_select_owner['login'];
	$firstname_sender = $result_select_owner['firstname'];
	//find testimonial details
	$testimonial_share = mysql_query("select imgname,title,description from posts where pid='$testimonial_to_share'");
	$testimonial_test= mysql_fetch_array($testimonial_share);
	$testimgshare=$testimonial_test['imgname'];
	$titleshare=$testimonial_test['title'];
	$testdesshare= substr($testimonial_test['description'],0,20);
	$result_select_sharer = mysql_fetch_array(mysql_query("select firstname,lastname,user,m_id,imgname from member where m_id = '$sharer'"));
	$sharer_name = $result_select_sharer['firstname'].' '.$result_select_sharer['lastname'];
	$sharer_id= $sharer;
	$fb_user = $result_select_sharer['user'];
	$image=$result_select_sharer['profile_pic'];
	$qry_notify = mysql_query("insert into tbl_noti set owner = '$notify_sender',object='$sharer_id' ,verb = 'shared your testimonial', link_to='testimonial.php?id=$testimonial_to_share', seen = 'no', field_time = NOW(), testimonial_type='share'");
//send the email
	 $qry_mail = mysql_query("select login,firstname,profile_pic from member where m_id = '$sharer'");
	 $result_mail = mysql_fetch_array($qry_mail);
	 $profileimage = $result_mail['profile_pic'];
		$toEmail = $email_sender;
		$fromname = $result_mail['firstname'];
		$subject= "Someone shared a testimonial on scribzoo";
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

	

	$UserEmail = $toEmail;

	

	//Send email to user containing username and password

	$emailBody = readTemplateFile("mailer_template/activity.html");

			

	//Replace all the variables in template file
	$emailBody = str_replace("#receiver#",$email_sender,$emailBody);
	$emailBody = str_replace("#username#",$voter_name,$emailBody);
    $emailBody = str_replace("#imageprofile#",$profileimg,$emailBody);
	$emailBody = str_replace("#activity#","shared",$emailBody);
	$emailBody = str_replace("#testimonialid#",$testimonial_to_vote,$emailBody);
	$emailBody = str_replace("#title#",$title,$emailBody);
	$emailBody = str_replace("#image#",$testimg,$emailBody);
	$emailBody = str_replace("#description#",$testdesvote,$emailBody);
$emailBody = str_replace("#sharer#",$voter_id,$emailBody);	

	//Send email

	$emailStatus = sendEmail ( $NameOfUser ,$fromemail, $UserEmail,$subject, $emailBody);

	

	//If email function return false

	if ($emailStatus != 1) {

		echo "An error occured while sending email. Please try again later.";

	} else {

		echo "Email with account details were sent successfully.";

	}



	
	break;
	
	
	 
	
	 case 'vote_up':
	 
	 		$qry_myfriends=mysql_query("SELECT m_id FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$_SESSION['SESS_MID']}' union SELECT requester FROM tbl_connect WHERE accepter =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1'))");
		$id_string =',';
		while($result_myfriends=mysql_fetch_array($qry_myfriends))
		{
		$id_string = $id_string.$result_myfriends['m_id'].',';
		}
		
	
    $qry_voteup = mysql_query("UPDATE posts SET vote = vote+1 WHERE pid = '$testimonial_to_vote'");
	$qry_track_vote = mysql_query("Insert into track_votes set voter = '$voter', testimonial_id = '$testimonial_to_vote', update_time = NOW()");
	$verb2="Authenticated a testimonial";
	$qry_activity=mysql_query("INSERT INTO `tbl_activity`(s_id,p_id,verb,activity_id,date) VALUES ('$voter','$testimonial_to_vote','$verb2','$id_string',now())"); 
	$result_select_owner = mysql_fetch_array(mysql_query("select m_id,login,firstname from member where login in (select s_email from posts where pid = '$testimonial_to_vote')"));
	$notify_sender = $result_select_owner['m_id'];
	$email_sender = $result_select_owner['login'];
	$firstname_sender = $result_select_owner['firstname'];
	//find testimonial details
	$testimonial_which = mysql_query("select imgname,title,description from posts where pid='$testimonial_to_vote'");
	$test= mysql_fetch_array($testimonial_which);
	$testimg=$test['imgname'];
	$title=$test['title'];
	$testdesvote= substr($test['description'],0,20);
	$result_select_voter = mysql_fetch_array(mysql_query("select firstname,lastname, m_id ,user from member where m_id = '$voter'"));
	$voter_name = $result_select_voter['firstname'].' '.$result_select_voter['lastname'];
	$voter_id=$result_select_voter['m_id'];
	
	$fb_user = $result_select_voter['user'];
	
    $qry_notify = mysql_query("insert into tbl_noti set owner = '$notify_sender',object='$voter' ,verb = ' authenticated your testimonial', link_to='testimonial.php?id=$testimonial_to_vote', seen = 'no', field_time = NOW(), testimonial_type='vote'");
//fb status update
  if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {
        $ret_obj = $facebook->api('/me/feed', 'POST',
                                    array(
                                      'link' => 'http://scribzoo.com/testimonial.php?id='.$testimonial_to_vote,
                                      'message' => 'I have just authenticated a testimonial on scribzoo'
                                 ));
        echo '<pre>Post ID: ' . $ret_obj['id'] . '</pre>';

        // Give the user a logout link 
        echo '<br /><a href="' . $facebook->getLogoutUrl() . '">logout</a>';
      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl( array(
                       'scope' => 'publish_stream'
                       )); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, so print a link for the user to login
      // To post to a user's wall, we need publish_stream permission
      // We'll use the current URL as the redirect_uri, so we don't
      // need to specify it here.
      $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_stream' ) );
      echo 'Please <a href="' . $login_url . '">login.</a>';

    }
		

	//send the email
	 $qry_mail = mysql_query("select login,firstname,profile_pic from member where m_id = '$voter'");
	 $result_mail = mysql_fetch_array($qry_mail);
	  $profileimg=$result_mail['profilepic'];
		$toEmail = $email_sender;
		$fromname = $result_mail['firstname'];
		$subject= "Someone authenticated your testimonial on scribzoo";
		$fromemail = "Scribzoo@scribzoo.com";
		

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



$UserEmail = $toEmail;

	

	

	//Read Template File 

	$emailBody = readTemplateFile("mailer_template/activity.html");

			

	//Replace all the variables in template file
	$emailBody = str_replace("#receiver#",$email_sender,$emailBody);
	$emailBody = str_replace("#username#",$voter_name,$emailBody);
    $emailBody = str_replace("#imageprofile#",$profileimg,$emailBody);
	$emailBody = str_replace("#activity#","authenticated",$emailBody);
	$emailBody = str_replace("#testimonialid#",$testimonial_to_vote,$emailBody);
	$emailBody = str_replace("#title#",$title,$emailBody);
	$emailBody = str_replace("#image#",$testimg,$emailBody);
	$emailBody = str_replace("#description#",$testdesvote,$emailBody);
$emailBody = str_replace("#sharer#",$voter_id,$emailBody);	

			

	//Send email

	$emailStatus = sendEmail ( $NameOfUser ,$fromemail, $UserEmail,$subject, $emailBody);

	

	//If email function return false

	if ($emailStatus != 1) {

		echo "An error occured while sending email. Please try again later.";

	} else {

		echo "Email with account details were sent successfully.";

	}
	
	 

		

	  
	break; 
	
	 case 'unvote':

    $qry_voteup = mysql_query("UPDATE posts SET vote = vote-1 WHERE pid = '$testimonial_to_vote'");
	$qry_track_vote = mysql_query("delete from track_votes where voter = '$voter' and testimonial_id = '$testimonial_to_vote'");
    $verb2='voted a testimonial';
	$qry_activity2=mysql_query("DELETE from tbl_activity where s_id='$voter' and p_id='$testimonial_to_vote' and verb='$verb2'"); 
	  
	break; 
	  
}


?>

</body>
</html>