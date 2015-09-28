<?php  ob_start();// Reporting E_NOTICE can be good too (to report uninitialized// variables or catch variable name misspellings ...)error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include 'config.php';
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if($_GET['view'] == 'first')
{
echo "saving..."; ?>

<img src="img/loading.gif" height="50px">

<?php
header( "refresh:5;url=testimonial.php?id=".$_GET['id'] );

exit;

}

?>




<!DOCTYPE html>
<html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<?php
$pid=$_GET['id'];


	$result = mysql_fetch_array(mysql_query("select anonymous,s_name,imgname, name,views,s_email from posts where pid = '$pid'"));
   
	$views = $result['views']; 

	$views = $views + 1;

	$qry_addview = mysql_query("update posts set views = $views where pid = '$pid'");

?>

<head>
  <meta property="og:image" content="imageupload/uploads_testimonial/<?php echo $result['imgname'];?>" />
<?php 
include 'header.php';
?>
 
</head>


<body class=" scripts-async menu-right-hidden">

	

	<!-- Main Container Fluid -->

	<div class="container-fluid ">



		

		<!-- Content START -->

		<div id="content">

			
	<?php 
	
	
	  if($_SESSION['SESS_MID']!='')
	  
  {
   include ('navbar.php'); 
	
  }
  else 
  {  
	  include ('navbar_nosession.php'); 
  }
	?>
	




			 <div class="container"><div class="innerAll">
<?php
		//echo "select tb1.*,tb2.m_id,tb2.profile_pic from posts tb1, member tb2 where s_email=login and pid='$pid' "; exit;
			 $qry=mysql_query("select tb1.*,tb2.m_id,tb2.profile_pic,tb2.user from posts tb1, member tb2 where tb1.s_email=tb2.login and tb1.pid='$pid' and tb1.deactive_status != '1'") or die(mysql_error());
			 
			while($result=mysql_fetch_array($qry) or die(mysql_error()))
	{
	
			$s_name = $result['s_name'];
$s_email = $result['s_email'];
$fb_username = $result['user'];
$profile_pic = $result['profile_pic'];
$mid = $result['m_id'];
$receiver_id = $result['r_email'];
		 $qry_addtotalview = mysql_query("update member set total_testimonial_views = total_testimonial_views + 1 where m_id = $mid");	
			
	?>		 
	<div class="row">

		<div class="col-lg-9 col-md-8">

		

			
                    <!-- WIDGET START -->
					
<div class="widget gridalicious-item not-responsive " >
    <!-- Info -->
    <div class="bg-gray  border-bottom innerAll">
	
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


?>

 <?php 
 if($seconds<60) 
 { ?>
        <a href="#" class="pull-right innerT text-primary">			
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="icon-time-clock" data-toggle="tooltip" fata-placement="top" data-title="<?php echo "few minutes ago"; ?>"></i></span>
        </a> 
		<?php } 
		else if($minutes<60) 
 { 	if($minutes==1)
     { ?> <a href="#" class="pull-right innerT text-primary">			
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="icon-time-clock" data-toggle="tooltip" fata-placement="top" data-title="<?php echo "one minute ago"; ?>"></i></span>
        </a>  <?php } else { ?>
		<a href="#" class="pull-right innerT text-primary">			
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="icon-time-clock" data-toggle="tooltip" fata-placement="top" data-title="<?php echo $minutes." minutes ago"; ?>"></i></span>
        </a>
			<?php } } 
			else if($hours<24) 
 { 	if($hours==1)
     { ?> <a href="#" class="pull-right innerT text-primary">			
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="icon-time-clock" data-toggle="tooltip" fata-placement="top" data-title="<?php echo "one hour ago"; ?>"></i></span>
        </a>  <?php } else { ?>
		<a href="#" class="pull-right innerT text-primary">			
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="icon-time-clock" data-toggle="tooltip" fata-placement="top" data-title="<?php echo $hours." hours ago"; ?>"></i></span>
        </a>
			<?php } }
 else if($days<7) 
 { 	if($days==1)
     { ?> <a href="#" class="pull-right innerT text-primary">			
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="icon-time-clock" data-toggle="tooltip" fata-placement="top" data-title="<?php echo "one day ago"; ?>"></i></span>
        </a>  <?php } 
		else { ?>
		<a href="#" class="pull-right innerT text-primary">			
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="icon-time-clock" data-toggle="tooltip" fata-placement="top" data-title="<?php echo $days." days ago"; ?>"></i></span>
        </a>
			<?php } }
 else if($weeks<4) 
 { 	if($weeks==1)
     { ?> <a href="#" class="pull-right innerT text-primary">			
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="icon-time-clock" data-toggle="tooltip" fata-placement="top" data-title="<?php echo "one week ago"; ?>"></i></span>
        </a>  <?php } 
		else { ?>
		<a href="#" class="pull-right innerT text-primary">			
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="icon-time-clock" data-toggle="tooltip" fata-placement="top" data-title="<?php echo $weeks." weeks ago"; ?>"></i></span>
        </a>
			<?php } }
 else if($months<12) 
 { 	if($months==1)
     { ?> <a href="#" class="pull-right innerT text-primary">			
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="icon-time-clock" data-toggle="tooltip" fata-placement="top" data-title="<?php echo "one month ago"; ?>"></i></span>
        </a>  <?php } 
		else { ?>
		<a href="#" class="pull-right innerT text-primary">			
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="icon-time-clock" data-toggle="tooltip" fata-placement="top" data-title="<?php echo $months." months ago"; ?>"></i></span>
        </a>
			<?php } }
			else {	
		if($years==1)
     { ?> <a href="#" class="pull-right innerT text-primary">			
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="icon-time-clock" data-toggle="tooltip" fata-placement="top" data-title="<?php echo "one year ago"; ?>"></i></span>
        </a>  <?php }
		else { ?>
		<a href="#" class="pull-right innerT text-primary">			
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="icon-time-clock" data-toggle="tooltip" fata-placement="top" data-title="<?php echo $years." years ago"; ?>"></i></span>
        </a>
			<?php } } } ?>
	<?php	
