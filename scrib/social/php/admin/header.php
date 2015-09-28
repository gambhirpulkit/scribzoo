<?php 

ob_start();
session_start();
?>
<?php 

	$page = explode('?',$_SERVER['REQUEST_URI']);
	
	$pid = $_GET['id'];
	if($page[0] == '/scrib/social/php/admin/testimonial.php')
	{
	$result_fetch_title = mysql_fetch_array(mysql_query("select anonymous,s_name, name from posts where pid = '$pid'"))
	?>
	<?php if($result_fetch_title['anonymous'] != '1') {?>
	<title><?php echo $result_fetch_title['s_name'].' wrote a testimonial for '.$result_fetch_title['name'].' on scribzoo.'?></title>
	<?php }else { ?>
	<title><?php echo 'an anon user wrote a testimonial for '.$result_fetch_title['name'].' on scribzooo' ?></title>
	<meta name="description" content="WRITE, SHARE, EXPLORE and AUTHENTICATE testimonials about people around you.">
<meta name="keywords" content="testimonials, write a testimonial, testimonial samples, testimonial easy samples, social network for testimonial, best testimonial, best testimonial in internet, cool testimonial, friends, friendship, friendship testimonial, corporate testimonials">
	<?php }?>
	<?php }elseif($page[0] == '/scrib/social/php/admin/profile.php'){
	$user = $_GET['user'];
	if($_GET['username'] != ''){$user = rtrim($_GET['username'],',');}
	$result_fetch_users_profile = mysql_fetch_array(mysql_query("select firstname,lastname,member_type from member where m_id = '$user' or username = '$user'"));
	
	if($result_fetch_users_profile['firstname'] == ''){
	 ?>
	<title>Profile doesn't exist on scribzoo</title>
	
	<?php }else{ ?>
	<title><?php echo $result_fetch_users_profile['firstname'].' '.$result_fetch_users_profile['lastname'].'&#39s profile';?> on Scribzoo</title>
	<?php } ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $result_fetch_users_profile['firstname'].' '.$result_fetch_users_profile['lastname']; ?> is on scribzoo. To connect with <?php  echo $result_fetch_users_profile['firstname'].' '.$result_fetch_users_profile['lastname']; ?> and see the testimonials and friendship message network join scribzoo now. ">
	<?php }
	elseif($page[0] == '/scrib/social/php/admin/explore_content.php'){
	?>
	<title>Explore testimonials on Scribzoo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="WRITE, SHARE, EXPLORE and AUTHENTICATE testimonials about people around you.">
<meta name="keywords" content="testimonials, write a testimonial, testimonial samples, testimonial easy samples, social network for testimonial, best testimonial, best testimonial in internet, cool testimonial, friends, friendship, friendship testimonial, corporate testimonials">
	<?php }
	elseif($page[0] == '/scrib/social/php/admin/search.php'){
	$keyword = $_GET['keyword'];
	$source = $_GET['src'];
	?>
	<title>Testimonials with the hashtag #<?php echo $keyword ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="WRITE, SHARE, EXPLORE and AUTHENTICATE testimonials about people around you.">
<meta name="keywords" content="testimonials, write a testimonial, testimonial samples, testimonial easy samples, social network for testimonial, best testimonial, best testimonial in internet, cool testimonial, friends, friendship, friendship testimonial, corporate testimonials">
	<?php }elseif($page[0] == '/scrib/social/php/admin/profile_timeline.php'){
	
	$user = $_GET['user'];
	$result_fetch_users_profile = mysql_fetch_array(mysql_query("select firstname,lastname,member_type from member where m_id = '$user' or user = '$user'"));
if($result_fetch_users_profile['firstname'] == ''){
	 ?>
	<title>Profile doesn't exist in scribzoo!</title>
	<?php }else{ ?>
<title><?php echo $result_fetch_users_profile['firstname'].' '.$result_fetch_users_profile['lastname'].'&#39s timeline';?> on Scribzoo</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo $result_fetch_users_profile['firstname'].' '.$result_fetch_users_profile['lastname']; ?> is on scribzoo. To connect with <?php  echo $result_fetch_users_profile['firstname'].' '.$result_fetch_users_profile['lastname']; ?> and see the testimonials and friendship message network join scribzoo now. ">


<?php }}elseif($page[0] == '/scrib/social/php/admin/profile_connections.php'){
	$user = $_GET['user'];
	//echo "select firstname,lastname,member_type from member where m_id = '$user' or user = '$user'"; exit;
	$result_fetch_users_profile = mysql_fetch_array(mysql_query("select firstname,lastname,member_type from member where m_id = '$user' or user = '$user'"));

 ?>
 <title><?php echo $result_fetch_users_profile['firstname'].' '.$result_fetch_users_profile['lastname'].'&#39s connections';?> on Scribzoo</title>
 
 <?php }elseif($page[0] == '/scrib/social/php/admin/profile_testimonials.php'){
 
	$user = $_GET['user'];
	//echo "select firstname,lastname,member_type from member where m_id = '$user' or user = '$user'"; exit;
	$result_fetch_users_profile = mysql_fetch_array(mysql_query("select firstname,lastname,member_type from member where m_id = '$user' or user = '$user'"));

 ?>
 <title><?php echo $result_fetch_users_profile['firstname'].' '.$result_fetch_users_profile['lastname'].'&#39s testimonials';?> on Scribzoo</title>
 
 <?php 
 }else{ ?>
 <title>scribzoo, a simple way to explore testimonials.</title>
 <?php } ?>
    <!-- Meta -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<link href="/scrib/social/php/assets/less/pages/style.css" rel="stylesheet" type="text/css">
