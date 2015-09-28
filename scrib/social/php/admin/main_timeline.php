<?php 

ob_start();
session_start();
include("config.php");
include("auth.php");
?>

 

<!DOCTYPE html>

<html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />



<head>

<script type="text/javascript" src="imageupload/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="imageupload/js/jquery.form.min.js"></script>

<script type="text/javascript">



$(document).ready(function() { 
	var options = { 
			target:   '#output',   // target element(s) to be updated with server response 
			beforeSubmit:  beforeSubmit,  // pre-submit callback 
			success:       afterSuccess,  // post-submit callback 
			resetForm: true        // reset the form after successful submit 
		}; 
		
	 $('#MyUploadForm').submit(function() { 
			$(this).ajaxSubmit(options);  			
			// always return false to prevent standard browser submit and page navigation 
			return false; 
		}); 
}); 

function afterSuccess()
{
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button

}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{
		
		if( !$('#imageInput').val()) //check empty input filed
		{
			$("#output").html("Are you kidding me?");
			return false
		}
		
		var fsize = $('#imageInput')[0].files[0].size; //get file size
		var ftype = $('#imageInput')[0].files[0].type; // get file type
		

		//allow only valid image file types 
		switch(ftype)
        {
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }
		
		//Allowed file size is less than 1 MB (1048576)
		if(fsize>1048576) 
		{
			$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
			return false
		}
				
		$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#output").html("");  
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

</script>

<?php include("header.php"); 
$visitor_id=$_SESSION['SESS_MID'];
 ?>

</head>

<body class=" scripts-async menu-right-hidden">

<script>

function hide_loadmore()

{

document.getElementById('loadmore1').style.display="none";

}
</script>
	<!-- Main Container Fluid -->



	<div class="container-fluid ">

		<!-- Content START -->



		<div id="content">



<?php include("navbar.php");



?>

			 <div class="container"><div class="innerLR">

	<div class="innerB">

			<div class="clearfix"></div>

		</div>



	<!-- row- -->

<!-- // WIDGET END -->

		<div class="col-md-8">



			<?php		



		$qry=mysql_query("select title,s_name,name,pid,imgname,vote,views,allowed from posts where deactive_status != '1' and hide != '1' order by views desc")

    or die(mysql_error());

		

		?>

		

		

<div class="widget">

				

					<div id="news-featured-1" class="owl-carousel owl-theme">

		<div class="item">

			<div class="box-generic padding-none margin-none overflow-hidden">

		<div class="row row-merge bg-gray">



		<?php

		$i=0;

		while($i<3)

		{ $i=$i+1;

		?>

		<?php 

$result=mysql_fetch_array($qry);

?>

			<div class="col-md-4">

			

				<div class="thumbnail zoom border-none">

				<?php if($result['imgname'] != ''){ ?>

							<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/<?php echo $result['imgname']; ?>" class="img-responsive"></a>

							<?php }else{ ?>

							<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>

							<?php } ?>

							<div class="caption text-center">

								<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result['pid']; ?>" class="strong display-block no-ajaxify"><?php echo $result['title']; ?></a>

								
								<br><p><?php echo $result['s_name']; ?>&nbsp;<span class="text-muted-dark"><i class="fa fa-caret-right"></i></span>&nbsp;<?php 
		$friends_array = explode(",,", $result['allowed']);
		foreach($friends_array as $friend_array){
		$friend_data = explode(":",$friend_array);
		
		?><?php echo $result['name']; }?></p>
							</div>

							

						</div><div class="row row-merge">

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-check"></i>&nbsp;<?php echo $result['vote']; ?></a>

				</div>

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-eye"></i>&nbsp;<?php echo $result['views']; ?></a>

				</div>

			</div>

			</div>





	<?php } ?>



		</div>

	</div>

	</div>

		<div class="item">

		<div class="row row-merge bg-gray">

			<?php

		

		while($i<6 && $i>=3)

		{ $i=$i+1;

		?>

		<?php 

$result=mysql_fetch_array($qry);

?>

			<div class="col-md-4">

				

						<div class="thumbnail zoom border-none">

						

							<?php if($result['imgname'] != ''){ ?>

							<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/<?php echo $result['imgname']; ?>" class="img-responsive"></a>

							<?php }else{ ?>

							<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>

							<?php } ?>

							<div class="caption text-center">

								<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result['pid']; ?>" class="strong display-block no-ajaxify"><?php echo $result['title']; ?></a>

								

								<p><br><?php echo $result['s_name']; ?>&nbsp;<span class="text-muted-dark"><i class="fa fa-caret-right"></i></span>&nbsp;<?php 
		$friends_array = explode(",,", $result['allowed']);
		foreach($friends_array as $friend_array){
		$friend_data = explode(":",$friend_array);
		
		?><?php echo $result['name']; }?></p>

							</div>

							<div class="row row-merge">

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-check"></i>&nbsp;<?php echo $result['vote']; ?></a>

				</div>

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-eye"></i>&nbsp;<?php echo $result['views']; ?></a>

				</div>

			</div>

						</div>

					

			</div>

			<?php } ?>

		</div>

	</div>

		<div class="item">

		<div class="row row-merge bg-gray">

		<?php

		

		while($i<9 && $i>=6)

		{ $i=$i+1;

		?>

		<?php 

$result=mysql_fetch_array($qry);

?>

		

			<div class="col-md-4">

			

				<div class="thumbnail zoom border-none">

				<?php if($result['imgname'] != ''){ ?>

							<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/<?php echo $result['imgname'];?>" width:"100%" overflow:"hidden" class="img-responsive"></a>

							<?php }else{ ?>

							<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>

							<?php } ?>

							<div class="caption text-center">

								<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result['pid']; ?>" class="strong display-block no-ajaxify"><?php echo $result['title']; ?></a>

								

							<br><p><?php echo $result['s_name']; ?>&nbsp;<span class="text-muted-dark"><i class="fa fa-caret-right"></i></span>&nbsp;<?php 
		$friends_array = explode(",,", $result['allowed']);
		foreach($friends_array as $friend_array){
		$friend_data = explode(":",$friend_array);
		
		?><?php echo $result['name']; }?></p>

							</div>

							<div class="row row-merge">

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-check"></i>&nbsp;<?php echo $result['vote']; ?></a>

				</div>

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-eye"></i>&nbsp;<?php echo $result['views']; ?></a>

				</div>

			</div>

						</div>

			</div>



		<?php } ?>	

		</div>

	

	</div>



</div>

</div>



		



		



				







	<div class="media">



	<a href="#" class="btn btn-default pull-left">news feed</a>



	<div class="media-body">



		  



	</div>



</div>

<?php
function time_stamp($session_time) 
{ 
$time_difference = time() - $session_time ; 

$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 );

if($seconds<60) 
 { 
        echo "few minutes ago";
       } 
		else if($minutes<60) 
 { 	if($minutes==1)
     { echo "one minute ago"; 
        } else { 
		echo $minutes." minutes ago"; 
        
			 } } 
			else if($hours<24) 
 { 	if($hours==1)
     { 
		echo "one hour ago"; 
		} else { 
		echo $hours." hours ago";
		
			} }
 else if($days<7) 
 { 	if($days==1)
     { 
	 echo "one day ago"; 
	  } 
		else { 
		echo $days." days ago"; 
		
			 } }
 else if($weeks<4) 
 { 	if($weeks==1)
     { 
	echo "one week ago"; 
	} 
		else { 
		echo $weeks." weeks ago"; 
			 } }
 else if($months<12) 
 { 	if($months==1)
     { 
	echo "one month ago";  
		} 
		else { 
		echo $months." months ago"; 
			 } }
			else {	
		if($years==1)
     { 
		echo "one year ago";
		}
		else { 
		echo $years." years ago"; 
			 } } } 
