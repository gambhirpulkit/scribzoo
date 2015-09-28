<?php  ob_start();// Reporting E_NOTICE can be good too (to report uninitialized// variables or catch variable name misspellings ...)error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include 'config.php';
session_start();
$source=$_GET['source'];		
?>



<!DOCTYPE html>
<html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <?php include 'header.php';
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
	


			 <div class="container"><div class="innerLR">

	<h3>Explore <?php echo $source ?> on Scribzoo. </h3>
	<div class="separator-h"></div>

	<div class="row">
		<div class="col-md-9">
		
			<div class="widget widget-tabs">
				
				<div class="widget-body">
					
					
			<?php 
			if($source=='testimonials')
			{
			
			?>
					
						
							<div class="widget widget-heading-simple widget-body-simple text-right">
	
</div>
<div class="innerAll border-bottom"></div>

<?php
$sel = "select * from posts where hide!='1' and deactive_status!='1' order by rand() desc limit 15";
$qry = mysql_query($sel);
while($result_test = mysql_fetch_array($qry))
 {  $pid = $result_test['pid'];
 $img = $result_test['imgname'];
 $title=$result_test['title'];
 $description=$result_test['description']; ?>
<div class="media">	

<?php if($img != ''){?>
	<a href="testimonial.php?id=<?php echo $pid?>" class="pull-left no-ajaxify"><img src="imageupload/uploads_testimonial/<?php echo $img ?>" alt="Image" style= "height:100px; width:100px; overflow:hidden;" class="img-responsive" /></a>
	<?php }else{ ?>
	<a href="testimonial.php?id=<?php echo $pid?>" class="pull-left no-ajaxify"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" alt="Image" style= "height:100px; width:100px; overflow:hidden;" class="img-responsive" /></a>
	<?php } ?>
	<div class="media-body innerTB half">
		<h5 class="strong text-uppercase"><?php echo $title;?></h5>
		<p class="margin-none"><?php echo $description;?> <a href="testimonial.php?id=<?php echo $pid?>" class="no-ajaxify"><i class="fa fa-fw fa-arrow-right"></i> read more</a></p>
	</div>
</div>


<?php } ?>	


						
					<?php } ?>
						
						
			<?php  
			if($source=='people')
			{
			
			
			   ?>		
						
						
							<div class="widget widget-heading-simple widget-body-simple text-right">
	
</div>
<div class="widget widget-heading-simple widget-body-white margin-none">

	<table class="table table-vertical-center border-bottom">
		<thead>
			
		</thead>
		<tbody>
		
		<?php
$sel = "select firstname,lastname,login,m_id,hometown,user,username from member order by rand() limit 50";
$qry = mysql_query($sel);
while($result = mysql_fetch_array($qry))
{
$i=$i+1;
$j=$j+1;
$firstname = $result['firstname'];
$lastname  = $result['lastname'];
$login     = $result['login'];
$mid       = $result['m_id'];
$hometown     = $result['hometown'];
$username     = $result['username'];
$fb_id = $result['user']; ?>
<script>
function update_request<?php echo $i; ?>()

{

document.getElementById('before_request<?php echo a.$i ?>').style.display="none";

document.getElementById('after_request<?php echo b.$j ?>').style.display="block";
}
</script>
				<?php if($firstname=='' or $lastname=='')
				{ continue; }else{
				?>
				
				<div class="col-md-12 col-lg-6 bg-white border-bottom">
				
				
		<div class="row">

			<div class="col-sm-9">
				<div class="media">
					<?php 
				if($result['profile_pic'] == '') { ?>
					<a class="pull-left margin-none no-ajaxify" href="profile.php?user=<?php echo $mid ; ?>">
						<img class="img-clean" src="http://graph.facebook.com/<?php echo $result['user']; ?>/picture?type=large" alt="..." style="height:100px; width:100px; overflow:hidden;">
					</a>
					
					 <?php }
					 else {?>
			<a class="pull-left margin-none no-ajaxify" href="profile.php?user=<?php echo $mid; ?>">
						<img class="img-clean" src="imageupload/uploads/<?php echo $result['profile_pic'];?>" alt="..." style="height:100px; width:100px; overflow:hidden;">
					</a>
<?php } ?>					
					<div class="media-body innerAll inner-2x padding-right-none padding-bottom-none">
						 <h4 class="media-heading"><a href="profile.php?user=<?php echo $mid ?>" class="text-inverse no-ajaxify"><?php echo $firstname.' '.$lastname?></a></h4>
						 <p>
						 	<!-- <span class="text-success strong"><i class="fa fa-check"></i> Friend</span> &nbsp;  -->
						 	<i class="fa fa-fw fa-map-marker text-muted"></i><?php echo $hometown  ?></p> 
							<p>
							<i class="fa fa-fw fa-user"></i> <?php echo $username; ?></p>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="innerAll text-right">
					<div class="btn-group-vertical btn-group-sm">
						<div class="btn-group-vertical btn-group-sm">
					
				<?php 	
					 $result_track_request = mysql_fetch_array(mysql_query("select id,facebook,scribzoo from tbl_connect where (requester='{$_SESSION['SESS_MID']}' and accepter='{$result['m_id']}') or (requester='{$result['m_id']}' and accepter='{$_SESSION['SESS_MID']}')"));
		
			if(!$result_track_request['id'])
					{ ?>
						<a href="#" return false; class="btn btn-primary" id="before_request<?php echo a.$i; ?>" onClick="connect_request('<?php echo $mid; ?>','<?php echo $_SESSION['SESS_MID']; ?>'); update_request<?php echo $i; ?>(); "><i class="fa fa-fw  fa-plus"></i>Connect</a>		
						<a href="#" return false; class="btn btn-primary" id="after_request<?php echo b.$j; ?>" style="float:left;display:none">sent</a>								
					<?php } 
					else if($result_track_request['facebook']==0 && $result_track_request['scribzoo']==0 )
					{ ?>
						<a href="#" return false; class="btn btn-primary" style="padding: 5px;">Already sent</a>	
					<?php } 
						else if($result_track_request['facebook']==1 || $result_track_request['scribzoo']==1 ) { ?>
						<a href="#" return false; class="btn btn-primary" style="padding: 5px;"><i class="fa fa-fw  fa-check"></i>Connected</a>
						<?php }  ?>
					</div>
						
					</div>
				</div>
			</div>
		</div>
	
	</div>
			
			<?php } ?>
			
		</tbody>
		<?php } ?>	
	</table>
	
</div>





					<?php  }  ?>	
						<!----endofusers----->
						
						
					
				</div>
			</div>
			
		</div>
		<div class="col-md-3">
				
			<?php include('trending_boards.php');
			?>
		






			<div class="separator-h"></div>
		
			<!-- Widget -->

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