$originalDate = $result['date_posts']; 
		
$newDate = date("d-m-Y", strtotime($originalDate));

		$testimonial_time = strtotime($newDate);
							
	 time_stamp($testimonial_time); ?>
		
		<i class="fa fa-quote-left text-muted pull-left fa-fw"></i> 
		
        <div id="header_before_edit">
		<a href="testimonial.php?id= <?php echo $result['pid'];?>" class="lead strong display-block margin-none no-ajaxify" style="font-size:36px"><?php echo $result['title']; ?></a>
		<!----  rights to edit the testimonial give here   --->
		<?php 
		if($result['s_email'] == $_SESSION['SESS_EMAIL'])
		{
		?>
		
		<a href="#" onClick="toggle_title_testimonial();"><i class="fa fa-pencil pull-right text-muted" style="margin-right:10px;line-height:0.1" data-toggle="tooltip" fata-placement="top" data-title="Edit the header"></i> </a>
		
		<?php } ?>
		</div>
		
		<?php 
		if($result['s_email'] == $_SESSION['SESS_EMAIL'])
		{
		?>
		<div id="header_edit" style="display:none">
		<input type="text" value="<?php echo $result['title']; ?>" id="header_title"  
		style="width:30%;">
		
		<a href="#" onClick="save_title_testimonial();send_header_info_old_testimonial('<?php echo $result['pid']; ?>')" style="margin-right:10px;line-height:0.1" data-toggle="tooltip" fata-placement="top" data-title="save the header">save</a>
		</div>
		
		 <div id="header_after_edit" style="display:none">
		<div id="datadiveditedoldheader">
		</div>
		
		<a href="#" onClick="toggle_title_testimonial();"><i class="fa fa-pencil pull-right" style="margin-right:10px;line-height:0.1" data-toggle="tooltip" fata-placement="top" data-title="Edit the header"></i> </a>
		</div>
		<?php } ?>
		
	<?php if($result['r_email']=='')
	{ if($result['anonymous'] == '1') {?>
	<span>&nbsp; &nbsp; Posted by Anonymous with</span>
	<?php }else{ ?>
	        <span>
					<?php if($profile_pic == '') { ?>
		<a href="profile.php?user=<?php echo $result['m_id']; ?>"><img src="https://graph.facebook.com/<?php echo $fb_username ?>/picture?type=small" height="55" width="55" class="pull-left media-object no-ajaxify"  style="border: 5px solid white;"/></a>	

 <?php }
else {?> 
<a href="profile.php?user=<?php echo $result['m_id']; ?>"><img src="imageupload/uploads/<?php echo $profile_pic; ?>" height="55" width="55" class="pull-left media-object no-ajaxify"  style="border: 5px solid white;"/></a>	
<?php } ?>
			
			&nbsp; &nbsp; Posted by <a href="profile.php?user=<?php echo $result['m_id'];  ?>" class="no-ajaxify"><?php echo $result['s_name'];  ?></a>&nbsp;for&nbsp;<?php if($receiver_id == ''){echo $result['name']; }else{?><a href="profile.php?user=<?php echo $receiver_id; ?>" target="_blank" class="no-ajaxify"><?php echo $result['name']; ?> </a> <?php } ?>&nbsp;with</span>
	<?php } }  
		else { if($result['anonymous'] == '1'){?>	
		<span>&nbsp; &nbsp; Posted by Anonymous with</span>
		<?php }else{ ?>	
		
		<?php if($profile_pic == '') { ?>
		<a href="profile.php?user=<?php echo $result['m_id']; ?>"><img src="https://graph.facebook.com/<?php echo $fb_username ?>/picture?type=small" height="55" width="55" class="pull-left media-object no-ajaxify" style="border: 5px solid white;"/></a>	

 <?php }
else {?> 
<a href="profile.php?user=<?php echo $result['m_id']; ?>"><img src="imageupload/uploads/<?php echo $profile_pic; ?>" height="55" width="55" class="pull-left media-object no-ajaxify"  style="border: 5px solid white;"/></a>	
<?php } ?>
			
        <span>&nbsp; &nbsp; Posted by <a href="profile.php?user=<?php echo $result['m_id'];  ?>" class="no-ajaxify"><?php echo $result['s_name'];  ?></a>&nbsp;for&nbsp;<?php echo $result['name'];  ?>&nbsp;with</span>
     <?php } }?>
	 <!------------ tagged friends widget   -------->
	
	 <!----------------- tagged friends widget end -------------->
   </div>
	
    <!-- Content -->
    <!--div class="innerAll">
        <p class="lead ">Important text goes in this line!</p>
        <!--div class="innerB">
            <a href="#"><img src="../assets/images/social/100/1.jpg" alt="" class="img-post display-block-inline"/></a>
            <a href="#"><img src="../assets/images/social/100/2.jpg" alt="" class="img-post display-block-inline"/></a>
            <a href="#"><img src="../assets/images/social/100/3.jpg" alt="" class="img-post display-block-inline"/></a>
        </div>
    </div-->
	<?php if($result['hide'] == '1' && ($_SESSION['SESS_EMAIL'] != $result['s_email'] )) {?>
	<div class="innerAll border-top" style="margin-top:10px; border-top:none">
	<h3>You cannot see this content.</h3><p>The owner of this content wants it to be private.</p>
	</div>
	<?php }else{ ?>
    <div class="innerAll border-top" style="margin-top:10px; border-top:none">
	
	<?php if($result['imgname']!='')
	{ ?>
	<img src="imageupload/uploads_testimonial/<?php echo $result['imgname'];?>"  class="img-responsive" ><br>
	<?php if($result['s_email'] == $_SESSION['SESS_EMAIL']){ ?>
	<div class="pull-right">
	<a href="#modal-login" data-toggle="modal" style="font-size:15px; float:right" onClick="setTestimonialSession('<?php echo $pid; ?>')"><i class="fa fa-camera"></i>&nbsp;Replace picture</a>
	<div class="modal fade" id="modal-login">
	
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				
			</div>
			<!-- // Modal heading END -->
			<script>
			function gototab(reload)
   {
    window.location.hash = '#';
    window.location.reload(true);
   }
   </script>
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						

					 
<iframe src="testimonial_image_upload.php" width="550" height="520" frameBorder="0"></iframe>


					</div>
				</div>
				<div class="modal-footer center margin-none">
				
				<a href="#" onClick="gototab();" class="btn btn-default" data-dismiss="modal"><i class="fa fa-check"></i> Save</a>
			</div>
			</div>
			<!-- // Modal body END -->
	
		</div>
	</div>
	
</div>
	</div>
	<?php }}elseif( $result['imgname'] == '' && $result['video_id']==''){
	if($result['s_email'] == $_SESSION['SESS_EMAIL']){
	 ?>
	<div class="innerAll border-top">
	<div id="media_upload" style="height:150px;">
	
	<div class="row" style="border:1px dashed black;margin-top: 10px;padding: 50px;">

<div id="media-icon">
<div class="col-md-6">

<div class="innerAll">
			<a href="#modal-login" data-toggle="modal" style="font-size:20px; float:right" onClick="setTestimonialSession('<?php echo $pid; ?>')"><i class="fa fa-camera"></i>&nbsp;Add a picture</a>
				


							<div class="modal fade" id="modal-login">
	
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				
			</div>
			<!-- // Modal heading END -->
			<script>
			function gototab(reload)
   {
    window.location.hash = '#';
    window.location.reload(true);
   }
   </script>
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						

					 
<iframe src="testimonial_image_upload.php" width="550" height="520" frameBorder="0"></iframe>


					</div>
				</div>
				<div class="modal-footer center margin-none">
				
				<a href="#" onClick="gototab();" class="btn btn-default" data-dismiss="modal"><i class="fa fa-check"></i> Save</a>
			</div>
			</div>
			<!-- // Modal body END -->
	
		</div>
	</div>
	
</div>	

	

						</div>
		</div>

<div class="col-md-6">

<div class="innerAll">
				<a href="#modal-login-video" data-toggle="modal" style="font-size:20px;"><i class="fa fa-video-camera"></i>&nbsp;Add a video</a>
				
				<div class="modal fade" id="modal-login-video">
	
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
			<label>Add a Youtube Video</label>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				
			</div>
			<!-- // Modal heading END -->
			
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						
<input type="text" id="youtube_video_id" class="inputTitle col-md-6 form-control" style="border:2px black dashed;font-size:24px;margin-bottom:20px" placeholder="Paste url of Youtube Video here" />
					</div>
				</div>
				<div class="modal-footer center margin-none">
				
				<a href="testimonial.php?id=<?php echo $result['pid']; ?>&video=yes" onClick="save_video('<?php echo $result['pid']; ?>')" class="btn btn-default no-ajaxify"><i class="fa fa-check"></i> Save</a>
			</div>
			</div>
			<!-- // Modal body END -->
	
		</div>
	</div>
	
</div>
			</div>
		</div>

		</div>		
			
		
			</div>
	
	
	</div>
    </div>
	
	<?php } }else{ 
	if($_GET['video'] == 'yes'){
	
	$video_id = explode('=',$_SESSION['video_id']);
	
	}else{
				$video_id = explode('=',$result['video_id']);
				
				}
	?>
	<iframe width="600" height="450"
src="http://www.youtube.com/embed/<?php echo $video_id[1];?>">
</iframe>
	
	<?php } ?>
	
	<?php if($result['description']!='')
	{ ?>
        <blockquote class="margin-none" id="blockquote_before_edit"><?php 	echo $result['description']; ?></blockquote>
		
 <?php if($result['s_email'] == $_SESSION['SESS_EMAIL']){ ?>
 <a href="#" return false; onClick="toggle_body_text_testimonial(); return false;">edit&nbsp;<i class="fa fa-pencil"></i></a>
 <blockquote class="margin-none" id="blockquote_edit" style="display:none"><textarea id="blockquote_text" class="wysihtml5 form-control" style="width: 96%;" rows="5"><?php if($result['description']==''){echo "This is a demo text of your testimonial";}else{echo $result['description'];}?> </textarea><a href="#"  return false; onClick="save_body_text_testimonial();send_body_info('<?php echo $pid ?>'); return false;">save</a></blockquote>
  <blockquote class="margin-none" id="blockquote_after_edit" style="display:none">
		 <div id="datadiveditedbody">
		</div>
		</blockquote>
		<?php } ?>
		
<?php }?>
	<?php if($result['meet']!='')
	{ ?>
        <blockquote class="margin-none"><?php 	echo $result['meet']; ?></blockquote>
<?php }?>
<?php if($result['impression']!='')
	{ ?>
        <blockquote class="margin-none"><?php 	echo $result['impression']; ?></blockquote>
<?php }?>
<?php if($result['learn']!='')
	{ ?>
        <blockquote class="margin-none"><?php 	echo $result['learn']; ?></blockquote>
<?php }?>
<?php if($result['good']!='')
	{ ?>
        <blockquote class="margin-none"><?php 	echo $result['good']; ?></blockquote>
<?php }?>
<?php if($result['bad']!='')
	{ ?>
        <blockquote class="margin-none"><?php 	echo $result['bad']; ?></blockquote>
<?php }?>
<?php if($result['bestdays']!='')
	{ ?>
        <blockquote class="margin-none"><?php 	echo $result['bestdays']; ?></blockquote>
<?php }?>
<?php if($result['ling']!='')
	{ ?>
        <blockquote class="margin-none"><?php 	echo $result['ling']; ?></blockquote>
<?php }?>
<?php if($result['celebrity']!='')
	{ ?>
        <blockquote class="margin-none"><?php 	echo $result['celebrity']; ?></blockquote>
<?php }?>
<?php if($result['finalwords']!='')
	{ ?>
        <blockquote class="margin-none"><?php 	echo $result['finalwords']; ?></blockquote>
<?php }?>
<?php if($result['miss']!='')
	{ ?>
        <blockquote class="margin-none"><?php 	echo $result['miss']; ?></blockquote>
<?php }?>
<?php if($result['bestdate']!='')
	{ ?>
        <blockquote class="margin-none"><?php 	echo $result['bestdate']; ?></blockquote>
<?php }?>
<?php if($result['special']!='')
	{ ?>
        <blockquote class="margin-none"><?php 	echo $result['special']; ?></blockquote>
<?php }?>
<?php if($result['because']!='')
	{ ?>
        <blockquote class="margin-none"><?php 	echo $result['because']; ?></blockquote>
<?php }?>

 
        
    </div>
	<?php if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
	if($result['s_email'] == $_SESSION['SESS_EMAIL']){
	
	?>
	<div class="border-top innerAll">
	<div class="pull-left" style="margin-right:5px">
	<!---------------------------------------      This is an edit testimonial panel                           ------->
	
	<!---------------- This is to hide      ---->
	
	<?php if($result['hide'] == '0') {?>
	<a href="#" id="beforeHide" class="text-muted" onClick="sendHide('<?php echo $pid ?>','1'); hideHideButton_testimonial();return false;" value="">hide this testimonial</a>
	<a href="#" id="afterHide" class="text-muted" style="display:none;" onClick="sendHide('<?php echo $pid ?>','0'); showHideButton_testimonial();return false;" value="">Unhide this testimonial</a>
	<?php }else{ ?>
	<a href="#" id="beforeHide" class="text-muted" style="display:none;" onClick="sendHide('<?php echo $pid ?>','1'); hideHideButton_testimonial();return false;" value="">hide this testimonial</a>
	<a href="#" id="afterHide" class="text-muted" onClick="showHideButton_testimonial();sendHide('<?php echo $pid ?>','0');return false;" value="">Unhide this testimonial</a>
	
	<?php }  ?>
	
	<!---------------------- hide ends --------->
	</div>
	
	<div class="pull-left" style="margin-left:5px">
	<!---------------- This is to go anonymous      ---->
	
	<?php if($result['anonymous'] == '0') {?>
	<span><a href="#" id="beforeAnonymous" class="text-muted" onClick="sendAnonymous('<?php echo $pid ?>','1'); hideAnonymousButton_testimonial();return false;" value="">Go Anonymous</a>
	<a href="#" id="afterAnonymous" class="text-muted" style="display:none;" onClick="sendAnonymous('<?php echo $pid ?>','0'); showAnonymousButton_testimonial();return false;" value="">Remove Anonymous</a></span>
	<?php }else{ ?>
	<span><a href="#" id="beforeAnonymous" class="text-muted" style="display:none;" onClick="sendAnonymous('<?php echo $pid ?>','1'); hideAnonymousButton_testimonial();return false;" value="">Go Anonymous</a>
	<a href="#" id="afterAnonymous" class="text-muted" onClick="showAnonymousButton_testimonial();sendAnonymous('<?php echo $pid ?>','0');return false;" value="">Remove Anonymous</a></span>
	
	<?php }  ?>
	
	</div>
	<!---------------------- go anonymous ends --------->
	
	<!---------------- This is to delete ---->
	<?php
	
	 $mysql_result_next = mysql_fetch_array(mysql_query("select pid from posts where pid<'$pid' and s_email='{$_SESSION['SESS_EMAIL']}' limit 1"));
	
	?>
	<div class="pull-right">
	
	<a href="#modal-delete" data-toggle="modal"><i class="fa fa-trash-o text-muted"></i></a>
	<div class="modal fade" id="modal-delete">
	
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body padding-none">
				
				<!-- Form Wizard / Widget Pills -->
				<div class="wizard">
					<div class="widget margin-none border-none widget-tabs widget-wizard-pills widget-tabs-responsive">
					
						<!-- Widget heading -->
						
						<!-- // Widget heading END -->
						
						<div class="widget-body innerAll inner-2x">
							<div class="tab-content">
							
								<!-- Step 1 -->
								<div class="tab-pane active" id="tab1-3">
									<div class="row">
										
										<p>Are you sure?</p>
									</div>
								</div>
								
								
							</div>
							
							<!-- Wizard pagination controls -->
							
							<ul class="pagination margin-bottom-none pull-right">
								
								<li class="next primary"><a href="main_timeline.php" class="no-ajaxify" onClick="delete_testimonial('<?php echo $pid ?>');">Yes</a></li>
								
							</ul>
							<div class="clearfix"></div>
							<!-- // Wizard pagination controls END -->
							
						</div>
					</div>
				</div>
				<!-- // Form Wizard / Widget Pills END -->

			</div>
			<!-- // Modal body END -->
	
		</div>
	</div>
	
</div>
	</div>
	<!-------------------- delete ends----------->
	<!------------------------------------------------           edit panel ends                    ------------------>
	
	</div>
	<div class="clearfix" style="margin-bottom:10px"></div>
	<?php } } ?>
	<?php if(!isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) == '')) {?>

	
<div class="border-top innerAll">

        <div class="pull-left">
	   <a href="#modal-login" data-toggle="modal" ></i><h5>&nbsp;&nbsp;Share &nbsp;</h5></a>
	   <a  href="#modal-login" data-toggle="modal"></i><h5>&nbsp;&nbsp;Authenticate &nbsp;</h5></a>
 <div class="pull-left">
<?php if($result['vote']==1)
{ ?>		
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result['vote']; ?> person authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result['vote']; ?> &nbsp;</i>
	<?php }
else if($result['vote']>1)  {	?>
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result['vote']; ?> people authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result['vote']; ?> &nbsp;</i>
	<?php } 
	else {  ?>
		<i class="fa fa-check" >&nbsp;&nbsp;<?php echo $result['vote']; ?> &nbsp;</i>
 <?php 	}
 ?>
	<?php if($result['share']==1)
{ ?>
			<i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result['share']; ?> person shared this testimonial" data-placement="right">&nbsp;&nbsp<?php echo $result['share']; ?> </i> 
		  <?php } 
		  else if($result['share']>1)  {  ?>
		  		 <i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result['share']; ?> people authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result['share']; ?> &nbsp;</i>
		<?php }
			else { ?>
		  		 <i class="fa fa-share" >&nbsp;&nbsp;<?php echo $result['share']; ?> &nbsp;</i>			
				 <?php } ?>
           	</div>
</div>
</div>
	
<!-- Modal -->
<div class="modal fade" id="modal-login">
	
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Login</h3>
			</div>
			<!-- // Modal heading END -->
			
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						<form class="form-horizontal" role="form" action="login_exec.php" method="post" >
    
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name= "email" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control"  name="password" id="password" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div><br>
		<center><p> </p></center>
		<div class="col-sm-offset-2 col-sm-10">
           <a href="fbconnect.php" class="fb-login">Log In with Facebook</a><BR>
        </div>
    </div>
</form>




					</div>
				</div>
			</div>
			<!-- // Modal body END -->
	
		</div>
	</div>
	
</div>
<?php	}else {?>
	
     <div class="border-top innerAll">
        <div class="pull-left">
		
		 <!-- share code starts here--> 
		 <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
// we are getting email adress from session here
						  $result_track_share = mysql_fetch_array(mysql_query("select id from track_share where sharer = '{$_SESSION['SESS_MID']}' and testimonial_id = '$pid'")); 

						  if($result_track_share['id'] < 1)

						  {

						  ?>
						  
						   
 <a href="#" return false; id="before_sharing" style="float:right" onClick="share('<?php echo $pid ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count_share();return false;" data-original-title="share this testimonial"></i><h5>&nbsp;&nbsp;Share &nbsp;</h5></a>
<p id="after_sharing" style="float:right;display:none">You shared this &nbsp;</p>
 <?php }else{ ?>

							   <a href="#" return false; id="before_unsharing" style="float:right;display:none" onClick="share('<?php echo $pid ?>','<?php echo $_SESSION['SESS_MID']?>'); update_uncount_share(); return false;" title="share this testimonial" data-rel="tooltip"><i class="icon icon-carat-1-n "></i>share</a>

							   <p id="after_unsharing" style="float:right;">You shared &nbsp;</p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;" title="share this testimonial" data-rel="tooltip"><i class="icon icon-carat-1-n "></i> share</a>

							   

							   <?php } ?>		  
 
 
 </span>
		 <!-- share code ends here-->  
		 
		 <!-- vote up code STARTS here--> 
		  <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
//getting session email from session

						  $result_track_vote = mysql_fetch_array(mysql_query("select id from track_votes where voter = '{$_SESSION['SESS_MID']}' and testimonial_id = '$pid'")); 

						  if($result_track_vote['id'] < 1)

						  {  

						  ?>  
		   
		    
		   <a href="#" id="before_voting" style="float:right" onClick="vote_up('<?php echo $pid ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count(); return false;" data-rel="tooltip" data-original-title="Vote up this testimonial"></i><h5>&nbsp;&nbsp; Authenticate </h5></a>
<p id="after_voting" onClick="unvote('<?php echo $pid ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_count_reverse(); return false;" style="float:right;display:none">You authenticated this  &nbsp;<a href="#" >Unauthenticate &nbsp;</a></p>
 <?php }else{ ?>

							   <a href="#" id="before_unvoting" style="float:right;display:none" onClick="vote_up('<?php echo $pid ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_uncount(); return false;" title="Vote up this testimonial" data-rel="tooltip"><i class="icon icon-carat-1-n "></i>Authenticate</a>

							   <p id="after_unvoting" style="float:right;">You authenticated this &nbsp;<a href="#" onClick="unvote('<?php echo $pid ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_uncount_reverse(); return false;" title="Unvote this testimonial" data-rel="tooltip">Unauthenticate &nbsp;</a></p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;" title="Vote up this testimonial" data-rel="tooltip"><i class="icon icon-carat-1-n "></i> Authenticate</a>

							   

							   <?php } ?>		  
		           
		  <!-- vote up ends here-->  
        </div>
        <div class="pull-left">
<?php if($result['vote']==1)
{ ?>		
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result['vote']; ?> person authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result['vote']; ?> &nbsp;</i>
	<?php }
else if($result['vote']>1)  {	?>
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result['vote']; ?> people authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result['vote']; ?> &nbsp;</i>
	<?php } 
	else {  ?>
		<i class="fa fa-check" >&nbsp;&nbsp;<?php echo $result['vote']; ?> &nbsp;</i>
 <?php 	}
 ?>
	<?php if($result['share']==1)
{ ?>
			<i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result['share']; ?> person shared this testimonial" data-placement="right">&nbsp;&nbsp<?php echo $result['share']; ?> </i> 
		  <?php } 
		  else if($result['share']>1)  {  ?>
		  		 <i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result['share']; ?> people authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result['share']; ?> &nbsp;</i>
		<?php }
			else { ?>
		  		 <i class="fa fa-share" >&nbsp;&nbsp;<?php echo $result['share']; ?> &nbsp;</i>			
				 <?php } ?>
           	</div>
		
	<div class="pull-right">
	<span data-toggle="tooltip" data-original-title="<?php echo $result['views']; ?> views" data-placement="right"><i class="fa fa-eye"></i>&nbsp;<?php echo $result['views']?></span>
	</div>
    </div>
	<?php } ?>	
	
    <div class="clearfix"></div>
    <!-- Comment -->
	
	
	<?php 
  $qry_fetch_comment = mysql_query("SELECT t1.firstname, t1.lastname,t1.m_id, t1.profile_pic, t1.user,t2.id as comment_id,t2.status,t2.comment_text,t2.comment_date FROM member t1, tbl_comment t2 WHERE m_id=mid and p_id=$pid and status='active'");
 
  ?>
	 <a href="#comments-collapse" class="innerAll border-top display-block " data-toggle="collapse" ><i class="innerLR fa fa-bars"></i> View all comments <span class="text-muted"><?php echo mysql_num_rows($qry_fetch_comment); ?> <?php if(mysql_num_rows($qry_fetch_comment) == 1){?>comment<?php }else{ ?>comments <?php } ?></span></a>

  
    <div class="collapse" id="comments-collapse">
        <!-- First Comment -->
         <?php 
   $i == 0;
   while($result_fetch_comment = mysql_fetch_array($qry_fetch_comment))
{
$i = $i+1;
   ?>
   

        <!-- Second Comment -->
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
				 
				<?php if((isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) && ($_SESSION['SESS_MID'] != $result_fetch_comment['m_id']) && ($_SESSION['SESS_EMAIL'] == $result['s_email'] )){  $result_report = mysql_fetch_array(mysql_query("select id from tbl_report where sender_id = '{$_SESSION['SESS_MID']}'"));
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
    </div>
    <!--  Comment -->
   
	<?php if(!isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) == '')) {?>
<a href="#modal-login" data-toggle="modal" ></i><h5>&nbsp;&nbsp;Please login to add comments &nbsp;</h5></a>

<?php }else { ?>
	<div id="add_comment">
	</div>
    <div class="input-group comment">
        <input type="text" class="form-control" id="comment_button"  placeholder="Your comment here..."   >
        <div class="input-group-btn">
            <button type="button" class="btn btn-primary" id="comments-collapse" onClick="comment_insert('<?php echo $pid ?>','<?php echo $_SESSION['SESS_MID']; ?>'); comment_collapse();  "  href="#"><i class="fa fa-comment"></i></button>
        </div>
    </div>
	<?php } }?>
</div>
<!-- // WIDGET END -->




			<!--	</div>

			</div>  -->



		</div>



		<div class="col-md-4 col-lg-3">



			<!-- WIDGET START -->
<div class="widget">
    <?php 

include("trending_boards.php");

?>
</div>
<!-- // WIDGET END -->





			<div class="widget">
    <?php 

include("related_testimonial.php");


?>		




		

		</div>
				
				<div class="widget">
    <?php 
 if($_SESSION['SESS_MID']!=''){
include("follow_people.php");
}


?>		
</div>
				
			
			</div>
</div>

			<!-- Widget -->





		

		</div>
		<?php } ?>

	</div>

</div>














		

				</div> 

				

		</div>

		<!-- // Content END -->

		

		<div class="clearfix"></div>

		<!-- // Sidebar menu & content wrapper END -->

		

				<!-- Footer -->

		<div id="footer" class="hidden-print">

			

			<!--  Copyright Line -->

			

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


<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/index.html?module=admin&page=index&url_rewrite=&lang=en&v=v2.0.1-rc1&layout_fixed=true&navbar_type=navbar-inverse&skin=style-default by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 19 Jun 2014 17:46:04 GMT -->

</html>