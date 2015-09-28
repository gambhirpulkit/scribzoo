<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->

<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/about_3.html?lang=en&v=v2.0.1-rc1&layout_fixed=true by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 19 Jun 2014 10:34:18 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title>Social Admin Template (v2.0.1-rc1)</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

    <!--
	**********************************************************
	In development, use the LESS files and the less.js compiler
	instead of the minified CSS loaded by default.
	**********************************************************
	<link rel="stylesheet/less" href="../assets/less/admin/module.admin.stylesheet-complete.layout_fixed.true.less" />
	-->

            <!--[if lt IE 9]><link rel="stylesheet" href="http://preview2.mosaicpro.biz/shared/assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->
        <link rel="stylesheet" href="../assets/less/pages/serveStyles4ea8.css?module=admin&amp;page=about_3&amp;url_rewrite=&amp;lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true" />
         <link rel="stylesheet" href="image/style.css" />

    
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="../../../shared/assets/plugins/core_ajaxify_loadscript/script.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2"></script>
    <script src="../../../shared/assets/plugins/core_ajaxify_loadscript/modernizr.custom.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2"></script>
    <script src="../../../shared/assets/plugins/core_ajaxify_loadscript/classie.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2"></script>
<script src="../../../shared/assets/plugins/core_ajaxify_loadscript/demo1.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2"></script>
    <script src="image/images.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(function() 
{
// Title tag
$("h4").click(function() 
{
var titleid = $(this).attr("id");
var sid=titleid.split("title"); // Splitting eg: title21 to 21
var id=sid[1];
var parent = $(this).parent();
$(this).hide();
$("#formbox"+id).show();
return false;
});
// Save Button
$(".save").click(function() 
{
var A=$(this).parent().parent();
var X=A.attr('id');
var d=X.split("formbox"); // Splitting  Eg: formbox21 to 21
var id=d[1];
var Z=$("#"+X+" input.content").val();
var dataString = 'id='+ id +'&title='+Z ;
$.ajax({
type: "POST",
url: "image/imageajax.php",
data: dataString,
cache: false,
success: function(data)
{
A.hide(); 
$("#title"+id).html(Z); 
$("#title"+id).show(); 
}
});
return false;
});
// Cancel Button
$(".cancel").click(function() 
{
var A=$(this).parent().parent();
var X= A.attr("id");
var d=X.split("formbox");
var id=d[1];
$("#title"+id).show();
A.hide();
return false;
});

});
</script>
    
<script>var App = {};</script>

<script data-id="App.Scripts">
App.Scripts = {

	/* CORE scripts always load first; */
	core: [
		'http://cdn2.mosaicpro.biz/shared/assets/library/jquery/jquery.min.js?v=v2.0.1-rc1&sv=v0.0.1.2', 
		'../../../shared/assets/library/modernizr/modernizr9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2'
	],

	/* PLUGINS_DEPENDENCY always load after CORE but before PLUGINS; */
	plugins_dependency: [
		'http://cdn2.mosaicpro.biz/shared/assets/library/bootstrap/js/bootstrap.min.js?v=v2.0.1-rc1&sv=v0.0.1.2', 
		'../../../shared/assets/library/jquery/jquery-migrate.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2'
	],

	/* PLUGINS always load after CORE and PLUGINS_DEPENDENCY, but before the BUNDLE / initialization scripts; */
	plugins: [
		'http://cdn2.mosaicpro.biz/shared/assets/plugins/core_ajaxify_davis/davis.min.js?v=v2.0.1-rc1&sv=v0.0.1.2', 
		'../../../shared/assets/plugins/core_ajaxify_lazyjaxdavis/jquery.lazyjaxdavis.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/core_preload/pace.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/core_nicescroll/jquery.nicescroll.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/core_breakpoints/breakpoints9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../assets/plugins/menu_sidr/jquery.sidr7359.js?v=v2.0.1-rc1', 
		'../../../shared/assets/plugins/media_holder/holder9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/core_less-js/less.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/charts_flot/excanvas9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/core_browser/ie/ie.prototype.polyfill9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2'
	],

	/* The initialization scripts always load last and are automatically and dynamically loaded when AJAX navigation is enabled; */
	bundle: [
		'http://cdn2.mosaicpro.biz/shared/assets/components/core_ajaxify/ajaxify.init.js?v=v2.0.1-rc1&sv=v0.0.1.2', 
		'../../../shared/assets/components/core_preload/preload.pace.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/widget_twitter/twitter.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../assets/components/core/core.init7359.js?v=v2.0.1-rc1'
	]

};
</script>

