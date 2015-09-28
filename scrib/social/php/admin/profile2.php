<?php 

ob_start();

include("config.php");

?>

<!DOCTYPE html>

<html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

<?php

include("header.php"); ?>

</head>





<body class=" scripts-async menu-right-hidden">



	



	<!-- Main Container Fluid -->



	<div class="container-fluid ">

		<!-- Content START -->



		<div id="content">

<?php include("navbar.php"); ?>

			 <div class="container"><div class="innerAll">



	<div class="row">



		<div class="col-lg-9 col-md-8">



			



			<div class="timeline-cover">



	<div class="widget border-bottom">







		<div class="widget-body border-bottom">



			<div class="media">



				<div class="pull-left innerAll">



					<img src="https://graph.facebook.com/<?= $_SESSION['SESS_USERNAME'] ?>/picture?type=large" width="120" alt="" class="img-circle" style="height: 100px;width: 100px;overflow:hidden;">

				</div>



				<div class="media-body">



					<h2><a href="#"><?php echo $_SESSION['SESS_FIRST_NAME'].' '. $_SESSION['SESS_LAST_NAME']?></a> <a href="#" class="text-muted"></i></a></h4>



					<div class="clearfix"></div>



					<p><?php echo $_SESSION['SESS_ABOUT_ME'] ?></p>



					

				</div>



			</div>



		</div>







		<div class="">



			<ul class="navigation">



				<li><a class="" href="profile_timeline.php?"><i class="fa fa-fw icon-road-sign"></i><span> Timeline</span></a></li>



				<li><a href="profile_photos.php"><i class="fa fa-fw icon-flip-camera"></i><span>Boards</span></a></li>



				<li><a href="profile_connections.php"><i class="fa fa-fw icon-group"></i><span> Connections</span></a></li>



				<li><a href="profile_messages.php"><i class="fa fa-fw fa-envelope"></i><span> Messages</span></a></li>



				<li class="pull-right active"><a href="profile.php"><i class="fa fa-fw fa-user"></i><span> About</span></a></li>



			</ul>



			<div class="clearfix"></div>



		</div>






<!-- 		<nav class="navbar widget-head padding-none margin-none" role="navigation">



	      



	        <div class="navbar-header">



	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3">



	            <span>Choose menu </span>



	            <i class="fa fa-bars "></i>



	           



	          </button>



	        </div>



	        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-3" style="height: 1px;">



				<div class="padding-none">



					<ul class="display-block">



						<li><a class="" href="timeline_3.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true"><i class="fa fa-fw icon-road-sign"></i> <span>Timeline</span></a></li>



						<li><a href="media_3.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true"><i class="fa fa-fw icon-flip-camera"></i> <span>Photos</span></a></li>



						<li><a href="contacts_3.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true"><i class="fa fa-fw icon-group"></i> <span>Friends</span></a></li>



						<li><a href="messages.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true"><i class="fa fa-fw fa-envelope"></i> <span>Messages</span></a></li>



						<li class="pull-right active"><a href="about_3.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true"><i class="fa fa-fw fa-user"></i> <span>About</span></a></li>



					</ul>



				</div>



	        </div>



	      



	    </nav>



 -->







		



	



		







	</div>



	







</div>















			<div class="widget">



				<div class="innerAll">



				<h3 class="margin-none">About</h3>



					



					



					<div class="row border-top">



						<div class="col-sm-6">



							<h5 class="innerT">Hobby</h5>



							<div class="widget bg-gray innerAll margin-none">



								<span class="innerR innerB">



									<i class="box-generic innerAll icon-chef-hat fa fa-4x" data-toggle="tooltip" data-original-title="Cooking" data-placement="bottom"></i>



								</span>



								<span class="innerR innerB">



									<i class="box-generic innerAll  icon-soccerball-fiil fa fa-4x" data-toggle="tooltip" data-original-title="Soccer" data-placement="bottom"></i>



								</span>



								<span class="innerR innerB">



									<i class="box-generic innerAll  icon-steering-wheel fa fa-4x" data-toggle="tooltip" data-original-title="Driving" data-placement="bottom"></i>



								</span>



								<span class="innerR innerB">



									<i class="box-generic innerAll  icon-swimming fa fa-4x" data-toggle="tooltip" data-original-title="Swimming" data-placement="bottom"></i>



								</span>



							</div>



						</div>



						<div class="col-sm-6">

<?php $sel_count = "SELECT count(m_id) as count FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$_SESSION['SESS_MID']}' union SELECT requester FROM tbl_connect WHERE accepter =  '{$_SESSION['SESS_MID']}')";							

	$qry_count = mysql_query($sel_count);							

	$result_count = mysql_fetch_array($qry_count);	

	?>

							<h5 class="innerT">Connections : <?php echo $result_count['count']; ?></h5>



							<div class="widget bg-gray">



								<div class="innerAll">

								<?php

							

