<html>
<head>
<script>
function update_count_request()

{

document.getElementById('before_request').style.display="none";

document.getElementById('after_request').style.display="block";
}



function update_count_reverse_request()

{

document.getElementById('before_request').style.display="block";

document.getElementById('after_request').style.display="none";


}

function update_uncount_request()

{

document.getElementById('before_unrequest').style.display="none";

document.getElementById('after_unrequest').style.display="block";
}





function update_uncount_reverse_request()

{

document.getElementById('before_unrequest').style.display="block";

document.getElementById('after_unrequest').style.display="none";

}


</script>
</head>
<body>
<div class="widget">
	<h5 class="innerAll margin-none border-bottom bg-gray">People you may know</h5>
	<div class="widget-body padding-none">
			
				<div class="media border-bottom innerAll margin-none">
			<?php $qry_suggestion = mysql_query("select * from member order by rand() limit 5 ");
			while($result_suggestion=mysql_fetch_array($qry_suggestion)) 
			{
			$mid=$result_suggestion['m_id'];
			$fb_username=$result_suggestion['user'];
			 $qry_follow = mysql_query("select id from tbl_connect where (accepter = '$visitor_id' and requester = '$mid') or (accepter = '$mid' and requester = '$visitor_id' )"); 

						$result_follow = mysql_fetch_array($qry_follow)


						?>
						<br><?php if($result_follow['id']=='')
						{ ?>
						<?php 
				if($result_suggestion['profile_pic'] == '') { ?>
		<a href="profile.php?user=<?php echo $result_suggestion['m_id']; ?>"><img src="https://graph.facebook.com/<?php echo $fb_username ?>/picture?type=small" height="35" width="35"class="pull-left media-object"/></a>	

 <?php }
else {?> 
<a href="profile.php?user=<?php echo $result_suggestion['m_id']; ?>"><img src="imageupload/uploads/<?php echo $result_suggestion['profile_pic']; ?>" height="35" width="35"class="pull-left media-object"/></a>	
<?php } ?>
		<?php } else{ ?>			
		<a href="profile.php?user=<?php echo $result_suggestion['m_id']; ?>"><img src="../../../../image/sample_testimonial_image.jpg" height="35" width="35"class="pull-left media-object"/></a>						
		<?php } ?>
			<div class="media-body">
				<a href="#" class="pull-right text-muted innerT half">
					<i class="fa fa-comments"></i> a<br>
				</a>
				<h5 class="margin-none">&nbsp;<a href="profile.php?user=<?php echo $result_suggestion['m_id']; ?>" class="text-inverse"><?php echo substr($result_suggestion['firstname'],0,18); ?></a></h5>
				
				<small>
				<!-- follow up code STARTS here--> 
			 
		  <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
//getting session email from session


						  $result_track_follow = mysql_fetch_array(mysql_query("select id,facebook,scribzoo from tbl_connect where (requester='{$_SESSION['SESS_MID']}' and accepter='{$result_suggestion['m_id']}') or (requester='{$result_suggestion['m_id']}' and accepter='{$_SESSION['SESS_MID']}')")); 

						  if($result_track_follow['id'] < 1)

						  {  

						  ?>  

						 
		   
		    
		   <a href="#" id="before_request" style="float:right" onClick="connect_request('<?php echo $result_suggestion['m_id'] ?>','<?php echo $_SESSION['SESS_MID']?>'); update_count_request();" data-original-title="connection request"></i><h5>&nbsp;&nbsp; Connection Request</h5></a>
<p id="after_request" onClick="unconnect_request('<?php echo $result_suggestion['m_id']?>','<?php echo $_SESSION['SESS_MID'] ?>');update_count_reverse_request()" style="float:right;display:none">Request sent &nbsp;<a href="#" >cancel</a></p>
 <?php } else if($result_track_follow['facebook']=1 || $result_track_follow['scribzoo']=1 )
			{ ?>
			
			
							   <a href="#" id="before_unrequest" style="float:right;display:none" onClick="connect_request('<?php echo $result_suggestion['m_id'] ?>','<?php echo $_SESSION['SESS_MID']?>'); update_uncount_request();" title="Send a connection request" data-rel="tooltip"><i class="icon icon-carat-1-n "></i>connection request</a>

							   <p id="after_unrequest" style="float:right;">Already friends &nbsp;</p>

 <?php }
 else{ ?>

							   <a href="#" id="before_unrequest" style="float:right;display:none" onClick="connect_request('<?php echo $result_suggestion['m_id'] ?>','<?php echo $_SESSION['SESS_MID']?>'); update_uncount_request();" title="Send a connection request" data-rel="tooltip"><i class="icon icon-carat-1-n "></i>connection request</a>

							   <p id="after_unrequest" style="float:right;"> Request sent &nbsp;<a href="#" onClick="unconnect_request('<?php echo $result_suggestion['m_id'] ?>','<?php $_SESSION['SESS_MID'] ?>');update_uncount_reverse_request()" title="Cancel connection" data-rel="tooltip">cancel</a></p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;" title="connection request" data-rel="tooltip"><i class="icon icon-carat-1-n "></i> Connection request</a>

							   

							   <?php } ?>		  
		  </span>          
		  <!-- follow ends here-->		  
				
				</small> 
			</div>
			
				<?php } ?>	
		</div>
				
			
			
				
			</div>
</div>

			<!-- Widget -->
			</body>
			</html>