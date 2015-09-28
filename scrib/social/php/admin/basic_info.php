
			<div class="widget">



				<div class="widget-head border-bottom bg-gray">



					<h5 class="innerAll pull-left margin-none">Basic Info</h5>
					<?php if($mid==$visitor_id){ ?>
					<a href="fill_details_login.php?reason=edit" class="text-muted"><p class="innerAll pull-right margin-none">edit</p></a>
<?php } ?>

					<div class="pull-right">



						<a href="#" class="text-muted">



					



						</a>



					</div>



				</div>



				<div class="widget-body">



					<div class="row">



						<div class="col-sm-6">User:</div>



						<div class="col-sm-6 text-right">

<?php if($mid==$visitor_id)
{ ?>

							<span class="label label-default"><?php echo $result['username']; ?></span>
<?php }
else
 {	?>			<span class="label label-default"><?php echo $result['username']; ?></span>
 
<?php }?>

						</div>



					</div>



					<div class="row">



						<div class="col-sm-6">Friends:</div>



						<div class="col-sm-6 text-right">



							<span class="label label-default"><?php echo $result_count['count']; ?></span>



						</div>



					</div>



					<div class="row">



						<div class="col-sm-6">Gender:</div>



						<div class="col-sm-6 text-right">

<?php 
if($mid==$visitor_id)
{ ?>
							<span class="label label-default"><?php echo $_SESSION['SESS_GENDER']; ?></span>
<?php }
else 
{ ?>
<span class="label label-default"><?php echo $result['gender']; ?></span>
<?php } ?>

						</div>

					</div>

				</div>

			</div>

			<div class="widget">
	
					<div class="widget-head border-bottom bg-gray">
	
						<h5 class="innerAll pull-left margin-none">Contact</h5>
	
						<div class="pull-right">
	<?php 
	if($mid==$visitor_id)
	{ ?>
	
	
							<a target="_blank" href="<?php echo "https://facebook.com/".$_SESSION['SESS_USERNAME']; ?>" class="text-muted">
	<i class="fa fa-facebook innerL"></i>
	</a>
	<?php }
	
	else 
	{ ?>
	
	<a target="_blank" href="https://facebook.com/<?php echo $result['user']; ?>" class="text-muted">
								<i class="fa fa-facebook innerL"></i>
	
							</a>
	
		<?php } ?>
	
							<?php 
	
							if($_SESSION['twitter_handle'] != ''){ ?>
	
							<a target="_blank" href="<?php echo "https://twitter.com/".$_SESSION['twitter_handle']; ?>" class="text-muted">
	
								<i class="fa fa-twitter innerL"></i>
	
							</a>
	
							 <?php } ?>
	
						</div>
	
					</div>
	
					<div class="widget-body padding-none">
	
						<div class="border-top innerAll">
	
							<a href="#modal-compose" data-toggle="modal"><p class="margin-none"><i class="fa fa-envelope fa-fw text-muted"></i> Email me</p></a>
							
							<div class="modal fade" id="modal-compose">
		
		<div class="modal-dialog">
			<div class="modal-content">
	
				<!-- Modal heading -->
				<!-- <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Login</h3>
				</div> -->
				<!-- // Modal heading END -->
	
				<div class="innerAll border-bottom">
					<p class="pull-left strong" style="color:black">Send a message to <?php echo $result['firstname']; ?></p>
					
					
					<div class="clearfix"></div>
				</div>
				
				<!-- Modal body -->
				<div class="modal-body padding-none">
					
					<form class="form-horizontal" role="form">
						
	
						<div class="innerAll inner-2x">
							<textarea id = "profile_email_body" class="notebook border-none form-control padding-none" rows="4" placeholder="Write your content here..."></textarea>
							<div class="clearfix"></div>
						</div>
					</form>
	
				</div>
				<!-- // Modal body END -->
	
				<div class="innerAll text-center border-top">
					<a href="" class="btn btn-default"><i class="fa fa-fw icon-crossing"></i> Cancel</a>
					<a href="" onClick="send_email('<?php echo $result['login']; ?>','<?php echo $_SESSION['SESS_EMAIL']; ?>')" class="btn btn-primary"><i class="fa fa-fw icon-outbox-fill"></i> Send email</a>
				</div>
		
			</div>
		</div>
		
	</div>
	<!-- // Modal END -->
							
							
						</div>
	
						<div class="border-top innerAll">
	
							<p class=" margin-none"><i class="fa fa-home fa-fw text-muted"></i> <a href="#"><?php echo $result['hometown']; ?></a></p>
	
						</div>
	
					</div>
	
				</div>