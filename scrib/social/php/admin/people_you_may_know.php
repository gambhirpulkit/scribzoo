<?php  ob_start();// Reporting E_NOTICE can be good too (to report uninitialized// variables or catch variable name misspellings ...)error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

include 'config.php';
require("class.phpmailer.php");
session_start();
	
//Send welcome email starts
		$toEmail = $_SESSION['SESS_EMAIL'];
		$fromname = "scribzoo_n";
		$subject= "Welcome to scribzoo, a simple way to explore testimonials.";
		$fromemail = "scribzoo@scribzoo.com";
		$testimonialid= $testimonial_to_share;

#####################################

# Function to send email

#####################################

function sendEmail ($fromName, $fromEmail, $toEmail, $subject, $emailBody) {

	$mail = new PHPMailer();

	$mail->FromName = $fromName;

	$mail->From = $fromEmail;

	$mail->AddAddress("$toEmail");

		

	$mail->Subject = $subject;

	$mail->Body = $emailBody;

	$mail->isHTML(true);

	$mail->WordWrap = 150;

		

	if(!$mail->Send()) {

		return false;

	} else {

		return true;

	}

}



#####################################

# Function to Read a file 

# and store all data into a variable

#####################################

function readTemplateFile($FileName) {

		$fp = fopen($FileName,"r") or exit("Unable to open File ".$FileName);

		$str = "";

		while(!feof($fp)) {

			$str .= fread($fp,1024);

		}	

		return $str;

}




#####################################

# Finally send email

#####################################



	//Data to be sent (Ideally fetched from Database)

	$NameOfUser ="scribzoo";

	

	$UserEmail = $toEmail;

	

	//Send email to user containing username and password

	$emailBody = readTemplateFile("mailer_template/welcome.html");

	$code=base64_encode($code);		

	//Replace all the variables in template file
	$emailBody = str_replace("#receiver#",$_SESSION['SESS_EMAIL'],$emailBody);
	
	

	//Send email

	$emailStatus = sendEmail ( $NameOfUser ,$fromemail, $UserEmail,$subject, $emailBody);

	

	//If email function return false

	if ($emailStatus != 1) {

		echo "An error occured while sending email. Please try again later.";

	} else {

		echo "...";

	}

	 
	 
				
				
				
				//Send welcome email ends
				
				
				
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
	<nav class="navbar navbar-inverse top-nav navbar-fixed-top" role="navigation">
<script>


		
</script>

  <div class="container">

    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">

      <a type="button" class="navbar-toggle btn btn-default" data-toggle="collapse" data-target="#navbar-fixed-layout-collapse">

		<i class="fa fa-indent"></i>

      </button>

      <a class="navbar-brand" href="main_timeline.php" style="line-height:50px"><img src="../assets/images/logo/scribzoo.png" alt="" style="width:110px"></a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->

    <!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->

</nav>
	

			 <div class="container"><div class="innerLR">
	
	<h3>People you would like to connect...</h3>
	
	
	<div class="separator-h"></div>

	<div class="row">
		<div class="col-md-9">
		
			<div class="widget widget-tabs">
				
				<div class="widget-body">
			
			<!--------------  start of people you may know content ------------------->
						
							<div class="widget widget-heading-simple widget-body-simple text-right">
	
</div>
<div class="widget widget-heading-simple widget-body-white margin-none">

	<table class="table table-vertical-center border-bottom">
		<thead>
			
		</thead>
		<tbody>
		
		<?php
$sel = "select firstname,lastname,login,m_id,hometown,user,username,i_score from member order by i_score desc limit 10";
$qry = mysql_query($sel);
$previous_rows_people = 0;
while($result = mysql_fetch_array($qry))
{
$previous_rows_people = $previous_rows_people+1;
$i=$i+1;
$j=$j+1;
$firstname = $result['firstname'];
$lastname  = $result['lastname'];
$login     = $result['login'];
$mid       = $result['m_id'];
$i_score     = $result['i_score'];
$username     = $result['username'];
$fb_id = $result['user']; ?>
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
						 <h4 class="media-heading"><a href="profile.php?user=<?php echo $mid ?>" class="text-inverse no-ajaxify"><?php echo $firstname.' '.$lastname?></a></h4>
						 <p>
						 	<!-- <span class="text-success strong"><i class="fa fa-check"></i> Friend</span> &nbsp;  -->
						 	<i class="fa fa-fw fa-star-o text-muted" data-toggle="tooltip" data-original-title="Influential score" data-placement="right"></i>&nbsp;<?php echo $i_score  ?></p> 
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
			
			<br><br>
		<a href="#" id="loadmore_peopleymk1" onClick="load_more_peopleymk('<?php echo $previous_rows_people; ?>'); hide_loadmore_peopleymk(); return false;">Load more</a>
<div id="load_more_peopleymk">
</div>
		</tbody>
	
		
	</table>
	<div style="margin:20px; text-align:center">
	<a href="main_timeline.php" class="btn btn-primary no-ajaxify">continue to your feed...</a>
	</div>
</div>





					
						<!----end of people you may know content ----->
						
						
					
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