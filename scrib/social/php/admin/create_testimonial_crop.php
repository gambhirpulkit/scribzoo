<?php  ob_start();
session_start();
include 'config.php';
?>


<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->
<?php

$select_writer = mysql_query("select pid,title,s_email,name,description,imgname,allowed,receiver_string from posts where s_email = '{$_SESSION['SESS_EMAIL']}' order by pid desc limit 1");
$result = mysql_fetch_array($select_writer);
$pid = $result['pid'];
?>
<head>
 
<?php include 'header.php'; ?>
	

  <script>
  
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

  </script>  
</head>


<body class=" scripts-async menu-right-hidden">

	

	<!-- Main Container Fluid -->

	<div class="container-fluid ">



		

		<!-- Content START -->

		<div id="content">

			
	
<?php

include 'navbar.php';


?>



			 <div class="container"><div class="innerAll">
		 
	<div class="row">

		<div class="col-lg-9 col-md-8">
                <!-- WIDGET START -->
					
<div class="widget gridalicious-item not-responsive " >
    <!-- Info -->
    <div class="bg-gray  border-bottom innerAll">



		<a href="#" class="pull-right innerT text-primary" id="before_save" onClick="toggle_title(); toggle_title_button(); return false;">			
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="fa fa-pencil" data-toggle="tooltip" fata-placement="top" data-title="Edit the title"></i></span>
        </a>
		<a href="#" class="pull-right innerT text-primary" id="save" onClick="save_title();save_title_button(); send_header_info('<?php echo $pid; ?>'); return false;" style="display:none">			
           <span class="text-primary strong lead pull-left innerT innerR half ">save</span>
        </a>
		<a href="#" class="pull-right innerT text-primary" id="after_save" onClick="toggle_title(); toggle_title_button(); return false;" style="display:none">			
           <span class="text-primary strong lead pull-left innerT innerR half "><i class="fa fa-pencil" data-toggle="tooltip" fata-placement="top" data-title="Edit the title"></i></span>
        </a>
		
		
		<i class="fa fa-quote-left text-muted pull-left fa-fw"></i> 
		<div id="title_before_edit">
        <a href="#" class="lead strong display-block margin-none"><?php echo $result['title']; ?></a>
		</div>
		<input type="text" id="title_edit" value="<?php echo $result['title']; ?>" style="display:none"/>
		
		 <a href="#" class="lead strong display-block margin-none" id="title_after_edit" style="display:none"><div id="datadiveditedheader"></div></a>
		
		 &nbsp; &nbsp; Posted by <a href="#"><?php echo $_SESSION['SESS_FIRST_NAME'].' '. $_SESSION['SESS_LAST_NAME']; ?></a>&nbsp;with 
	<div class="widget" id="before_tagging">
	
				
				<div class="select2-container select2-container-multi" style="width: 100%; font-size:10px"> 
				       <ul class="select2-choices"> 
					   <?php 
		$friends_array = explode(",,", $result['allowed']);
		foreach($friends_array as $friend_array){
		$friend_data = explode(":",$friend_array);
		
		?>
					   <li class="select2-search-choice">  
					     <div><?php echo $friend_data['0']; ?></div> 
						 </li>
						 
						 <?php } ?>
					   <li class="select2-search-field">    <input type="text" autocomplete="off" class="select2-input" style="width: 22px;">  </li></ul>		
					   <a href="#" onClick="show_tagging(); return false;">retag friends</a>	
			        		</div>


</div>
<div class="widget" id="tagging" style="display:none">
					<select multiple="multiple" style="width: 100%;" id="select2_2"   onchange="append('<?php echo $_SESSION['SESS_EMAIL'] ?>');">
					
	               <optgroup label="friends">
				    <?php
				   $get_friends_edit = mysql_query("SELECT firstname,lastname,m_id FROM member WHERE m_id IN ( SELECT accepter FROM tbl_connect WHERE requester =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1') union SELECT requester FROM tbl_connect WHERE accepter =  '{$_SESSION['SESS_MID']}' and (facebook='1' or scribzoo='1'))");
				   while($result_get_friends_edit = mysql_fetch_array($get_friends_edit))
				   {
				    ?>
	                  <option value="<?php echo $result_get_friends_edit['m_id']; ?>"><?php echo $result_get_friends_edit['firstname'].' '.$result_get_friends_edit['lastname']; ?><?php echo ":".$result_get_friends_edit['m_id'] ?></option>
	                  
					   <?php } ?>
	               </optgroup>
	               
	               
	               
	               
	        	</select>
				<a href="#" onClick="show_after_tagging(); return_tagging('<?php echo $pid; ?>'); return false;">done</a>
				
		
	
