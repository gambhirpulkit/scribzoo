<?php 
ob_start();
include("config.php");
?>
<!DOCTYPE html>
<html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<?php $mid=$_GET['user']; 
include("header.php"); 
$visitor_email=$_SESSION['SESS_EMAIL'];?>
</head>
<body class=" scripts-async menu-right-hidden">
<script>
function hide_loadmore_profile()

{

document.getElementById('loadmore1').style.display="none";

}
</script>	
	<!-- Main Container Fluid -->
	<div class="container-fluid ">

		
		<!-- Content START -->
		<div id="content">
			
	
<?php
include("navbar.php");
?>
<?php	 $qry=mysql_query("select * from member where m_id='$mid' ") or die(mysql_error());			 			
	while($result=mysql_fetch_array($qry) or die(mysql_error()))	{ ?>

			 <div class="container"><div class="innerAll">
	<div class="row">
		<div class="col-lg-9 col-md-8">
			<?php 
include('profile_cover.php');
?>

			
			<div class="media">
	<a href="#" class="btn btn-default pull-left">News Feed</a>
	<div class="media-body">
		  
	</div>
</div>


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

$qry_type=mysql_query("select t1.* from tbl_activity t1 where (verb='shared a testimonial' or verb='Wrote a Testimonial' or verb='Authenticated a testimonial' or verb='connected to a person') and s_id='{$result['m_id']}' order by date desc limit 3");

while($result_type=mysql_fetch_array($qry_type))
{
$sid=$result_type['s_id'];
$previous_rows = $previous_rows+1;


?>


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



					<a href="profile.php?user=<?php echo $result_who['m_id'];?>" class="text-inverse"><?php echo $result_who['firstname'].' '.$result_who['lastname'];?></a> Shared a Testimonial

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_share['imgname']!= '') 
{ ?>

							<a href="testimonial.php?id=<?php echo $result_share['pid']; ?>" class="innerAll half display-block"><img src="imageupload/uploads_testimonial/<?php echo $result_share['imgname'];?>"  style="overflow:hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="testimonial.php?id=<?php echo $result_share['pid']; ?>" class="innerAll half display-block"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>


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


					<a href="profile.php?user=<?php echo $result_who_up['m_id'];?>" class="text-inverse"><?php echo $result_who_up['firstname'].' '.$result_who_up['lastname'];?></a> &nbsp;Authenticated a Testimonial

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_vote['imgname']!= ''){ ?>

							<a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="innerAll half display-block"><img src="imageupload/uploads_testimonial/<?php echo $result_vote['imgname'];?>" width:"100%" overflow:"hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="innerAll half display-block"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

							
									
									



								



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h5 class="strong"><a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>"><?php echo $result_vote['title']; ?></a></h5>



								<p><?php echo substr($result_vote['description'],0,100);
								?></p>
								<a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>">Read More<BR></a>

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
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>"><img src="https://graph.facebook.com/<?php echo $result_send['user']; ?>/picture?type=large" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>"><img src="https://graph.facebook.com/<?php echo $result_receive['user']; ?>/picture?type=large" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>
		<?php 	}  else if($result_send['profile_pic']=='' && $result_receive['profile_pic'] !='' )		
					{ ?>
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>"><img src="https://graph.facebook.com/<?php echo $result_send['user']; ?>/picture?type=large" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>"><img src="imageupload/uploads/<?php echo $result_receive['profile_pic']; ?>" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>					
		<?php   } else if($result_send['profile_pic']!='' && $result_receive['profile_pic'] =='' )		
					{ ?>
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>"><img src="imageupload/uploads/<?php echo $result_send['profile_pic']; ?>" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>"><img src="https://graph.facebook.com/<?php echo $result_receive['user']; ?>/picture?type=large" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>					
		<?php }  else 
					{ ?>		
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>"><img src="imageupload/uploads/<?php echo $result_send['profile_pic']; ?>" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>"><img src="imageupload/uploads/<?php echo $result_receive['profile_pic']; ?>" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>					
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


					<a href="profile.php?user=<?php echo $result_who_wrote['m_id'];?>" class="text-inverse"><?php echo $result_who_wrote['firstname'].' '.$result_who_wrote['lastname'];?></a> &nbsp;Wrote a Testimonial for <?php echo $result_wrote['r_name']; ?>

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_wrote['imgname']!= ''){ ?>

							<a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="innerAll half display-block"><img src="imageupload/uploads_testimonial/<?php echo $result_wrote['imgname'];?>" width:"100%" overflow:"hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="innerAll half display-block"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

							
									
									



								



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h5 class="strong"><a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>"><?php echo $result_wrote['title']; ?></a></h5>



								<p><?php echo substr($result_wrote['description'],0,100);
								?></p>
								<a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>">Read More<BR></a>
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

<!-- writing area ends -->


<?php } ?>

</ul>

<a href="#" id="loadmore1" onClick="load_more_profile('<?php echo $previous_rows; ?>','<?php echo $mid; ?>'); hide_loadmore_profile(); return false;">Load more</a>
<div id="load_more_profile">
</div>
		
<br/>
<br/>

			
		</div>
		<div class="col-md-4 col-lg-3">

			  <?php 

include("basic_info.php");

?>
	
			<div class="widget">
	  <?php 

include("trending_boards.php");

?>
	
</div>

		</div>
	</div>
</div>

	
		
				</div> 								<?php } ?>
				
		</div>
		<!-- // Content END -->
		
		<div class="clearfix"></div>
		<!-- // Sidebar menu & content wrapper END -->
		
				<!-- Footer -->
		<div id="footer" class="hidden-print">
			
			<!--  Copyright Line -->
			<div class="copy">&copy; 2012 - 2014 - <a href="http://www.mosaicpro.biz/">MosaicPro</a> - All Rights Reserved. <a href="http://themeforest.net/?ref=mosaicpro" target="_blank">Purchase Social Admin Template</a> - Current version: v2.0.1-rc1 / <a target="_blank" href="http://cdn2.mosaicpro.biz/social/CHANGELOG.txt?v=v2.0.1-rc1">changelog</a></div>
			<!--  End Copyright Line -->
	
		</div>
		<!-- // Footer END -->
		
				
	</div>
	<!-- // Main Container Fluid END -->
	
    <!-- Global -->
    <script data-id="App.Config">
                var basePath = '',
            commonPath = 'http://cdn2.mosaicpro.biz/social/php/assets/',
            rootPath = 'http://cdn2.mosaicpro.biz/social/php/',
            DEV = false,
            componentsPath = 'http://cdn2.mosaicpro.biz/social/php/assets/components/';

        var primaryColor = '#25ad9f',
            dangerColor = '#b55151',
            successColor = '#609450',
            infoColor = '#4a8bc2',
            warningColor = '#ab7a4b',
            inverseColor = '#45484d';

        var themerPrimaryColor = primaryColor;

                App.Config = {
            ajaxify_menu_selectors: ['#menu'],
            ajaxify_layout_app: false        };
            </script>

    
</body>

<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/timeline_3.html?lang=en&v=v2.0.1-rc1&layout_fixed=true by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 19 Jun 2014 10:31:21 GMT -->
</html>