<?php 

ob_start();
session_start();
include("config.php");
include("auth.php");

$visitor_email = $_SESSION['SESS_EMAIL'];


$qry_check=mysql_query("select username,firstname,lastname,hometown,aboutme,m_id from member where login='$visitor_email'");
$result_check = mysql_fetch_array($qry_check);
$reason = $_GET['reason'];
if($reason!='edit'){
if($result_check['username']!='' && $result_check['firstname']!='' && $result_check['lastname']!='' && $result_check['hometown']!='' && $result_check['aboutme']!='')
{

$_SESSION['SESS_FIRST_NAME'] = $result_check['firstname'];

	 $_SESSION['SESS_HOMETOWN'] = $result_check['hometown'];

	$_SESSION['SESS_LAST_NAME'] = $result_check['lastname'];

	$_SESSION['SESS_USERNAME'] = $result_check['username'];

header( 'Location: main_timeline.php' ) ;
}}
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
			
								
			<div class="widget widget-survey">
				<div class="widget-head ">
					<div class="innerAll text-center">
						<ul class="nav nav-pills strong">
						  	<li class="active"><a href="#feedback" data-toggle="tab">Complete Your Personal Details</a></li>
						 
						</ul>
					</div>
				</div>
				<div class="widget-body padding-none">

					<div class="tab-content">

					  	<div class="tab-pane active" id="feedback">
							
							<div class="innerAll border-bottom">
						  		<h5 class="innerTB margin-none half">email</h5>
						  		<h4><?php echo $visitor_email; ?> &nbsp;<i class="fa fa-check"></i></h4>
					  		</div>
							
							
							
							<form action="register_exec.php" id="form_register" method="post" enctype="multipart/form-data">
							
							<div class="innerAll border-bottom">
						  		<h5 class="innerTB margin-none half">Username</h5>
						  		<h4><input type="text" class="form-control" name="username" onKeyUp="check_username()" id="username_login" placeholder="Type in here" value="<?php echo $result_check['username'] ?>" /></h4>
								<h4><?php echo $error; ?></h4>
								<div id="datadivcheckusername"></div>
					  		</div>
							
							<div class="innerAll border-bottom">
						  		<h5 class="innerTB margin-none half">First Name</h5>
						  		<input type="text" class="form-control" name="firstname" id="firstname_login" placeholder="Type in here" value="<?php echo $result_check['firstname'] ?>" />
					  		</div>
							
							<div class="innerAll border-bottom">
						  		<h5 class="innerTB margin-none half">Last Name</h5>
						  		<input type="text" class="form-control" name="lastname" id="lastname_login" placeholder="Type in here" value="<?php echo $result_check['lastname'] ?>" />
					  		</div>
							
							
							
							<div class="innerAll border-bottom">
						  		<h5 class="innerTB margin-none half">hometown</h5>
						  		<input type="text" class="form-control" name="hometown" id="hometown_login" placeholder="Type in here" value="<?php echo $result_check['hometown'] ?>" />
					  		</div>
							
							<div class="innerAll border-bottom">
						  		<h5 class="innerTB margin-none half">Describe yourself</h5>
						  		<textarea class="form-control" name="aboutme" id="aboutme_login" placeholder="Type in here" ><?php echo $result_check['aboutme'] ?></textarea>
					  		</div>
							
							 <div class="innerAll text-center">
				             <a href="main_timeline.php" class="btn btn-primary no-ajaxify" onClick="update_form_data_login('<?php echo $visitor_email ?>')">Continue to timeline!</a>
			                 </div>
							
							</form>
						
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