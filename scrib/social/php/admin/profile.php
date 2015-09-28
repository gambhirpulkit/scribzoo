<?php 

ob_start();

include("config.php");

?>

<!DOCTYPE html>
<?php 
$mid=$_GET['user']; 
$username_get = rtrim($_GET['username'],',');
if($mid == '' && $username_get != '')
{

$qry_get_mid = mysql_query("select m_id from member where username = '$username_get'");
$result_get_mid = mysql_fetch_array($qry_get_mid);
$mid = $result_get_mid['m_id'];
}

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
		$i_score = 11;
			 $qry=mysql_query("select * from member where m_id='$mid' ") or die(mysql_error());
			 
			while($result=mysql_fetch_array($qry) or die(mysql_error()))
	{ 
	
	$fb_frnds_count = $result['fb_frnds_count'];
		
		if($fb_frnds_count >50 && $fb_frnds_count <150)
		{
		$i_score=4;
		}
		
		else if ($fb_frnds_count >=150 && $fb_frnds_count <400)
		{
		$i_score=8;
		}
		else if ($fb_frnds_count >=400 && $fb_frnds_count <1000)
		{
		$i_score=12;
		}
		else if ($fb_frnds_count >=1000 && $fb_frnds_count <5000)
		{
		$i_score=16;
		}
		else if ($fb_frnds_count >=5000 )
		{
		$i_score=20;
		}
	
	
		if($result['total_testimonial_views'] >0 && $result['total_testimonial_views'] <50)
		{
		$i_score=$i_score+10;
		}
	   if($result['total_testimonial_views'] >50 && $result['total_testimonial_views'] <150)
		{
		$i_score=$i_score+14;
		}
		
		else if ($result['total_testimonial_views'] >=150 && $result['total_testimonial_views'] <400)
		{
		$i_score= $i_score + 18;
		}
		else if ($result['total_testimonial_views'] >=400 && $result['total_testimonial_views'] <1000)
		{
		$i_score=$i_score + 22;
		}
		else if ($result['total_testimonial_views'] >=1000 && $result['total_testimonial_views'] <5000)
		{
		$i_score=$i_score + 26;
		}
		else if ($result['total_testimonial_views'] >=5000 )
		{
		$i_score=$i_score + 30;
		}
	
	?>

	<div class="row">



		<div class="col-lg-9 col-md-8">
		

			


<?php 
include('profile_cover.php');
?>


			<div class="widget">



				<div class="innerAll">



				<h3 class="margin-none">About</h3>

					<div class="row border-top">



						<div class="col-sm-6">

<?php mysql_query("update member set i_score = '$i_score' where m_id = '$mid'"); ?>

							<h5 class="innerT">Influential Score</h5>
<div class="widget widget-tabs widget-tabs-double-2 border-bottom widget-tabs-responsive">   
 <div class="widget-body">
        <div class="innerAll text-center">
            <div data-percent="<?php echo $i_score; ?>" data-size="150" class="easy-pie inline-block easy-pie-gender inverse" data-scale-color="false" data-track-color="#ffffff" data-line-width="5" style="margin-top:100px">
                <div class="value text-center innerAll"><p class="lead text-large"><?php echo $i_score; ?>%</p></div>
            </div>
			
            <div class="separator bottom"></div>
           </div>
    </div>  
 </div>    		
</div>    				<!-- Tabs Heading -->    			
									    				
						<!-- // Tabs Heading END -->	
						
	

						

						<div class="col-sm-6">
  
<?php
		if($mid==$visitor_id)
		{
 $sel_count = "SELECT count(m_id) as count FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1') union SELECT requester FROM tbl_connect WHERE accepter =  '{$_SESSION['SESS_MID']}'  and (facebook='1' or scribzoo='1') )";							

	$qry_count = mysql_query($sel_count);							

	$result_count = mysql_fetch_array($qry_count);	
}
		else
		{
 $sel_count = "SELECT count(m_id) as count FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$result['m_id']}' union SELECT requester FROM tbl_connect WHERE accepter =  '{$result['m_id']}')";							

	$qry_count = mysql_query($sel_count);							

	$result_count = mysql_fetch_array($qry_count);	
}
	?>




							<h5 class="innerT">Connections : <?php echo $result_count['count']; ?></h5>


			


							<div class="widget bg-gray">



								<div class="innerAll">

								<?php

if($mid==$visitor_id)
{							

$sel = "SELECT m_id,firstname,lastname,user,login,profile_pic FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1') union SELECT requester FROM tbl_connect WHERE accepter =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1')) limit 25";

}

else
{

$sel = "SELECT m_id,firstname,lastname,user,login,profile_pic,fb_username FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$result['m_id']}'  and (facebook='1' or scribzoo='1') union SELECT requester FROM tbl_connect WHERE accepter =  '{$result['m_id']}'  and (facebook='1' or scribzoo='1')) limit 25";

}
$qry = mysql_query($sel);

while($result_con = mysql_fetch_array($qry))

{

$firstname = $result_con['firstname'];

$lastname = $result_con['lastname'];

$fb_id = $result_con['user'];

$profile_pic = $result_con['profile_pic'];

?>	



          											<?php if($profile_pic == ''){ ?>

																		<a href="<?php echo $path; ?>profile.php?user=<?php echo $result_con['m_id']; ?>" class="no-ajaxify">



										<img src="https://graph.facebook.com/<?php echo $fb_id ?>/picture?type=small" alt="<?php echo $firstname.' '.$lastname; ?>" title="<?php echo $firstname.' '.$lastname; ?>" class="innerR innerB half" style="width:50px; height:50px; overflow:hidden"/>

										



									</a>



										<?php }else{ ?>							

										<a href="<?php echo $path; ?>profile.php?user=<?php echo $result_con['m_id']; ?>" style="width:100px; height:100px; overflow:hidden" class="no-ajaxify">



										<img src="imageupload/uploads/<?php echo $profile_pic; ?>" alt="<?php echo $firstname.' '.$lastname; ?>" title="<?php echo $firstname.' '.$lastname; ?>" class="innerR innerB half" style="width:50px; height:50px; overflow:hidden"/>

										



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
  <?php 

include("basic_info.php");

?>
	
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



		


			<!--  End Copyright Line -->



	



		</div>



		<!-- // Footer END -->



		



				



	</div>



	<!-- // Main Container Fluid END -->



	



    <!-- Global -->



    <script>




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