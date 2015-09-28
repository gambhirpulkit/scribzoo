<?php 

ob_start();

include("config.php");

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

	<div class="innerB">

			<div class="clearfix"></div>

		</div>



	<!-- row- -->

<!-- // WIDGET END -->

		<div class="col-md-8">



			<?php		



		$qry=mysql_query("select title,s_name,views,imgname from posts order by views desc")

    or die(mysql_error());

		

		?>

		

		

<div class="widget">

				

					<div id="news-featured-1" class="owl-carousel owl-theme">

		<div class="item">

			<div class="box-generic padding-none margin-none overflow-hidden">

		<div class="row row-merge bg-gray">



		<?php

		$i=0;

		while($i<3)

		{ $i=$i+1;

		?>

		<?php 

$result=mysql_fetch_array($qry);

?>

			<div class="col-md-4">

			<div class="ribbon-wrapper"><div class="ribbon danger">Popular</div></div>

				<div class="thumbnail zoom border-none">

				<?php if($result['imgname'] != ''){ ?>

							<a href="#" class="innerAll half display-block"><img src="../../../../image/<?php echo $result['imgname']; ?>" class="img-responsive"></a>

							<?php }else{ ?>

							<a href="#" class="innerAll half display-block"><img src="../../../../image/sample_testimonial_image.jpg" class="img-responsive"></a>

							<?php } ?>

							<div class="caption text-center">

								<a href="board_page.html" class="strong display-block"><?php echo $result['title']; ?></a>

								<span class="text-muted-dark"><i class="fa fa-fw fa-calendar"></i> Released:</span> 21 January 2014

								<br><span class="text-muted-dark">By:</span><?php echo $result['s_name']; ?>

							</div>

							

						</div><div class="row row-merge">

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-fw icon-comment-fill-1"></i> 686</a>

				</div>

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-fw icon-star-fill"></i> 103</a>

				</div>

			</div>

			</div>





	<?php } ?>



		</div>

	</div>

	</div>

		<div class="item">

		<div class="row row-merge bg-gray">

			<?php

		

		while($i<6 && $i>=3)

		{ $i=$i+1;

		?>

		<?php 

$result=mysql_fetch_array($qry);

?>

			<div class="col-md-4">

				

						<div class="thumbnail zoom border-none">

						<div class="ribbon-wrapper"><div class="ribbon danger">Popular</div></div>

							<?php if($result['imgname'] != ''){ ?>

							<a href="#" class="innerAll half display-block"><img src="../../../../image/<?php echo $result['imgname']; ?>" class="img-responsive"></a>

							<?php }else{ ?>

							<a href="#" class="innerAll half display-block"><img src="../../../../image/sample_testimonial_image.jpg" class="img-responsive"></a>

							<?php } ?>

							<div class="caption text-center">

								<a href="board_page.html" class="strong display-block"><?php echo $result['title']; ?></a>

								<span class="text-muted-dark"><i class="fa fa-fw fa-calendar"></i> Released:</span> 21 January 2014

								<br><span class="text-muted-dark">By:</span><?php echo $result['s_name']; ?>

							</div>

							<div class="row row-merge">

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-fw icon-comment-fill-1"></i> 686</a>

				</div>

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-fw icon-star-fill"></i> 103</a>

				</div>

			</div>

						</div>

					

			</div>

			<?php } ?>

		</div>

	</div>

		<div class="item">

		<div class="row row-merge bg-gray">

		<?php

		

		while($i<9 && $i>=6)

		{ $i=$i+1;

		?>

		<?php 

$result=mysql_fetch_array($qry);

?>

		

			<div class="col-md-4">

			<div class="ribbon-wrapper"><div class="ribbon danger">Popular</div></div>

				<div class="thumbnail zoom border-none">

				<?php if($result['imgname'] != ''){ ?>

							<a href="#" class="innerAll half display-block"><img src="../../../../image/<?php echo $result['imgname'];?>" width:"100%" overflow:hidden class="img-responsive"></a>

							<?php }else{ ?>

							<a href="#" class="innerAll half display-block"><img src="../../../../image/sample_testimonial_image.jpg" class="img-responsive"></a>

							<?php } ?>

							<div class="caption text-center">

								<a href="board_page.html" class="strong display-block"><?php echo $result['title']; ?></a>

								<span class="text-muted-dark"><i class="fa fa-fw fa-calendar"></i> Released:</span> 21 January 2014

								<br><span class="text-muted-dark">By:</span><?php echo $result['s_name']; ?>

							</div>

							<div class="row row-merge">

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-fw icon-comment-fill-1"></i> 686</a>

				</div>

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-fw icon-star-fill"></i> 103</a>

				</div>

			</div>

						</div>

			</div>



		<?php } ?>	

		</div>

	

	</div>



