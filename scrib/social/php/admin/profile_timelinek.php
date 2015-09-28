<?php 
ob_start();
include("config.php");
?>
<!DOCTYPE html>
<html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<?php $mid=$_GET['user']; 
$stalked_email=$_GET['mail']; 
include("header.php"); 
$visitor_email=$_SESSION['SESS_EMAIL'];?>
</head>
<body class=" scripts-async menu-right-hidden">
	
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
	<a href="#" class="btn btn-default pull-left">Today</a>
	<div class="media-body">
		  
	</div>
</div>
<ul class="timeline-activity list-unstyled">

<?php 
$qry_type=mysql_query("select t1.* from tbl_activity t1 where (verb='shared a testimonial' or verb='wrote a testimonial' or verb='voted a testimonial') and s_id='{$result['m_id']}' order by date desc limit 10");

while($result_type=mysql_fetch_array($qry_type))
{
$sid=$result_type['s_id'];
?>


  <!--shared area starts -->
<?php if($result_type['verb']=='shared a testimonial' )
{	

          $qry_share=mysql_query("SELECT T1.*,T2.* FROM posts T1,tbl_activity T2 where pid='{$result_type['p_id']}'");
		
		$result_share=mysql_fetch_array($qry_share);
		
	$qry_who=mysql_query("select firstname, lastname from member where m_id ='$sid'");
		
		$result_who=mysql_fetch_array($qry_who);
		
		?>


	<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>



					<a href="#" class="text-inverse"><?php echo $result_who['firstname'].' '.$result_who['lastname'];?></a> Shared a Testimonial

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_share['imgname']!= ''){ ?>

							<a href="testimonial.php?id=<?php echo $result_share['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/<?php echo $result_share['imgname'];?>" width:"100%" overflow:"hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="testimonial.php?id=<?php echo $result_share['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

							
									
									



								



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h5 class="strong"><a href="testimonial.php?id=<?php echo $result_share['pid']; ?>"><?php echo $result_share['title']; ?></a></h5>



								<p><?php echo $result_share['description'];
								?></p>
								<a href="testimonial.php?id=<?php echo $result_share['pid']; ?>">Read More<BR></a>



								<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> 3.5



							</div>



						</div>



					</div>



				</div>		



			</div>



			<div class="timeline-bottom innerT half">



				<i class="fa fa-clock-o"></i> 2 days ago  <span class="innerL"><i class="fa fa-calendar fa-fw"></i> 25 Oct 2013</span>



			</div>



		</div>



	</li>
	
	   
	
	   
	   
	   <!--upvote area starts---->
	   
	   <? }
	   if($result_type['verb']=='voted a testimonial')
	   {
	   
          $qry_vote=mysql_query("SELECT T1.*,T2.* FROM posts T1,tbl_activity T2 where pid='{$result_type['p_id']}'");
		
		$result_vote=mysql_fetch_array($qry_vote);
		
$qry_whoup=mysql_query("SELECT firstname, lastname from member where m_id='$sid'");
	

		$result_whoup=mysql_fetch_array($qry_whoup);
		?>
	   
<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>


					<a href="#" class="text-inverse"><?php echo $result_whoup['firstname'].' '.$result_whoup['lastname'];?></a> &nbsp;Upvoted a Testimonial

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_vote['imgname']!= ''){ ?>

							<a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/<?php echo $result_vote['imgname'];?>" width:"100%" overflow:"hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

							
									
									



								



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h5 class="strong"><a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>"><?php echo $result_vote['title']; ?></a></h5>



								<p><?php echo $result_vote['description'];
								?></p>
								<a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>">Read More<BR></a>



								<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> 3.5



							</div>



						</div>



					</div>



				</div>		



			</div>



			<div class="timeline-bottom innerT half">



				<i class="fa fa-clock-o"></i> 2 days ago  <span class="innerL"><i class="fa fa-calendar fa-fw"></i> 25 Oct 2013</span>



			</div>



		</div>



	</li>
	

<!--upvote area ends-->
<?php } ?>
	<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i> <a href="#" class="text-inverse">mosaicpro</a> Sent a Connection Request</a> to <a href="#"><img src="../assets/images/people/80/2.jpg" width="20" /></a> <a href="#">Jane S.</a>



					<div class="timeline-bottom">



						<i class="fa fa-clock-o"></i> 6 days ago  



					</div>



				</div>



				<div class="bg-gray innerAll border-top">Good Job. Congrats and hope to see you soon.</div>



			</div>



		



		</div>



	</li>


<?php } ?>


</ul>


			
		</div>
		<div class="col-md-4 col-lg-3">

			

			<div class="widget">
	<h5 class="innerAll margin-none bg-primary">Recent</h5>
	<div class="widget-body padding-none">
		<ul class="list-group list-group-1 borders-none margin-none">
			<li class="list-group-item"><a href="#">January</a></li>
			<li class="list-group-item"><a href="#">December</a></li>
			<li class="list-group-item"><a href="#">November</a></li>
			<li class="list-group-item"><a href="#">October</a></li>
			<li class="list-group-item"><a href="#">September</a></li>
			<li class="list-group-item"><a href="#">August</a></li>
		</ul>
	</div>
</div>



			<div class="widget">
	<h5 class="innerAll margin-none border-bottom bg-gray">Followed Boards</h5>
	<div class="widget-body padding-none">
				
				<?php
				
			$fetch_followed_boards = mysql_query("select board from board_follow where follower = '{$_SESSION['SESS_MID']}' limit 5");
			while($result_followed_boards = mysql_fetch_array($fetch_followed_boards))
		{
				?>
				
				<div class="media border-bottom innerAll margin-none">
			
			<div class="media-body">
				
					<i class="fa fa-eye"></i> 4
				
				<h5 class="margin-none"><a href="#" class="text-inverse"><?php echo $result_followed_boards['board']; ?></a></h5>
				
			</div>
		</div>
				
				<?php } ?>
				
				
			</div>
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