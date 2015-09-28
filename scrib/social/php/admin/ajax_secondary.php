<?php ob_start(); 

session_start();

?>





<html>

<head>

<title>No content</title>

 <meta property="og:image" content="https://graph.facebook.com/me/picture?type=large" />
<script src="reallocation.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>



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

if(isset($_POST['previous_rows'])) { $previous_rows = addslashes($_POST['previous_rows']); }

if(isset($_POST['stalk_id'])) { $stalk_id = addslashes($_POST['stalk_id']); }

if(isset($_POST['testimonial_id'])) { $testimonial_id = addslashes($_POST['testimonial_id']); }

if(isset($_POST['requester_id'])) { $requester_id = addslashes($_POST['requester_id']); }

if(isset($_POST['comment_text'])) { $comment_text = addslashes($_POST['comment_text']); }











switch($mode)

{



     case 'follow_request':

    

	   if($user_id) {



      // We have a user ID, so probably a logged in user.

      // If not, we'll get an exception, which we handle below.

      try {

        $ret_obj = $facebook->api('/me/feed', 'POST',

                                    array(

                                      'link' => 'http://scribzoo.com/board.php?board='.$board,

                                      'message' => 'I have just followed board - '.$board.' on scribzoo'

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



	

	$qry_follow = "insert into board_follow set board = '$board', follower = '$follower', followed_on = NOW()"; 

	 $insert_follow = mysql_query($qry_follow);

	 

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

	 $qry = mysql_query($sel);

	

	  

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

	$verb="followed a person";

	 $qry_activity = mysql_query("insert into tbl_activity set r_id = '$accepter', s_id = '$requester',verb='$verb', date = NOW()");

	 $qry = mysql_query("insert into tbl_noti set owner = '$accepter',object='$requester', subject = 'new connection request', link_to='connections.php', seen = 'no'");

	 

	  

	break;   

	 case 'unconnect_request':

    $qry_connect = mysql_query("delete from tbl_connect where (accepter = '$accepter' and requester = '$requester') or (requester = '$accepter' and accepter = '$requester')");

	

	  

	break; 

	 case 'connect_approve':

	

    $qry_connect = mysql_query("update tbl_connect set scribzoo = '1' where accepter = '$accepter' and requester = '$requester'");

	//echo "update tbl_noti set seen = 'yes' where owner = '$owner'"; exit;

	

	 $qry = mysql_query("insert into tbl_noti set owner = '$requester', subject = 'connection confirmed', link_to='connections.php', seen = 'no', field_time = NOW()");

	 

	  //send the email

	 $qry_mail = mysql_query("select login,firstname from member where m_id = '$requester'");

	 $result_mail = mysql_fetch_array($qry_mail);

		$to = $result_mail['login'];

		$fname = $result_mail['firstname'];

		$subject= "connection confirmed";

		$from = "Scribzoo@scribzoo.com";

		

                $headers = "From: " . strip_tags($from) . "\r\n";

                $headers .= "MIME-Version: 1.0\r\n";

                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";   

                

                $body = "<html><body>";

                $body .= "<h1>Hi,  $fname </h1><h2 style='font-size:13px '>  Your connection request has been confirmed.  <br/> <a href='www.scribzoo.com/connections.php'>View here</a><br/>Scribzoo team</h2>";

                $body .= '</body></html>';

	 

	  header('Location: /stream.php');

	  

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

		

    $qry_voteup = mysql_query("UPDATE posts SET share = share+1 WHERE pid = '$testimonial_to_share'");

	$qry_track_vote = mysql_query("Insert into track_share set sharer = '$sharer', testimonial_id = '$testimonial_to_share', updatetime = NOW()");

	$verb="shared a testimonial";

	$qry_activity=mysql_query("INSERT INTO `tbl_activity`(s_id,p_id,verb) VALUES ('$sharer','$testimonial_to_share','$verb')"); 

	$result_select_owner = mysql_fetch_array(mysql_query("select m_id,login,firstname from member where login in (select s_email from posts where pid = '$testimonial_to_share')"));

	$notify_sender = $result_select_owner['m_id'];

	$email_sender = $result_select_owner['login'];

	$firstname_sender = $result_select_owner['firstname'];

	

	$result_select_sharer = mysql_fetch_array(mysql_query("select firstname,lastname,user from member where m_id = '$sharer'"));

	$sharer_name = $result_select_sharer['firstname'].' '.$result_select_sharer['lastname'];

	$fb_user = $result_select_sharer['user'];

	$qry_notify = mysql_query("insert into tbl_noti set owner = '$notify_sender', verb = '$sharer_name shared your testimonial', link_to='testimonial.php?id=$testimonial_to_share', seen = 'no', field_time = NOW()");

	 

	break;

	

	

	 

	

	 case 'vote_up':

	 

	

    $qry_voteup = mysql_query("UPDATE posts SET vote = vote+1 WHERE pid = '$testimonial_to_vote'");

	$qry_track_vote = mysql_query("Insert into track_votes set voter = '$voter', testimonial_id = '$testimonial_to_vote', update_time = NOW()");

	$verb2="voted a testimonial";

	$qry_activity=mysql_query("INSERT INTO `tbl_activity`(s_id,p_id,verb) VALUES ('$voter','$testimonial_to_vote','$verb2')"); 

	$result_select_owner = mysql_fetch_array(mysql_query("select m_id,login,firstname from member where login in (select s_email from posts where pid = '$testimonial_to_vote')"));

	$notify_sender = $result_select_owner['m_id'];

	$email_sender = $result_select_owner['login'];

	$firstname_sender = $result_select_owner['firstname'];

	

	$result_select_voter = mysql_fetch_array(mysql_query("select firstname,lastname,user from member where m_id = '$voter'"));

	$voter_name = $result_select_voter['firstname'].' '.$result_select_voter['lastname'];

	$fb_user = $result_select_voter['user'];

    $qry_notify = mysql_query("insert into tbl_noti set owner = '$notify_sender', verb = ' $voter_name voted up your testimonial', link_to='testimonial.php?id=$testimonial_to_vote', seen = 'no', field_time = NOW()");

	 

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

	 



		



	  

	break; 

	

	 case 'unvote':



    $qry_voteup = mysql_query("UPDATE posts SET vote = vote-1 WHERE pid = '$testimonial_to_vote'");

	$qry_track_vote = mysql_query("delete from track_votes where voter = '$voter' and testimonial_id = '$testimonial_to_vote'");

    $verb2='voted a testimonial';

	$qry_activity2=mysql_query("DELETE from tbl_activity where s_id='$voter' and p_id='$testimonial_to_vote' and verb='$verb2'"); 

	  

	break; 

	

	case 'load_more':

	

	?>
	<?php
function time_stamp($session_time) 
{ 
$time_difference = time() - $session_time ; 

$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 );

if($seconds<60) 
 { 
        echo "few minutes ago";
       } 
		else if($minutes<60) 
 { 	if($minutes==1)
     { echo "one minute ago"; 
        } else { 
		echo $minutes." minutes ago"; 
        
			 } } 
			else if($hours<24) 
 { 	if($hours==1)
     { 
		echo "one hour ago"; 
		} else { 
		echo $hours." hours ago";
		
			} }
 else if($days<7) 
 { 	if($days==1)
     { 
	 echo "one day ago"; 
	  } 
		else { 
		echo $days." days ago"; 
		
			 } }
 else if($weeks<4) 
 { 	if($weeks==1)
     { 
	echo "one week ago"; 
	} 
		else { 
		echo $weeks." weeks ago"; 
			 } }
 else if($months<12) 
 { 	if($months==1)
     { 
	echo "one month ago";  
		} 
		else { 
		echo $months." months ago"; 
			 } }
			else {	
		if($years==1)
     { 
		echo "one year ago";
		}
		else { 
		echo $years." years ago"; 
			 } } } 
?>



	<ul class="timeline-activity list-unstyled">



<?php

$i=0;
$j=0; 
$visitor_id=$_SESSION['SESS_MID'];





//echo "select t1.* from tbl_activity t1 where (verb='shared a testimonial' or verb='wrote a testimonial' or verb='voted a testimonial' or verb='connected to a person') and activity_id like '%,$visitor_id,%' and s_id <> '$visitor_id' order  by date desc limit $previous_rows,$next_rows"; exit;

$qry_type=mysql_query("select t1.* from tbl_activity t1 where (verb='shared a testimonial' or verb='wrote a testimonial' or verb='voted a testimonial' or verb='connected to a person') and activity_id like '%,$visitor_id,%' and s_id <> '$visitor_id' order by date desc limit $previous_rows,5");



while($result_type=mysql_fetch_array($qry_type))
{ 
$sid=$result_type['s_id'];
$previous_rows = $previous_rows+1;

$i=$i+1;
$j=$j+1;

?>
<script>
function update_count<?php echo a.$i; ?>()
{

document.getElementById('before_voting<?php echo a.$i; ?>').style.display="none";

document.getElementById('after_voting<?php echo b.$j; ?>').style.display="block";

}


function update_count_share<?php echo b.$j; ?>()
{
document.getElementById('before_sharing<?php echo c.$i; ?>').style.display="none";

document.getElementById('after_sharing<?php echo d.$j; ?>').style.display="block";
}


function update_count_reverse()

{

document.getElementById('before_voting').style.display="block";

document.getElementById('after_voting').style.display="none";


}

function update_count_reverse_share()

{document.getElementById('before_sharing').style.display="block";

document.getElementById('after_sharing').style.display="none";
}


function update_uncount()

{

document.getElementById('before_unvoting').style.display="none";

document.getElementById('after_unvoting').style.display="block";
}


function update_uncount_share()

{document.getElementById('before_unsharing').style.display="none";

document.getElementById('after_unsharing').style.display="block";
}

function update_uncount_reverse()

{

document.getElementById('before_unvoting').style.display="block";

document.getElementById('after_unvoting').style.display="none";

}
function update_uncount_reverse_share()

{
document.getElementById('before_sharing').style.display="block";

document.getElementById('after_unsharing').style.display="none";
}
</script>



  <!--shared area starts -->
  
  
<?php 
	
if($result_type['verb']=='shared a testimonial')
{ 	
		// echo "SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)"; exit;
          $qry_share=mysql_query("SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)");
		
		$result_share=mysql_fetch_array($qry_share);
		if($result_share['pid'] == '' or $result_share['title'] == '' or $result_share['hide'] == '1' or $result_share['deactive'] == '1'){
		
		continue; 
		
		}
		
		
	$qry_who=mysql_query("select firstname, lastname, m_id from member where m_id ='$sid'");
		
		$result_who=mysql_fetch_array($qry_who);
		
					 $originalDate = $result_type['date']; 
		

		
$newDate = date("d-m-Y", strtotime($originalDate));

		$testimonial_time = strtotime($newDate);
		$session_time = $testimonial_time;					
		 
		
		?>


	<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>



					<a href="profile.php?user=<?php echo $result_who['m_id'];?>" class="text-inverse no-ajaxify"><?php echo $result_who['firstname'].' '.$result_who['lastname'];?></a> Shared a Testimonial

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_share['imgname']!= '') 
{ ?>

							<a href="testimonial.php?id=<?php echo $result_share['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/<?php echo $result_share['imgname'];?>"  style="overflow:hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="testimonial.php?id=<?php echo $result_share['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

							
									
									



								



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h4 class="strong"><a href="testimonial.php?id=<?php echo $result_share['pid']; ?>" class="no-ajaxify"><?php echo $result_share['title']; ?></a></h4>
<p><span class="text-muted"><?php echo $result_share['s_name']; ?>&nbsp;<i class="fa fa-caret-right"></i>&nbsp;<?php 
		$friends_array = explode(",,", $result_share['allowed']);
		foreach($friends_array as $friend_array){
		$friend_data = explode(":",$friend_array);
		
		?><?php echo $result_share['name']; }?></span></p>


								<p><?php echo substr($result_share['description'],0,100);
								?></p>
								<a href="testimonial.php?id=<?php echo $result_share['pid']; ?>" class="no-ajaxify">Read More<BR></a>





							</div>
							
							<!--auth share -->

							
							   <div class="border-top innerAll">
        <div class="pull-left">
		
		 <!-- share code starts here--> 
		 <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
// we are getting email adress from session here
						  $result_track_share = mysql_fetch_array(mysql_query("select id from track_share where sharer = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_share['id'] < 1)

						  {

						  ?>
						  
						   
 <a href="#" return false; id="before_sharing<?php echo c.$i; ?>" style="float:right font-size:12px;" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count_share<?php echo b.$j; ?>();return false;" data-original-title="share this testimonial"><h5>&nbsp;&nbsp;Share &nbsp;</h5></a>
<p id="after_sharing<?php echo d.$j; ?>" style="float:right; font-size:12px; display:none">You shared this &nbsp;</p>
 <?php }else{ ?>
							   <a href="#" return false; id="before_unsharing" style="float:right;font-size:12px;display:none" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID']?>'); update_uncount_share(); return false;" title="share this testimonial" data-rel="tooltip">share</a>

							   <p id="after_unsharing" style="float:right;font-size:12px;">You shared &nbsp;</p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px" title="share this testimonial" data-rel="tooltip">share</a>

							   

							   <?php } ?>		  
 
 
 </span>
		 <!-- share code ends here-->  
		 
		 <!-- vote up code STARTS here--> 
		  <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
//getting session email from session

						  $result_track_vote = mysql_fetch_array(mysql_query("select id from track_votes where voter = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_vote['id'] < 1)

						  {  

						  ?>  
		   
		    
		   <a href="#" id="before_voting<?php echo a.$i; ?>" style="float:right; font-size:12px;" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count<?php echo a.$i; ?>(); return false;" data-rel="tooltip" data-original-title="Vote up this testimonial"><h5>Authenticate </h5></a>
<p id="after_voting<?php echo b.$j; ?>" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_count_reverse()" style="float:right;display:none; font-size:12px">You authenticated this <a href="#" >Unauthenticate </a></p>
 <?php }else{ ?>

							   <a href="#" id="before_unvoting" style="float:right;font-size:12px;display:none" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_uncount(); return false;" title="Vote up this testimonial" data-rel="tooltip">Authenticate</a>

							   <p id="after_unvoting" style="float:right;font-size:12px">You authenticated this  <a href="#" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_uncount_reverse(); return false;" title="Unvote this testimonial" data-rel="tooltip">Unauthenticate </a></p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px" title="Vote up this testimonial" data-rel="tooltip">Authenticate</a>

							   

							   <?php } ?>		  
		           
		  <!-- vote up ends here-->  
        </div>
		<?php 
		$qry_tooltip=mysql_query("select vote,share from posts where pid IN (select p_id from tbl_activity where p_id='{$result_type['p_id']}') ");
		$result_tooltip=mysql_fetch_array($qry_tooltip);
		?>
        <div class="pull-left" style="font-size: 12px;" >
<?php if($result_tooltip['vote']==1)
{ ?>		
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> person authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php }
else if($result_tooltip['vote']>1)  {	?>
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> people authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php } 
	else {  ?>
		<i class="fa fa-check" >&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
 <?php 	}
 ?>
	<?php if($result_tooltip['share']==1)
{ ?>
			<i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> person shared this testimonial" data-placement="right">&nbsp;&nbsp<?php echo $result_tooltip['share']; ?> </i> 
		  <?php } 
		  else if($result_tooltip['share']>1)  {  ?>
		  		 <i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> people shared this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>
		<?php }
			else { ?>
		  		 <i class="fa fa-share" >&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>			
				 <?php } ?>
           	</div>
		
	
    </div>
							
							
							
							<!--auth share ends -->

						</div>



					</div>



				</div>		



			</div>



			<div class="timeline-bottom innerT half">



				<i class="fa fa-clock-o"></i>&nbsp;<?php time_stamp($session_time);  ?> 



			</div>



		</div>



	</li>
	
	   
	
	   
	   
	   <!--upvote area starts---->
	   
	   <? }
	if($result_type['verb']=='Authenticated a testimonial')
	   {
	   
          $qry_vote=mysql_query("SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)");
		
		$result_vote=mysql_fetch_array($qry_vote);
		
		if($result_vote['pid'] == '' or $result_vote['title'] == '' or $result_vote['hide'] == '1' or $result_vote['deactive'] == '1'){
		
		continue; 
		
		}
		
		
$qry_who_up=mysql_query("SELECT firstname, lastname ,m_id from member where m_id='$sid'");
	

		$result_who_up=mysql_fetch_array($qry_who_up);
		
							 $originalDate = $result_type['date']; 
		

		
$newDate = date("d-m-Y", strtotime($originalDate));

		$testimonial_time = strtotime($newDate);
		$session_time = $testimonial_time;					
		 
		?>
	   
<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>


					<a href="profile.php?user=<?php echo $result_who_up['m_id'];?>" class="text-inverse no-ajaxify"><?php echo $result_who_up['firstname'].' '.$result_who_up['lastname'];?></a> &nbsp;Authenticated a Testimonial

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_vote['imgname']!= ''){ ?>

							<a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/<?php echo $result_vote['imgname'];?>" width:"100%" overflow:"hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

							
									
									



								



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h4 class="strong"><a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="no-ajaxify"><?php echo $result_vote['title']; ?></a></h4>
<p><span class="text-muted"><?php echo $result_vote['s_name']; ?>&nbsp;<i class="fa fa-caret-right"></i>&nbsp;<?php 
		$friends_array = explode(",,", $result_vote['allowed']);
		foreach($friends_array as $friend_array){
		$friend_data = explode(":",$friend_array);
		
		?><?php echo $result_vote['name']; }?></span></p>


								<p><?php echo substr($result_vote['description'],0,100);
								?></p>
								<a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="no-ajaxify">Read More<BR></a>

							<!--auth share -->

							
							   <div class="border-top innerAll">
        <div class="pull-left">
		
		 <!-- share code starts here--> 
		 <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
// we are getting email adress from session here
						  $result_track_share = mysql_fetch_array(mysql_query("select id from track_share where sharer = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_share['id'] < 1)

						  {

						  ?>
						  
						   
 <a href="#" return false; id="before_sharing" style="float:right;font-size:12px" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count_share();return false;" data-original-title="share this testimonial"><h5>&nbsp;&nbsp;Share &nbsp;</h5></a>
<p id="after_sharing" style="float:right;font-size:12px;display:none">You shared this &nbsp;</p>
 <?php }else{ ?>

							   <a href="#" return false; id="before_unsharing" style="float:right;font-size:12px;display:none" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID']?>'); update_uncount_share(); return false;" title="share this testimonial" data-rel="tooltip">share</a>

							   <p id="after_unsharing" style="float:right;font-size:12px">You shared &nbsp;</p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px" title="share this testimonial" data-rel="tooltip">share</a>

							   

							   <?php } ?>		  
 
 
 </span>
		 <!-- share code ends here-->  
		 
		 <!-- vote up code STARTS here--> 
		  <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
//getting session email from session

						  $result_track_vote = mysql_fetch_array(mysql_query("select id from track_votes where voter = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_vote['id'] < 1)

						  {  

						  ?>  
		   
		    
		   <a href="#" id="before_voting" style="float:right;font-size:12px" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count(); return false;" data-rel="tooltip" data-original-title="Vote up this testimonial"><h5>Authenticate </h5></a>
<p id="after_voting" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_count_reverse(); return false;" style="float:right;font-size:12px;display:none">You authenticated this <a href="#" >Unauthenticate </a></p>
 <?php }else{ ?>

							   <a href="#" id="before_unvoting" style="float:right;font-size:12px;display:none" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_uncount(); return false;" title="Vote up this testimonial" data-rel="tooltip">Authenticate</a>

							   <p id="after_unvoting" style="float:right;font-size:12px">You authenticated this  <a href="#" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_uncount_reverse(); return false;" title="Unvote this testimonial" data-rel="tooltip">Unauthenticate </a></p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px" title="Vote up this testimonial" data-rel="tooltip"><i class="icon icon-carat-1-n "></i> Authenticate</a>

							   

							   <?php } ?>		  
		           
		  <!-- vote up ends here-->  
        </div>
		<?php 
		$qry_tooltip=mysql_query("select vote,share from posts where pid IN (select p_id from tbl_activity where p_id='{$result_type['p_id']}') ");
		$result_tooltip=mysql_fetch_array($qry_tooltip);
		?>
        <div class="pull-left">
<?php if($result_tooltip['vote']==1)
{ ?>		
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> person authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php }
else if($result_tooltip['vote']>1)  {	?>
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> people authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php } 
	else {  ?>
		<i class="fa fa-check" >&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
 <?php 	}
 ?>
	<?php if($result_tooltip['share']==1)
{ ?>
			<i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> person shared this testimonial" data-placement="right">&nbsp;&nbsp<?php echo $result_tooltip['share']; ?> </i> 
		  <?php } 
		  else if($result_tooltip['share']>1)  {  ?>
		  		 <i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> people shared this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>
		<?php }
			else { ?>
		  		 <i class="fa fa-share" >&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>			
				 <?php } ?>
           	</div>
		
	
    </div>
							
							
							
							<!--auth share ends -->
							</div>



						</div>



					</div>



				</div>		



			</div>



			<div class="timeline-bottom innerT half">



				<i class="fa fa-clock-o"></i>&nbsp;<?php time_stamp($session_time);  ?>



			</div>



		</div>



	</li>
	

<!--upvote area ends-->
<?php } ?>
	
<!--connected area starts-->
<?php
if($result_type['verb']=='connected to a person')
{	
//echo "select t1.*,t2.s_id from member t1, tbl_activity t2 where m_id = '{$result_type['s_id']}' "; exit;
$qry_send=mysql_query("select t1.* from member t1 where m_id = '{$result_type['s_id']}' ");
$result_send=mysql_fetch_array($qry_send);


$qry_receive=mysql_query("select t1.* from member t1 where m_id = '{$result_type['r_id']}' ") or die(mysql_error());
$result_receive=mysql_fetch_array($qry_receive);

					 $originalDate = $result_type['date']; 
		

		
$newDate = date("d-m-Y", strtotime($originalDate));

		$testimonial_time = strtotime($newDate);
		$session_time = $testimonial_time;					
		 
?>

	<li>
		<span class="marker"></span>
		<div class="block block-inline">
			<div class="caret"></div>
			<div class="box-generic">
				<div class="timeline-top-info">
			<?php if($result_send['profile_pic']=='' && $result_receive['profile_pic']=='' )
			{ ?>
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="no-ajaxify"><img src="https://graph.facebook.com/<?php echo $result_send['user']; ?>/picture?type=large" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="no-ajaxify"><img src="https://graph.facebook.com/<?php echo $result_receive['user']; ?>/picture?type=large" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>
		<?php 	}  else if($result_send['profile_pic']=='' && $result_receive['profile_pic'] !='' )		
					{ ?>
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="no-ajaxify"><img src="https://graph.facebook.com/<?php echo $result_send['user']; ?>/picture?type=large" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="no-ajaxify"><img src="imageupload/uploads/<?php echo $result_receive['profile_pic']; ?>" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>					
		<?php   } else if($result_send['profile_pic']!='' && $result_receive['profile_pic'] =='' )		
					{ ?>
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="no-ajaxify"><img src="imageupload/uploads/<?php echo $result_send['profile_pic']; ?>" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="no-ajaxify"><img src="https://graph.facebook.com/<?php echo $result_receive['user']; ?>/picture?type=large" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>					
		<?php }  else 
					{ ?>		
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="no-ajaxify"><img src="imageupload/uploads/<?php echo $result_send['profile_pic']; ?>" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="no-ajaxify"><img src="imageupload/uploads/<?php echo $result_receive['profile_pic']; ?>" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>					
			<?php 	} ?>
					
					
					
					<div class="timeline-bottom">
						<i class="fa fa-clock-o"></i>&nbsp;<?php time_stamp($session_time);  ?> 
					</div>
				</div>
				
			</div>
		
		</div>
	</li>

	<?php } ?>	
<!--connected area ends --> 

<!-- writing area starts -->
<?php 
if($result_type['verb']=='Wrote a Testimonial')
{ 


          $qry_wrote=mysql_query("SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)");
		
		$result_wrote=mysql_fetch_array($qry_wrote);
		if($result_wrote['pid'] == '' or $result_wrote['title'] == '' or $result_wrote['hide'] == '1' or $result_wrote['deactive'] == '1'){
		
		continue; 
		
		}
		
		
$qry_who_wrote=mysql_query("SELECT firstname, lastname ,m_id from member where m_id='$sid'");
	

		$result_who_wrote=mysql_fetch_array($qry_who_wrote);
		
		 $originalDate = $result_type['date']; 
		

		
$newDate = date("d-m-Y", strtotime($originalDate));

		$testimonial_time = strtotime($newDate);
		$session_time = $testimonial_time;					
		 
		?>
	   
<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>


					<a href="profile.php?user=<?php echo $result_who_wrote['m_id'];?>" class="text-inverse no-ajaxify"><?php echo $result_who_wrote['firstname'].' '.$result_who_wrote['lastname'];?></a> &nbsp;Wrote a Testimonial with <?php 
		$friends_array = explode(",,", $result_wrote['allowed']);
		foreach($friends_array as $friend_array){
		$friend_data = explode(":",$friend_array);
		
		?><?php echo $friend_data['0']; }?>

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_wrote['imgname']!= ''){ ?>

							<a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/<?php echo $result_wrote['imgname'];?>" width:"100%" overflow:"hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

							
									
									



								



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h4 class="strong"><a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="no-ajaxify"><?php echo $result_wrote['title']; ?></a></h4>



								<p><?php echo substr($result_wrote['description'],0,100);
								?></p>
								<a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="no-ajaxify">Read More<BR></a>
							<!--auth share -->

							
							   <div class="border-top innerAll">
        <div class="pull-left">
		
		 <!-- share code starts here--> 
		 <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
// we are getting email adress from session here
						  $result_track_share = mysql_fetch_array(mysql_query("select id from track_share where sharer = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_share['id'] < 1)

						  {

						  ?>
						  
						   
 <a href="#" return false; id="before_sharing" style="float:right;font-size:12px" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count_share();return false;" data-original-title="share this testimonial"><h5>&nbsp;&nbsp;Share &nbsp;</h5></a>
<p id="after_sharing" style="float:right;font-size:12px;display:none">You shared this &nbsp;</p>
 <?php }else{ ?>

							   <a href="#" return false; id="before_unsharing" style="float:right;font-size:12px;display:none" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID']?>'); update_uncount_share(); return false;" title="share this testimonial" data-rel="tooltip"></i>share</a>

							   <p id="after_unsharing" style="float:right;font-size:12px;">You shared &nbsp;</p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px" title="share this testimonial" data-rel="tooltip"><i class="icon icon-carat-1-n "></i> share</a>

							   

							   <?php } ?>		  
 
 
 </span>
		 <!-- share code ends here-->  
		 
		 <!-- vote up code STARTS here--> 
		  <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
//getting session email from session

						  $result_track_vote = mysql_fetch_array(mysql_query("select id from track_votes where voter = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_vote['id'] < 1)

						  {  

						  ?>  
		   
		    
		   <a href="#" id="before_voting" style="float:right;font-size:12px" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count(); return false;" data-rel="tooltip" data-original-title="Vote up this testimonial"><h5>Authenticate </h5></a>
<p id="after_voting" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_count_reverse(); return false;" style="float:right;font-size:12px;display:none">You authenticated this <a href="#">Unauthenticate </a></p>
 <?php }else{ ?>

							   <a href="#" id="before_unvoting" style="float:right;display:none" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_uncount(); return false;" title="Vote up this testimonial" data-rel="tooltip"><i class="icon icon-carat-1-n "></i>Authenticate</a>

							   <p id="after_unvoting" style="float:right;font-size:12px">You authenticated this  <a href="#" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_uncount_reverse();return false;" title="Unvote this testimonial" data-rel="tooltip">Unauthenticate </a></p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px" title="Vote up this testimonial" data-rel="tooltip"><i class="icon icon-carat-1-n "></i> Authenticate</a>

							   

							   <?php } ?>		  
		           
		  <!-- vote up ends here-->  
        </div>
		<?php 
		$qry_tooltip=mysql_query("select vote,share from posts where pid IN (select p_id from tbl_activity where p_id='{$result_type['p_id']}') ");
		$result_tooltip=mysql_fetch_array($qry_tooltip);
		?>
        <div class="pull-left">
<?php if($result_tooltip['vote']==1)
{ ?>		
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> person authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php }
else if($result_tooltip['vote']>1)  {	?>
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> people authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php } 
	else {  ?>
		<i class="fa fa-check" >&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
 <?php 	}
 ?>
	<?php if($result_tooltip['share']==1)
{ ?>
			<i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> person shared this testimonial" data-placement="right">&nbsp;&nbsp<?php echo $result_tooltip['share']; ?> </i> 
		  <?php } 
		  else if($result_tooltip['share']>1)  {  ?>
		  		 <i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> people shared this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>
		<?php }
			else { ?>
		  		 <i class="fa fa-share" >&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>			
				 <?php } ?>
           	</div>
		
	
    </div>
							
							
							
							<!--auth share ends -->
							</div>



						</div>



					</div>



				</div>		



			</div>



			<div class="timeline-bottom innerT half">



				<i class="fa fa-clock-o"></i>&nbsp;<?php time_stamp($session_time);  ?> 



			</div>



		</div>



	</li>

<?php } ?>

<!-- writing area ends -->


<?php } ?>

</ul>

<a href="#" onClick="load_more('<?php echo $previous_rows; ?>'); return false;">Load more</a>



	  

	  

	  <?php break;

	  
	case 'load_more_profile':

	

	?>

<?php
function time_stamp($session_time) 
{ 
$time_difference = time() - $session_time ; 

$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 );

if($seconds<60) 
 { 
        echo "few minutes ago";
       } 
		else if($minutes<60) 
 { 	if($minutes==1)
     { echo "one minute ago"; 
        } else { 
		echo $minutes." minutes ago"; 
        
			 } } 
			else if($hours<24) 
 { 	if($hours==1)
     { 
		echo "one hour ago"; 
		} else { 
		echo $hours." hours ago";
		
			} }
 else if($days<7) 
 { 	if($days==1)
     { 
	 echo "one day ago"; 
	  } 
		else { 
		echo $days." days ago"; 
		
			 } }
 else if($weeks<4) 
 { 	if($weeks==1)
     { 
	echo "one week ago"; 
	} 
		else { 
		echo $weeks." weeks ago"; 
			 } }
 else if($months<12) 
 { 	if($months==1)
     { 
	echo "one month ago";  
		} 
		else { 
		echo $months." months ago"; 
			 } }
			else {	
		if($years==1)
     { 
		echo "one year ago";
		}
		else { 
		echo $years." years ago"; 
			 } } } 
?>



	<ul class="timeline-activity list-unstyled">



<?php 



$next_rows = $previous_rows+3;


//echo "select t1.* from tbl_activity t1 where (verb='shared a testimonial' or verb='wrote a testimonial' or verb='voted a testimonial' or verb='connected to a person') and activity_id like '%,$visitor_id,%' and s_id <> '$visitor_id' order  by date desc limit $previous_rows,$next_rows"; exit;

$qry_type=mysql_query("select t1.* from tbl_activity t1 where (verb='shared a testimonial' or verb='wrote a testimonial' or verb='Authenticated a testimonial'or verb='connected to a person') and s_id='$stalk_id' order by date desc limit $previous_rows,$previous_rows");
$previous_rows = $next_rows;


while($result_type=mysql_fetch_array($qry_type))

{

$sid=$result_type['s_id'];



?>





  <!--shared area starts -->

<?php if($result_type['verb']=='shared a testimonial' )

{ 	
		// echo "SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)"; exit;
          $qry_share=mysql_query("SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)");
		
		$result_share=mysql_fetch_array($qry_share);
		
			if($result_share['pid'] == '' or $result_share['title'] == '' or $result_share['hide'] == '1' or $result_share['deactive'] == '1'){
		
		continue; 
		
		}
		
		
	$qry_who=mysql_query("select firstname, lastname, m_id from member where m_id ='$sid'");
		
		$result_who=mysql_fetch_array($qry_who);
		
					 $originalDate = $result_type['date']; 
		

		
$newDate = date("d-m-Y", strtotime($originalDate));

		$testimonial_time = strtotime($newDate);
		$session_time = $testimonial_time;					
		 
		
		?>


	<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>



					<a href="profile.php?user=<?php echo $result_who['m_id'];?>" class="text-inverse no-ajaxify"><?php echo $result_who['firstname'].' '.$result_who['lastname'];?></a> Shared a Testimonial

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_share['imgname']!= '') 
{ ?>

							<a href="testimonial.php?id=<?php echo $result_share['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/<?php echo $result_share['imgname'];?>"  style="overflow:hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="testimonial.php?id=<?php echo $result_share['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

							
									
									



								



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h5 class="strong"><a href="testimonial.php?id=<?php echo $result_share['pid']; ?>"><?php echo $result_share['title']; ?></a></h5>



								<p><?php echo substr($result_share['description'],0,100);
								?></p>
								<a href="testimonial.php?id=<?php echo $result_share['pid']; ?>">Read More<BR></a>





							</div>
							
							<!--auth share -->

							
							   <div class="border-top innerAll">
        <div class="pull-left">
		
		 <!-- share code starts here--> 
		 <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
// we are getting email adress from session here
						  $result_track_share = mysql_fetch_array(mysql_query("select id from track_share where sharer = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_share['id'] < 1)

						  {

						  ?>
						  
						   
 <a href="#" return false; id="before_sharing" style="float:right" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count_share();return false;" data-original-title="share this testimonial"><h5>&nbsp;&nbsp;Share &nbsp;</h5></a>
<p id="after_sharing" style="float:right;display:none">You shared this &nbsp;</p>
 <?php }else{ ?>

							   <a href="#" return false; id="before_unsharing" style="float:right;display:none" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID']?>'); update_uncount_share();" title="share this testimonial" data-rel="tooltip"><i class="icon icon-carat-1-n "></i>share</a>

							   <p id="after_unsharing" style="float:right;">You shared &nbsp;</p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;" title="share this testimonial" data-rel="tooltip">share</a>

							   

							   <?php } ?>		  
 
 
 </span>
		 <!-- share code ends here-->  
		 
		 <!-- vote up code STARTS here--> 
		  <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
//getting session email from session

						  $result_track_vote = mysql_fetch_array(mysql_query("select id from track_votes where voter = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_vote['id'] < 1)

						  {  

						  ?>  
		   
		    
		   <a href="#" id="before_voting" style="float:right; font-size:12px;" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count(); return false;" data-rel="tooltip" data-original-title="Vote up this testimonial"><h5>Authenticate </h5></a>
<p id="after_voting" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_count_reverse()" style="float:right;display:none; font-size:12px">You authenticated this <a href="#" >Unauthenticate </a></p>
 <?php }else{ ?>

							   <a href="#" id="before_unvoting" style="float:right;font-size:12px;display:none" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_uncount();return false;" title="Vote up this testimonial" data-rel="tooltip">Authenticate</a>

							   <p id="after_unvoting" style="float:right;font-size:12px;">You authenticated this  <a href="#" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_uncount_reverse();return false;" title="Unvote this testimonial" data-rel="tooltip">Unauthenticate </a></p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px" title="Vote up this testimonial" data-rel="tooltip"> Authenticate</a>

							   

							   <?php } ?>		  
		           
		  <!-- vote up ends here-->  
        </div>
		<?php 
		$qry_tooltip=mysql_query("select vote,share from posts where pid IN (select p_id from tbl_activity where p_id='{$result_type['p_id']}') ");
		$result_tooltip=mysql_fetch_array($qry_tooltip);
		?>
        <div class="pull-left" style="font-size: 12px;" >
<?php if($result_tooltip['vote']==1)
{ ?>		
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> person authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php }
else if($result_tooltip['vote']>1)  {	?>
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> people authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php } 
	else {  ?>
		<i class="fa fa-check" >&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
 <?php 	}
 ?>
	<?php if($result_tooltip['share']==1)
{ ?>
			<i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> person shared this testimonial" data-placement="right">&nbsp;&nbsp<?php echo $result_tooltip['share']; ?> </i> 
		  <?php } 
		  else if($result_tooltip['share']>1)  {  ?>
		  		 <i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> people shared this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>
		<?php }
			else { ?>
		  		 <i class="fa fa-share" >&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>			
				 <?php } ?>
           	</div>
		
	
    </div>
							
							
							
							<!--auth share ends -->

						</div>



					</div>



				</div>		



			</div>



			<div class="timeline-bottom innerT half">



				<i class="fa fa-clock-o"></i>&nbsp;<?php time_stamp($session_time);  ?> 



			</div>



		</div>



	</li>
	
	   
	
	   
	   
	   <!--upvote area starts---->
	   
	   <? }

	   if($result_type['verb']=='Authenticated a testimonial')

	   {
	   
          $qry_vote=mysql_query("SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)");
		
		$result_vote=mysql_fetch_array($qry_vote);
		
			if($result_vote['pid'] == '' or $result_vote['title'] == '' or $result_vote['hide'] == '1' or $result_vote['deactive'] == '1'){
		
		continue; 
		
		}
		
$qry_who_up=mysql_query("SELECT firstname, lastname ,m_id from member where m_id='$sid'");
	

		$result_who_up=mysql_fetch_array($qry_who_up);
		
							 $originalDate = $result_type['date']; 
		

		
$newDate = date("d-m-Y", strtotime($originalDate));

		$testimonial_time = strtotime($newDate);
		$session_time = $testimonial_time;					
		 
		?>
	   
<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>


					<a href="profile.php?user=<?php echo $result_who_up['m_id'];?>" class="text-inverse no-ajaxify"><?php echo $result_who_up['firstname'].' '.$result_who_up['lastname'];?></a> &nbsp;Authenticated a Testimonial

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_vote['imgname']!= ''){ ?>

							<a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/<?php echo $result_vote['imgname'];?>" width:"100%" overflow:"hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

							
									
									



								



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h5 class="strong"><a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="no-ajaxify"><?php echo $result_vote['title']; ?></a></h5>



								<p><?php echo substr($result_vote['description'],0,100);
								?></p>
								<a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="no-ajaxify">Read More<BR></a>

							<!--auth share -->

							
							   <div class="border-top innerAll">
        <div class="pull-left">
		
		 <!-- share code starts here--> 
		 <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
// we are getting email adress from session here
						  $result_track_share = mysql_fetch_array(mysql_query("select id from track_share where sharer = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_share['id'] < 1)

						  {

						  ?>
						  
						   
 <a href="#" return false; id="before_sharing" style="float:right;font-size:12px" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count_share();return false;" data-original-title="share this testimonial"><h5>&nbsp;&nbsp;share &nbsp;</h5></a>
<p id="after_sharing" style="float:right;font-size:12px;display:none">You shared this &nbsp;</p>
 <?php }else{ ?>

							   <a href="#" return false; id="before_unsharing" style="float:right;font-size:12px;display:none" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID']?>'); update_uncount_share();return false;" title="share this testimonial" data-rel="tooltip">share</a>

							   <p id="after_unsharing" style="float:right;font-size:12px">You shared &nbsp;</p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px" title="share this testimonial" data-rel="tooltip">share</a>

							   

							   <?php } ?>		  
 
 
 </span>
		 <!-- share code ends here-->  
		 
		 <!-- vote up code STARTS here--> 
		  <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
//getting session email from session

						  $result_track_vote = mysql_fetch_array(mysql_query("select id from track_votes where voter = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_vote['id'] < 1)

						  {  

						  ?>  
		   
		    
		   <a href="#" id="before_voting" style="float:right;font-size:12px" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count(); return false;" data-rel="tooltip" data-original-title="Vote up this testimonial"><h5>Authenticate </h5></a>
<p id="after_voting" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_count_reverse();return false;" style="float:right;font-size:12px;display:none">You authenticated this <a href="#" >Unauthenticate </a></p>
 <?php }else{ ?>

							   <a href="#" id="before_unvoting" style="float:right;font-size:12px;display:none" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_uncount();return false;" title="Vote up this testimonial" data-rel="tooltip">Authenticate</a>

							   <p id="after_unvoting" style="float:right;font-size:12px;">You authenticated this  <a href="#" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_uncount_reverse();return false;" title="Unvote this testimonial" data-rel="tooltip">Unauthenticate </a></p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px;" title="Vote up this testimonial" data-rel="tooltip">Authenticate</a>

							   

							   <?php } ?>		  
		           
		  <!-- vote up ends here-->  
        </div>
		<?php 
		$qry_tooltip=mysql_query("select vote,share from posts where pid IN (select p_id from tbl_activity where p_id='{$result_type['p_id']}') ");
		$result_tooltip=mysql_fetch_array($qry_tooltip);
		?>
        <div class="pull-left">
<?php if($result_tooltip['vote']==1)
{ ?>		
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> person authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php }
else if($result_tooltip['vote']>1)  {	?>
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> people authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php } 
	else {  ?>
		<i class="fa fa-check" >&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
 <?php 	}
 ?>
	<?php if($result_tooltip['share']==1)
{ ?>
			<i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> person shared this testimonial" data-placement="right">&nbsp;&nbsp<?php echo $result_tooltip['share']; ?> </i> 
		  <?php } 
		  else if($result_tooltip['share']>1)  {  ?>
		  		 <i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> people shared this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>
		<?php }
			else { ?>
		  		 <i class="fa fa-share" >&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>			
				 <?php } ?>
           	</div>
		
	
    </div>
							
							
							
							<!--auth share ends -->
							</div>



						</div>



					</div>



				</div>		



			</div>



			<div class="timeline-bottom innerT half">



				<i class="fa fa-clock-o"></i>&nbsp;<?php time_stamp($session_time);  ?> 



			</div>



		</div>



	</li>
	

<!--upvote area ends-->
<?php } ?>

	
<!--connected area starts-->
<?
if($result_type['verb']=='connected to a person')
{	
//echo "select t1.*,t2.s_id from member t1, tbl_activity t2 where m_id = '{$result_type['s_id']}' "; exit;
$qry_send=mysql_query("select t1.* from member t1 where m_id = '{$result_type['s_id']}' ");
$result_send=mysql_fetch_array($qry_send);


$qry_receive=mysql_query("select t1.* from member t1 where m_id = '{$result_type['r_id']}' ") or die(mysql_error());
$result_receive=mysql_fetch_array($qry_receive);

					 $originalDate = $result_type['date']; 
		

		
$newDate = date("d-m-Y", strtotime($originalDate));

		$testimonial_time = strtotime($newDate);
		$session_time = $testimonial_time;					
		 
?>

	<li>
		<span class="marker"></span>
		<div class="block block-inline">
			<div class="caret"></div>
			<div class="box-generic">
				<div class="timeline-top-info">
			<?php if($result_send['profile_pic']=='' && $result_receive['profile_pic']=='' )
			{ ?>
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="no-ajaxify"><img src="https://graph.facebook.com/<?php echo $result_send['user']; ?>/picture?type=large" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="no-ajaxify"><img src="https://graph.facebook.com/<?php echo $result_receive['user']; ?>/picture?type=large" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>
		<?php 	}  else if($result_send['profile_pic']=='' && $result_receive['profile_pic'] !='' )		
					{ ?>
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="no-ajaxify"><img src="https://graph.facebook.com/<?php echo $result_send['user']; ?>/picture?type=large" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="no-ajaxify"><img src="imageupload/uploads/<?php echo $result_receive['profile_pic']; ?>" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>					
		<?php   } else if($result_send['profile_pic']!='' && $result_receive['profile_pic'] =='' )		
					{ ?>
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="no-ajaxify"><img src="imageupload/uploads/<?php echo $result_send['profile_pic']; ?>" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="no-ajaxify"><img src="https://graph.facebook.com/<?php echo $result_receive['user']; ?>/picture?type=large" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>					
		<?php }  else 
					{ ?>		
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="no-ajaxify"><img src="imageupload/uploads/<?php echo $result_send['profile_pic']; ?>" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="no-ajaxify"><img src="imageupload/uploads/<?php echo $result_receive['profile_pic']; ?>" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>					
			<?php 	} ?>
					
					
					
					<div class="timeline-bottom">
						<i class="fa fa-clock-o"></i>&nbsp;<?php time_stamp($session_time);  ?> 
					</div>
				</div>
				
			</div>
		
		</div>
	</li>

	<?php } ?>	
<!--connected area ends --> 

<?php 
if($result_type['verb']=='wrote a testimonial')
{ 


          $qry_wrote=mysql_query("SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)");
		
		$result_wrote=mysql_fetch_array($qry_wrote);
		
		if($result_wrote['pid'] == '' or $result_wrote['title'] == '' or $result_wrote['hide'] == '1' or $result_wrote['deactive'] == '1'){
		
		continue; 
		
		}
		
$qry_who_wrote=mysql_query("SELECT firstname, lastname ,m_id from member where m_id='$sid'");
	

		$result_who_wrote=mysql_fetch_array($qry_who_wrote);
		
		 $originalDate = $result_type['date']; 
		

		
$newDate = date("d-m-Y", strtotime($originalDate));

		$testimonial_time = strtotime($newDate);
		$session_time = $testimonial_time;					
		 
		?>
	   
<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>


					<a href="profile.php?user=<?php echo $result_who_wrote['m_id'];?>" class="text-inverse no-ajaxify"><?php echo $result_who_wrote['firstname'].' '.$result_who_wrote['lastname'];?></a> &nbsp;Wrote a Testimonial for <?php echo $result_wrote['r_name']; ?>

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_wrote['imgname']!= ''){ ?>

							<a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/<?php echo $result_wrote['imgname'];?>" width:"100%" overflow:"hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

							
									
									



								



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h5 class="strong"><a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="no-ajaxify"><?php echo $result_wrote['title']; ?></a></h5>



								<p><?php echo substr($result_wrote['description'],0,100);
								?></p>
								<a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="no-ajaxify">Read More<BR></a>
							<!--auth share -->

							
							   <div class="border-top innerAll">
        <div class="pull-left">
		
		 <!-- share code starts here--> 
		 <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
// we are getting email adress from session here
						  $result_track_share = mysql_fetch_array(mysql_query("select id from track_share where sharer = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_share['id'] < 1)

						  {

						  ?>
						  
						   
 <a href="#" return false; id="before_sharing" style="float:right;font-size:12px;" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count_share();return false;" data-original-title="share this testimonial"><h5>&nbsp;&nbsp;Share &nbsp;</h5></a>
<p id="after_sharing" style="float:right;font-size:12px;display:none">You shared this &nbsp;</p>
 <?php }else{ ?>

							   <a href="#" return false; id="before_unsharing" style="float:right;font-size:12px;display:none" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID']?>'); update_uncount_share();return false;" title="share this testimonial" data-rel="tooltip">share</a>

							   <p id="after_unsharing" style="float:right;font-size:12px;">You shared &nbsp;</p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px" title="share this testimonial" data-rel="tooltip">share</a>

							   

							   <?php } ?>		  
 
 
 </span>
		 <!-- share code ends here-->  
		 
		 <!-- vote up code STARTS here--> 
		  <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
//getting session email from session

						  $result_track_vote = mysql_fetch_array(mysql_query("select id from track_votes where voter = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_vote['id'] < 1)

						  {  

						  ?>  
		   
		    
		   <a href="#" id="before_voting" style="float:right;font-size:12px;" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count(); return false;" data-rel="tooltip" data-original-title="Vote up this testimonial"><h5>Authenticate </h5></a>
<p id="after_voting" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_count_reverse();return false;" style="float:right;font-size:12px;display:none">You authenticated this <a href="#" >Unauthenticate </a></p>
 <?php }else{ ?>

							   <a href="#" id="before_unvoting" style="float:right;font-size:12px;display:none" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_uncount();return false;" title="Vote up this testimonial" data-rel="tooltip">Authenticate</a>

							   <p id="after_unvoting" style="float:right;font-size:12px;">You authenticated this  <a href="#" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_uncount_reverse();return false;" title="Unvote this testimonial" data-rel="tooltip">Unauthenticate </a></p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px;" title="Vote up this testimonial" data-rel="tooltip">Authenticate</a>

							   

							   <?php } ?>		  
		           
		  <!-- vote up ends here-->  
        </div>
		<?php 
		$qry_tooltip=mysql_query("select vote,share from posts where pid IN (select p_id from tbl_activity where p_id='{$result_type['p_id']}') ");
		$result_tooltip=mysql_fetch_array($qry_tooltip);
		?>
        <div class="pull-left">
<?php if($result_tooltip['vote']==1)
{ ?>		
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> person authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php }
else if($result_tooltip['vote']>1)  {	?>
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> people authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php } 
	else {  ?>
		<i class="fa fa-check" >&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
 <?php 	}
 ?>
	<?php if($result_tooltip['share']==1)
{ ?>
			<i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> person shared this testimonial" data-placement="right">&nbsp;&nbsp<?php echo $result_tooltip['share']; ?> </i> 
		  <?php } 
		  else if($result_tooltip['share']>1)  {  ?>
		  		 <i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> people shared this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>
		<?php }
			else { ?>
		  		 <i class="fa fa-share" >&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>			
				 <?php } ?>
           	</div>
		
	
    </div>
							
							
							
							<!--auth share ends -->
							</div>



						</div>



					</div>



				</div>		



			</div>



			<div class="timeline-bottom innerT half">



				<i class="fa fa-clock-o"></i>&nbsp;<?php time_stamp($session_time);  ?> 



			</div>



		</div>



	</li>

<?php } ?>


<?php } ?>





</ul>

<a href="#" onClick="load_more_profile('<?php echo $previous_rows; ?>','<?php echo $stalk_id; ?>'); return false;">Load more</a>



	  

	  

	  <?php break;
	  
	  
	  

	   case 'comment_insert':

    $qry_comment_insert = mysql_query("insert into tbl_comment set  comment_text = '$comment_text', p_id = '$testimonial_id', mid = '$requester_id', status = 'active', comment_date = NOW()");
	
	
     $qry_fetch_comment = mysql_query("SELECT t1.firstname, t1.lastname, t1.profile_pic, t1.login,t1.user,t1.m_id,t2.id as comment_id,t2.comment_text,t2.comment_date,t2.status FROM member t1, tbl_comment t2 WHERE m_id=mid and p_id='$testimonial_id' and status='active'");
	 
	
	 
    while($result_fetch_comment = mysql_fetch_array($qry_fetch_comment))
	{
	
	  ?>

	 

	  <div class="media margin-none ">
		
		<?php 
		if($result_fetch_comment['profile_pic'] == '') {
		 $_SESSION['SESS_PROFILE_PIC'] = "http://graph.facebook.com/".$result_fetch_comment['user']."/picture?type=large";
		
		?>
            <a href="<?php echo $path ?>profile.php?user=<?php echo $result_fetch_comment['m_id']; ?>" class="pull-left innerAll"><img src="http://graph.facebook.com/<?php echo $result_fetch_comment['user']; ?>/picture?type=large" width="50" height="50" class="media-object"></a>
			<?php }else{ 
			 $_SESSION['SESS_PROFILE_PIC'] = "imageupload/uploads/".$result_fetch_comment['profile_pic'];
			
			?>
			 <a href="#" class="pull-left innerAll"><img src="imageupload/uploads/<?php echo $result_fetch_comment['profile_pic']; ?>" width="50" height="50" class="media-object"></a>
			 <?php } ?>
			
            <div class="media-body innerTB">
			<?php if((isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) && ($_SESSION['SESS_MID'] == $result_fetch_comment['m_id'])){ ?>
            <a href="#" class="pull-right innerT innerR text-muted" onClick="delete_comment('<?php echo $result_fetch_comment['comment_id']; ?>'); return false;"><i class="fa fa-times"></i></a>
			<?php } ?>
				
                <a href="<?php echo $path ?>profile.php?user=<?php echo $result_fetch_comment['m_id']; ?>" class="strong text-inverse"><?php echo $result_fetch_comment['firstname'].' '.$result_fetch_comment['lastname']; ?></a> 	<small class="text-muted ">wrote on <?php echo substr($result_fetch_comment['comment_date'],0,10); ?></small>
				 
				<?php if((isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) && ($_SESSION['SESS_MID'] != $result_fetch_comment['m_id']) && ($_SESSION['SESS_EMAIL'] == $result['s_email'] )){
				 $result_report = mysql_fetch_array(mysql_query("select id from tbl_report where sender_id = '{$_SESSION['SESS_MID']}'"));
				 if($result_report['id'] == ''){
				 ?>
					<a href="#" class="text-small" id="reportabuse<?php echo $result_fetch_comment['comment_id']; ?>" onClick="report('<?php echo $result_fetch_comment['comment_id']; ?>'); return false;">report</a>
				<?php }else{ ?>
				reported<?php } ?>
				
			<?php } ?>
                <div id="<?php echo $result_fetch_comment['comment_id']; ?>"><?php echo $result_fetch_comment['comment_text']; ?></div>
				
				
            </div>
        </div>

	  
<?php } ?>
	  <?php 
	  ####         Mail sending code
	  	$result_mailing_details = mysql_fetch_array(mysql_query("select s_email,imgname,title from posts where pid = '$testimonial_id'"));
	  	$toEmail = $result_mailing_details['s_email'];
		$fromname = $_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME'];
		$subject= $_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME']." commented on your testimonial on scribzoo";
		$fromemail = "scribzoo@scribzoo.com";
		$testimonialid= $testimonial_id;
		$imgname = $result_mailing_details['imgname'];
		$title = $result_mailing_details['title'];
		
		$qry_myfriends=mysql_query("SELECT m_id FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$_SESSION['SESS_MID']}' union SELECT requester FROM tbl_connect WHERE accepter =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1'))");
		$id_string =',';
		while($result_myfriends=mysql_fetch_array($qry_myfriends))
		{
		$id_string = $id_string.$result_myfriends['m_id'].',';
		}
		
		
		$result_noti_details = mysql_fetch_array(mysql_query("select m_id from member where login = '$toEmail'"));
		$owner_noti = $result_noti_details['m_id'];
		 $qry_notify = mysql_query("insert into tbl_noti set owner = '$owner_noti',object='{$_SESSION['SESS_MID']}' ,verb = 'commented on your testimonial', link_to='testimonial.php?id=$testimonial_id', seen = 'no', field_time = NOW(), testimonial_type='comment'");
		 $qry_activity=mysql_query("INSERT INTO `tbl_activity`(s_id,p_id,verb,activity_id,date) VALUES ('{$_SESSION['SESS_MID']}','$testimonial_id','commented on a testimonial','$id_string',now())");
		
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
	$emailBody = str_replace("#username#",$fromname,$emailBody);
    $emailBody = str_replace("#imageprofile#",$profileimg,$emailBody);
	$emailBody = str_replace("#activity#","commented on",$emailBody);
	$emailBody = str_replace("#testimonialid#",$testimonial_id,$emailBody);
	$emailBody = str_replace("#title#",$title,$emailBody);
	$emailBody = str_replace("#description#","",$emailBody);
	$emailBody = str_replace("#image#",$imgname,$emailBody);
	

	//Send email

	$emailStatus = sendEmail ( $NameOfUser ,$fromemail, $UserEmail,$subject, $emailBody);

	

	//If email function return false

	if ($emailStatus != 1) {

		echo "An error occured while sending email. Please try again later.";

	} else {

		//echo "Email with account details were sent successfully.";

	}


	  
	  ?>

	  <?php

	break; 

	  

}





?>



</body>

</html>