<?php 

ob_start();
session_start();
include("config.php");
include("auth.php");
?>



<!DOCTYPE html>

<html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />



<head>




<?php include("header.php"); 
$visitor_id=$_SESSION['SESS_MID'];
 ?>

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

		



		<!-- // END col -->



		



				<!-- col -->

  

		



		<div class="col-md-4 col-lg-3">



<div class="widget">



    


</div>

<div id="sticker">

<?php 

include("follow_first.php");

?>
</div>
 <div class="clear"></div>






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










</html>