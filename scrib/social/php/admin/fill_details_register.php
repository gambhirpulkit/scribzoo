<?php 

ob_start();
session_start();
include("config.php");
require("class.phpmailer.php");

 $username=$_POST['username']; 
 $email=$_POST['email'];
 $password= md5($_POST['password']);
 $_SESSION['SESS_EMAIL']=  $email;
 $_SESSION['SESS_USERNAME'] = $username;
 
 if($_GET['code']!=''){
 $verification_code=base64_decode($_GET['code']);
 $verification_data = explode(":",$verification_code);
$verification_email = $verification_data['0'];

$qry_check_code=mysql_query("select m_id,username from member where login = '$verification_email' and code='$verification_code'");

$result_check_code=mysql_fetch_array($qry_check_code);
if($result_check_code['m_id']=='')
{
echo "Your email has not been successfully verified!";
exit;
}else{
mysql_query("update member set verified='verified' where login = '$verification_email'");
$verified="verified";
$username=$result_check_code['username'];
$email=$verification_email;
$_SESSION['SESS_EMAIL']=  $verification_email;
 $_SESSION['SESS_USERNAME'] = $result_check_code['username'];
 $_SESSION['SESS_MID'] = $result_check_code['m_id'];

}
 
 }else{
	if(!isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) == '')) {

	

	    $page = $_SERVER['REQUEST_URI'];

	$_SESSION['SESS_PAGE'] = $page;

		header("location:register.php");

		exit();

	}
 
 else{
 
 
$qry_check=mysql_query("select login,username,verified from member where login='$email'");
$result_check = mysql_fetch_array($qry_check);
if($result_check['login'] == $email)
{
header("location:register.php?error=email_already_exits");

exit();
}
if($result_check['username'] == $username)
{
header("location:register.php?error=username_already_exits");

exit();
}
elseif($result_check['verified']=='') {
$code = $email.":".time();
 mysql_query("insert into member set login = '$email', username = '$username', passwd = '$password', date_of_joining = NOW(),code='$code',verified='sent_verification'");
$verified_sent="yes";
}
}
}
?>
<!DOCTYPE html>

<html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />



<head>




<?php include("header.php"); 

 ?>

</head>


<body class=" scripts-async menu-right-hidden">
	
	<!-- Main Container Fluid -->
	<div class="container-fluid">

<!-- Content START -->
		<div id="content">
			
<?php 
session_start();

?>
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




		