<script src="reallocation.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="/scrib/social/php/assets/less/pages/file_uploads.js"></script>
<script type="text/javascript" src="/scrib/social/php/assets/less/pages/vpb_script.js"></script>
<script type="text/javascript" src="/scrib/social/php/assets/less/pages/bootstrap-typeahead.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

 <link rel="stylesheet" href="../assets/less/pages/serveStyles52c2-3.css?module=admin&amp;page=dashboard_analytics&amp;url_rewrite=&amp;lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=false&amp;navbar_type=navbar-inverse&amp;skin=style-default" />
    
        <link rel="stylesheet" href="../assets/less/pages/serveStyles0c19.css?module=admin&amp;page=dashboard_analytics&amp;url_rewrite=&amp;lang=en&amp;v=v2.0.1-rc1&amp;skin=style-default&amp;layout_fixed=true&amp;navbar_type=navbar-inverse" />
	
        <link rel="stylesheet" href="../assets/less/pages/serveStyles4ea8.css?module=admin&amp;page=about_3&amp;url_rewrite=&amp;lang=en&amp;v=v2.0.1-rc1&amp;layout_fixed=true" />

         <!--link rel="stylesheet" href="../assets/less/pages/popup/style1.css" /-->


    <script src="../../../shared/assets/plugins/core_ajaxify_loadscript/script.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2"></script>

   <script src="../../../shared/assets/plugins/core_ajaxify_loadscript/modernizr.custom.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2"></script>

    <script src="../../../shared/assets/plugins/core_ajaxify_loadscript/classie.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2"></script>

