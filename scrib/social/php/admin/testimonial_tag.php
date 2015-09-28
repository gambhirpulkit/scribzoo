<?php  ob_start();
include 'config.php';
include 'navbar.php';



?>


<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->
<?php
$pid=$_GET['id'];
?>
<head>
 
<?php include 'header.php';
	
	?>
<script>
function update_count()

{

document.getElementById('before_voting').style.display="none";

document.getElementById('after_voting').style.display="block";
}


function update_count_share()
{
document.getElementById('before_sharing').style.display="none";

document.getElementById('after_sharing').style.display="block";
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

{document.getElementById('before_sharing').style.display="block";

document.getElementById('after_unsharing').style.display="none";
}
</script>
    
</head>


<body class=" scripts-async menu-right-hidden">

	

	<!-- Main Container Fluid -->

	<div class="container-fluid ">



		

		<!-- Content START -->

		<div id="content">

			
	



			 <div class="container"><div class="innerAll">
<?php
		
			 $qry=mysql_query("select tb1.*,tb2.m_id,tb2.profile_pic from posts tb1, member tb2 where s_email=login and pid='$pid' ") or die(mysql_error());
			 
			while($result=mysql_fetch_array($qry) or die(mysql_error()))
	{
			$s_name = $result['s_name'];
$s_email = $result['s_email'];

$profile_pic = $result['profile_pic'];
$mid = $result['m_id'];
			
	?>		 
	<div class="row">

		<div class="col-lg-9 col-md-8">

			

			<div class="timeline-cover">	
	<div class="cover">
		<div class="top">
		<div id="vasPhoto_uploads_Status" align="left" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black; line-height:25px;"></div>


<form id="vasPLUS_Programming_Blog_Form" method="post" enctype="multipart/form-data" action="javascript:void(0);" autocomplete="off">
<div class="vasplusfile_adds"><input type="file" name="vasPhoto_uploads" id="vasPhoto_uploads" style="opacity:0;-moz-opacity:0;filter:alpha(opacity:0);z-index:9999;width:90px;padding:5px;cursor:default;" /></div>

</form>
					
		</div>
		<!--ul class="list-unstyled">
			<li class="active"><a href="indexb483.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true&amp;navbar_type=navbar-inverse&amp;skin=style-default"><i class="fa fa-fw fa-clock-o"></i> <span>Timeline</span></a></li>
			<li><a href="about_1b483.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true&amp;navbar_type=navbar-inverse&amp;skin=style-default"><i class="fa fa-fw fa-user"></i> <span>About</span></a></li>
			<li><a href="media_1b483.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true&amp;navbar_type=navbar-inverse&amp;skin=style-default"><i class="fa fa-fw icon-photo-camera"></i> <span>Photos</span> <small>(102)</small></a></li>
			<li><a href="contacts_1b483.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true&amp;navbar_type=navbar-inverse&amp;skin=style-default"><i class="fa fa-fw icon-group"></i><span> Friends </span><small>(19)</small></a></li>
			<li><a href="messagesb483.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true&amp;navbar_type=navbar-inverse&amp;skin=style-default"><i class="fa fa-fw icon-envelope-fill-1"></i> <span>Messages</span> <small>(2 new)</small></a></li>
		</ul-->
	</div>
	<!--div class="widget">
		<div class="widget-body padding-none margin-none">
			<div class="innerAll">
				<i class="fa fa-quote-left text-muted pull-left fa-fw"></i> 
				<p class="lead margin-none">What a fun Partyyy</p>
			</div>
		</div>
	</div-->
</div>





		<!--	<div class="gridalicious-row" data-toggle="gridalicious" data-gridalicious-width="340" data-gridalicious-gutter="12" data-gridalicious-selector=".gridalicious-item">

				<div class="innerAll inner-2x loading text-center text-medium"><i class="fa fa-fw fa-spinner fa-spin"></i> Loading</div>

				<div class="loaded hide2"> -->



                    <!-- WIDGET START ->
<div class="widget gridalicious-item not-responsive">
    <img src="../assets/images/photodune-2755655-party-time-s.jpg" alt="" class="img-responsive"/>
    <div class="ribbon-wrapper"><div class="ribbon primary"><i class="fa fa-fw fa-star-o "></i><strong>4.8</strong></div></div>
    
</div>
<!-- // WIDGET END -->









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
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="icon-time-clock" data-toggle="tooltip" fata-placement="top" data-title="<?php echo $seconds." seconds ago"; ?>"></i></span>
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
		$session_time = $testimonial_time;
		$testimonial_time;
		 time_stamp($session_time); ?>
		<i class="fa fa-quote-left text-muted pull-left fa-fw"></i> 
        <a href="testimonial.php?id= <?php echo $result['pid'];?>" class="lead strong display-block margin-none"><?php echo $result['title']; ?></a>
		
        <span>&nbsp; &nbsp; Written by <a href="#"><?php echo $result['s_name'];  ?></a>&nbsp;for <a href="#"><?php echo $result['name'];?></a></span>
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
    <div class="innerAll border-top">
	<?php if($result['imgname']!='')
	{ ?>
	<img src="../../../../image/<?php echo $result['imgname'];?>"  class="img-responsive" ><br>
	<?php } ?>
	
	<?php if($result['description']!='')
	{ ?>
        <blockquote class="margin-none"><?php 	echo $result['description']; ?></blockquote>
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
						  
						   
 <a href="#" return false; id="before_sharing" style="float:right" onclick="share('<?php echo $pid ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count_share();return false;" data-original-title="share this testimonial"></i><h5>&nbsp;&nbsp;Share &nbsp;</h5></a>
<p id="after_sharing" style="float:right;display:none">You shared this &nbsp;</p>
 <?php }else{ ?>

							   <a href="#"return false; id="before_unsharing" style="float:right;display:none" onClick="share('<?php echo $pid ?>','<?php echo $_SESSION['SESS_MID']?>'); update_uncount_share();" title="share this testimonial" data-rel="tooltip"><i class="icon icon-carat-1-n "></i>share</a>

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
		   
		    
		   <a href="#" id="before_voting" style="float:right" onClick="vote_up('<?php echo $pid ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count(); return false;" data-rel="tooltip" data-original-title="Vote up this testimonial"></i><h5>&nbsp;&nbsp; Vote Up </h5></a>
<p id="after_voting" onClick="unvote('<?php echo $pid ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_count_reverse()" style="float:right;display:none">You voted this up &nbsp;<a href="#" >Unvote</a></p>
 <?php }else{ ?>

							   <a href="#" id="before_unvoting" style="float:right;display:none" onClick="vote_up('<?php echo $pid ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_uncount();" title="Vote up this testimonial" data-rel="tooltip"><i class="icon icon-carat-1-n "></i>Vote Up</a>

							   <p id="after_unvoting" style="float:right;">You voted this up &nbsp;<a href="#" onClick="unvote('<?php echo $pid ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_uncount_reverse()" title="Unvote this testimonial" data-rel="tooltip">Unvote</a></p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;" title="Vote up this testimonial" data-rel="tooltip"><i class="icon icon-carat-1-n "></i> Vote Up</a>

							   

							   <?php } ?>		  
		           
		  <!-- vote up ends here-->  
        </div>
        <div class="pull-left">
		
		 <i class="fa fa-angle-up">&nbsp;&nbsp;<?php echo $result['vote']; ?> &nbsp;</i>
	
			<i class="fa fa-share">&nbsp;&nbsp<?php echo $result['share']; ?> </i> 
		  
           	</div>
		<div class="pull-right">
        <div class="rating text-medium text-faded margin-top-none">
            <span class="star"></span>
            <span class="star"></span>
            <span class="star"></span>
            <span class="star active"></span>
            <span class="star"></span>
        </div>
    </div>
	
    </div>
    <div class="clearfix"></div>
    <!-- Comment -->
   
    <a href="#comments-collapse" class="innerAll border-top display-block " data-toggle="collapse" ><i class="innerLR fa fa-bars"></i> View all comments <span class="text-muted">2+ comments</span></a>

    <div class="collapse" id="comments-collapse">
        <!-- First Comment -->
        <div class="media border-bottom margin-none bg-gray">
            <a href="#" class="pull-left innerAll"><img src="../assets/images/people/50/2.jpg" width="50" class="media-object"></a>
            <div class="media-body innerTB">
                <a href="#" class="pull-right innerT innerR text-muted">
                    <i class="icon-reply-all-fill fa fa-2x "></i>
                </a>
                <a href="#" class="strong text-inverse">Adrian Demian</a> 	<small class="text-muted ">wrote on Jan 15th, 2014</small> <a href="#" class="text-small">mark it</a>
                <div>Nice place...</div>

            </div>
        </div>

        <!-- Second Comment -->
        <div class="media margin-none ">
            <a href="#" class="pull-left innerAll"><img src="../assets/images/people/50/11.jpg" width="50" class="media-object"></a>
            <div class="media-body innerTB">
                <a href="#" class="pull-right innerT innerR"><i class="icon-reply-all-fill fa fa-2x text-muted "></i></a>
                <a href="#" class="strong text-inverse">Jenny Adams</a> 	<small class="text-muted ">wrote on Jan 15th, 2014</small> <a href="#" class="text-small">mark it</a>
                <div>There is awesome...I was there last year</div>
            </div>
        </div>
    </div>
    <!--  Comment -->
    <div class="media border-top margin-none bg-gray">
        <a href="#" class="pull-left innerAll"><img src="../assets/images/people/50/2.jpg" width="50" class="media-object"></a>
        <div class="media-body innerTB">
            <a href="#" class="pull-right innerT innerR text-muted">
                <i class="icon-reply-all-fill fa fa-2x "></i>
            </a>
            <a href="#" class="strong text-inverse">Adrian Demian</a> 	<small class="text-muted ">wrote on Jan 15th, 2014</small> <a href="#" class="text-small">mark it</a>
            <div>Have a nice holiday there!</div>
        </div>
    </div>
    <div class="input-group comment">
        <input type="text" class="form-control" placeholder="Your comment here...">
        <div class="input-group-btn">
            <button type="button" class="btn btns-primary" href="#"><i class="fa fa-comment"></i></button>
        </div>
    </div>
	
	<div>
	
	
	<div class="widget">
	<div class="widget-body">
		<div class="row">
	<div class="col-md-6">
	<form>
<h5>Tagging Support</h5>
				<input type="hidden" id="select2_5" style="width: 100%;" value="brown,red,green" />	
	</form>
	</div>
	</div>
	</div>
	</div>
	
	
	</div>
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

include("follow_people.php");


?>		
</div>
				
			
			</div>
</div>

			<!-- Widget -->





		

		</div>

	</div>

</div>















<?php } ?>

	

		

				</div> 

				

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


<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/index.html?module=admin&page=index&url_rewrite=&lang=en&v=v2.0.1-rc1&layout_fixed=true&navbar_type=navbar-inverse&skin=style-default by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 19 Jun 2014 17:46:04 GMT -->

</html>