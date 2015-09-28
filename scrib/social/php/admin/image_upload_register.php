
<?php 

ob_start();
session_start();
include("config.php");



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
						  	<li class="active"><h3>Please fill your details</h3></li>
						  
						</ul>
					</div>
				</div>
				<div class="widget-body padding-none">

					<div class="tab-content">

					  	<div class="tab-pane active" id="feedback">
						
						
						<iframe src="image_upload.php" width="550" height="520" frameBorder="0"></iframe>
						
							
							
							
							
							
							
						
						   
						
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