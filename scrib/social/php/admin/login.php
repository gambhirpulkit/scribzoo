
<?php
if($_GET['action'] == 'logout'){

session_unset();
session_destroy();
}
?>



<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="description" content="WRITE, SHARE, EXPLORE and AUTHENTICATE testimonials about people around you.">
<meta name="keywords" content="testimonials, write a testimonial, testimonial samples, testimonial easy samples, social network for testimonial, best testimonial, best testimonial in internet, cool testimonial, friends, friendship, friendship testimonial, corporate testimonials">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">



<!-- SITE TITLE -->
<title>Scribzoo | WRITE, SHARE, EXPLORE and AUTHENTICATE testimonials about people around you.</title>

<!-- =========================
      FAV AND TOUCH ICONS  
============================== -->
<link rel="icon" href="login/images/favicon.ico">
<link rel="apple-touch-icon" href="login/images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="login/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="login/images/apple-touch-icon-114x114.png">

<!-- =========================
     STYLESHEETS   
============================== -->
<!-- BOOTSTRAP -->
<link rel="stylesheet" href="login/css/bootstrap.min.css">
<style>
.fb-login {
  display: block;
  line-height: 40px;
  text-align: center;
  color: white;
  font-weight: 800;
  border-radius: 3px;
  height: 40px;
  width: 100%;
  background-color: #5667af;
  transition: background-color 0.4s;
}
</style>

<!-- FONT ICONS -->
<!-- IonIcons -->
<link rel="stylesheet" href="login/assets/ionicons/css/ionicons.css">

<!-- Font Awesome 
<link rel="stylesheet" href="login/assets/font-awesome/css/font-awesome.min.css">
-->

<!-- Elegant Icons -->
<link rel="stylesheet" href="login/assets/elegant-icons/style.css">
<!--[if lte IE 7]><script src="assets/elegant-icons/lte-ie7.js"></script><![endif]-->

<!-- CAROUSEL AND LIGHTBOX -->
<link rel="stylesheet" href="login/css/owl.theme.css">
<link rel="stylesheet" href="login/css/owl.carousel.css">
<link rel="stylesheet" href="login/css/nivo-lightbox.css">
<link rel="stylesheet" href="login/css/nivo_themes/default/default.css">

<!-- COLORS | CURRENTLY USED DIFFERENTLY TO SWITCH FOR DEMO. IN ORIGINAL FILE ALL COLORS LINK IS COMMENTED EXCEPT BLUE -->
<link rel="stylesheet" href="login/css/colors/blue.css" title="blue">
<link rel="alternate stylesheet" href="login/css/colors/green.css" title="green">
<link rel="alternate stylesheet" href="login/css/colors/orange.css" title="orange">
<link rel="alternate stylesheet" href="login/css/colors/purple.css" title="purple">
<link rel="alternate stylesheet" href="login/css/colors/slate.css" title="slate">
<link rel="alternate stylesheet" href="login/css/colors/yellow.css" title="yellow">
<link rel="alternate stylesheet" href="login/css/colors/red.css" title="red">
<link rel="alternate stylesheet" href="login/css/colors/blue-munsell.css" title="blue-munsell">

<!-- CUSTOM STYLESHEETS -->
<link rel="stylesheet" href="login/css/styles.css">

<!-- RESPONSIVE FIXES -->
<link rel="stylesheet" href="login/css/responsive.css">

<!--[if lt IE 9]>
			<script src="login/js/html5shiv.js"></script>
			<script src="login/js/respond.min.js"></script>
<![endif]-->

<!-- ****************
      After neccessary customization/modification, Please minify HTML/CSS according to http://browserdiet.com/en/ for better performance
     **************** -->

<!-- STYLE SWITCH STYLESHEET ONLY FOR DEMO -->
<link rel="stylesheet" href="login/demo/demo.css">
     
</head>

<body>
<!-- =========================
     PRE LOADER       
============================== -->
<div class="preloader">
  <div class="status">&nbsp;</div>