<script>
$script(App.Scripts.core, 'core');

$script.ready(['core'], function(){
	$script(App.Scripts.plugins_dependency, 'plugins_dependency');
});
$script.ready(['core', 'plugins_dependency'], function(){
	$script(App.Scripts.plugins, 'plugins');
});
$script.ready(['core', 'plugins_dependency', 'plugins'], function(){
	$script(App.Scripts.bundle, 'bundle');
});
</script>
    <script>if (/*@cc_on!@*/false && document.documentMode === 10) { document.documentElement.className+=' ie ie10'; }</script>

</head><body class=" scripts-async menu-right-hidden">
	
	<!-- Main Container Fluid -->
	<div class="container-fluid ">

		
		<!-- Content START -->
		<div id="content">
			
	
<?php include("navbar.php");
?>

			 <div class="container"><div class="innerAll">
	<div class="row">
		<div class="col-lg-9 col-md-8">
			
			<div class="timeline-cover">
	<div class="widget border-bottom">

		<div class="widget-body border-bottom">
			<div class="media">
				<div class="pull-left innerAll">
					<img src="../assets/images/people/100/22.jpg" alt="" class="img-circle">
				</div>
				<div class="media-body">
<?php
include('config.php');
$sql=mysql_query("select id,title,imageurl from images");
while($row=mysql_fetch_array($sql))
{
$id=$row['id'];
$title=$row['title'];
$imageurl=$row['imageurl'];
?>
<div id="formbox<?php echo $id; ?>" style="display:none">
<form method="post" name="form<?php echo $id; ?>">
<input type="text" value="<?php echo $title; ?>" name='content' class='content'/><br />
<input type='submit' value=" SAVE " class="save" />
or
<input type="button" value=" Cancel " class="cancel"/>
</form>
</div>
<h4 id="title<?php echo $id; ?>"><?php echo $title; ?></h4>
<!--<img src="<?php echo $imageurl; ?>" />-->

<?php } ?>					
					<div class="clearfix"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, laudantium, itaque modi beatae vitae delectus sit officia nesciunt non esse.</p>
					
				</div>
			</div>
		</div>

		<div class="">
			<ul class="navigation">
				<li><a class="" href="profile_timeline.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true"><i class="fa fa-fw icon-road-sign"></i><span> Timeline</span></a></li>
				<li><a href="profile_photos.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true"><i class="fa fa-fw icon-flip-camera"></i><span>Boards</span></a></li>
				<li><a href="profile_connections.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true"><i class="fa fa-fw icon-group"></i><span> Connections</span></a></li>
				<li><a href="profile_messages.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true"><i class="fa fa-fw fa-envelope"></i><span> Messages</span></a></li>
				<li class="pull-right active"><a href="profile.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true"><i class="fa fa-fw fa-user"></i><span> About</span></a></li>
			</ul>
			<div class="clearfix"></div>
		</div>

