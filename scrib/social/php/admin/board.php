<?php 
ob_start();
include("config.php");
$board_page = $_GET['board']; 
?>

<!DOCTYPE html>
<html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<?php include("header.php");  ?>
</head>
<body class=" scripts-async menu-right-hidden">
	
	<!-- Main Container Fluid -->
	<div class="container-fluid ">

		
		<!-- Content START -->
		<div id="content">
			
<?php include("navbar.php");
?>





			 <div class="container"><div class="innerLR">
	<h1 class="margin-none"><center><?php echo $board_page; ?></center><small class="text-muted"></small></h1><br>
	<br>
	<?php //hits

$qry_hits = mysql_query("select hits from tbl_trending where board_name = '$board_page'");

$result_hits = mysql_fetch_array($qry_hits);

$hits_update = $result_hits['hits']+1;

$update_hits = mysql_query("update tbl_trending set hits = '$hits_update' where board_name = '$board_page'");



?>
	
	
	<!-- Row -->							
	<div class="row">
		<!-- Col -->
		<div class="col-md-12">
			<!-- Start Featured -->
			<div class="row">
	<?php 		
$sel_testimonial = "select testimonial_id from board_pin where board_name = '$board_page' order by created_on desc";		
$qry_testimonial = mysql_query($sel_testimonial);
		
while($result_testimonial = mysql_fetch_array($qry_testimonial))
{
$testimonial_id = $result_testimonial['testimonial_id'];

$i = 0;
//pick friends's id from connection table

$sel = "select title,imgname,s_name,pid,vote,views from posts where pid='$testimonial_id' and deactive_status = '0' and hide != 'yes' and deactive_status = '0' order by pid desc";		
$qry = mysql_query($sel);
		
while($result = mysql_fetch_array($qry))
			{ ?>
				<div class="col-md-3">
					<div class="widget ">
						
						<div class="thumbnail zoom border-none">
							<?php if($result['imgname'] != ''){ ?>
							<a href="testimonial.php?id=<?php echo $result['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/<?php echo $result['imgname']; ?>" class="img-responsive"></a>
							<?php }else{ ?>
							<a href="testimonial.php?id=<?php echo $result['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/sample_testimonial_image.jpg" class="img-responsive"></a>
							<?php } ?>
							<div class="caption text-center">
								<a href="testimonial.php?id=<?php echo $result['pid']; ?>" class="strong display-block"><?php echo $result['title']; ?></a>
								<span class="text-muted-dark"><i class="fa fa-fw fa-calendar"></i> Released:</span> 21 January 2014
								<br><span class="text-muted-dark">By:</span><?php echo $result['s_name']; ?>
							</div>
							<div class="row row-merge">
				<div class="col-md-6">
					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-fw icon-comment-fill-1"></i><?php echo $result['vote']; ?> </a>
				</div>
				<div class="col-md-6">
					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-eye"></i><?php echo $result['views']; ?> </a>
				</div>
			</div>
						</div>
					</div>
				</div>
				<?php } } ?>
			</div>
		</div>
		
		
		<div class="clearfix"></div>
		<!-- // Sidebar menu & content wrapper END -->
		
				<!-- Footer -->
		<div id="footer" class="hidden-print">
		
	
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

        var primaryColor = '#B3998A',
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

<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/albums.html?lang=en&v=v2.0.1-rc1&layout_fixed=true&navbar_type=navbar-inverse&skin=antique-brass by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 20 Jun 2014 05:28:07 GMT -->
</html>