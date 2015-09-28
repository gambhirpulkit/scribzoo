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
	<link rel="stylesheet/less" href="../assets/less/admin/module.admin.stylesheet-complete.layout_fixed.false.less" />
	-->

            <!--[if lt IE 9]><link rel="stylesheet" href="http://preview2.mosaicpro.biz/shared/assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->
        <link rel="stylesheet" href="../assets/less/pages/serveStyles339e.css?module=admin&amp;page=form_elements&amp;url_rewrite=&amp;lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=false" />
    
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
		'../../../shared/assets/plugins/forms_elements_bootstrap-switch/js/bootstrap-switch9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/ui_modals/bootbox.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/notifications_gritter/js/jquery.gritter.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/forms_editors_wysihtml5/js/wysihtml5-0.3.0_rc2.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/forms_editors_wysihtml5/js/bootstrap-wysihtml5-0.0.29479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/forms_wizards/jquery.bootstrap.wizard9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/forms_elements_jasny-fileupload/js/bootstrap-fileupload9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/forms_elements_bootstrap-select/js/bootstrap-select9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/forms_elements_select2/js/select29479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/forms_elements_multiselect/js/jquery.multi-select9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/forms_elements_inputmask/jquery.inputmask.bundle.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/forms_elements_bootstrap-datepicker/js/bootstrap-datepicker9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/forms_elements_bootstrap-timepicker/js/bootstrap-timepicker9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/forms_elements_colorpicker-farbtastic/js/farbtastic.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/other_mixitup/jquery.mixitup.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/core_less-js/less.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/charts_flot/excanvas9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/core_browser/ie/ie.prototype.polyfill9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2'
	],

	/* The initialization scripts always load last and are automatically and dynamically loaded when AJAX navigation is enabled; */
	bundle: [
		'http://cdn2.mosaicpro.biz/shared/assets/components/core_ajaxify/ajaxify.init.js?v=v2.0.1-rc1&sv=v0.0.1.2', 
		'../../../shared/assets/components/core_preload/preload.pace.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/forms_elements_bootstrap-switch/bootstrap-switch.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/forms_elements_fuelux-checkbox/fuelux-checkbox.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/ui_modals/modals.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/admin_notifications_gritter/gritter.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../assets/components/forms_editors_wysihtml5/wysihtml5.init7359.js?v=v2.0.1-rc1', 
		'../../../shared/assets/components/forms_wizards/form-wizards.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/forms_elements_fuelux-radio/fuelux-radio.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/forms_elements_button-states/button-loading.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/forms_elements_bootstrap-select/bootstrap-select.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/forms_elements_select2/select2.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/forms_elements_multiselect/multiselect.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/forms_elements_inputmask/inputmask.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/forms_elements_bootstrap-datepicker/bootstrap-datepicker.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/forms_elements_bootstrap-timepicker/bootstrap-timepicker.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/forms_elements_colorpicker-farbtastic/colorpicker-farbtastic.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../assets/components/menus/sidebar.main.init7359.js?v=v2.0.1-rc1', 
		'../assets/components/menus/sidebar.collapse.init7359.js?v=v2.0.1-rc1', 
		'../assets/components/menus/menus.sidebar.chat.init7359.js?v=v2.0.1-rc1', 
		'../../../shared/assets/plugins/other_mixitup/mixitup.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
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

</head>