</div>
<div class="widget" id="after_tagging" style="display:none">
	
				<div id="datadivreturntagging">
					  </div>
</div>

    </div>

	
    <!-- Content -->
    <!--div class="innerAll">
        <p class="lead ">Important text goes in this line!</p>
        <!--div class="innerB">
            <a href="#"><img src="../assets/images/social/100/1.jpg" alt="" class="img-post display-block-inline"/></a>
            <a href="#"><img src="../assets/images/social/100/2.jpg" alt="" class="img-post display-block-inline"/></a>
            <a href="#"><img src="../assets/images/social/100/3.jpg" alt="" class="img-post display-block-inline"/></a>
        </div>
    </div-->
	
	<?php 
				$qry_img=mysql_query("select imgname from posts where s_email='{$_SESSION['SESS_EMAIL']}' order by pid desc limit 1");
				$result_img=mysql_fetch_array($qry_img);
				if($result_img['imgname']=='')
				{
	?>
    <div class="innerAll border-top">
	<div id="media_upload" style="height:300px;">
	
	<div class="row" style="border:1px dashed black;margin-top: 100px;padding: 50px;">

<div id="media-icon">
<div class="col-md-6">

<div class="innerAll">
			<a href="#modal-login" data-toggle="modal" style="font-size:20px; float:right"><i class="fa fa-camera"></i>&nbsp;Upload a picture</a>
				


							<div class="modal fade" id="modal-login">
	
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				
			</div>
			<!-- // Modal heading END -->
			<script>
			function gototab(reload)
   {
    window.location.hash = '#';
    window.location.reload(true);
   }
   </script>
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						

					 
<iframe src="testimonial_image_upload.php" width="550" height="520" frameBorder="0"></iframe>


					</div>
				</div>
				<div class="modal-footer center margin-none">
				
				<a href="#" onClick="gototab();" class="btn btn-default" data-dismiss="modal"><i class="fa fa-check"></i> Save</a>
			</div>
			</div>
			<!-- // Modal body END -->
	
		</div>
	</div>
	
</div>	

	

						</div>
		</div>

<div class="col-md-6">

<div class="innerAll">
				<a href="#" style="font-size:20px;"><i class="fa fa-video-camera"></i>&nbsp;Upload a video</a>
			</div>
		</div>

		</div>		
			
		
			</div>
	
	
	</div>
    </div>
	
	<?php }
				else { 
					?>
				<img src="imageupload/uploads_testimonial/<?php echo $result_img['imgname']; ?>" align="middle">	
				<?php } ?>
	
     <div class="border-top innerAll">
        <blockquote class="margin-none" id="blockquote_before_edit"><?php if($result['description']==''){echo "This is a demo text of your testimonial";}else{echo $result['description'];}?> <a href="#" return false; onClick="toggle_body_text();">edit&nbsp;<i class="fa fa-pencil"></i></a></blockquote>
		
		<blockquote class="margin-none" id="blockquote_edit" style="display:none"><textarea id="blockquote_text" class="wysihtml5 form-control" style="width: 96%;" rows="5"><?php if($result['description']==''){echo "This is a demo text of your testimonial";}else{echo $result['description'];}?> </textarea><a href="#"  return false; onClick="save_body_text();send_body_info('<?php echo $pid ?>');">save</a></blockquote>
		
		 <blockquote class="margin-none" id="blockquote_after_edit" style="display:none">
		 <div id="datadiveditedbody">
		</div>
		 <a href="#" return false; onClick="toggle_body_text();">edit&nbsp;<i class="fa fa-pencil" ></i></a></blockquote>
        
		
    </div>
    <div class="clearfix"></div>
    <!-- Comment -->
   
   
    
    <!--  Comment -->
    
    
</div>
<!-- // WIDGET END -->




			<!--	</div>

			</div>  -->



		</div>




		
</div>





			<!-- WIDGET START -->


<!-- // WIDGET END -->


			<!-- Widget -->
			<div class="row" style="background:white;">


<div class="col-md-6">

<div class="innerAll">
				
				
				<a href="testimonial.php?id=<?php echo $pid; ?>"><button class="btn btn-success btn-stroke" style="float:right">Save</button></a>
						</div>
		</div>

<div class="col-md-6">

<div class="innerAll">
				<a href="main_timeline.php" onClick="discard_testimonial('<?php echo $pid ?>')"><button class="btn btn-default">Discard</button></a>
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


<!-- Mirrored from cdn2.mosaicpro.biz/social/php/admin/index.html?module=admin&page=index&url_rewrite=&lang=en&v=v2.0.1-rc1&layout_fixed=true&navbar_type=navbar-inverse&skin=style-default by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 19 Jun 2014 17:46:04 GMT -->

</html>