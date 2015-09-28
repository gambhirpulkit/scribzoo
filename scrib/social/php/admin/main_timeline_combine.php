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
 <script type="text/javascript">
$(document).ready(function() {
	var s = $("#sticker");
	var pos = s.position();					   
	$(window).scroll(function() {
		var windowpos = $(window).scrollTop();
		
		if (windowpos >= pos.top) {
			s.addClass("stick");
		} else {
			s.removeClass("stick");	
		}
	});
});
</script>
<style>

.clear { 
	clear:both; 
}
div#sticker {
	padding:6px;
	margin:50px 0;
	
	width:290px;
}
.stick {
	position:fixed;
	top:20px;
}


</style>
<link href="imageupload/style/style.css" rel="stylesheet" type="text/css">
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



		$qry=mysql_query("select * from posts order by views desc")

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

			<div class="ribbon-wrapper"><div class="ribbon danger">Popular</div></div>

				<div class="thumbnail zoom border-none">

				<?php if($result['imgname'] != ''){ ?>

							<a href="testimonial.php?id=<?php echo $result['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/<?php echo $result['imgname']; ?>" class="img-responsive"></a>

							<?php }else{ ?>

							<a href="testimonial.php?id=<?php echo $result['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/sample_testimonial_image.jpg" class="img-responsive"></a>

							<?php } ?>

							<div class="caption text-center">

								<a href="testimonial.php?id=<?php echo $result['pid']; ?>" class="strong display-block"><?php echo $result['title']; ?></a>

								<span class="text-muted-dark"><i class="fa fa-fw fa-calendar"></i> Released:</span> 21 January 2014

								<br><span class="text-muted-dark">By:</span><?php echo $result['s_name']; ?>

							</div>

							

						</div><div class="row row-merge">

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-fw icon-comment-fill-1"></i><?php echo $result['vote']; ?></a>

				</div>

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-eye"></i><?php echo $result['views']; ?></a>

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

						<div class="ribbon-wrapper"><div class="ribbon danger">Popular</div></div>

							<?php if($result['imgname'] != ''){ ?>

							<a href="testimonial.php?id=<?php echo $result['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/<?php echo $result['imgname']; ?>" class="img-responsive"></a>

							<?php }else{ ?>

							<a href="testimonial.php?id=<?php echo $result['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/sample_testimonial_image.jpg" class="img-responsive"></a>

							<?php } ?>

							<div class="caption text-center">

								<a href="testimonial.php?id=<?php echo $result['pid']; ?>" class="strong display-block"><?php echo $result['title']; ?></a>

								<span class="text-muted-dark"><i class="fa fa-fw fa-calendar"></i> Released:</span> 21 January 2014

								<br><span class="text-muted-dark">By:</span><?php echo $result['s_name']; ?>

							</div>

							<div class="row row-merge">

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-fw icon-comment-fill-1"></i> <?php echo $result['vote']; ?></a>

				</div>

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-eye"></i><?php echo $result['views']; ?></a>

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

			<div class="ribbon-wrapper"><div class="ribbon danger">Popular</div></div>

				<div class="thumbnail zoom border-none">

				<?php if($result['imgname'] != ''){ ?>

							<a href="testimonial.php?id=<?php echo $result['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/<?php echo $result['imgname'];?>" width:"100%" overflow:"hidden" class="img-responsive"></a>

							<?php }else{ ?>

							<a href="testimonial.php?id=<?php echo $result['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/sample_testimonial_image.jpg" class="img-responsive"></a>

							<?php } ?>

							<div class="caption text-center">

								<a href="testimonial.php?id=<?php echo $result['pid']; ?>" class="strong display-block"><?php echo $result['title']; ?></a>

								<span class="text-muted-dark"><i class="fa fa-fw fa-calendar"></i> Released:</span> 21 January 2014

								<br><span class="text-muted-dark">By:</span><?php echo $result['s_name']; ?>

							</div>

							<div class="row row-merge">

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-fw icon-comment-fill-1"></i><?php echo $result['vote']; ?></a>

				</div>

				<div class="col-md-6">

					<a href="#" class="innerAll text-center display-block text-muted"><i class="fa fa-eye"></i><?php echo $result['views']; ?></a>

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



	<a href="#" class="btn btn-default pull-left">Today</a>



	<div class="media-body">



		  



	</div>



</div>







<ul class="timeline-activity list-unstyled">