<div class="innerLR spacing-x2">
	<!-- row -->
	<div class="row">
		<!-- col -->
		<div class="col-md-6 col-md-offset-3" style="margin-top:80px">
			<?php
			
			if($verified_sent=='yes'){
			echo "We've sent the verification email to you at ".$email."! Please verify to proceed.";
		
		
		
		
		//Verification mail starts 
		$toEmail = $email;
		$fromname = "scribzoo_n";
		$subject= "Please verify your email - scribzoo";
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

	$emailBody = readTemplateFile("mailer_template/verify.html");

	$code=base64_encode($code);		

	//Replace all the variables in template file
	$emailBody = str_replace("#receiver#",$email,$emailBody);
	$emailBody = str_replace("#code#",$code,$emailBody);

	//Send email

	$emailStatus = sendEmail ( $NameOfUser ,$fromemail, $UserEmail,$subject, $emailBody);

	

	//If email function return false

	if ($emailStatus != 1) {

		echo "An error occured while sending email. Please try again later.";

	} else {

		echo "...";

	}

			
			
			
			
			exit;
			}
			
			?>
								
			<div class="widget widget-survey">
				<div class="widget-head ">
					<div class="innerAll text-center">
					<?php
					if($verified='verified'){
					?>
					<h5>Congratulations! Your email has been successfully verified!</h5>
					<?php
					}
					?>
						<ul class="nav nav-pills strong">
						  	<li class="active"><a href="#feedback" data-toggle="tab">1. Personal Details</a></li>
						  	<li><a href="#website" data-toggle="tab">2. Display Picture</a></li>
						  	
						  
						</ul>
					</div>
				</div>
				<div class="widget-body padding-none">

					<div class="tab-content">

					  	<div class="tab-pane active" id="feedback">
						
						<div class="innerAll border-bottom">
						  		<h5 class="innerTB margin-none half">Username</h5>
						  		<h4><?php echo $username; ?>&nbsp;<i class="fa fa-check"></i></h4>
					  		</div>
							
							<div class="innerAll border-bottom">
						  		<h5 class="innerTB margin-none half">email</h5>
						  		<h4><?php echo $email; ?> &nbsp;<i class="fa fa-check"></i></h4>
					  		</div>
							
							
							
							<form action="register_exec.php" id="form_register" method="post" enctype="multipart/form-data">
							<div class="innerAll border-bottom">
						  		<h5 class="innerTB margin-none half">First Name</h5>
						  		<input type="text" class="form-control" name="firstname" id="firstname_register" placeholder="Type in here" />
					  		</div>
							
							<div class="innerAll border-bottom">
						  		<h5 class="innerTB margin-none half">Last Name</h5>
						  		<input type="text" class="form-control" name="lastname" id="lastname_register" placeholder="Type in here" />
					  		</div>
							
							<select style="width: 100%;" id="select2_1">
	               <optgroup label="please select">
	                   <option value="male">Male</option>
	                   <option value="female">Female</option>
					   </optgroup>
					   </select>
							
							<div class="innerAll border-bottom">
						  		<h5 class="innerTB margin-none half">hometown</h5>
						  		<input type="text" class="form-control" name="hometown" id="hometown_register" placeholder="Type in here" />
					  		</div>
							
							<div class="innerAll border-bottom">
						  		<h5 class="innerTB margin-none half">Describe yourself</h5>
						  		<textarea class="form-control" name="aboutme" id="aboutme_register" placeholder="Type in here"></textarea>
					  		</div>
							
							 <div class="innerAll text-center">
				             <a href="#website" data-toggle="tab" class="btn btn-primary" onClick="update_form_data('<?php echo $email; ?>')">Next</a>
			                 </div>
							
							</form>
						
						   
						
							</div>
							<div class="tab-pane innerAll half" id="website">
					  		
					  		
						<div class="row" style="margin-top: 100px;padding: 50px;">

					 
							<iframe src="image_upload.php" width="550" height="520" frameBorder="0"></iframe>

									<div class="innerAll text-center">
							<a href="people_you_may_know.php" class="btn btn-primary no-ajaxify">Done!</a>
									</div>
			
			 			</div>
					  	</div>
					  	

					  	</div>

					  	
					  	
					  
					</div>
				</div>



			</div>
					
			
		</div>
		<!-- // END col -->

	</div>
	<!-- // END row -->
</div>


	
		
				
		</div>
		<!-- // Content END -->
		
		<div class="clearfix"></div>
		<!-- // Sidebar menu & content wrapper END -->
		
				<!-- Footer -->
		<div id="footer" class="hidden-print">
			
			<!--  Copyright Line -->
			<div class="copy">&copy; 2012 - 2014 - <a href="http://www.mosaicpro.biz">MosaicPro</a> - All Rights Reserved. <a href="http://themeforest.net/?ref=mosaicpro" target="_blank">Purchase Social Admin Template</a> - Current version: v2.0.1-rc1 / <a target="_blank" href="../assets/../../CHANGELOG.txt?v=v2.0.1-rc1">changelog</a></div>
			<!--  End Copyright Line -->
	
		</div>
		<!-- // Footer END -->
		
				
	</div>
	<!-- // Main Container Fluid END -->
	
    <!-- Global -->
    <script data-id="App.Config">
                var basePath = '',
            commonPath = '../assets/',
            rootPath = '../',
            DEV = false,
            componentsPath = '../assets/components/';

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
</html>