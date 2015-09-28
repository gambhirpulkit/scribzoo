<?php 

ob_start();

include("config.php");

?>

<!DOCTYPE html>
<?php $mid=$_GET['requests']; 
 ?>
<html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>



<?php

include("header.php"); ?>

</head>

<?php
$visitor_id=$_SESSION['SESS_MID'];
?>


<body class=" scripts-async menu-right-hidden">






	<!-- Main Container Fluid -->



	<div class="container-fluid ">

		<!-- Content START -->



		<div id="content">

<?php include("navbar.php"); ?>

			 <div class="container"><div class="innerAll">


			 <?php
		
			 $qry=mysql_query("select * from member where m_id='$mid' ") or die(mysql_error());
			 
			while($result=mysql_fetch_array($qry) or die(mysql_error()))
	{ ?>

	<div class="row">



		<div class="col-lg-9 col-md-8">
		

			


<?php 
include('profile_cover.php');
?>














			<div class="widget">



				<div class="innerAll">



				<h3 class="margin-none" > &nbsp; &nbsp; Pending requests </h3><br>



					<div class="row border-top">

		<div class="row">
<?php 
//echo "SELECT t1.*, t2.* from member t1, tbl_connect t2 where accepter = '{$_SESSION['SESS_MID']}' and (facebook='0' and scribzoo='0')"; exit;
//echo "select firstname, lastname, user, profile_pic, m_id from member where m_id IN (select requester from tbl_connect where accepter = '{$_SESSION['SESS_MID']}' and (facebook = '0' and scribzoo = '0'))"; exit;
$qry_pending=mysql_query("select firstname, lastname, user, profile_pic, m_id, hometown from member where m_id IN (select requester from tbl_connect where accepter = '{$_SESSION['SESS_MID']}' and (facebook = '0' and scribzoo = '0'))");
$i=1;
$j=1;
while($result_pending = mysql_fetch_array($qry_pending))
{
$i=$i*2;
$j=$j*3;
?>
<script>
function accept_request<?php echo $i ?>()
{


document.getElementById('<?php echo $i ?>').style.display="none";
document.getElementById('<?php echo $j ?>').style.display="block";


}

</script>
			<div class="col-sm-9">
				<div class="media">
				

					<?php 
					if($result_pending['profile_pic'] == ''){
					?>
										<a class="pull-left margin-none" href="profile.php?user=<?php  echo $result_pending['m_id'];?> ">
						<img class="img-clean" src="http://graph.facebook.com/<?php echo $result_pending['user']; ?>/picture?type=large" alt="..." style="height:100px; width:100px; overflow:hidden;">
					</a>
					<?php }else { ?>
					
							<a class="pull-left margin-none" href="profile.php?user=<?php  echo $result_pending['m_id'];?> ">
						<img class="img-clean" src="imageupload/uploads/<?php echo $result_pending['profile_pic']; ?>" alt="..." style="height:100px; width:100px; overflow:hidden;">
					</a>
					<?php } ?>
					<div class="media-body innerAll inner-2x padding-right-none padding-bottom-none">
						 <h4 class="media-heading"><a href="profile.php?user=<?php echo $result_pending['m_id']; ?>" class="text-inverse"><?php echo $result_pending['firstname'].' '.$result_pending['lastname']; ?></a></h4>
						 <p>
						 	<!-- <span class="text-success strong"><i class="fa fa-check"></i> Friend</span> &nbsp;  -->
						 	<i class="fa fa-fw fa-map-marker text-muted"></i><?php $result_pending['hometown']; ?></p> 
					</div>
				</div>
			</div>
			<div class="col-sm-3">
			<div class="approval">
				<div class="innerAll text-right">
				<div class="btn-group-vertical btn-group-sm">
						<a href="#" id="<?php echo $i ?>" class="btn btn-primary" onClick="accept_request<?php echo $i; ?>(); approve_request('<?php echo $_SESSION['SESS_MID']; ?>','<?php echo $result_pending['m_id']; ?>');  "  ><i class="fa fa-fw fa-thumbs-up"></i>Accept</a>
						<p type="hidden" id="<?php echo $j ?>" style="display:none">You are now connected</a>
					</div>
					<!--div class="btn-group-vertical btn-group-sm">						
						<a href="#" class="btn btn-default" data-toggle="sidr-open" data-menu="menu-right"><i class="fa fa-fw fa-thumbs-down"></i>Decline</a>
					</div-->
					
				</div>
				</div>
			</div>
			
		<?php } ?>	
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

<?php if($stalked_email==$visitor_email)
{ ?>

							<span class="label label-default"><?php echo $_SESSION['SESS_USERNAME']; ?></span>
<?php }
else
 {	?>			<span class="label label-default"><?php echo $result['fb_username']; ?></span>
 
<?php }?>

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

<?php 
if($stalked_email==$visitor_email)
{ ?>
							<span class="label label-default"><?php echo $_SESSION['SESS_GENDER']; ?></span>
<?php }
else 
{ ?>
<span class="label label-default"><?php echo $result['gender']; ?></span>
<?php } ?>

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