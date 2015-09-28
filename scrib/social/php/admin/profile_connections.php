<?php ob_start(); 
include('config.php');
?>

<!DOCTYPE html>
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

<?php $mid=$_GET['user']; 
$visitor_id=$_SESSION['SESS_MID'];
?>

            <!--[if lt IE 9]><link rel="stylesheet" href="http://preview2.mosaicpro.biz/shared/assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->
        <link rel="stylesheet" href="../assets/less/pages/serveStylese34f.css?module=admin&amp;page=contacts_3&amp;url_rewrite=&amp;lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true" />
    
<?php include('header.php'); 
 
$visitor_email=$_SESSION['SESS_EMAIL'];
?>

</head><body class=" scripts-async menu-right-hidden">
	
	<!-- Main Container Fluid -->
	<div class="container-fluid ">

		
		<!-- Content START -->
		<div id="content">
			
	
<?php include("navbar.php");
?>


			 <div class="container"><div class="innerAll">
	<div class="row">
	<?php
	 $qry=mysql_query("select * from member where m_id='$mid' ") or die(mysql_error());
			 
			while($result=mysql_fetch_array($qry) or die(mysql_error()))
	{ ?>
		<div class="col-lg-9 col-md-8">
			
			<?php include('profile_cover.php'); ?>


	

<div class="row row-merge">
		
	<?php 
	$i=1;
	$j=1;
	if($mid==$_SESSION['SESS_MID'])
	{
	// echo "SELECT firstname,lastname,user,login,profile_pic,m_id,fb_username FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$_SESSION['SESS_MID']}' union SELECT requester FROM tbl_connect WHERE accepter =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1'))"; exit;
	$qry_friends=mysql_query("SELECT firstname,lastname,user,login,profile_pic,m_id,fb_username,gender FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1') union SELECT requester FROM tbl_connect WHERE accepter =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1'))");	
	
	}
   else
	{
	//echo "SELECT firstname,lastname,user,login,profile_pic FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '$mid' union SELECT requester FROM tbl_connect WHERE accepter =  '$mid')"; exit;
	// echo "SELECT firstname,lastname,user,login,profile_pic,m_id,fb_username FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '$mid' union SELECT requester FROM tbl_connect WHERE accepter =  '$mid' and (facebook='1' or scribzoo='1')) "; exit;
	$qry_friends=mysql_query("SELECT firstname,lastname,user,login,profile_pic,m_id,fb_username,gender,aboutme,hometown FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '$mid' and (facebook='1' or scribzoo='1') union SELECT requester FROM tbl_connect WHERE accepter =  '$mid' and (facebook='1' or scribzoo='1')) ");
	}
	
		while($result_friends=mysql_fetch_array($qry_friends))
		{
		$i=$i+1;
		$j=$j+1;
		
	?>
	<script>
function update_request<?php echo $i; ?>()

{

document.getElementById('before_request<?php echo a.$i ?>').style.display="none";

document.getElementById('after_request<?php echo b.$j ?>').style.display="block";
}
</script>

		<div class="col-md-12 col-lg-6 bg-white border-bottom">
		<div class="row">

			<div class="col-sm-9">
				<div class="media">
				<?php 
				if($result_friends['profile_pic'] == '') { ?>
					<a class="pull-left margin-none no-ajaxify" href="profile.php?user=<?php echo $result_friends['m_id']; ?>">
						<img class="img-clean" src="http://graph.facebook.com/<?php echo $result_friends['user']; ?>/picture?type=large" alt="..." style="height:100px; width:100px; overflow:hidden;">
					</a>
					
					 <?php }
					 else {?>
			<a class="pull-left margin-none no-ajaxify" href="profile.php?user=<?php echo $result_friends['m_id']; ?>">
						<img class="img-clean" src="imageupload/uploads/<?php echo $result_friends['profile_pic'];?>" alt="..." style="height:100px; width:100px; overflow:hidden;">
					</a>
<?php } ?>					
					 
					<div class="media-body innerAll inner-2x padding-right-none padding-bottom-none">
						 <h4 class="media-heading"><a href="profile.php?user=<?php echo $result_friends['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_friends['firstname'].' '.$result_friends['lastname']; ?></a></h4>
						  <p>
						 	<!-- <span class="text-success strong"><i class="fa fa-check"></i> Friend</span> &nbsp;  -->
						 <?php if($result_friends['aboutme'] != '') {?>	<i class="fa fa-comment-o text-muted"></i>&nbsp;&nbsp;<?php echo $result_friends['aboutme']; }?></p> 
						  <p>
						 	<?php if($result_friends['hometown'] != '') {?>	<i class="fa fa-fw fa-map-marker text-muted">&nbsp;&nbsp;</i><?php echo $result_friends['hometown']; }?>
						 </p> 
					</div>
				</div>
			</div>

			
			<div class="col-sm-3">
				<div class="innerAll text-right">
					<div class="btn-group-vertical btn-group-sm">
					
				<?php 	
					 $result_track_request = mysql_fetch_array(mysql_query("select id,facebook,scribzoo from tbl_connect where (requester='{$_SESSION['SESS_MID']}' and accepter='{$result_friends['m_id']}') or (requester='{$result_friends['m_id']}' and accepter='{$_SESSION['SESS_MID']}')"));
		
			if(!$result_track_request['id'])
					{ ?>
						<a href="#" return false; class="btn btn-primary" id="before_request<?php echo a.$i; ?>" onClick="connect_request('<?php echo $mid; ?>','<?php echo $_SESSION['SESS_MID']; ?>'); update_request<?php echo $i; ?>(); "><i class="fa fa-fw  fa-plus"></i>Connect</a>		
						<a href="#" return false; class="btn btn-primary" id="after_request<?php echo b.$j; ?>" style="float:left;display:none">sent</a>								
					<?php } 
					else if($result_track_request['facebook']==0 && $result_track_request['scribzoo']==0 )
					{ ?>
						<a href="#" return false; class="btn btn-primary" style="padding: 5px;" >Already sent</a>	
					<?php } 
						else if($result_track_request['facebook']==1 || $result_track_request['scribzoo']==1 ) { ?>
						<a href="#" return false; class="btn btn-primary" style="padding: 5px;"  >Connected</a>
						<?php }  ?>
					</div>
					
					
				</div>
			</div>
			
			
		</div>
	
	</div>
		
		<?php } ?>
		
</div>
<div class="btn-group-vertical btn-group-sm">
					<p>That's what we've got!</p>
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

<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/contacts_3.html?lang=en&v=v2.0.1-rc1&layout_fixed=true by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 19 Jun 2014 10:33:33 GMT -->
</html>