$sel = "SELECT firstname,lastname,user,login,profile_pic FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$_SESSION['SESS_MID']}' union SELECT requester FROM tbl_connect WHERE accepter =  '{$_SESSION['SESS_MID']}') limit 25";

$qry = mysql_query($sel);

while($result = mysql_fetch_array($qry))

{

$firstname = $result['firstname'];

$lastname = $result['lastname'];

$fb_id = $result['user'];

$profile_pic = $result['profile_pic'];

?>	



          											<?php if($profile_pic == ''){ ?>

																		<a href="#">



										<img src="https://graph.facebook.com/<?php echo $fb_id ?>/picture?type=small" alt="<?php echo $firstname.' '.$lastname; ?>" title="<?php echo $firstname.' '.$lastname; ?>" class="innerR innerB half" style="width:50px; height:50px; overflow:hidden"/>

										



									</a>



										<?php }else{ ?>							

										<a href="#" style="width:100px; height:100px; overflow:hidden">



										<img src="../../../../fileupload/uploads/<?php echo $profile_pic; ?>" alt="<?php echo $firstname.' '.$lastname; ?>" title="<?php echo $firstname.' '.$lastname; ?>" class="innerR innerB half" style="width:50px; height:50px; overflow:hidden"/>

										



									</a>

									

									<?php } }?>



								</div>



							</div>



						</div>



					</div>



					



				</div>



			</div>



			



		</div>



		<div class="col-md-4 col-lg-3">







			<div class="widget">



				<div class="widget-head border-bottom bg-gray">



					<h5 class="innerAll pull-left margin-none">Basic Info</h5>



					<div class="pull-right">



						<a href="#" class="text-muted">



							<i class="fa fa-pencil innerL"></i>



						</a>



					</div>



				</div>



				<div class="widget-body">



					<div class="row">



						<div class="col-sm-6">User:</div>



						<div class="col-sm-6 text-right">



							<span class="label label-default"><?php echo $_SESSION['SESS_USERNAME']; ?></span>



						</div>



					</div>



					<div class="row">



						<div class="col-sm-6">Friends:</div>



						<div class="col-sm-6 text-right">



							<span class="label label-default"><?php echo $result_count['count']; ?></span>



						</div>



					</div>



					<div class="row">



						<div class="col-sm-6">Gender:</div>



						<div class="col-sm-6 text-right">



							<span class="label label-default"><?php echo $_SESSION['SESS_GENDER']; ?></span>



						</div>



					</div>



				</div>



			</div>



			<div class="widget">



				<div class="widget-head border-bottom bg-gray">



					<h5 class="innerAll pull-left margin-none">Contact</h5>



					<div class="pull-right">



						<a href="<?php echo "https://facebook.com/".$_SESSION['SESS_USERNAME']; ?>" class="text-muted">



							<i class="fa fa-facebook innerL"></i>



						</a>

						

 						<?php 

						if($_SESSION['twitter_handle'] != ''){ ?>

						<a href="<?php echo "https://twitter.com/".$_SESSION['twitter_handle']; ?>" class="text-muted">



							<i class="fa fa-twitter innerL"></i>



						</a>

                         <?php } ?>

						



					</div>



				</div>



				<div class="widget-body padding-none">



					



					<div class="border-top innerAll">



						<p class=" margin-none"><i class="fa fa-envelope fa-fw text-muted"></i> Email me</p>



					</div>



					<div class="border-top innerAll">



						<p class=" margin-none"><i class="fa fa-link fa-fw text-muted"></i> <a href="#">Visit website</a></p>



					</div>



				</div>



			</div>







			<div class="widget">



	<h5 class="innerAll margin-none border-bottom bg-gray">Boards followed by this user</h5>



	<div class="widget-body padding-none">

<?php $qry_boards = mysql_query("select board from board_follow where follower = '{$_SESSION['SESS_MID']}' limit 5"); 

						while($result_boards = mysql_fetch_array($qry_boards))

						{

						?>

				<div class="media border-bottom innerAll margin-none">



		



			<div class="media-body">

			<a href="#" class="pull-right text-muted innerT half">



					&nbsp;&nbsp;



				</a>

				<h5 class="margin-none"><a href="board.php?board=<?php echo $result_boards['board']; ?>" class="text-inverse"><?php echo substr($result_boards['board'],0,18); ?></a></h5>



				

<small></small>

			</div>



		</div>



			<?php } ?>	



				



				



				



			</div>



</div>







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



    <script>



function myFunction() {



    alert("I am an alert box!");



}



</script>



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







<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/about_3.html?lang=en&v=v2.0.1-rc1&layout_fixed=true by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 19 Jun 2014 10:34:46 GMT -->



</html>