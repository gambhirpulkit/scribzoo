<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->

<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/thumbnails.html?module=admin&page=thumbnails&url_rewrite=&lang=en&v=v2.0.1-rc1&skin=antique-brass&layout_fixed=true&navbar_type=navbar-inverse by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 20 Jun 2014 06:47:45 GMT -->
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
	<link rel="stylesheet/less" href="../assets/less/skins/module.admin.stylesheet-complete.skin.antique-brass.layout_fixed.true.less" />
	-->

            <!--[if lt IE 9]><link rel="stylesheet" href="http://preview2.mosaicpro.biz/shared/assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->
        <link rel="stylesheet" href="../assets/less/pages/serveStyles5aa5-2.css?module=admin&amp;page=thumbnails&amp;url_rewrite=&amp;lang=en&amp;v=v2.0.1-rc1&amp;skin=antique-brass&amp;layout_fixed=true&amp;navbar_type=navbar-inverse" />
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="../../../shared/assets/plugins/core_ajaxify_loadscript/script.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2"></script>

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
			
<?php
include('navbar.php')	
?>


			 <div class="container"><h2>Thumbnails <span>Grids of images, videos, text, and more</span></h2>
<div class="innerLR">

	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body"><p class="lead center margin-none">Get started by subscribing to boards and people.<span></span></p></div>
	</div>
	
	<!-- Row -->
	<div class="row">
		
		<!-- Column -->
		<div class="col-md-2">
		
		<!-- Thumbnail -->
		<div>

<div class="thumbnail widget-thumbnail">
	<img data-src="holder.js/100%x140" alt="100%x140 Image Holder" />
	<div class="caption">
		<center>
		<h4><STRONG>Board</strong><br><a href="#" class="btn btn-inverse">Subscribe</a></h4>
</center>
	</div>
</div>
<!-- // Thumbnail END -->

</div>


		</div>
		<!-- // Column END -->
		<!-- Column -->
		<!-- Column -->
		<div class="col-md-2">
		
			<!-- Thumbnail -->
<!-- Thumbnail -->
<div class="thumbnail widget-thumbnail">
	<img data-src="holder.js/100%x140" alt="100%x140 Image Holder" />
	<div class="caption">
		<center>
		<h4><b>Board 2</b><a href="#" class="btn btn-inverse">Subscribe</a></h4>
</center>
	</div>
</div>
<!-- // Thumbnail END -->




		</div>
		<!-- // Column END -->
		<!-- Column -->
		<!-- Column -->
		<div class="col-md-2">
		
			<!-- Thumbnail -->
<div class="thumbnail widget-thumbnail">
	<img data-src="holder.js/100%x140" alt="100%x140 Image Holder" />
	<div class="caption">
		<center>
		<h4>Board 3<a href="#" class="btn btn-inverse">Subscribe</a></h4>
</center>
		
		
		
	</div>
</div>
<!-- // Thumbnail END -->




		</div>
		<!-- // Column END -->
		<!-- Column -->
		<!-- Column -->
		<div class="col-md-2">
		
<!-- Thumbnail -->
<div class="thumbnail widget-thumbnail">
	<img data-src="holder.js/100%x140" alt="100%x140 Image Holder" />
	<div class="caption">
		<center>
		<h4>Board 4<a href="#" class="btn btn-inverse">Subscribe</a></h4>
</center>
	</div>
</div>
<!-- // Thumbnail END -->




		</div>
		<!-- // Column END -->
		<!-- Column -->
		<div class="col-md-2">
		
	<!-- Thumbnail -->
<div class="thumbnail widget-thumbnail">
	<img data-src="holder.js/100%x140" alt="100%x140 Image Holder" />
	<div class="caption">
		<center>
		<h4>Board 5<a href="#" class="btn btn-inverse">Subscribe</a></h4>
</center>
	</div>
</div>
<!-- // Thumbnail END -->



		</div>
		<!-- // Column END -->
		
		<!-- Column -->
		<div class="col-md-2">
			
		<!-- Thumbnail -->
<div class="thumbnail widget-thumbnail">
	<img data-src="holder.js/100%x140" alt="100%x140 Image Holder" />
	<div class="caption">
		<center>
		<h4>Board 6<a href="#" class="btn btn-inverse">Subscribe</a></h4>
</center>
	</div>
</div>
<!-- // Thumbnail END -->	
		</div>
		<!-- // Column END -->
<!-- Column -->

		<div class="col-md-2">
<BR>		
			<!-- Thumbnail -->
			
			

<div class="thumbnail widget-thumbnail">
	<img data-src="holder.js/100%x140" alt="100%x140 Image Holder" />
	<div class="caption">
		<center>
		<h4>Board 7<a href="#" class="btn btn-inverse">Subscribe</a></h4>
</center>
	</div>
</div>
<!-- // Thumbnail END -->
</div>
<div class="col-md-2">
	<BR>	
			<!-- Thumbnail -->
<div class="thumbnail widget-thumbnail">
	<img data-src="holder.js/100%x140" alt="100%x140 Image Holder" />
	<div class="caption">
		<center>
		<h4>Board 8<a href="#" class="btn btn-inverse">Subscribe</a></h4>
</center>
	</div>
</div>
<!-- // Thumbnail END -->
</div>
<div class="col-md-2">
		<BR>
			<!-- Thumbnail -->
<div class="thumbnail widget-thumbnail">
	<img data-src="holder.js/100%x140" alt="100%x140 Image Holder" />
	<div class="caption">
		<center>
		<h4>Board 9<a href="#" class="btn btn-inverse">Subscribe</a></h4>
</center>
	</div>
</div>
<!-- // Thumbnail END -->
</div>
<div class="col-md-2">
		<BR>
			<!-- Thumbnail -->
<div class="thumbnail widget-thumbnail">
	<img data-src="holder.js/100%x140" alt="100%x140 Image Holder" />
	<div class="caption">
		<center>
		<h4>Board 10<a href="#" class="btn btn-inverse">Subscribe</a></h4>
</center>
	</div>
</div>
<!-- // Thumbnail END -->
</div>
<div class="col-md-2">
		<BR>
			<!-- Thumbnail -->
<div class="thumbnail widget-thumbnail">
	<img data-src="holder.js/100%x140" alt="100%x140 Image Holder" />
	<div class="caption">
		<center>
		<h4>Board 11<a href="#" class="btn btn-inverse">Subscribe</a></h4>
</center>
	</div>
</div>
<!-- // Thumbnail END -->
</div>
<div class="col-md-2">
		<BR>
			<!-- Thumbnail -->
<div class="thumbnail widget-thumbnail">
	<img data-src="holder.js/100%x140" alt="100%x140 Image Holder" />
	<div class="caption">
		<center>
		<h4>Board 12<a href="#" class="btn btn-inverse">Subscribe</a></h4>
</center>
	</div>
</div>
<!-- // Thumbnail END -->
</div>

		<!-- // Thumbnail END -->
			</div>
	<!-- // Row END -->
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
    <script data-id="App.Config">
                var basePath = '',
            commonPath = 'http://cdn2.mosaicpro.biz/social/php/assets/',
            rootPath = 'http://cdn2.mosaicpro.biz/social/php/',
            DEV = false,
            componentsPath = 'http://cdn2.mosaicpro.biz/social/php/assets/components/';

        var primaryColor = '#B3998A',
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

<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/thumbnails.html?module=admin&page=thumbnails&url_rewrite=&lang=en&v=v2.0.1-rc1&skin=antique-brass&layout_fixed=true&navbar_type=navbar-inverse by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 20 Jun 2014 06:47:45 GMT -->
</html>