<!-- 		<nav class="navbar widget-head padding-none margin-none" role="navigation">
	      
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3">
	            <span>Choose menu </span>
	            <i class="fa fa-bars "></i>
	           
	          </button>
	        </div>
	        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-3" style="height: 1px;">
				<div class="padding-none">
					<ul class="display-block">
						<li><a class="" href="timeline_3.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true"><i class="fa fa-fw icon-road-sign"></i> <span>Timeline</span></a></li>
						<li><a href="media_3.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true"><i class="fa fa-fw icon-flip-camera"></i> <span>Photos</span></a></li>
						<li><a href="contacts_3.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true"><i class="fa fa-fw icon-group"></i> <span>Friends</span></a></li>
						<li><a href="messages.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true"><i class="fa fa-fw fa-envelope"></i> <span>Messages</span></a></li>
						<li class="pull-right active"><a href="about_3.html?lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true"><i class="fa fa-fw fa-user"></i> <span>About</span></a></li>
					</ul>
				</div>
	        </div>
	      
	    </nav>
 -->

		
	
		

	</div>
	

</div>



			<div class="widget">
				<div class="innerAll">
				<h3 class="margin-none">About</h3>
					
					
					<div class="row border-top">
						<div class="col-sm-6">
							<h5 class="innerT">Hobby</h5>
							<div class="widget bg-gray innerAll margin-none">
								<span class="innerR innerB">
									<i class="box-generic innerAll icon-chef-hat fa fa-4x" data-toggle="tooltip" data-original-title="Cooking" data-placement="bottom"></i>
								</span>
								<span class="innerR innerB">
									<i class="box-generic innerAll  icon-soccerball-fiil fa fa-4x" data-toggle="tooltip" data-original-title="Soccer" data-placement="bottom"></i>
								</span>
								<span class="innerR innerB">
									<i class="box-generic innerAll  icon-steering-wheel fa fa-4x" data-toggle="tooltip" data-original-title="Driving" data-placement="bottom"></i>
								</span>
								<span class="innerR innerB">
									<i class="box-generic innerAll  icon-swimming fa fa-4x" data-toggle="tooltip" data-original-title="Swimming" data-placement="bottom"></i>
								</span>
							</div>
						</div>
						<div class="col-sm-6">
							<h5 class="innerT">Close Friends</h5>
							<div class="widget bg-gray">
								<div class="innerAll">
																		<a href="#">
										<img src="../assets/images/people/50/1.jpg" alt="" class="innerR innerB half"/>
									</a>
																		<a href="#">
										<img src="../assets/images/people/50/2.jpg" alt="" class="innerR innerB half"/>
									</a>
																		<a href="#">
										<img src="../assets/images/people/50/3.jpg" alt="" class="innerR innerB half"/>
									</a>
																		<a href="#">
										<img src="../assets/images/people/50/4.jpg" alt="" class="innerR innerB half"/>
									</a>
																		<a href="#">
										<img src="../assets/images/people/50/5.jpg" alt="" class="innerR innerB half"/>
									</a>
																		<a href="#">
										<img src="../assets/images/people/50/6.jpg" alt="" class="innerR innerB half"/>
									</a>
																		<a href="#">
										<img src="../assets/images/people/50/7.jpg" alt="" class="innerR innerB half"/>
									</a>
																		<a href="#">
										<img src="../assets/images/people/50/8.jpg" alt="" class="innerR innerB half"/>
									</a>
																		<a href="#">
										<img src="../assets/images/people/50/9.jpg" alt="" class="innerR innerB half"/>
									</a>
																		<a href="#">
										<img src="../assets/images/people/50/10.jpg" alt="" class="innerR innerB half"/>
									</a>
																		<a href="#">
										<img src="../assets/images/people/50/11.jpg" alt="" class="innerR innerB half"/>
									</a>
																		<a href="#">
										<img src="../assets/images/people/50/12.jpg" alt="" class="innerR innerB half"/>
									</a>
																		<a href="#">
										<img src="../assets/images/people/50/13.jpg" alt="" class="innerR innerB half"/>
									</a>
																		<a href="#">
										<img src="../assets/images/people/50/14.jpg" alt="" class="innerR innerB half"/>
									</a>
																		<a href="#">
										<img src="../assets/images/people/50/15.jpg" alt="" class="innerR innerB half"/>
									</a>
																		<a href="#">
										<img src="../assets/images/people/50/16.jpg" alt="" class="innerR innerB half"/>
									</a>
										
								</div>
							</div>
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
							<span class="label label-default">mosaicpro</span>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">Friends:</div>
						<div class="col-sm-6 text-right">
							<span class="label label-default">219</span>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">Joined:</div>
						<div class="col-sm-6 text-right">
							<span class="label label-default">2 months ago</span>
						</div>
					</div>
				</div>
			</div>
			<div class="widget">
				<div class="widget-head border-bottom bg-gray">
					<h5 class="innerAll pull-left margin-none">Contact</h5>
					<div class="pull-right">
						<a href="#" class="text-muted">
							<i class="fa fa-facebook innerL"></i>
						</a>
						<a href="#" class="text-muted">
							<i class="fa fa-twitter innerL"></i>
						</a>
						<a href="#" class="text-muted">
							<i class="fa fa-dribbble innerL"></i>
						</a>
					</div>
				</div>
				<div class="widget-body padding-none">
					<div class="innerAll">
						<p class=" margin-none"><i class="fa fa-phone fa-fw text-muted"></i> 01 21198478</p>
					</div>
					<div class="border-top innerAll">
						<p class=" margin-none"><i class="fa fa-envelope fa-fw text-muted"></i> Email us</p>
					</div>
					<div class="border-top innerAll">
						<p class=" margin-none"><i class="fa fa-link fa-fw text-muted"></i> <a href="#">Visit website</a></p>
					</div>
				</div>
			</div>

			<div class="widget">
	<h5 class="innerAll margin-none border-bottom bg-gray">Followed Boards</h5>
	<div class="widget-body padding-none">
				<div class="media border-bottom innerAll margin-none">
			<img src="../assets/images/people/35/22.jpg" class="pull-left media-object"/>
			<div class="media-body">
				<a href="#" class="pull-right text-muted innerT half">
					<i class="fa fa-comments"></i> 4
				</a>
				<h5 class="margin-none"><a href="#" class="text-inverse">Social Admin Released</a></h5>
				<small>on February 2nd, 2014 </small> 
			</div>
		</div>
				<div class="media border-bottom innerAll margin-none">
			<img src="../assets/images/people/35/22.jpg" class="pull-left media-object"/>
			<div class="media-body">
				<a href="#" class="pull-right text-muted innerT half">
					<i class="fa fa-comments"></i> 4
				</a>
				<h5 class="margin-none"><a href="#" class="text-inverse">Timeline Cover Page</a></h5>
				<small>on February 2nd, 2014 </small> 
			</div>
		</div>
				<div class="media border-bottom innerAll margin-none">
			<img src="../assets/images/people/35/22.jpg" class="pull-left media-object"/>
			<div class="media-body">
				<a href="#" class="pull-right text-muted innerT half">
					<i class="fa fa-comments"></i> 4
				</a>
				<h5 class="margin-none"><a href="#" class="text-inverse">1000+ Sales</a></h5>
				<small>on February 2nd, 2014 </small> 
			</div>
		</div>
				<div class="media border-bottom innerAll margin-none">
			<img src="../assets/images/people/35/22.jpg" class="pull-left media-object"/>
			<div class="media-body">
				<a href="#" class="pull-right text-muted innerT half">
					<i class="fa fa-comments"></i> 4
				</a>
				<h5 class="margin-none"><a href="#" class="text-inverse">On-Page Optimization</a></h5>
				<small>on February 2nd, 2014 </small> 
			</div>
		</div>
				<div class="media border-bottom innerAll margin-none">
			<img src="../assets/images/people/35/22.jpg" class="pull-left media-object"/>
			<div class="media-body">
				<a href="#" class="pull-right text-muted innerT half">
					<i class="fa fa-comments"></i> 4
				</a>
				<h5 class="margin-none"><a href="#" class="text-inverse">14th Admin Template</a></h5>
				<small>on February 2nd, 2014 </small> 
			</div>
		</div>
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