<script src="../../../shared/assets/plugins/core_ajaxify_loadscript/demo1.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2"></script>



    

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
					'../../../shared/assets/components/maps_google/maps-google.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2',
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
		
		'../../../shared/assets/plugins/charts_easy_pie/js/jquery.easy-pie-chart.js',
 
		'../../../shared/assets/plugins/media_owl-carousel/owl.carousel.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 


		'../../../shared/assets/plugins/media_holder/holder9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 						'../../../shared/assets/plugins/ui_modals/bootbox.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 						'../../../shared/assets/plugins/media_gridalicious/jquery.gridalicious.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2',

		'../../../shared/assets/plugins/core_less-js/less.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 

		'../../../shared/assets/plugins/charts_flot/excanvas9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 

		'../../../shared/assets/plugins/core_browser/ie/ie.prototype.polyfill9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2',
		'../../../shared/assets/plugins/forms_elements_bootstrap-select/js/bootstrap-select9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/forms_elements_select2/js/select29479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/forms_elements_multiselect/js/jquery.multi-select9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/forms_elements_inputmask/jquery.inputmask.bundle.min9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/plugins/charts_easy_pie/js/jquery.easy-pie-chart9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2' 
		
	],



	/* The initialization scripts always load last and are automatically and dynamically loaded when AJAX navigation is enabled; */

	bundle: [

		'http://cdn2.mosaicpro.biz/shared/assets/components/core_ajaxify/ajaxify.init.js?v=v2.0.1-rc1&sv=v0.0.1.2', 

		'../../../shared/assets/components/core_preload/preload.pace.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		
		'../../../shared/assets/components/charts_easy_pie/easy-pie.init.js',

		'../../../shared/assets/components/widget_twitter/twitter.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 

		 '../../../shared/assets/components/charts_easy_pie/easy-pie.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 

		'../../../shared/assets/components/admin_news/news-featured-2.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 

		'../../../shared/assets/components/admin_news/news-featured-1.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 

		'../../../shared/assets/components/admin_news/news-featured-3.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 				'../assets/components/media_gridalicious/gridalicious.init7359.js?v=v2.0.1-rc1', 


		'../assets/components/core/core.init7359.js?v=v2.0.1-rc1',
		'../../../shared/assets/components/forms_elements_bootstrap-select/bootstrap-select.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/forms_elements_select2/select2.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/forms_elements_multiselect/multiselect.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2', 
		'../../../shared/assets/components/forms_elements_inputmask/inputmask.init9479.js?v=v2.0.1-rc1&amp;sv=v0.0.1.2' 
	
		

	]



};



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

if (/*@cc_on!@*/false && document.documentMode === 10) { document.documentElement.className+=' ie ie10'; }

<!-----------------------------------   >
function hide_first_input()

{
 document.getElementById("comment_button").style.display = "none";

alert(val1);

}

function comment_collapse()

{


document.getElementById('comments-collapse').style.display="none";


}


function update_count()

{

document.getElementById('before_voting').style.display="none";

document.getElementById('after_voting').style.display="block";
}


function update_count_share()
{
document.getElementById('before_sharing').style.display="none";

document.getElementById('after_sharing').style.display="block";
}


function update_count_reverse()

{

document.getElementById('before_voting').style.display="block";

document.getElementById('after_voting').style.display="none";


}

function update_count_reverse_share()

{document.getElementById('before_sharing').style.display="block";

document.getElementById('after_sharing').style.display="none";
}


function update_uncount()

{

document.getElementById('before_unvoting').style.display="none";

document.getElementById('after_unvoting').style.display="block";
}


function update_uncount_share()

{document.getElementById('before_unsharing').style.display="none";

document.getElementById('after_unsharing').style.display="block";
}

function update_uncount_reverse()

{

document.getElementById('before_unvoting').style.display="block";

document.getElementById('after_unvoting').style.display="none";

}
function update_uncount_reverse_share()

{document.getElementById('before_sharing').style.display="block";

document.getElementById('after_unsharing').style.display="none";
}

 function toggle_title_testimonial()

{

 document.getElementById("header_before_edit").style.display = "none";
 document.getElementById("header_edit").style.display = "block";
 document.getElementById("header_after_edit").style.display = "none"

}

function save_title_testimonial()

{
 document.getElementById("header_before_edit").style.display = "none";
 document.getElementById("header_edit").style.display = "none";
 document.getElementById("header_after_edit").style.display = "block";

}

function hideHideButton_testimonial()

{
 document.getElementById("beforeHide").style.display = "none";
 document.getElementById("afterHide").style.display = "block";

}

function showHideButton_testimonial()

{

 document.getElementById("beforeHide").style.display = "block";
 document.getElementById("afterHide").style.display = "none";

}

function hideAnonymousButton_testimonial()

{
 document.getElementById("beforeAnonymous").style.display = "none";
 document.getElementById("afterAnonymous").style.display = "block";

}

