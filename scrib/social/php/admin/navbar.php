<?php 

session_start();

include('function.php');
$path = "http://scribzoo.com/scrib/social/php/admin/";
?>
<nav class="navbar navbar-inverse top-nav navbar-fixed-top" role="navigation">
<script>


		function enable_next()
		{
		document.getElementById('enable_next').style.display="block";

		}
		
		
function hide_noti_globe()

{

document.getElementById('before_noti_globe').style.display="none";

document.getElementById('after_noti_globe').style.display="block";
}


function hide_noti_connect()

{
alert();
document.getElementById('before_noti_connect').style.display="none";

document.getElementById('after_noti_connect').style.display="block";

function check(value)
{
//you can get the value from arguments itself
alert(value);
}
</script>

  <div class="container">

    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">

      <a type="button" class="navbar-toggle btn btn-default" data-toggle="collapse" data-target="#navbar-fixed-layout-collapse">

		<i class="fa fa-indent"></i>
</a>
      </button>

      <a class="navbar-brand no-ajaxify" href="<?php echo $path; ?>main_timeline.php" style="line-height:50px"><img src="../assets/images/logo/scribzoo.png" alt="" style="width:110px"></a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="navbar-fixed-layout-collapse">

      <ul class="nav navbar-nav">

        <li class="dropdown">
<!--connection notification -->

<?php 



$result_count = mysql_fetch_array(mysql_query("select count(*) as count from tbl_noti where subject='new connection request' and owner = '{$_SESSION['SESS_MID']}' and seen = 'no' order by field_time desc"));

$count = $result_count['count'];

?>

<li class="dropdown notif">

			<a href="#" id="before_noti_connect" onclick="clearnoti('<?php echo $_SESSION['SESS_MID'];?>'); hide_noti_connect();return false;" class="dropdown-toggle"  data-toggle="dropdown"><i class="fa fa-user"></i>
			<?php if($count > 0)
			{ ?>
			<span style="color:red;position: absolute; right: 0px;  font-size: 15px;  display: block;  color: white; top: -10px;"><strong style="background:red; padding-right:2px"><?php echo $count; ?></strong></span>
			<?php 
			} ?>
			</a>
			
			<a href="#" id="after_noti_connect"  class="dropdown-toggle" style="display:none" data-toggle="dropdown"> <i class="fa fa-group"></i><span style="color:red;position: absolute; right: 0px;  font-size: 15px;  display: block;  color: white;top: -10px;"></span>
			</a>
			<ul class="dropdown-menu chat media-list" style="min-width:350px;box-shadow:4px 3px 3px 3px rgba(128, 128, 128, 0.23)">
	   
<?php


 $qry_request=mysql_query("select object,subject,field_time from tbl_noti where (owner = '{$_SESSION['SESS_MID']}' and subject='new connection request') or (owner = '{$_SESSION['SESS_MID']}' and subject='connection confirmed') order by field_time desc limit 5");
while($result_request=mysql_fetch_array($qry_request))
{


    $qry_request_details = mysql_query("select firstname, lastname, m_id, profile_pic,user from member where m_id = '{$result_request['object']}'");
	$result_request_details = mysql_fetch_array($qry_request_details);
	
?>		  
	 		<a class="no-ajaxify" href="connections.php?requests=<?php echo $_SESSION['SESS_MID']; ?> ">
	         <li class="media">
			<div class="border-top innerAll">
			<div class="pull-left" style="margin-right:5px">
			 <?php 
				if($result_request_details['profile_pic'] == '') { ?>
				
			       <img class="media-object thumb" src="http://graph.facebook.com/<?php echo $result_request_details['user'] ?>/picture?type=large"  width="50" height="50">
					 <?php }
					 
					 else {?>
					  <img class="media-object thumb" src="imageupload/uploads/<?php echo $result_request_details['profile_pic'] ?>"  width="50" height="50">
					  <?php } ?>
						</div>
						<div style="margin-right:5px">
						<?php if($result_request['subject'] == 'connection confirmed'){?>
						<div class="media-body">
			        	<p class="margin-none"> Connection confirmed by <?php echo $result_request_details['firstname'].' '.$result_request_details['lastname'];?></p>
			        </div>
						
						<?php }else{ ?>
			       
					<div class="media-body">
			        	<p class="margin-none">New connection request from <?php echo $result_request_details['firstname'].' '.$result_request_details['lastname'];?></p>
			        </div>
			       <?php } ?>
				   <p class="text-muted" style="margin-top:5px"><i class="fa fa-group"></i>&nbsp;<?php echo substr($result_request['field_time'],0,10); ?></p>
				   </div>
				  </div>
				</li>
				</a>
				
<?php } ?>	
	        <li style ="line-height: 29px"><p><a href="#">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; See more past requests </a></p>
	   </li>

	          </ul>

        </li>
		
	
<!--connection notification  ends here -->		
		
		
<!-- message notification starts from here-->

		<li class="dropdown notif">
	<?php 	
$result_count_msg = mysql_fetch_array(mysql_query("select count(*) as count from tbl_message where sent_to='{$_SESSION['SESS_MID']}' and read_status='no' order by sent_on desc "));

$countmsg = $result_count_msg['count'];

?>
<!--

			<a href="#" class="dropdown-toggle"  data-toggle="dropdown"><i class="<!--fa fa-envelope>"></i><span style="color:red;position: absolute; right: 0px;  font-size: 15px;  display: block;  color:white ;top: -10px;"><strong style="background:red; padding-right:2px"><?php/* echo $countmsg;*/ ?></strong></span></a-->
			<ul class="dropdown-menu chat media-list" style="min-width:355px;box-shadow:4px 3px 3px 3px rgba(128, 128, 128, 0.23)">
 
<?php

 
$qry_show_msg=mysql_query("select firstname, user, lastname from member where m_id IN (select sent_from from tbl_message where sent_to = '{$_SESSION['SESS_MID']}' )") or die(mysql_error());
while($result_show_msg=mysql_fetch_array($qry_show_msg))
{
		
?>	
 					<li class="media">
			        <a class="pull-left" href="#"><img class="media-object thumb" src="../assets/images/people/100/15.jpg" alt="50x50" width="50"/></a>
					<div class="media-body">
			        	<h5 class="media-heading"><?php echo $result_show_msg['firstname']; ?></h5>
			            <p class="margin-none"><?php echo $result_show_msg['message']; ?></p>
			        </div>
				</li>
		      	<?php } ?>     
			   
	      	</ul>
		</li>
	<!-- notification starts from here-->
 
		<?php 	
		
	//echo "select count(*) as count from tbl_noti where (verb like '%voted up your testimonial%' or verb like '%shared your testimonial%') and owner='{$_SESSION['SESS_MID']}' order by field_time desc ";
$result_count_noti = mysql_fetch_array(mysql_query("select count(*) as count from tbl_noti where (testimonial_type='vote' or testimonial_type='share' or testimonial_type='comment') and owner='{$_SESSION['SESS_MID']}' and seen='no' order by field_time desc ")) or die(mysql_error());

$countnoti = $result_count_noti['count'];

?>
 
  <li class="dropdown notif">
			<a href="#" id="before_noti_globe" onclick=" clearnoti('<?php echo $_SESSION['SESS_MID'];?>'); hide_noti_globe();" class="dropdown-toggle"  data-toggle="dropdown">
			
			<i class="fa fa-globe"></i>
			
			
			<span style="color:red;position: absolute; right: 0px;  font-size: 15px;  display: block;  color: white;top: -10px;"><?php if($countnoti > 0)
			{ ?><strong style="background:red; padding:2px"><?php echo $countnoti; ?></strong><?php } ?></span></a>
			
						<a href="#" id="after_noti_globe"  class="dropdown-toggle" style="display:none" data-toggle="dropdown"> <i class="fa fa-globe"></i><span style="color:red;position: absolute; right: 0px;  font-size: 15px;  display: block;  color: white;top: -10px;"></span>
			
			
			</a>
			
			<ul class="dropdown-menu chat media-list" style="min-width:350px;box-shadow:4px 3px 3px 3px rgba(128, 128, 128, 0.23)">
	             
				 <?php

  $qry_notification=mysql_query("select m_id from member where m_id in (select owner from tbl_noti where (testimonial_type='vote' or testimonial_type='share' or testimonial_type='comment') and owner = '{$_SESSION['SESS_MID']}' order by field_time desc)") or die(mysql_error());
  while($result_notification=mysql_fetch_array($qry_notification))
 {
	$qry_new=mysql_query("select object,link_to,verb,field_time,testimonial_type from tbl_noti where owner='{$result_notification['m_id']}' and (testimonial_type='vote' or testimonial_type='share' or testimonial_type='comment') order by field_time desc limit 5");
	while($result_new=mysql_fetch_array($qry_new))
	{
	$qry_object1=mysql_query("select user,profile_pic,firstname,lastname from member where m_id='{$result_new['object']}'");
	$result_object1=mysql_fetch_array($qry_object1);
	if($result_object1['firstname'] == ''){continue;}
?>	
			<a class="no-ajaxify" href="<?php echo $result_new['link_to']; ?>">
	         <li class="media">
			 	<div class="border-top innerAll">
				<div class="pull-left" style="margin-right:5px">
			 			 <?php 
				if($result_object1['profile_pic'] == '') { ?>
					<img class="media-object thumb" src="http://graph.facebook.com/<?php echo $result_object1['user']; ?>/picture?type=large" alt="50x50" width="50"/>
					 <?php }
					 
					 else {?>
			        <img class="media-object thumb" src="imageupload/uploads/<?php echo $result_object1['profile_pic']; ?>" alt="50x50" width="50"/>
					  <?php } ?>
			 
				</div>
				<div style="margin-right:5px">
					<div class="media-body">
			        	
			            <p class="margin-none"><?php echo $result_object1['firstname'].' '.$result_object1['lastname'].' '.$result_new['verb']; ?></p>
						<?php if($result_new['testimonial_type'] == 'vote'){?>
						<p class="text-muted" style="margin-top:5px"><i class="fa fa-check"></i>&nbsp;<?php echo substr($result_new['field_time'],0,10); ?></p>
						<?php } ?>
						<?php if($result_new['testimonial_type'] == 'comment'){?>
						<p class="text-muted" style="margin-top:5px"><i class="fa fa-comment"></i>&nbsp;<?php echo substr($result_new['field_time'],0,10); ?></p>
						<?php } ?>
						<?php if($result_new['testimonial_type'] == 'share'){?>
						<p class="text-muted" style="margin-top:5px"><i class="fa fa-share"></i>&nbsp;<?php echo substr($result_new['field_time'],0,10); ?></p>
						<?php } ?>
			        </div>
					</div>
				</li>
				</a>
				
<?php } } ?>

	          </ul>

        </li>
		
       

            </li>

              

      </ul>

      <li class="dropdown notif" style="margin-top:14px">

       

          <input type="text" name="query" id="search_box" class="form-control txt-auto dropdown-toggle" placeholder="Search"  data-toggle="dropdown" onkeyup="search_keyword()">

       
		<ul class="dropdown-menu" id="dropdown_search_box" style="min-width:510px;box-shadow:4px 3px 3px 3px rgba(128, 128, 128, 0.23)">
		<li class="media" style="padding:10px">Use <strong>@</strong> to search people, <strong>#</strong> to search hashtags and <strong>$</strong> to search testimonials</li>
		<div id="datadivsearchkeyword"></div>
		</ul>
      
		</li>
     

      <ul class="nav navbar-nav navbar-right">
<li class="dropdown notif">
        <a href="#" id="before_noti_testimonial" class="dropdown-toggle" onblur="dropdown_menu_active()" onclick="dropdown_menu_active()"  data-toggle="dropdown" style="color:white;background:#108B29"><i class="fa fa-pencil"></i>&nbsp;Write a Testimonial</a>
		<ul class="dropdown-menu" id="dropdown_menu" style="min-width:355px;box-shadow:4px 3px 3px 3px rgba(128, 128, 128, 0.23)">
		<div class="wizard">
					<div class="widget margin-none border-none widget-tabs widget-wizard-pills widget-tabs-responsive">
					
						<!-- Widget heading -->
						
						<!-- // Widget heading END -->
						
						<div class="widget-body innerAll inner-2x">
							<div class="tab-content">
						
								<!-- Step 1 -->
								<div class="tab-pane active" id="tab1-3">
									<div class="row">
										
										<div class="col-md-9">
											<input type="text" class="inputTitle col-md-6 form-control" onblur="store_title('<?php echo $_SESSION['SESS_EMAIL'] ?>','<?php echo $_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME']; ?>')" value="" id="input_title" style="font-size:28px; width:500px" placeholder="Enter testimonial's title ..." />
										
									<div id="datadivadduser" style="padding-left:15px"></div>
									
					
			   
			   		<li class="dropdown notif" style="margin-top:14px">

       

          <input type="text" name="search_people" id="search_people" class="form-control txt-auto dropdown-toggle" placeholder="writing for..."  data-toggle="dropdown"  onkeyup="search_people()" /> 

       
		<ul class="dropdown-menu" id="dropdown_search_people" style="min-width:200px;box-shadow:4px 3px 3px 3px rgba(128, 128, 128, 0.23);">
		
		<div id="datadivsearchpeople"></div>
		</ul>
      
		</li>
        
				<div class="separator bottom"></div>
				
										</div>
									</div>
									
									<div class="border-top innerAll">
									<div class="pull-left" style="margin:20px 0px 0px 5px">
									<i class="fa fa-times-circle pull-left" onclick="dropdown_menu_deactive()"></i>
									</div>
									
									<div class="pull-right" style="margin-right:5px" id="disabled_next">
									<ul class="pagination margin-bottom-none pull-right" id="enable_next">
   			 <li class="next primary disabled"><a href="#" class="no-ajaxify" data-toggle="tooltip" data-original-title="Have you entered the receiver's name?" data-placement="top">Next >></a></li>
	</ul>
	</div>
									<div id="datadivtitle"></div>
									</div>
									
									
								</div>
								
								
							</div>
							
							<!-- Wizard pagination controls -->
							
							<div class="clearfix"></div>
							<!-- // Wizard pagination controls END -->
							
						</div>
					</div>
				
					</div>	
				</ul>
</li>
<!-- // Modal END -->

        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		   
 <?php

 $qry_pic=mysql_query("select profile_pic, m_id,firstname,lastname from member where login='{$_SESSION['SESS_EMAIL']}'");
 $result_pic=mysql_fetch_array($qry_pic);
 $_SESSION['SESS_MID']=$result_pic['m_id'];
  ?>
    <?php 
				if($result_pic['profile_pic'] == '') { ?>
	<span class="pull-left innerR" ><img src="https://graph.facebook.com/<?php echo $_SESSION['SESS_USERNAME']; ?>/picture?type=small" alt="user" class="img-circle" style="height: 40px;width: 40px;overflow:hidden;"></span>
		  
		  <?php echo  $_SESSION['SESS_FIRST_NAME']; ?><b class="caret"></b>
       
<?php } 		
 else {?>
<span class="pull-left innerR"><img src="imageupload/uploads/<?php echo $result_pic['profile_pic']; ?>" alt="" class="img-circle"alt="user" style="height: 40px;width:40px;overflow:hidden;"></span>
 <?php echo $_SESSION['SESS_FULL_NAME']; ?><b class="caret"></b>
<?php }
?>		  

          
          </a>

          <ul class="dropdown-menu">

            <li><a href="<?php echo $path; ?>profile.php?user=<?php echo $_SESSION['SESS_MID']; ?>" class="no-ajaxify">Profile</a></li>

           
            <li class="divider"></li>

            <li><a href="<?php echo $path; ?>logout.php" class="no-ajaxify">Logout</a></li>

          </ul>

        </li>

      </ul>

    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->

</nav>

