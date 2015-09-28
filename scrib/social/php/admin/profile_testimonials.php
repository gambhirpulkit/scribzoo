<?php
ob_start();
include('config.php');
?>
<!DOCTYPE html>



<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

<?php $mid=$_GET['user']; 


include('header.php');

?>
</head><body class=" scripts-async menu-right-hidden">
	
	<?php 
	$qry=mysql_query("select * from member where m_id='$mid' ");
	while($result=mysql_fetch_array($qry))
	
	{  
	?>
	
	<!-- Main Container Fluid -->
	<div class="container-fluid ">

		
		<!-- Content START -->
		<div id="content">
			
<?php include("navbar.php");
?>


			 <div class="container"><div class="innerAll">
	<div class="row">
		<div class="col-lg-9 col-md-8">
			
			<?php include('profile_cover.php');
			?>



			<div class="widget widget-gallery" data-toggle="collapse-widget">
				<div class="widget-head"><h4 class="heading">Testimonials</h4></div>
				<div class="widget-body">
					
					<!-- Gallery Layout -->
					<div class="gallery gallery-2">
						<ul class="row">
						<?php	
						
						
						$sel = "select title,imgname,s_name,pid,vote,views,date_posts from posts where s_email='{$result['login']}' and hide = '0' and anonymous = '0' and deactive_status != '1'  order by pid desc";		
$qry_test = mysql_query($sel);	
while($result_test=mysql_fetch_array($qry_test))
{ ?>		
											<li>
											<div class="col-md-3">
					<div class="widget ">
						
						<div class="thumbnail zoom border-none">
							<?php if($result_test['imgname'] != ''){ ?>
							<a href="testimonial.php?id=<?php echo $result_test['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/<?php echo $result_test['imgname']; ?>" class="img-responsive"></a>
							<?php }else{ ?>
							<a href="testimonial.php?id=<?php echo $result_test['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>
							<?php } ?>
							<div class="caption text-center">
								<a href="testimonial.php?id=<?php echo $result_test['pid']; ?>" class="strong display-block no-ajaxify"><?php echo $result_test['title']; ?></a>
								<span class="text-muted-dark"><i class="fa fa-fw fa-calendar"></i> Released:</span><?php echo substr($result_test['date_posts'],0,10); ?>
								<br><span class="text-muted-dark">By:</span><?php echo $result_test['s_name']; ?>
							</div>
							<div class="row row-merge">
				<div class="col-md-6">
					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-fw icon-comment-fill-1"></i><?php echo $result_test['vote']; ?> </a>
				</div>
				<div class="col-md-6">
					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-eye"></i><?php echo $result_test['views']; ?> </a>
				</div>
			</div>
						</div>
					</div>
				</div>
				
				</li>
				<?php }  ?> 
				<li> That's what we've got!</li>
				</ul>
					</div>
					<!-- // Gallery Layout END -->
					
				</div>
			</div>
<!--photo gallery starts-->
			<div class="widget widget-gallery" data-toggle="collapse-widget">
				<!--<div class="widget-head"><h4 class="heading">Photo Gallery</h4></div>-->
				<div class="widget-body">
			
			<!--		<!-- Tabs 
					<div class="tabsbar">
						<ul>
							<li class="glyphicons camera active"><a href="#"><i></i> View all photos <strong>(43)</strong></a></li>
							<li class="glyphicons folder_open"><a href="#"><i></i> Albums <strong>(3)</strong></a></li>
							<li class="glyphicons circle_plus tab-stacked"><a href="#"><i></i> <span>Add Photos</span></a></li>
							<li class="glyphicons folder_plus tab-stacked"><a href="#"><i></i> <span>Create Album</span></a></li>
						</ul>
					</div>-->
					<!-- // Tabs END -->
					

					<!-- gallery commented------------>


			<!-- Gallery -->
					
					<!-- // Gallery END -->
					
			<!--			<!-- Pagination -->
					
					
				</div>
			</div>
			
		</div>
		<div class="col-md-4 col-lg-3">
  <?php 

include("basic_info.php");

?>
	
<div class="widget">



			<?php include('trending_boards.php');?>

	</div>
			

		</div>
	</div>
</div>





<!-- Blueimp Gallery -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev no-ajaxify">‹</a>
    <a class="next no-ajaxify">›</a>
    <a class="close no-ajaxify">×</a>
    <a class="play-pause no-ajaxify"></a>
    <ol class="indicator"></ol>
</div>
<!-- // Blueimp Gallery END -->	
		
				</div> 
				
		</div>
		<!-- // Content END -->
		
		<div class="clearfix"></div>
		<!-- // Sidebar menu & content wrapper END -->
		
				<!-- Footer -->
		
		<!-- // Footer END -->
		
				
	</div>
	<!-- // Main Container Fluid END -->
	
	<?php } ?>
	
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

<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/media_3.html?lang=en&v=v2.0.1-rc1&layout_fixed=true by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 19 Jun 2014 10:32:23 GMT -->
</html>