
<?php 
session_start(); 
$visitor_email=$_SESSION['SESS_EMAIL'];
$visitor_id=$_SESSION['SESS_MID'];
?>		
		<div class="timeline-cover">



	<div class="widget border-bottom">




		<div class="widget-body border-bottom">



			<div class="media">



				<div class="pull-left innerAll">


<?php if($mid!=$visitor_id)
{
					$qry_pic=mysql_query("select profile_pic, m_id,firstname,lastname,user,aboutme from member where m_id='$mid'");
 $result_pic=mysql_fetch_array($qry_pic);
 ?>
			
			<?php if($result_pic['profile_pic'] == '') { ?>
					<img src="https://graph.facebook.com/<?php echo $result_pic['user']; ?>/picture?type=large" width="120" alt="" class="img-circle" style="height: 100px;width: 100px;overflow:hidden;">
	<?php } 
	else { ?>
					<img src="imageupload/uploads/<?php echo $result_pic['profile_pic']; ?>" width="120" alt="" class="img-circle" style="height: 100px;width: 100px;overflow:hidden;">
  <?php } } 

  else { 	
		$qry_pic=mysql_query("select profile_pic, m_id,firstname,lastname from member where login='{$_SESSION['SESS_EMAIL']}'");
 $result_pic=mysql_fetch_array($qry_pic);
			?>
			
<?php if($result_pic['profile_pic'] == '') { ?>
					<a href="#modal-login" data-toggle="modal" ><img src="https://graph.facebook.com/<?php echo $_SESSION['SESS_USERNAME']; ?>/picture?type=large" width="120" alt="" class="img-circle" data-toggle="tooltip" data-original-title="Click to change picture" data-placement="right"  style="height: 100px;width: 100px;overflow:hidden;"></a>
	<?php } 
	else { ?>
					<a href="#modal-login" data-toggle="modal" ><img src="imageupload/uploads/<?php echo $result_pic['profile_pic']; ?>" width="120" alt="" class="img-circle" data-toggle="tooltip" data-original-title="Click to change picture" data-placement="right"  style="height: 100px;width: 100px;overflow:hidden;"></a>

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
						

					 
<iframe src="image_upload.php" width="550" height="520" frameBorder="0"></iframe>


					</div>
				</div>
				<div class="modal-footer center margin-none">
				
				<a href="#" onclick="gototab();" class="btn btn-default" data-dismiss="modal"><i class="fa fa-check"></i> Save</a>
			</div>
			</div>
			<!-- // Modal body END -->
	
		</div>
	</div>
	
</div>					

 <?php }  } ?>
				</div>



				<div class="media-body">

<?php if($mid!=$visitor_id)

{ ?>

					<h2><a href="#"><?php echo $result['firstname'].' '.$result['lastname'];?></a> <a href="#" class="text-muted"></i></a></h2>
<?php } 

else{ ?>
				
					<h2 id="before_edit_name"><a href="#"><?php echo $result['firstname'].' '.$result['lastname'];?></a> <a href="#" class="text-muted"></i></a> <a href="#"><i class="fa fa-pencil" onclick="toggle_edit_name();"></i></a></h2>
                    
					<h2 style="display:none" id="edit_name">
					
					<span>
					<input type="text" value="<?php echo $result['firstname'];?>" id="firstname"/>&nbsp;
					<input type="text" value="<?php echo $result['lastname']?>" id="lastname" />
					
					</span>
					
					<a href="#" style="font-size:12px" onclick="save_edit_name();send_edit_name('<?php echo $_SESSION['SESS_EMAIL']; ?>');send_edit_aboutme('<?php echo $_SESSION['SESS_EMAIL']; ?>')">save</a></h2>
					
					<span  style="display:none" id="after_edit_name"><h2>
					<div id="datadiveditname">
					</div>
					<a href="#" class="text-muted"></i></a> <a href="#"><i class="fa fa-pencil" onclick="toggle_edit_name();"></i></a></h2></span>
					
					
	<?php } ?>
					<div class="clearfix"></div>

<?php if($mid!=$visitor_id)

{ ?>

					<p><?php if($result['aboutme'] != '') {?>	<i class="fa fa-comment-o text-muted"></i>&nbsp;&nbsp;<?php echo $result['aboutme']; }?></p>

<?php } 

else{ ?>
				<p id="before_edit_aboutme">	<i class="fa fa-comment-o text-muted"></i><?php if($result['aboutme'] != '') {?>&nbsp;&nbsp; <?php echo $result['aboutme']; }?></p>
				<input type="text" value="<?php echo $result['aboutme']; ?>" id="edit_aboutme" style="display:none"/>
					<p id="after_edit_aboutme" style="display:none"><div id="datadiveditaboutme"></div></p>
		<?php } ?>
		
		<?php if($mid!=$visitor_id)
		{ 
		
		if(!isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) == ''))
		{
		?><a href="#modal-login" data-toggle="modal" class="btn btn-info btn-sm">
						<i class="icon-turn-right" ></i>Connect 
					</a>
		<?php }else{
					 $result_track_follow = mysql_fetch_array(mysql_query("select id,facebook,scribzoo from tbl_connect where (requester='{$_SESSION['SESS_MID']}' and accepter='$mid') or (requester='$mid' and accepter='{$_SESSION['SESS_MID']}')"));
					if(!$result_track_follow['id'])
					{
				?>
		<a href="#" class="btn btn-info btn-sm" id="before_request" onClick="connect_request('<?php echo $mid; ?>','<?php echo $_SESSION['SESS_MID']; ?>'); update_count_request();">
						<i class="icon-turn-right" ></i>Connect 
					</a>
		<a href="#" class="btn btn-info btn-sm" id="after_request" style="float:left;display:none">
						Request sent  
					</a>
   <?php }
   	else if($result_track_follow['facebook']==0 && $result_track_follow['scribzoo']==0 )
					{
				?>
		
		<a href="#" class="btn btn-info btn-sm" >
						Request already sent  
					</a>
   <?php }
   
else if($result_track_follow['facebook']==1 || $result_track_follow['scribzoo']==1 ) {
?>   
		<a href="#" class="btn btn-info btn-sm" >
						<i class="icon-turn-right" ></i>Already connected  
					</a>
					
					
		<?php } } } ?>	
		
				</div>



			</div>



		</div>




		<div class="">



			<ul class="navigation">



				<li><a class="no-ajaxify" href="<?php echo $path; ?>profile_timeline.php?user=<?php echo $result['m_id']; ?>"><i class="fa fa-fw icon-road-sign"></i><span> Timeline</span></a></li>



				<li><a class="no-ajaxify" href="<?php echo $path; ?>profile_testimonials.php?user=<?php echo $result['m_id']; ?>"><i class="fa fa-fw fa-file-text-o"></i><span>Testimonials</span></a></li>



				<li><a class="no-ajaxify" href="<?php echo $path; ?>profile_connections.php?user=<?php echo $result['m_id']; ?>"><i class="fa fa-fw icon-group"></i><span> Connections</span></a></li>



				<!--<li><a href="<?php //echo $path; ?>profile_messages.php?user=<?php //echo $result['m_id']; ?>"><i class="fa fa-fw fa-envelope"></i><span> Messages</span></a></li>
-->


				<li class="pull-right active"><a class="no-ajaxify" href="<?php echo $path; ?>profile.php?user=<?php echo $result['m_id']; ?>"><i class="fa fa-fw fa-user"></i><span> About</span></a></li>



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