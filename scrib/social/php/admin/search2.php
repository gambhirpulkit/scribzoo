<?php  ob_start();// Reporting E_NOTICE can be good too (to report uninitialized// variables or catch variable name misspellings ...)error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include 'config.php';
session_start();
$query = $_GET['query'];

$keyword=$_GET['keyword'];
$source=$_GET['src'];
			
		
?>



<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->

<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/search.html?module=admin&page=search&url_rewrite=&lang=en&v=v2.0.1-rc1&skin=burnt-sienna&layout_fixed=true&navbar_type=navbar-inverse by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 20 Jun 2014 06:54:09 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <?php include 'header.php';
?>
</head>
<body class=" scripts-async menu-right-hidden">
	
	<!-- Main Container Fluid -->
	<div class="container-fluid ">

		
		<!-- Content START -->
		<div id="content">
		
	<?php include ('navbar.php'); ?>

			 <div class="container"><div class="innerLR">

	<h3></h3>
	<div class="separator-h"></div>

	<div class="row">
		<div class="col-md-9">
		
			<div class="widget widget-tabs">
				
				<div class="widget-body">
					<div class="tab-content">
					
			<?php 
			if($source=='hashtag')
			{
			?>
					
						<div class="tab-pane active" id="search-simple">
							<div class="widget widget-heading-simple widget-body-simple text-right">
	
</div>
<div class="innerAll border-bottom"></div>

<?php
$sel = "select * from posts where description like '%$keyword%'";
$qry = mysql_query($sel);
while($result_test = mysql_fetch_array($qry))
 {  $pid = $result_test['pid'];
 $img = $result_test['imgname'];
 $title=$result_test['title'];
 $description=$result_test['description']; ?>
<div class="media">	
	<a href="testimonial.php?id=<?php echo $pid?>" class="pull-left"><img src="imageupload/uploads_testimonial/<?php echo $img ?>" alt="Image" style= "height:100px; width:100px; overflow:hidden;" class="img-responsive" /></a>
	<div class="media-body innerTB half">
		<h5 class="strong text-uppercase"><?php echo $title;?></h5>
		<p class="margin-none"><?php echo $description;?> <a href="testimonial.php?id=<?php echo $pid?>"><i class="fa fa-fw fa-arrow-right"></i> read more</a></p>
	</div>
</div>


<?php } ?>	







						</div>
						
					<?php } ?>
						
						
					
						
						<div class="tab-pane" id="search-users">
							<div class="widget widget-heading-simple widget-body-simple text-right">
	
</div>
<div class="widget widget-heading-simple widget-body-white margin-none">

	<table class="table table-vertical-center border-bottom">
		<thead>
			
		</thead>
		<tbody>
		
		<?php
$sel = "select * from member where firstname like '%$query%' or lastname like '%$query%' or login like '%$query%'";
$qry = mysql_query($sel);
while($result = mysql_fetch_array($qry))
{
$firstname = $result['firstname'];
$lastname  = $result['lastname'];
$login     = $result['login'];
$mid       = $result['m_id'];
$fb_id = $result['user']; ?>
				<div class="col-md-12 col-lg-6 bg-white border-bottom">
		<div class="row">

			<div class="col-sm-9">
				<div class="media">
					<?php 
				if($result['profile_pic'] == '') { ?>
					<a class="pull-left margin-none" href="profile.php?user=<?php echo $mid ; ?>">
						<img class="img-clean" src="http://graph.facebook.com/<?php echo $result['user']; ?>/picture?type=large" alt="..." style="height:100px; width:100px; overflow:hidden;">
					</a>
					
					 <?php }
					 else {?>
			<a class="pull-left margin-none" href="profile.php?user=<?php echo $mid; ?>">
						<img class="img-clean" src="imageupload/uploads/<?php echo $result['profile_pic'];?>" alt="..." style="height:100px; width:100px; overflow:hidden;">
					</a>
<?php } ?>					
					<div class="media-body innerAll inner-2x padding-right-none padding-bottom-none">
						 <h4 class="media-heading"><a href="profile.php?user=<?php echo $mid ?>" class="text-inverse"><?php echo $firstname.' '.$lastname?></a></h4>
						 <p>
						 	<!-- <span class="text-success strong"><i class="fa fa-check"></i> Friend</span> &nbsp;  -->
						 	<i class="fa fa-fw fa-map-marker text-muted"></i> Living in Tennessee, USA</p> 
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="innerAll text-right">
					<div class="btn-group-vertical btn-group-sm">
						<a href="#" class="btn btn-primary"><i class="fa fa-fw fa-thumbs-up"></i> Like</a>
						<a href="#" class="btn btn-default" data-toggle="sidr-open" data-menu="menu-right"><i class="fa fa-fw fa-envelope-o"></i> Chat</a>
					</div>
				</div>
			</div>
		</div>
	
	</div>
			
			
			
		</tbody>
		<?php } ?>	
	</table>
	
</div>









						</div>
						
					</div>
				</div>
			</div>
			
		</div>
		<div class="col-md-3">
				
			<?php include('trending_boards.php');
			?>
		






			<div class="separator-h"></div>
		
			<!-- Widget -->
<div class="widget margin-none">
		
    <?php 

include("follow_people.php");


?>	
</div>
<!-- // Widget END -->
			
		</div>
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

        var primaryColor = '#E4968A',
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

<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/search.html?module=admin&page=search&url_rewrite=&lang=en&v=v2.0.1-rc1&skin=burnt-sienna&layout_fixed=true&navbar_type=navbar-inverse by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 20 Jun 2014 06:54:09 GMT -->
</html>