function showAnonymousButton_testimonial()

{

 document.getElementById("beforeAnonymous").style.display = "block";
 document.getElementById("afterAnonymous").style.display = "none";

}
function show_tagging_friends_testimonial()

{
 document.getElementById("before_tagging_friends").style.display = "none";
 document.getElementById("tagging_friends").style.display = "block";
 document.getElementById("after_tagging_friends").style.display = "none";
}

function show_after_tagging_friends_testimonial()

{
 document.getElementById("before_tagging_friends").style.display = "none";
 document.getElementById("tagging_friends").style.display = "none";
 document.getElementById("after_tagging_friends").style.display = "block";
}
function toggle_body_text_testimonial()

{
 document.getElementById("blockquote_before_edit").style.display = "none";
 document.getElementById("blockquote_edit").style.display = "block";
 document.getElementById("blockquote_after_edit").style.display = "none"

}


function save_body_text_testimonial()

{
 document.getElementById("blockquote_edit").style.display = "none";
 document.getElementById("blockquote_after_edit").style.display = "block";
}
 
  function check_function()

{
var val1 =  document.getElementById("select2_2").value;
alert(val1);
}

  function toggle_title()

{

 document.getElementById("title_before_edit").style.display = "none";
 document.getElementById("title_edit").style.display = "block";
 document.getElementById("title_after_edit").style.display = "none"

}


function toggle_title_button()

{
 document.getElementById("before_save").style.display = "none";
 document.getElementById("save").style.display = "block";
 document.getElementById("after_save").style.display = "none"

}


function save_title()

{
document.getElementById("title_before_edit").style.display = "none";
 document.getElementById("title_edit").style.display = "none";
 document.getElementById("title_after_edit").style.display = "block";
 

}

function save_title_button()

{
 document.getElementById("before_save").style.display = "none";
 document.getElementById("save").style.display = "none";
 document.getElementById("after_save").style.display = "block"

}

function toggle_body_text()

{
 document.getElementById("blockquote_before_edit").style.display = "none";
 document.getElementById("blockquote_edit").style.display = "block";
 document.getElementById("blockquote_after_edit").style.display = "none"

}


function save_body_text()

{
 document.getElementById("blockquote_edit").style.display = "none";
 document.getElementById("blockquote_after_edit").style.display = "block";
}

function show_tagging()

{
 document.getElementById("before_tagging").style.display = "none";
 document.getElementById("tagging").style.display = "block";
 document.getElementById("after_tagging").style.display = "none";
}

function show_after_tagging()

{
 document.getElementById("before_tagging").style.display = "none";
 document.getElementById("tagging").style.display = "none";
 document.getElementById("after_tagging").style.display = "block";
}

function update_count_request()

{

document.getElementById('before_request').style.display="none";

document.getElementById('after_request').style.display="block";
}

function toggle_edit_name()

{

document.getElementById('before_edit_name').style.display="none";

document.getElementById('before_edit_aboutme').style.display="none";

document.getElementById('edit_name').style.display="block";

document.getElementById('edit_aboutme').style.display="block";

document.getElementById('after_edit_name').style.display="none";

document.getElementById('after_edit_aboutme').style.display="none";
}

function save_edit_name()

{

document.getElementById('before_edit_name').style.display="none";

document.getElementById('before_edit_aboutme').style.display="none";

document.getElementById('edit_name').style.display="none";

document.getElementById('edit_aboutme').style.display="none";

document.getElementById('after_edit_name').style.display="block";

document.getElementById('after_edit_aboutme').style.display="block";
}

function dropdown_menu_active()

{

document.getElementById('dropdown_menu').style.display="block";
}

function dropdown_menu_deactive()

{

document.getElementById('dropdown_menu').style.display="none";
}

function hide_loadmore_people()

{

document.getElementById('loadmore_people1').style.display="none";

}

function hide_loadmore_peopleymk()

{

document.getElementById('loadmore_peopleymk1').style.display="none";

}
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-35220025-1', 'auto');
  ga('send', 'pageview');

</script>