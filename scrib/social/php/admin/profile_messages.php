

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->

<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/messages.html?lang=en&v=v2.0.1-rc1&layout_fixed=true by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 19 Jun 2014 10:34:46 GMT -->
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
        <link rel="stylesheet" href="../assets/less/pages/serveStylescd4d.css?module=admin&amp;page=messages&amp;url_rewrite=&amp;lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true" />
    
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
		'../../../shared/assets/components/admin_messages/messages.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
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
	<!-- Widget -->
	<div class="widget widget-messages widget-heading-simple widget-body-white">
		<div class="widget-body padding-none margin-none">
			
			<div class="row row-merge borders">
				<div class="col-md-3 listWrapper">
					<div class="innerAll">
						<form autocomplete="off" class="form-inline margin-none">
							<div class="input-group input-group-sm">
								<input type="text" class="form-control" placeholder="Find messages .." />
								<span class="input-group-btn">
									<button type="button" class="btn btn-primary btn-xs pull-right"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>
					</div>
					<div class="bg-gray text-center strong border-top innerAll half">1490 messages <i class="fa fa-circle-arrow-down"></i></div>
					<ul class="list-unstyled">
																		<li class="border-bottom  bg-primary">
							<div class="media innerAll">
								<div class="media-object pull-left hidden-phone">
									<a href="#">
										<img src="../assets/images/people/50/16.jpg" alt="Image" />
									</a>
								</div>
								<div class="media-body">
									<div><span class="strong">mosaicpro</span> <small class="text-italic pull-right label label-default">2 days</small></div>
									<div>Latest comment line...</div>
								</div>
							</div>
						</li>
												<li class="border-bottom ">
							<div class="media innerAll">
								<div class="media-object pull-left hidden-phone">
									<a href="#">
										<img src="../assets/images/people/50/17.jpg" alt="Image" />
									</a>
								</div>
								<div class="media-body">
									<div><span class="strong">Joanne</span> <small class="text-italic pull-right label label-default">2 days</small></div>
									<div>Latest comment line...</div>
								</div>
							</div>
						</li>
												<li class="border-bottom ">
							<div class="media innerAll">
								<div class="media-object pull-left hidden-phone">
									<a href="#">
										<img src="../assets/images/people/50/18.jpg" alt="Image" />
									</a>
								</div>
								<div class="media-body">
									<div><span class="strong">Adrian</span> <small class="text-italic pull-right label label-default">2 days</small></div>
									<div>Latest comment line...</div>
								</div>
							</div>
						</li>
												<li class="border-bottom ">
							<div class="media innerAll">
								<div class="media-object pull-left hidden-phone">
									<a href="#">
										<img src="../assets/images/people/50/19.jpg" alt="Image" />
									</a>
								</div>
								<div class="media-body">
									<div><span class="strong">Mary</span> <small class="text-italic pull-right label label-default">2 days</small></div>
									<div>Latest comment line...</div>
								</div>
							</div>
						</li>
												<li class="border-bottom ">
							<div class="media innerAll">
								<div class="media-object pull-left hidden-phone">
									<a href="#">
										<img src="../assets/images/people/50/20.jpg" alt="Image" />
									</a>
								</div>
								<div class="media-body">
									<div><span class="strong">John</span> <small class="text-italic pull-right label label-default">2 days</small></div>
									<div>Latest comment line...</div>
								</div>
							</div>
						</li>
											</ul>
				</div>
				<div class="col-md-9 detailsWrapper">
					

					<!-- User -->
					<div class="bg-primary">
						<div class="media">
							<a href="#" class="pull-left">
								<img src="../assets/images/people/100/13.jpg" width="65" class="media-object">
							</a>
							<div class="media-body innerTB innerR">
								<div class="innerT half pull-right">
								<a  href="#type" class=" btn btn-default bg-white btn-sm" data-toggle="collapse">
									<i class="fa fa-pencil"></i> Write
								</a>
								</div>
								<h4 href="#" class="text-white pull-left innerAll strong display-block margin-none">Joanne Smith</h4>
								

							</div>

						</div>
					</div>
					<div class="bg-gray innerAll text-center margin-none"><a href="#" class="text-muted lead"><i class="icon-time-clock"></i> View Archive</a></div>
					<div  id="type" class="collapse border-top">
						<textarea type="text" class="form-control rounded-none border-none" placeholder="Write your messages..."></textarea>
					</div>

					<div class="widget border-top padding-none margin-none">
					
						<!--  Message -->
						<div class="media margin-none innerAll">
							<a href="#" class="pull-left hidden-xs">
								<img src="../assets/images/people/100/16.jpg" width="60" class="media-object">
							</a>
							<div class="media-body innerTB">
								<div class="row">
									<div class="col-sm-6">
										<div class="innerT half">
											<div class="media">
												<div class="pull-left">
													<a href="#" class="strong text-inverse ">Mr. Awesome</a>
													<span class="innerR text-muted visible-xs">Jan 15th, 2014 </span>
												</div>
												<div class="media-body">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit.
												</div>
											</div>
										</div>	
									</div>
									<div class="col-sm-6 hidden-xs">
										<i class="icon-time-clock pull-right text-muted innerT half fa fa-2x"></i>
										<span class="pull-right innerR innerT text-right  text-muted">
										Jan 15th, 2014 
										</span>
									</div>
								</div>
							</div>

						</div>

						<!--  Message -->
						<div class="media margin-none bg-gray border-top innerAll">
							<a href="#" class="pull-left hidden-xs">
								<img src="../assets/images/people/100/13.jpg" width="60" class="media-object">
							</a>
							<div class="media-body innerTB">
								<div class="row">
									<div class="col-sm-6">
										<div class="innerT half">
											<div class="media">
												<div class="pull-left">
													<a href="#" class="strong text-inverse ">Joanne Smith</a>
													<span class="innerR text-muted visible-xs">Jan 15th, 2014 </span>
												</div>
												<div class="media-body">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, in.
												</div>
											</div>
										</div>	
									</div>
									<div class="col-sm-6 hidden-xs">
										<i class="icon-time-clock pull-right text-muted innerT half fa fa-2x"></i>
										<span class="pull-right innerR innerT text-right  text-muted">
										Jan 15th, 2014 
										</span>
									</div>
								</div>
							</div>

						</div>

						<!--  Message -->
						<div class="media margin-none border-top innerAll">
							<a href="#" class="pull-left hidden-xs">
								<img src="../assets/images/people/100/16.jpg" width="60" class="media-object">
							</a>
							<div class="media-body innerTB">
								<div class="row">
									<div class="col-sm-6">
										<div class="innerT half">
											<div class="media">
												<div class="pull-left">
													<a href="#" class="strong text-inverse ">Mr. Awesome</a>
													<span class="innerR text-muted visible-xs">Jan 15th, 2014 </span>
												</div>
												<div class="media-body">
													Hello World!
												</div>
											</div>
										</div>	
									</div>
									<div class="col-sm-6 hidden-xs">
										<i class="icon-time-clock pull-right text-muted innerT half fa fa-2x"></i>
										<span class="pull-right innerR innerT text-right  text-muted">
										Jan 15th, 2014 
										</span>
									</div>
								</div>
							</div>

						</div>
						

						<!--  Message -->
						<div class="media margin-none bg-gray border-top innerAll">
							<a href="#" class="pull-left hidden-xs">
								<img src="../assets/images/people/100/13.jpg" width="60" class="media-object">
							</a>
							<div class="media-body innerTB">
								<div class="row">
									<div class="col-sm-6">
										<div class="innerT half">
											<div class="media">
												<div class="pull-left">
													<a href="#" class="strong text-inverse ">Joanne Smith</a>
													<span class="innerR text-muted visible-xs">Jan 15th, 2014 </span>
												</div>
												<div class="media-body">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, in.
												</div>
											</div>
										</div>	
									</div>
									<div class="col-sm-6 hidden-xs">
										<i class="icon-time-clock pull-right text-muted innerT half fa fa-2x"></i>
										<span class="pull-right innerR innerT text-right  text-muted">
										Jan 15th, 2014 
										</span>
									</div>
								</div>
							</div>

						</div>

						<!--  Message -->
						<div class="media margin-none border-top innerAll">
							<a href="#" class="pull-left hidden-xs">
								<img src="../assets/images/people/100/16.jpg" width="60" class="media-object">
							</a>
							<div class="media-body innerTB">
								<div class="row">
									<div class="col-sm-6">
										<div class="innerT half">
											<div class="media">
												<div class="pull-left">
													<a href="#" class="strong text-inverse ">Joanne Smith</a>
													<span class="innerR text-muted visible-xs">Jan 15th, 2014 </span>
												</div>
												<div class="media-body">
													Hello World!
												</div>
											</div>
										</div>	
									</div>
									<div class="col-sm-6 hidden-xs">
										<i class="icon-time-clock pull-right text-muted innerT half fa fa-2x"></i>
										<span class="pull-right innerR innerT text-right  text-muted">
										Jan 15th, 2014 
										</span>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- // Widget END -->

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

<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/messages.html?lang=en&v=v2.0.1-rc1&layout_fixed=true by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 19 Jun 2014 10:35:08 GMT -->
</html>