</div>

</div>



		



		



				







	<div class="media">



	<a href="#" class="btn btn-default pull-left">Today</a>



	<div class="media-body">



		  



	</div>



</div>







<ul class="timeline-activity list-unstyled">







	<li class="active">



		<div class="block block-inline">



			<span class="marker"></span>



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info border-bottom">



					<i class="fa fa-user"></i> <a href="#" class="text-inverse">mosaicpro</a> replied to <a href="#" class="text-info">Having A Great Day!</a> from <a href="#"><img src="../assets/images/people/80/8.jpg" alt="photo" width="20"></a> <a href="#">Andrew M.</a>



					<div class="timeline-bottom">



						<i class="fa fa-clock-o"></i> 2 days ago 



					 



					</div>



				</div>



				<div class="media innerAll  bg-gray margin-none">



			        <a class="pull-left" href="#"><img src="../assets/images/people/80/8.jpg" alt="photo" class="media-object" width="35"></a>



			        <div class="media-body">



			          	<a href="#" class="strong text-inverse">Andrew</a> Good Job. Congrats and hope to see more admin templates like this in the future.



		     			<div class="timeline-bottom">



							<i class="fa fa-clock-o"></i> 2 days ago  



						</div>



			        </div>



			    </div>



		     	<div class="media innerAll margin-none bg-gray border-top border-bottom">



			       	<a class="pull-left" href="#"><img src="../assets/images/people/80/2.jpg" alt="photo" width="35" class="media-object"></a>



			        <div class="media-body">



			        	<a href="#" class="strong text-inverse">mosaicpro</a> Thanks, I  apreciate it!



			     		<div class="timeline-bottom">



							<i class="fa fa-clock-o"></i> 5 days ago   



						</div>



			        </div>



		      	</div>



				<div class="innerAll">



					<input class="form-control" placeholder="Comment here..."/>



				</div>



			</div>



			



		</div>



	</li>





	<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>
<?php		



		$qry=mysql_query("select title,s_name,views,imgname from posts order by views desc")

    or die(mysql_error());

		?> <?php 

		$result=mysql_fetch_array($qry);?>
		



					<a href="#" class="text-inverse"><?php echo $result['s_name']; ?></a> wrote a testimonial



					<a href="#" class="text-info"><i class="fa fa-location-arrow"></i> Dracula's Castle</a>



				</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



								<div class="icon-block text-center ">



									<span class="glyphicons tower"><i></i></span>



								</div>



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h5 class="strong"><a href="#">Bran Castle</a></h5>



								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, aspernatur ut fuga eum cumque delectus voluptate impedit quaerat sapiente officiis fugit voluptates sit neque quibusdam beatae est modi repudiandae unde.</p>



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



	<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i> <a href="#" class="text-inverse">mosaicpro</a> wrote a <a href="#" class="text-info">comment</a> to <a href="#"><img src="../assets/images/people/80/2.jpg" width="20" /></a> <a href="#">Jane S.</a>



					<div class="timeline-bottom">



						<i class="fa fa-clock-o"></i> 6 days ago  



					</div>



				</div>



				<div class="bg-gray innerAll border-top">Good Job. Congrats and hope to see you soon.</div>



			</div>



		



		</div>



	</li>







			







<!-- //End Row -->



</div>



		<!-- // END col -->



		



				<!-- col -->



		



		<div class="col-md-4 col-lg-3">



<div class="widget">



    <div class="widget-body text-center">

					



        <a href="profile.php"><img src="https://graph.facebook.com/<?= $_SESSION['SESS_USERNAME'] ?>/picture?type=large" width="120" alt="" class="img-circle"></a>



        <h2 class="strong margin-none"><?php echo $_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME']; ?></h2>

          <div class="innerB">New Delhi</div>

        <div class="innerB"> </div>



        <a href="profile.php" class="btn btn-primary text-center btn-block">Profile</a>



        <div class="btn-group-vertical btn-block">



            <a href="123.php" class="btn btn-default"><i class="fa fa-cog pull-right"></i>Boards</a>



            



        </div>



    </div>



</div>



<?php 

include("trending_boards.php");

?>







	</div> 



	<!-- // END row -->



</div>



<!-- // END  -->



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







<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/news.html?module=admin&page=news&url_rewrite=&lang=en&v=v2.0.1-rc1&skin=style-default&layout_fixed=true&navbar_type=navbar-inverse by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 20 Jun 2014 06:41:15 GMT -->



</html>