</div>

<!-- =========================
     HEADER   
============================== -->
<header id="home">

<!-- COLOR OVER IMAGE -->
<div class="color-overlay">
	
	<div class="navigation-header">
		
		
		
		<!-- ONLY LOGO ON HEADER -->
		<div class="navbar non-sticky">
			
			<div class="container">
				
				<div class="navbar-header">
					<h2 style="color:white"><strong>scribzoo</strong></h2>
				</div>
				
				<ul class="nav navbar-nav navbar-right social-navigation hidden-xs">
					<li><a href="https://www.facebook.com/Scribzoo"><i class="social_facebook_circle"></i></a></li>
					<li><a href="https://twitter.com/myscribzoo"><i class="social_twitter_circle"></i></a></li>
					
				</ul>
			</div>
			<!-- /END CONTAINER -->
			
		</div>
		<!-- /END ONLY LOGO ON HEADER -->
		
	</div>
	
	<!-- HEADING, FEATURES AND REGISTRATION FORM CONTAINER -->
	<div class="container">
		
		<div class="row">
			
			<!-- LEFT - HEADING AND TEXTS -->
			<div class="col-md-7 col-sm-7 intro-section">
				
				<h3 class="intro text-left">
				<strong>WRITE, SHARE, <a href="http://scribzoo.com/scrib/social/php/admin/explore_content.php?source=testimonials">EXPLORE</a></strong> and <strong>AUTHENTICATE</strong> testimonials  about people around you.				</h3>
				
				
			</div>
			
			<!-- RIGHT - REGISTRATION FORM -->
			
			<div class="col-md-5 col-sm-5">
				
				<div class="vertical-registration-form">
					<div class="colored-line">
					</div>
					<a href="fbconnect.php" class="fb-login">Log In with Facebook</a><BR>
					<h4>OR</h4>
					<h3>LOGIN</h3>
					<form class="registration-form" action="login_exec.php" method="post" id="register" role="form">

						<input class="form-control input-box" id="email" type="email" name="email" placeholder="Your Email">
						<input class="form-control input-box" id="password" type="password" name="password" placeholder="Password">
						<button class="btn standard-button" type="submit" id="submit" name="submit">LOGIN</button>
					</form>
					<h4 class="">Not a member? <a href="register.php">Join us today!</a></h4>
				</div>
			</div>
			<!-- /END - REGISTRATION FORM -->
		</div>
		
	</div>
	<!-- /END HEADING, FEATURES AND REGISTRATION FORM CONTAINER -->
	
</div>

</header>






<!-- =========================
     SCRIPTS   
============================== -->
<script src="login/js/jquery.min.js"></script>

<script>
/* =================================
   LOADER                     
=================================== */
// makes sure the whole site is loaded
jQuery(window).load(function() {
        // will first fade out the loading animation
	jQuery(".status").fadeOut();
        // will fade out the whole DIV that covers the website.
	jQuery(".preloader").delay(1000).fadeOut("slow");
})

</script>

<script src="login/js/bootstrap.min.js"></script>
<script src="login/js/retina-1.1.0.min.js"></script>
<script src="login/js/smoothscroll.js"></script>
<script src="login/js/jquery.scrollTo.min.js"></script>
<script src="login/js/jquery.localScroll.min.js"></script>
<script src="login/js/owl.carousel.min.js"></script>
<script src="login/js/nivo-lightbox.min.js"></script>
<script src="login/js/simple-expand.min.js"></script>
<script src="login/js/jquery.nav.js"></script>
<script src="login/js/matchMedia.js"></script>
<script src="login/js/jquery.fitvids.js"></script>
<script src="login/js/jquery.ajaxchimp.min.js"></script>
<script src="login/js/custom.js"></script>
<!-- ****************
      After neccessary customization/modification, Please minify JavaScript/jQuery according to http://browserdiet.com/en/ for better performance
     **************** -->



</body>

</html>