<?php 
$qry_type=mysql_query("select t1.* from tbl_activity t1 where (verb='shared a testimonial' or verb='wrote a testimonial' or verb='voted a testimonial' or verb='connected to a person') and activity_id like '%,$visitor_id,%' and s_id <> '$visitor_id'  order by date desc limit 3") or die(mysql_error());
$previous_rows = 0;
while($result_type=mysql_fetch_array($qry_type))
{
$sid=$result_type['s_id'];
$previous_rows = $previous_rows+1;


?>


  <!--shared area starts -->
  
  
<?php 
	
if($result_type['verb']=='shared a testimonial')
{ 	
		// echo "SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)"; exit;
          $qry_share=mysql_query("SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)");
		
		$result_share=mysql_fetch_array($qry_share);
		
	$qry_who=mysql_query("select firstname, lastname, m_id from member where m_id ='$sid'");
		
		$result_who=mysql_fetch_array($qry_who);
		
		?>


	<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>



					<a href="profile.php?user=<?php echo $result_who['m_id'];?>" class="text-inverse"><?php echo $result_who['firstname'].' '.$result_who['lastname'];?></a> Shared a Testimonial

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_share['imgname']!= '') 
{ ?>

							<a href="testimonial.php?id=<?php echo $result_share['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/<?php echo $result_share['imgname'];?>"  style="overflow:hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="testimonial.php?id=<?php echo $result_share['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

							
									
									



								



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h5 class="strong"><a href="testimonial.php?id=<?php echo $result_share['pid']; ?>"><?php echo $result_share['title']; ?></a></h5>



								<p><?php echo substr($result_share['description'],0,100);
								?></p>
								<a href="testimonial.php?id=<?php echo $result_share['pid']; ?>">Read More<BR></a>



								<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> 3.5



							</div>



						</div>



					</div>



				</div>		



			</div>



			<div class="timeline-bottom innerT half">



				<i class="fa fa-clock-o"></i> 2 days ago  <span class="innerL"><i class="fa fa-calendar fa-fw"></i> 25 Oct 2013</span>



			</div>



		</div>



	</li>
	
	   
	
	   
	   
	   <!--upvote area starts---->
	   
	   <? }
	if($result_type['verb']=='voted a testimonial')
	   {
	   
          $qry_vote=mysql_query("SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)");
		
		$result_vote=mysql_fetch_array($qry_vote);
		
$qry_who_up=mysql_query("SELECT firstname, lastname ,m_id from member where m_id='$sid'");
	

		$result_who_up=mysql_fetch_array($qry_who_up);
		?>
	   
<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>


					<a href="profile.php?user=<?php echo $result_who_up['m_id'];?>" class="text-inverse"><?php echo $result_who_up['firstname'].' '.$result_who_up['lastname'];?></a> &nbsp;Authenticated a Testimonial

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_vote['imgname']!= ''){ ?>

							<a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/<?php echo $result_vote['imgname'];?>" width:"100%" overflow:"hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

							
									
									



								



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h5 class="strong"><a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>"><?php echo $result_vote['title']; ?></a></h5>



								<p><?php echo substr($result_vote['description'],0,100);
								?></p>
								<a href="testimonial.php?id=<?php echo $result_vote['pid']; ?>">Read More<BR></a>



								<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> 3.5



							</div>



						</div>



					</div>



				</div>		



			</div>



			<div class="timeline-bottom innerT half">



				<i class="fa fa-clock-o"></i> 2 days ago  <span class="innerL"><i class="fa fa-calendar fa-fw"></i> 25 Oct 2013</span>



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

?>

	<li>
		<span class="marker"></span>
		<div class="block block-inline">
			<div class="caret"></div>
			<div class="box-generic">
				<div class="timeline-top-info">
			<?php if($result_send['profile_pic']=='' && $result_receive['profile_pic']=='' )
			{ ?>
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>"><img src="https://graph.facebook.com/<?php echo $result_send['user']; ?>/picture?type=large" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>"><img src="https://graph.facebook.com/<?php echo $result_receive['user']; ?>/picture?type=large" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>
		<?php 	}  else if($result_send['profile_pic']=='' && $result_receive['profile_pic'] !='' )		
					{ ?>
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>"><img src="https://graph.facebook.com/<?php echo $result_send['user']; ?>/picture?type=large" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>"><img src="imageupload/uploads/<?php echo $result_receive['profile_pic']; ?>" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>					
		<?php   } else if($result_send['profile_pic']!='' && $result_receive['profile_pic'] =='' )		
					{ ?>
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>"><img src="imageupload/uploads/<?php echo $result_send['profile_pic']; ?>" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>"><img src="https://graph.facebook.com/<?php echo $result_receive['user']; ?>/picture?type=large" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>					
		<?php }  else 
					{ ?>		
					<a href="profile.php?user=<?php echo $result_send['m_id']; ?>"><img src="imageupload/uploads/<?php echo $result_send['profile_pic']; ?>" width="20" /></a><a href="profile.php?user=<?php echo $result_send['m_id']; ?>" class="text-inverse"><?php echo $result_send['firstname'].' '.$result_send['lastname']; ?></a> is now connected to  <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>"><img src="imageupload/uploads/<?php echo $result_receive['profile_pic']; ?>" width="20" /></a> <a href="profile.php?user=<?php echo $result_receive['m_id']; ?>" class="text-inverse"><?php echo $result_receive['firstname'].' '.$result_receive['lastname']; ?></a>					
			<?php 	} ?>
					
					
					
					<div class="timeline-bottom">
						<i class="fa fa-clock-o"></i> 6 days ago  
					</div>
				</div>
				<div class="bg-gray innerAll border-top">Good Job. Congrats and hope to see you soon.</div>
			</div>
		
		</div>
	</li>

	<?php } ?>	
<!--connected area ends --> 

<!-- writing area starts -->
<?php 
if($result_type['verb']=='wrote a testimonial')
{ 


          $qry_wrote=mysql_query("SELECT T1.* FROM posts T1 where pid IN (select '{$result_type['p_id']}' from tbl_activity)");
		
		$result_wrote=mysql_fetch_array($qry_wrote);
		
$qry_who_wrote=mysql_query("SELECT firstname, lastname ,m_id from member where m_id='$sid'");
	

		$result_who_wrote=mysql_fetch_array($qry_who_wrote);
		?>
	   
<li>



		<span class="marker"></span>



		<div class="block block-inline">



			<div class="caret"></div>



			<div class="box-generic">



				<div class="timeline-top-info">



					<i class="fa fa-user"></i>


					<a href="profile.php?user=<?php echo $result_who_wrote['m_id'];?>" class="text-inverse"><?php echo $result_who_wrote['firstname'].' '.$result_who_wrote['lastname'];?></a> &nbsp;Wrote a Testimonial for <?php echo $result_wrote['r_name']; ?>

	</div>



				<div class="media margin-none">



					<div class="row innerLR innerB">



						<div class="col-sm-4 col-lg-3">



							<div class="innerT">



						
<?php if($result_wrote['imgname']!= ''){ ?>

							<a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/<?php echo $result_wrote['imgname'];?>" width:"100%" overflow:"hidden" class="img-responsive"></a>

							<?php } 
							else{ ?>

							<a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>" class="innerAll half display-block"><img src="../../../../image/sample_testimonial_image.jpg" class="img-responsive"></a>


							<?php } ?>

							
									
									



								



							</div>



						</div>



						<div class="col-sm-8 col-lg-9">



							<div class="innerT">



								<h5 class="strong"><a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>"><?php echo $result_wrote['title']; ?></a></h5>



								<p><?php echo substr($result_wrote['description'],0,100);
								?></p>
								<a href="testimonial.php?id=<?php echo $result_wrote['pid']; ?>">Read More<BR></a>



								<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> 3.5



							</div>



						</div>



					</div>



				</div>		



			</div>



			<div class="timeline-bottom innerT half">



				<i class="fa fa-clock-o"></i> 2 days ago  <span class="innerL"><i class="fa fa-calendar fa-fw"></i> 25 Oct 2013</span>



			</div>



		</div>



	</li>

<?php } ?>

<!-- writing area ends -->


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
 
 $qry_pic=mysql_query("select profile_pic, m_id,firstname,lastname from member where login='{$_SESSION['SESS_EMAIL']}'");
 $result_pic=mysql_fetch_array($qry_pic);
 
  ?>
  <?php 
				if($result_pic['profile_pic'] == '') { ?>
			<a href="image_upload_fb.php"><img src="https://graph.facebook.com/<?php echo $_SESSION['SESS_USER']; ?>/picture?type=large" width="120" alt="" data-toggle="tooltip" data-original-title="click to change picture" data-placement="right" class="img-circle"></a>


        <h2 class="strong margin-none"><?php echo $_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME']; ?></h2>

 
 <div class="modal fade" id="modal-login">
	
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Please upload a profile picture</h3>
			</div>
			<!-- // Modal heading END -->
			
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						

					 
 <div id="upload-wrapper" style="margin-top:100px">

<div align="center">
<h3>Please upload a profile picture</h3>
<form action="processupload.php" method="post" enctype="multipart/form-data" id="MyUploadForm">
<input name="ImageFile" id="imageInput" type="file" />
<input type="submit"  id="submit-btn" />
<img src="imageupload/images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
</form>
<form action="main_timeline.php" method="post">

<div id="output">

</div>
<input type="submit"  id="submit-btn" value="submit" />
<input type="submit"  id="submit-btn" value="back" />


</div>
</div>


					</div>
				</div>
			</div>
			<!-- // Modal body END -->
	
		</div>
	</div>
	
</div>

<?php } else {?>
			<a href="#modal-login" data-toggle="modal" ><img src="imageupload/uploads/<?php echo $result_pic['profile_pic']; ?>" width="120" alt="" data-toggle="tooltip" data-original-title="Click to change picture" data-placement="right" class="img-circle"></a>

        <h2 class="strong margin-none"><?php echo $result_pic['firstname'].' '.$result['lastname']; ?></h2>
		
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
						

					 
<iframe src="image_upload.php" width="550" height="520"></iframe>


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
		
		
<?php } ?>


          <div class="innerB"><?php echo $_SESSION['SESS_ABOUT']; ?></div>

        <div class="innerB"> </div>



        <a href="profile.php?user=<?php echo $_SESSION['SESS_MID']; ?>" class="btn btn-primary text-center btn-block">Profile</a>



        <div class="btn-group-vertical btn-block">



            <a href="123.php" class="btn btn-default"><i class="fa fa-cog pull-right"></i>Boards</a>



            



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










</html>