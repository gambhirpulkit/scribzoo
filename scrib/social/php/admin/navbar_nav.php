<?php 
session_start();
include('header.php');
?>
<head>
<link rel="stylesheet" type="text/css" href="css/demo2.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/content.css" />
		<script src="js/modernizr.custom.js"></script>
		</head>
<nav class="navbar navbar-inverse top-nav navbar-fixed-top" role="navigation">



  <div class="container">

    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">

      <button type="button" class="navbar-toggle btn btn-default" data-toggle="collapse" data-target="#navbar-fixed-layout-collapse">

		<i class="fa fa-indent"></i>

      </button>

      <a class="navbar-brand" href="main_timeline.php"><img src="../assets/images/logo/logo.jpg" alt=""></a>

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
			<a href="#" class="dropdown-toggle"  data-toggle="dropdown"><i class="fa fa-user"></i>
			<?php if($count > 0)
			{ ?>
			<span><?php echo $count; ?></span><?php } ?></a>
			<ul class="dropdown-menu chat media-list" style="min-width:250px;">
	   <li style ="line-height: 29px"><h4>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Connection request </h4>
	   </li>
<?php


 $qry_request=mysql_query("select firstname,user,lastname,m_id from member where m_id IN (select object from tbl_noti where owner = {$_SESSION['SESS_MID']} and subject='new connection request' order by field_time desc)") or die(mysql_error());
while($result_request=mysql_fetch_array($qry_request))
{

?>		  
	
	         <li class="media" >
			        <a class="pull-left" href="connections.php?requests=<?php echo $_SESSION['SESS_MID']; ?> "><img class="media-object thumb" src="http://graph.facebook.com/<?php echo $result_request['user'] ?>/picture?type=large"  width="50" height="50"></a>
					<div class="media-body" >
			        	
			         <p class="margin-none" style="margin-top: 5px"> New connection request from <?php echo $result_request['firstname'].' '.$result_request['lastname'];?></p> 
			        </div>
				</li>
				
				
<?php } ?>	
	        

	          </ul>

        </li>
		
	
<!--connection notification  ends here -->		
		
		
<!-- message notification starts from here-->

		<li class="dropdown notif">
	<?php 	
$result_count_msg = mysql_fetch_array(mysql_query("select count(*) as count from tbl_message where sent_to='{$_SESSION['SESS_MID']}' and read_status='no' order by sent_on desc "));

$countmsg = $result_count_msg['count'];

?>


			<a href="#" class="dropdown-toggle"  data-toggle="dropdown"><i class="fa fa-envelope"></i><span> <?php echo $countmsg; ?></span></a>
			<ul class="dropdown-menu chat media-list" style="min-width:275px;">

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
		
	//echo "select count(*) as count from tbl_noti where (verb like '%voted up your testimonial%' or verb like '%shared your testimonial%') and owner='{$_SESSION['SESS_MID']}' order by field_time desc "; exit;
$result_count_noti = mysql_fetch_array(mysql_query("select count(*) as count from tbl_noti where (testimonial_type='vote' or testimonial_type='share') and owner='{$_SESSION['SESS_MID']}' and seen='no' order by field_time desc ")) or die(mysql_error());

$countnoti = $result_count_noti['count'];

?>
 
  <li class="dropdown notif">
			<a href="#" class="dropdown-toggle"  data-toggle="dropdown"><i class="fa fa-globe"></i>
			
			<span><?php $countnoti; ?></span></a>
			<ul class="dropdown-menu chat media-list" style="min-width:250px;">
	             
				 <?php

  $qry_notification=mysql_query("select * from tbl_noti where testimonial_type='vote' or testimonial_type='share' order by field_time desc") or die(mysql_error());
  while($result_notification=mysql_fetch_array($qry_notification))
 {

?>	
	
	         <li class="media">
			        <a class="pull-left" href="#"><img class="media-object thumb" src="../assets/images/people/100/15.jpg" alt="50x50" width="50"/></a>
					<div class="media-body">
			        	
			            <p class="margin-none"><?php echo $result_notification['verb']; ?></p>
			        </div>
				</li>
				
				
<?php  } ?>
	         

	          </ul>

        </li>
		
       

            </li>

              

      </ul>

      <form class="navbar-form navbar-left hidden-sm" role="search">

        <div class="form-group inline-block">

          <input type="text" class="form-control txt-auto" placeholder="Search">

        </div>

        <button type="submit" class="btn btn-inverse"><i class="fa fa-search fa-fw"></i></button>

      </form>