?>



<ul class="timeline-activity list-unstyled">

<?php 

$i=0;
$j=0;
$k=0;


$qry_type=mysql_query("select t1.* from tbl_activity t1 where (verb='shared a testimonial' or verb='wrote a testimonial' or verb='Authenticated a testimonial' or verb='connected to a person' or verb='commented on a testimonial') and activity_id like '%,$visitor_id,%' and s_id <> '$visitor_id'  order by date desc limit 5") or die(mysql_error());
$previous_rows = 0;
while($result_type=mysql_fetch_array($qry_type))
{ 
$sid=$result_type['s_id'];
$previous_rows = $previous_rows+1;
$i=$i+1;
$j=$j+1;
$k=$k+1;

?>

<script>
function update_count<?php echo a.$i; ?>()
{

document.getElementById('before_voting<?php echo a.$i; ?>').style.display="none";

document.getElementById('after_voting<?php echo b.$j; ?>').style.display="block";

}


function update_count_share<?php echo b.$j; ?>()
{
document.getElementById('before_sharing<?php echo c.$i; ?>').style.display="none";

document.getElementById('after_sharing<?php echo d.$j; ?>').style.display="block";
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

function update_uncount_reverse<?php echo $k; ?>()

{

document.getElementById('before_unvoting').style.display="block";

document.getElementById('after_unvoting<?php echo c.$k; ?>').style.display="none";

}
function update_uncount_reverse_share()

{
document.getElementById('before_sharing').style.display="block";

document.getElementById('after_unsharing').style.display="none";
}
</script>

  <!--shared area starts -->
  
  
<?php 
	
if($result_type['verb']=='shared a testimonial')
{ 	
		// echo "SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)"; exit;
          $qry_share=mysql_query("SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)");
		
		$result_share=mysql_fetch_array($qry_share);
		
		if($result_share['pid'] == '' or $result_share['title'] == '' or $result_share['hide'] == '1' or $result_share['deactive'] == '1'){
		
		continue; 
		
		}
		
	$qry_who=mysql_query("select firstname, lastname, m_id from member where m_id ='$sid'");
		
		$result_who=mysql_fetch_array($qry_who);
		
					 $originalDate = $result_type['date']; 
		

		
$newDate = date("d-m-Y", strtotime($originalDate));

		$testimonial_time = strtotime($newDate);
		$session_time = $testimonial_time;					
		 
		
		?>


	<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>



					<a href="<?php echo $path; ?>profile.php?user=<?php echo $result_who['m_id'];?>" class="text-inverse no-ajaxify"><?php echo $result_who['firstname'].' '.$result_who['lastname'];?></a> Shared a Testimonial

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_share['imgname']!= '') 
{ ?>

							<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result_share['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/<?php echo $result_share['imgname'];?>"  style="overflow:hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result_share['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

				</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">

 


								<h4 class="strong"><a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result_share['pid']; ?>" class="no-ajaxify"><?php echo $result_share['title']; ?></a></h4>
 <p><span class="text-muted"><?php echo $result_share['s_name']; ?>&nbsp;<i class="fa fa-caret-right"></i>&nbsp;<?php 
		$friends_array = explode(",,", $result['allowed']);
		foreach($friends_array as $friend_array){
		$friend_data = explode(":",$friend_array);
		
		?><?php echo $result_share['name']; }?></span></p>
                               
								<p><?php echo substr($result_share['description'],0,100);
								?></p>
								<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result_share['pid']; ?>" class="no-ajaxify">Read More<BR></a>






							</div>
							
							<!--auth share -->

							
							   <div class="border-top innerAll">
        <div class="pull-left">
		
		 <!-- share code starts here--> 
		 <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
// we are getting email adress from session here
						  $result_track_share = mysql_fetch_array(mysql_query("select id from track_share where sharer = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_share['id'] < 1)

						  {

						  ?>
						  
						   
 <a href="#" return false; id="before_sharing<?php echo c.$i; ?>" style="float:right font-size:12px;" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count_share<?php echo b.$j; ?>();return false;" data-original-title="share this testimonial"><h5>&nbsp;&nbsp;Share &nbsp;</h5></a>
<p id="after_sharing<?php echo d.$j; ?>" style="float:right; font-size:12px; display:none">You shared this &nbsp;</p>
 <?php }else{ ?>
 
							   <a href="#" return false; id="before_unsharing" style="float:right;display:none" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID']?>'); update_uncount_share();" title="share this testimonial" data-rel="tooltip"><i class="icon icon-carat-1-n "></i>share</a>

							   <p id="after_unsharing" style="float:right;">You shared &nbsp;</p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right; font-size:12px;" title="share this testimonial" data-rel="tooltip">share</a>

							   

							   <?php } ?>		  
 
 
 </span>
		 <!-- share code ends here-->  
		 
		 <!-- vote up code STARTS here--> 
		  <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
//getting session email from session

						  $result_track_vote = mysql_fetch_array(mysql_query("select id from track_votes where voter = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_vote['id'] < 1)

						  {  

						  ?>  
		   
		    
		   <a href="#" id="before_voting<?php echo a.$i; ?>" style="float:right; font-size:12px;" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count<?php echo a.$i; ?>(); return false;" data-rel="tooltip" data-original-title="Vote up this testimonial"><h5>Authenticate </h5></a>
<p id="after_voting<?php echo b.$j; ?>" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_count_reverse()" style="float:right;display:none; font-size:12px">You authenticated this <a href="#" >Unauthenticate </a></p>
 <?php }else{ ?>

							   <a href="#" id="before_unvoting" style="float:right;font-size:12px;display:none" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_uncount();return false;" title="Vote up this testimonial" data-rel="tooltip">Authenticate</a>

							   <p id="after_unvoting<?php echo c.$k; ?>" style="float:right;font-size:12px;">You authenticated this  <a href="#" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_uncount_reverse<?php echo $k; ?>();return false;" title="Unvote this testimonial" data-rel="tooltip">Unauthenticate </a></p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px" title="Vote up this testimonial" data-rel="tooltip"> Authenticate</a>

							   

							   <?php } ?>		  
		           
		  <!-- vote up ends here-->  
        </div>
		<?php 
		$qry_tooltip=mysql_query("select vote,share from posts where pid IN (select p_id from tbl_activity where p_id='{$result_type['p_id']}') ");
		$result_tooltip=mysql_fetch_array($qry_tooltip);
		?>
        <div class="pull-left" style="font-size: 12px;" >
<?php if($result_tooltip['vote']==1)
{ ?>		
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> person authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php }
else if($result_tooltip['vote']>1)  {	?>
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> people authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php } 
	else {  ?>
		<i class="fa fa-check" >&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
 <?php 	}
 ?>
	<?php if($result_tooltip['share']==1)
{ ?>
			<i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> person shared this testimonial" data-placement="right">&nbsp;&nbsp<?php echo $result_tooltip['share']; ?> </i> 
		  <?php } 
		  else if($result_tooltip['share']>1)  {  ?>
		  		 <i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> people shared this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>
		<?php }
			else { ?>
		  		 <i class="fa fa-share" >&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>			
				 <?php } ?>
           	</div>
		
	
    </div>
							
							
							
							<!--auth share ends -->

						</div>



					</div>



				</div>		



			</div>



			<div class="timeline-bottom innerT half">



				<i class="fa fa-clock-o"></i>&nbsp;<?php time_stamp($session_time);  ?> 



			</div>



		</div>



	</li>
	
	   
	
	   
	   
	   <!--upvote area starts---->
	   
	   <? }
	if($result_type['verb']=='Authenticated a testimonial')
	   {
	   
          $qry_vote=mysql_query("SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)");
		
		$result_vote=mysql_fetch_array($qry_vote);
		
		if($result_vote['pid'] == '' or $result_vote['title'] == '' or $result_vote['hide'] == '1' or $result_vote['deactive'] == '1'){
		
		continue; 
		
		}
		
		
$qry_who_up=mysql_query("SELECT firstname, lastname ,m_id from member where m_id='$sid'");
	

		$result_who_up=mysql_fetch_array($qry_who_up);
		
							 $originalDate = $result_type['date']; 
		

		
$newDate = date("d-m-Y", strtotime($originalDate));

		$testimonial_time = strtotime($newDate);
		$session_time = $testimonial_time;					
		 
		?>
	   
<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>


					<a href="<?php echo $path; ?>profile.php?user=<?php echo $result_who_up['m_id'];?>" class="no-ajaxify text-inverse"><?php echo $result_who_up['firstname'].' '.$result_who_up['lastname'];?></a> &nbsp;Authenticated a Testimonial

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_vote['imgname']!= ''){ ?>

							<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/<?php echo $result_vote['imgname'];?>" width:"100%" overflow:"hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

							
									
									



								



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h4 class="strong"><a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="no-ajaxify"><?php echo $result_vote['title']; ?></a></h4>

 <p><span class="text-muted"><?php echo $result_vote['s_name']; ?>&nbsp;<i class="fa fa-caret-right"></i>&nbsp;<?php 
		$friends_array = explode(",,", $result['allowed']);
		foreach($friends_array as $friend_array){
		$friend_data = explode(":",$friend_array);
		
		?><?php echo $result_vote['name']; }?></span></p>

								<p><?php echo substr($result_vote['description'],0,100);
								?></p>
								<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="no-ajaxify">Read More<BR></a>

							<!--auth share -->

							
							   <div class="border-top innerAll">
        <div class="pull-left">
		
		 <!-- share code starts here--> 
		 <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
// we are getting email adress from session here
						  $result_track_share = mysql_fetch_array(mysql_query("select id from track_share where sharer = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_share['id'] < 1)

						  {

						  ?>
						  
						   
 <a href="#" return false; id="before_sharing" style="float:right;font-size:12px" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count_share();return false;" data-original-title="share this testimonial"><h5>&nbsp;&nbsp;share &nbsp;</h5></a>
<p id="after_sharing" style="float:right;font-size:12px; display:none">You shared this &nbsp;</p>
 <?php }else{ ?>

							   <a href="#" return false; id="before_unsharing" style="float:right;font-size:12px;display:none" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID']?>'); update_uncount_share();return false;" title="share this testimonial" data-rel="tooltip">share</a>

							   <p id="after_unsharing" style="float:right;font-size:12px">You shared &nbsp;</p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px" title="share this testimonial" data-rel="tooltip">share</a>

							   

							   <?php } ?>		  
 
 
 </span>
		 <!-- share code ends here-->  
		 
		 <!-- vote up code STARTS here--> 
		  <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
//getting session email from session

						  $result_track_vote = mysql_fetch_array(mysql_query("select id from track_votes where voter = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_vote['id'] < 1)

						  {  

						  ?>  
		   
		    
		   <a href="#" id="before_voting" style="float:right;font-size:12px" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count(); return false;" data-rel="tooltip" data-original-title="Vote up this testimonial"><h5>Authenticate </h5></a>
<p id="after_voting" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_count_reverse();return false;" style="float:right;font-size:12px;display:none">You authenticated this <a href="#" >Unauthenticate </a></p>
 <?php }else{ ?>

							   <a href="#" id="before_unvoting" style="float:right;font-size:12px;display:none" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_uncount();return false;" title="Vote up this testimonial" data-rel="tooltip">Authenticate</a>

							   <p id="after_unvoting<?php echo c.$k; ?>" style="float:right;font-size:12px;">You authenticated this  <a href="#" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_uncount_reverse<?php echo $k; ?>();return false;" title="Unvote this testimonial" data-rel="tooltip">Unauthenticate </a></p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px;" title="Vote up this testimonial" data-rel="tooltip">Authenticate</a>

							   

							   <?php } ?>		  
		           
		  <!-- vote up ends here-->  
        </div>
		<?php 
		$qry_tooltip=mysql_query("select vote,share from posts where pid IN (select p_id from tbl_activity where p_id='{$result_type['p_id']}') ");
		$result_tooltip=mysql_fetch_array($qry_tooltip);
		?>
        <div class="pull-left">
<?php if($result_tooltip['vote']==1)
{ ?>		
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> person authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php }
else if($result_tooltip['vote']>1)  {	?>
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> people authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php } 
	else {  ?>
		<i class="fa fa-check" >&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
 <?php 	}
 ?>
	<?php if($result_tooltip['share']==1)
{ ?>
			<i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> person shared this testimonial" data-placement="right">&nbsp;&nbsp<?php echo $result_tooltip['share']; ?> </i> 
		  <?php } 
		  else if($result_tooltip['share']>1)  {  ?>
		  		 <i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> people shared this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>
		<?php }
			else { ?>
		  		 <i class="fa fa-share" >&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>			
				 <?php } ?>
           	</div>
		
	
    </div>
							
							
							
							<!--auth share ends -->
							</div>



						</div>



					</div>



				</div>		



			</div>



			<div class="timeline-bottom innerT half">



				<i class="fa fa-clock-o"></i>&nbsp;<?php time_stamp($session_time);  ?> 



			</div>



		</div>



	</li>
	

<!--upvote area ends-->
<?php } ?>
	
<!--connected area starts-->
<?php
if($result_type['verb']=='connected to a person')
{	
//echo "select t1.*,t2.s_id from member t1, tbl_activity t2 where m_id = '{$result_type['s_id']}' "; exit;
$qry_send=mysql_query("select t1.* from member t1 where m_id = '{$result_type['s_id']}' ");
$result_send=mysql_fetch_array($qry_send);


$qry_receive=mysql_query("select t1.* from member t1 where m_id = '{$result_type['r_id']}' ") or die(mysql_error());
$result_receive=mysql_fetch_array($qry_receive);

					 $originalDate = $result_type['date']; 
		

		
$newDate = date("d-m-Y", strtotime($originalDate));

		$testimonial_time = strtotime($newDate);
		$session_time = $testimonial_time;					
		 
?>

	<li>
		<span class="marker"></span>
		<div class="block block-inline">
			<div class="caret"></div>
			<div class="box-generic">
				<div class="timeline-top-info">
			<?php if($result_send['profile_pic']=='' && $result_receive['profile_pic']=='' )
			{ ?>
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="no-ajaxify"><img src="https://graph.facebook.com/<?php echo $result_send['user']; ?>/picture?type=large" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="no-ajaxify"><img src="https://graph.facebook.com/<?php echo $result_receive['user']; ?>/picture?type=large" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>
		<?php 	}  else if($result_send['profile_pic']=='' && $result_receive['profile_pic'] !='' )		
					{ ?>
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="no-ajaxify"><img src="https://graph.facebook.com/<?php echo $result_send['user']; ?>/picture?type=large" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="no-ajaxify"><img src="imageupload/uploads/<?php echo $result_receive['profile_pic']; ?>" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>					
		<?php   } else if($result_send['profile_pic']!='' && $result_receive['profile_pic'] =='' )		
					{ ?>
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="no-ajaxify"><img src="imageupload/uploads/<?php echo $result_send['profile_pic']; ?>" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="no-ajaxify"><img src="https://graph.facebook.com/<?php echo $result_receive['user']; ?>/picture?type=large" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>					
		<?php }  else 
					{ ?>		
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="no-ajaxify"><img src="imageupload/uploads/<?php echo $result_send['profile_pic']; ?>" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="no-ajaxify"><img src="imageupload/uploads/<?php echo $result_receive['profile_pic']; ?>" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse no-ajaxify"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>					
			<?php 	} ?>
					
					
					
					<div class="timeline-bottom">
						<i class="fa fa-clock-o"></i>&nbsp;<?php time_stamp($session_time);  ?> 
					</div>
				</div>
				
			</div>
		
		</div>
	</li>

	<?php } ?>	
<!--connected area ends --> 

<!-- writing area starts -->
<?php 
if($result_type['verb']=='Wrote a Testimonial')
{ 


        $qry_wrote=mysql_query("SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)");
		
		$result_wrote=mysql_fetch_array($qry_wrote);
		
		if($result_wrote['pid'] == '' or $result_wrote['title'] == '' or $result_wrote['hide'] == '1' or $result_wrote['deactive'] == '1'){
		
		continue; 
		
		}
		
		$qry_who_wrote=mysql_query("SELECT firstname, lastname ,m_id from member where m_id='$sid'");
	

		$result_who_wrote=mysql_fetch_array($qry_who_wrote);
		
		$originalDate = $result_type['date']; 
		

		
$newDate = date("d-m-Y", strtotime($originalDate));

		$testimonial_time = strtotime($newDate);
		$session_time = $testimonial_time;					
		 
		?>
	   
<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>


					<a href="profile.php?user=<?php echo $result_who_wrote['m_id'];?>" class="text-inverse no-ajaxify"><?php echo $result_who_wrote['firstname'].' '.$result_who_wrote['lastname'];?></a> &nbsp;Wrote a Testimonial with <?php 
		$friends_array = explode(",,", $result['allowed']);
		foreach($friends_array as $friend_array){
		$friend_data = explode(":",$friend_array);
		
		?><?php echo $result_who_wrote['name']; }?>

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_wrote['imgname']!= ''){ ?>

							<a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/<?php echo $result_wrote['imgname'];?>" width:"100%" overflow:"hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

							
									
									



								



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h4 class="strong"><a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="no-ajaxify"><?php echo $result_wrote['title']; ?></a></h4>



								<p><?php echo substr($result_wrote['description'],0,100);
								?></p>
								<a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="no-ajaxify">Read More<BR></a>
							<!--auth share -->

							
							   <div class="border-top innerAll">
        <div class="pull-left">
		
		 <!-- share code starts here--> 
		 <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
// we are getting email adress from session here
						  $result_track_share = mysql_fetch_array(mysql_query("select id from track_share where sharer = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_share['id'] < 1)

						  {

						  ?>
						  
						   
 <a href="#" return false; id="before_sharing" style="float:right;font-size:12px;" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count_share();return false;" data-original-title="share this testimonial"><h5>&nbsp;&nbsp;Share &nbsp;</h5></a>
<p id="after_sharing" style="float:right;font-size:12px;display:none">You shared this &nbsp;</p>
 <?php }else{ ?>

							   <a href="#" return false; id="before_unsharing" style="float:right;font-size:12px;display:none" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID']?>'); update_uncount_share();return false;" title="share this testimonial" data-rel="tooltip">share</a>

							   <p id="after_unsharing" style="float:right;font-size:12px;">You shared &nbsp;</p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px" title="share this testimonial" data-rel="tooltip">share</a>

							   

							   <?php } ?>		  
 
 
 </span>
		 <!-- share code ends here-->  
		 
		 <!-- vote up code STARTS here--> 
		  <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
//getting session email from session

						  $result_track_vote = mysql_fetch_array(mysql_query("select id from track_votes where voter = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_vote['id'] < 1)

						  {  

						  ?>  
		   
		    
		   <a href="#" id="before_voting<?php echo a.$i; ?>" style="float:right;font-size:12px;" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count<?php echo a.$i; ?>(); return false;" data-rel="tooltip" data-original-title="Vote up this testimonial"><h5>Authenticate </h5></a>
<p id="after_voting<?php echo b.$j; ?>" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_count_reverse();return false;" style="float:right;font-size:12px;display:none">You authenticated this <a href="#" >Unauthenticate </a></p>
 <?php }else{ ?>

							   <a href="#" id="before_unvoting" style="float:right;font-size:12px;display:none" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_uncount();return false;" title="Vote up this testimonial" data-rel="tooltip">Authenticate</a>

							   <p id="after_unvoting<?php echo c.$k; ?>" style="float:right;font-size:12px;">You authenticated this  <a href="#" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_uncount_reverse<?php echo $k; ?>();return false;" title="Unvote this testimonial" data-rel="tooltip">Unauthenticate </a></p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px;" title="Vote up this testimonial" data-rel="tooltip">Authenticate</a>

							   

							   <?php } ?>		  
		           
		  <!-- vote up ends here-->  
        </div>
		<?php 
		$qry_tooltip=mysql_query("select vote,share from posts where pid IN (select p_id from tbl_activity where p_id='{$result_type['p_id']}') ");
		$result_tooltip=mysql_fetch_array($qry_tooltip);
		?>
        <div class="pull-left">
<?php if($result_tooltip['vote']==1)
{ ?>		
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> person authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php }
else if($result_tooltip['vote']>1)  {	?>
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> people authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php } 
	else {  ?>
		<i class="fa fa-check" >&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
 <?php 	}
 ?>
	<?php if($result_tooltip['share']==1)
{ ?>
			<i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> person shared this testimonial" data-placement="right">&nbsp;&nbsp<?php echo $result_tooltip['share']; ?> </i> 
		  <?php } 
		  else if($result_tooltip['share']>1)  {  ?>
		  		 <i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> people shared this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>
		<?php }
			else { ?>
		  		 <i class="fa fa-share" >&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>			
				 <?php } ?>
           	</div>
		
	
    </div>
							
							
							
							<!--auth share ends -->
							</div>



						</div>



					</div>



				</div>		



			</div>



			<div class="timeline-bottom innerT half">



				<i class="fa fa-clock-o"></i>&nbsp;<?php time_stamp($session_time);  ?> 



			</div>



		</div>



	</li>

<?php } ?>

<!-- writing area ends -->

<!-- commented area starts -->
<?php 

if($result_type['verb']=='commented on a testimonial')
{ 	
		// echo "SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)"; exit;
          $qry_comment=mysql_query("SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)");
		
		$result_comment=mysql_fetch_array($qry_comment);
		
		if($result_comment['pid'] == '' or $result_comment['title'] == '' or $result_comment['hide'] == '1' or $result_comment['deactive'] == '1'){
		
		continue; 
		
		}
		
	$qry_who=mysql_query("select firstname, lastname, m_id from member where m_id ='$sid'");
		
		$result_who=mysql_fetch_array($qry_who);
		
					 $originalDate = $result_type['date']; 
		

		
$newDate = date("d-m-Y", strtotime($originalDate));

		$testimonial_time = strtotime($newDate);
		$session_time = $testimonial_time;					
		 
		
		?>


	<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>



					<a href="<?php echo $path; ?>profile.php?user=<?php echo $result_who['m_id'];?>" class="text-inverse no-ajaxify"><?php echo $result_who['firstname'].' '.$result_who['lastname'];?></a> commented on a Testimonial

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_comment['imgname']!= '') 
{ ?>

							<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result_comment['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/<?php echo $result_comment['imgname'];?>"  style="overflow:hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result_comment['pid']; ?>" class="innerAll half display-block no-ajaxify"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

				</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">

 


								<h4 class="strong"><a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result_comment['pid']; ?>" class="no-ajaxify"><?php echo $result_comment['title']; ?></a></h4>
 <p><span class="text-muted"><?php echo $result_comment['s_name']; ?>&nbsp;<i class="fa fa-caret-right"></i>&nbsp;<?php 
		$friends_array = explode(",,", $result['allowed']);
		foreach($friends_array as $friend_array){
		$friend_data = explode(":",$friend_array);
		
		?><?php echo $result_comment['name']; }?></span></p>
                               
								<p><?php echo substr($result_comment['description'],0,100);
								?></p>
								<a href="<?php echo $path; ?>testimonial.php?id=<?php echo $result_comment['pid']; ?>" class="no-ajaxify">Read More<BR></a>






							</div>
							
							<!--auth share -->

							
							   <div class="border-top innerAll">
        <div class="pull-left">
		
		 <!-- share code starts here--> 
		 <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
// we are getting email adress from session here
						  $result_track_share = mysql_fetch_array(mysql_query("select id from track_share where sharer = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_share['id'] < 1)

						  {

						  ?>
						  
						   
 <a href="#" return false; id="before_sharing<?php echo c.$i; ?>" style="float:right font-size:12px;" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count_share<?php echo b.$j; ?>();return false;" data-original-title="share this testimonial"><h5>&nbsp;&nbsp;Share &nbsp;</h5></a>
<p id="after_sharing<?php echo d.$j; ?>" style="float:right; font-size:12px; display:none">You shared this &nbsp;</p>
 <?php }else{ ?>
 
							   <a href="#" return false; id="before_unsharing" style="float:right;display:none" onClick="share('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID']?>'); update_uncount_share();" title="share this testimonial" data-rel="tooltip"><i class="icon icon-carat-1-n "></i>share</a>

							   <p id="after_unsharing" style="float:right;">You shared &nbsp;</p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right; font-size:12px;" title="share this testimonial" data-rel="tooltip">share</a>

							   

							   <?php } ?>		  
 
 
 </span>
		 <!-- share code ends here-->  
		 
		 <!-- vote up code STARTS here--> 
		  <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
//getting session email from session

						  $result_track_vote = mysql_fetch_array(mysql_query("select id from track_votes where voter = '{$_SESSION['SESS_MID']}' and testimonial_id = '{$result_type['p_id']}'")); 

						  if($result_track_vote['id'] < 1)

						  {  

						  ?>  
		   
		    
		   <a href="#" id="before_voting<?php echo a.$i; ?>" style="float:right; font-size:12px;" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_count<?php echo a.$i; ?>(); return false;" data-rel="tooltip" data-original-title="Vote up this testimonial"><h5>Authenticate </h5></a>
<p id="after_voting<?php echo b.$j; ?>" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_count_reverse()" style="float:right;display:none; font-size:12px">You authenticated this <a href="#" >Unauthenticate </a></p>
 <?php }else{ ?>

							   <a href="#" id="before_unvoting" style="float:right;font-size:12px;display:none" onClick="vote_up('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>'); update_uncount();return false;" title="Vote up this testimonial" data-rel="tooltip">Authenticate</a>

							   <p id="after_unvoting<?php echo c.$k; ?>" style="float:right;font-size:12px;">You authenticated this  <a href="#" onClick="unvote('<?php echo $result_type['p_id']; ?>','<?php echo $_SESSION['SESS_MID'] ?>');update_uncount_reverse<?php echo $k; ?>();return false;" title="Unvote this testimonial" data-rel="tooltip">Unauthenticate </a></p> 

							   

							   <?php } }else{ ?>

							<a href="#" id="pop" style="float:right;font-size:12px" title="Vote up this testimonial" data-rel="tooltip"> Authenticate</a>

							   

							   <?php } ?>		  
		           
		  <!-- vote up ends here-->  
        </div>
		<?php 
		$qry_tooltip=mysql_query("select vote,share from posts where pid IN (select p_id from tbl_activity where p_id='{$result_type['p_id']}') ");
		$result_tooltip=mysql_fetch_array($qry_tooltip);
		?>
        <div class="pull-left" style="font-size: 12px;" >
<?php if($result_tooltip['vote']==1)
{ ?>		
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> person authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php }
else if($result_tooltip['vote']>1)  {	?>
		 <i class="fa fa-check" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['vote']; ?> people authenticated this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
	<?php } 
	else {  ?>
		<i class="fa fa-check" >&nbsp;&nbsp;<?php echo $result_tooltip['vote']; ?> &nbsp;</i>
 <?php 	}
 ?>
	<?php if($result_tooltip['share']==1)
{ ?>
			<i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> person shared this testimonial" data-placement="right">&nbsp;&nbsp<?php echo $result_tooltip['share']; ?> </i> 
		  <?php } 
		  else if($result_tooltip['share']>1)  {  ?>
		  		 <i class="fa fa-share" data-toggle="tooltip" data-original-title="<?php echo $result_tooltip['share']; ?> people shared this testimonial" data-placement="right">&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>
		<?php }
			else { ?>
		  		 <i class="fa fa-share" >&nbsp;&nbsp;<?php echo $result_tooltip['share']; ?> &nbsp;</i>			
				 <?php } ?>
           	</div>
		
	
    </div>
							
							
							
							<!--auth share ends -->

						</div>



					</div>



				</div>		



			</div>



			<div class="timeline-bottom innerT half">



				<i class="fa fa-clock-o"></i>&nbsp;<?php time_stamp($session_time);  ?> 



			</div>



		</div>



	</li>
	
	   
	
	   
	   
	   <!--upvote area starts---->
	   
	   <? }


?>

<!-- commented area ends -->

<?php } ?>

</ul>
<a href="#" id="loadmore1" onClick="load_more('<?php echo $previous_rows; ?>'); hide_loadmore(); return false;">Load more</a>
<div id="load_more">
</div>
			







<!-- //End Row -->



</div>



		<!-- // END col -->



		



				<!-- col -->

  

		



		<div class="col-md-4 col-lg-3">



<div class="widget">



    <div class="widget-body text-center">

	 
					
 <?php 
 $i_score=11;
 $qry_pic=mysql_query("select profile_pic, m_id,firstname,lastname,fb_frnds_count,total_testimonial_views from member where login='{$_SESSION['SESS_EMAIL']}'");
 $result_pic=mysql_fetch_array($qry_pic);
 $fb_frnds_count = $result_pic['fb_frnds_count'];
		
		if($fb_frnds_count >50 && $fb_frnds_count <150)
		{
		$i_score=4;
		}
		
		else if ($fb_frnds_count >=150 && $fb_frnds_count <400)
		{
		$i_score=8;
		}
		else if ($fb_frnds_count >=400 && $fb_frnds_count <1000)
		{
		$i_score=12;
		}
		else if ($fb_frnds_count >=1000 && $fb_frnds_count <5000)
		{
		$i_score=16;
		}
		else if ($fb_frnds_count >=5000 )
		{
		$i_score=20;
		}
		 if($result_pic['total_testimonial_views'] >0 && $result_pic['total_testimonial_views'] <50)
		{
		$i_score=$i_score+10;
		}
	
	   if($result_pic['total_testimonial_views'] >50 && $result_pic['total_testimonial_views'] <150)
		{
		$i_score=$i_score+14;
		}
		
		else if ($result_pic['total_testimonial_views'] >=150 && $result_pic['total_testimonial_views'] <400)
		{
		$i_score= $i_score + 18;
		}
		else if ($result_pic['total_testimonial_views'] >=400 && $result_pic['total_testimonial_views'] <1000)
		{
		$i_score=$i_score + 22;
		}
		else if ($result_pic['total_testimonial_views'] >=1000 && $result_pic['total_testimonial_views'] <5000)
		{
		$i_score=$i_score + 26;
		}
		else if ($result_pic['total_testimonial_views'] >=5000 )
		{
		$i_score=$i_score + 30;
		}
  ?>
  <?php 
				if($result_pic['profile_pic'] == '') { ?>
			<a href="#modal-login"><img src="https://graph.facebook.com/<?php echo $_SESSION['SESS_USER']; ?>/picture?type=large" width="120" alt="" data-toggle="tooltip" data-original-title="click to change picture" data-placement="right" class="img-circle"></a>


        <h2 class="strong margin-none"><?php echo "Hi, ".$_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME']; ?></h2>

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
				
				<a href="#" onClick="gototab();" class="btn btn-default" data-dismiss="modal"><i class="fa fa-check"></i> Save</a>
			</div>
			</div>
			<!-- // Modal body END -->
	
		</div>
	</div>
	
</div>


<?php } else {?>
			<a href="#modal-login" data-toggle="modal" ><img src="imageupload/uploads/<?php echo $result_pic['profile_pic']; ?>" width="120" alt="" data-toggle="tooltip" data-original-title="Click to change picture" data-placement="right" class="img-circle"></a>

        <h2 class="strong margin-none"><?php echo "Hi, ".$result_pic['firstname'].' '.$result['lastname']; ?></h2>
		
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
				
				<a href="#" onClick="gototab();" class="btn btn-default" data-dismiss="modal"><i class="fa fa-check"></i> Save</a>
			</div>
			</div>
			<!-- // Modal body END -->
	
		</div>
	</div>
	
</div>
		
		
<?php } ?>


          <div class="innerB"><?php echo $_SESSION['SESS_ABOUT']; ?></div>

        <div class="innerB"> </div>



        <a href="profile.php?user=<?php echo $_SESSION['SESS_MID']; ?>" class="btn btn-primary text-center btn-block no-ajaxify" >Profile</a>

    </div>



</div>

<div class="widget">



    <div class="widget-body text-center">

		
         
       
<div data-percent="<?php echo $i_score; ?>" data-size="150" class="easy-pie inline-block easy-pie-gender inverse" data-scale-color="false" data-track-color="#ffffff" data-line-width="5">
                <div class="value text-center innerAll"><p class="lead text-large"><?php echo $i_score; ?></p></div>
            </div>
		<p>Your Influential Score <a href="#modal-simple" data-toggle="modal">Improve</a></p>
		
		
       <div class="modal fade" id="modal-simple">
	
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Improve your Influential Score</h3>
			</div>
			<!-- // Modal heading END -->
			
			<!-- Modal body -->
			<div class="modal-body">
				<a href="explore_content.php?source=people" class="btn btn-default no-ajaxify">Grow Your Network</a> 
				<a href="#" data-dismiss="modal" class="btn btn-default" onClick="dropdown_menu_active()">Write Testimonials</a>
				<a href="#" data-dismiss="modal" class="btn btn-default">Share Your Content</a>
			</div>
			<!-- // Modal body END -->
			
			<!-- Modal footer -->
			
			<!-- // Modal footer END -->

		</div>
	</div>
	
</div>

    </div>



</div>

<div id="sticker">

<?php 

include("trending_boards.php");

?>
</div>
 <div class="clear"></div>






	</div> 



	<!-- // END row -->



</div>



<!-- // END  -->



</div> 



			</div>



<!-- // Content END -->



		



		<div class="clearfix"></div>



		<!-- // Sidebar menu & content wrapper END -->



		



				<!-- Footer -->



		<div id="footer" class="hidden-print">



			



			<!--  Copyright Line -->




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










</html>