<div class="morph-button morph-button-overlay morph-button-fixed">
      <ul class="nav navbar-nav navbar-right">

        <li  class="innerLR"><button type="button" class="btn btn-success navbar-btn"><i class="fa fa-pencil"></i><a href="write_testimonial.php">Write a Testimonial</a></button></li>
</div>
        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		   
 <?php
 $qry_pic=mysql_query("select profile_pic, m_id,firstname,lastname from member where login='{$_SESSION['SESS_EMAIL']}'");
 $result_pic=mysql_fetch_array($qry_pic);
 $_SESSION['SESS_MID']=$result_pic['m_id'];
  ?>
    <?php 
				if($result_pic['profile_pic'] == '') { ?>
	<span class="pull-left innerR" ><img src="https://graph.facebook.com/<?php echo $_SESSION['SESS_USERNAME']; ?>/picture?type=small" alt="user" class="img-circle"class="img-circle" style="height: 40px;width: 40px;overflow:hidden;"></span>
		  
		  <?php echo  $_SESSION['SESS_FIRST_NAME']; ?><b class="caret"></b>
       
<?php } 		
 else {?>
<span class="pull-left innerR"><img src="imageupload/uploads/<?php echo $result_pic['profile_pic']; ?>" alt="" class="img-circle"alt="user" class="img-circle"class="img-circle" style="height: 40px;width: 40px;overflow:hidden;"></span>
 <?php echo $_SESSION['SESS_FULL_NAME']; ?><b class="caret"></b>
<?php }
?>		  

          
          </a>

          <ul class="dropdown-menu">

            <li><a href="profile.php?user=<?php echo $_SESSION['SESS_MID']; ?>">Profile</a></li>

            <li><a href="profile_messages.php">Messages</a></li>

            <li><a href="#">Something else here</a></li>

            <li class="divider"></li>

            <li><a href="logout.php">Logout</a></li>

          </ul>

        </li>

      </ul>

    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->

</nav>

<script src="js/classie.js"></script>
		<script src="js/uiMorphingButton_fixed.js"></script>
		<script>
			(function() {	
				var docElem = window.document.documentElement, didScroll, scrollPosition;

				// trick to prevent scrolling when opening/closing button
				function noScrollFn() {
					window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
				}

				function noScroll() {
					window.removeEventListener( 'scroll', scrollHandler );
					window.addEventListener( 'scroll', noScrollFn );
				}

				function scrollFn() {
					window.addEventListener( 'scroll', scrollHandler );
				}

				function canScroll() {
					window.removeEventListener( 'scroll', noScrollFn );
					scrollFn();
				}

				function scrollHandler() {
					if( !didScroll ) {
						didScroll = true;
						setTimeout( function() { scrollPage(); }, 60 );
					}
				};

				function scrollPage() {
					scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
					didScroll = false;
				};

				scrollFn();
				
				var el = document.querySelector( '.morph-button' );
				
				new UIMorphingButton( el, {
					closeEl : '.icon-close',
					onBeforeOpen : function() {
						// don't allow to scroll
						noScroll();
					},
					onAfterOpen : function() {
						// can scroll again
						canScroll();
						// add class "noscroll" to body
						classie.addClass( document.body, 'noscroll' );
						// add scroll class to main el
						classie.addClass( el, 'scroll' );
					},
					onBeforeClose : function() {
						// remove class "noscroll" to body
						classie.removeClass( document.body, 'noscroll' );
						// remove scroll class from main el
						classie.removeClass( el, 'scroll' );
						// don't allow to scroll
						noScroll();
					},
					onAfterClose : function() {
						// can scroll again
						canScroll();
					}
				} );
			})();
		</script>

