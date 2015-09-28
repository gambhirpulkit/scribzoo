<?php ob_start(); 

session_start();

?>





<html>

<head>

<title>No content</title>

 <meta property="og:image" content="https://graph.facebook.com/me/picture?type=large" />

</head>

<body>



<?php

include('auth.php'); 

 include('config.php'); 

 ?>



<?php



if(isset($_POST['mode'])) { $mode = addslashes($_POST['mode']); }

if(isset($_POST['previous_rows_people'])) { $previous_rows_people = addslashes($_POST['previous_rows_people']); }

if(isset($_POST['keyword'])) { $keyword = addslashes($_POST['keyword']); }


switch($mode)

{



    case 'load_more_people':
	$next_rows_people = $previous_rows_people+10;
    $sel = "select firstname,lastname,login,m_id,hometown,user,username from member where firstname like '%$keyword%' or lastname 	like '%$keyword%' or login like '%$keyword%' limit 10,$previous_rows_people";
	$qry = mysql_query($sel);
	$previous_rows = $next_rows;
	$check_rows = 0;
	while($result = mysql_fetch_array($qry))
{
$previous_rows_people = $previous_rows_people+1;
$i=$i+1;
$j=$j+1;
$check_rows = $check_rows+1; 
$firstname = $result['firstname'];
$lastname  = $result['lastname'];
$login     = $result['login'];
$mid       = $result['m_id'];
$hometown     = $result['hometown'];
$username     = $result['username'];
$fb_id = $result['user']; 


?>
<script>
function update_request<?php echo $i; ?>()

{

document.getElementById('before_request<?php echo a.$i ?>').style.display="none";

document.getElementById('after_request<?php echo b.$j ?>').style.display="block";
}
</script>
				<div class="col-md-12 col-lg-6 bg-white border-bottom">
		<div class="row">

			<div class="col-sm-9">
				<div class="media">
					<?php 
				if($result['profile_pic'] == '') { ?>
					<a class="pull-left margin-none" href="profile.php?user=<?php echo $mid ; ?>">
						<img class="img-clean" src="http://graph.facebook.com/<?php echo $result['user']; ?>/picture?type=large" alt="..." style="height:100px; width:100px; overflow:hidden;">
					</a>
					
					 <?php }
					 else {?>
			<a class="pull-left margin-none" href="profile.php?user=<?php echo $mid; ?>">
						<img class="img-clean" src="imageupload/uploads/<?php echo $result['profile_pic'];?>" alt="..." style="height:100px; width:100px; overflow:hidden;">
					</a>
<?php } ?>					
					<div class="media-body innerAll inner-2x padding-right-none padding-bottom-none">
						 <h4 class="media-heading"><a href="profile.php?user=<?php echo $mid ?>" class="text-inverse no-ajaxify"><?php echo $firstname.' '.$lastname?></a></h4>
						 <p>
						 	<!-- <span class="text-success strong"><i class="fa fa-check"></i> Friend</span> &nbsp;  -->
						 	<i class="fa fa-fw fa-map-marker text-muted"></i><?php echo $hometown  ?></p> 
							<p>
							<i class="fa fa-fw fa-user"></i> <?php echo $username; ?></p>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="innerAll text-right">
					<div class="btn-group-vertical btn-group-sm">
						<div class="btn-group-vertical btn-group-sm">
					
				<?php 	
					 $result_track_request = mysql_fetch_array(mysql_query("select id,facebook,scribzoo from tbl_connect where (requester='{$_SESSION['SESS_MID']}' and accepter='{$result['m_id']}') or (requester='{$result['m_id']}' and accepter='{$_SESSION['SESS_MID']}')"));
		
			if(!$result_track_request['id'])
					{ ?>
						<a href="#" return false; class="btn btn-primary" id="before_request<?php echo a.$i; ?>" onClick="connect_request('<?php echo $mid; ?>','<?php echo $_SESSION['SESS_MID']; ?>'); update_request<?php echo $i; ?>(); "><i class="fa fa-fw  fa-plus"></i>Connect</a>		
						<a href="#" return false; class="btn btn-primary" id="after_request<?php echo b.$j; ?>" style="float:left;display:none">sent</a>								
					<?php } 
					else if($result_track_request['facebook']==0 && $result_track_request['scribzoo']==0 )
					{ ?>
						<a href="#" return false; class="btn btn-primary" style="padding: 5px;">Already sent</a>	
					<?php } 
						else if($result_track_request['facebook']==1 || $result_track_request['scribzoo']==1 ) { ?>
						<a href="#" return false; class="btn btn-primary" style="padding: 5px;"><i class="fa fa-fw  fa-check"></i>Connected</a>
						<?php }  ?>
					</div>
						
					</div>
				</div>
			</div>
		</div>
	
	</div>
	
		<?php } 
		if($check_rows < '10')
{
?>
	<br><br>
<p>No more results.</p>

<?php 
}else{
		?>
		
			<br><br>
		<a href="#" onClick="load_more_people('<?php echo $previous_rows_people; ?>','<?php echo $keyword; ?>'); return false;">Load more</a>
		
		<?php
}
	break;


	case 'load_more_peopleymk':
	$next_rows_people = $previous_rows_people+10;
    $sel = "select firstname,lastname,login,m_id,hometown,user,username,i_score from member order by i_score limit 10,$previous_rows_people";
	$qry = mysql_query($sel);
	$previous_rows = $next_rows;
	$check_rows = 0;
	while($result = mysql_fetch_array($qry))
{
$previous_rows_people = $previous_rows_people+1;
$i=$i+1;
$j=$j+1;
$check_rows = $check_rows+1; 
$firstname = $result['firstname'];
$lastname  = $result['lastname'];
$login     = $result['login'];
$mid       = $result['m_id'];
$i_score     = $result['i_score'];
$username     = $result['username'];
$fb_id = $result['user']; 


?>
<script>
function update_request<?php echo $i; ?>()

{

document.getElementById('before_request<?php echo a.$i ?>').style.display="none";

document.getElementById('after_request<?php echo b.$j ?>').style.display="block";
}
</script>
				<div class="col-md-12 col-lg-6 bg-white border-bottom">
		<div class="row">

			<div class="col-sm-9">
				<div class="media">
					<?php 
				if($result['profile_pic'] == '') { ?>
					<a class="pull-left margin-none" href="profile.php?user=<?php echo $mid ; ?>">
						<img class="img-clean" src="http://graph.facebook.com/<?php echo $result['user']; ?>/picture?type=large" alt="..." style="height:100px; width:100px; overflow:hidden;">
					</a>
					
					 <?php }
					 else {?>
			<a class="pull-left margin-none" href="profile.php?user=<?php echo $mid; ?>">
						<img class="img-clean" src="imageupload/uploads/<?php echo $result['profile_pic'];?>" alt="..." style="height:100px; width:100px; overflow:hidden;">
					</a>
<?php } ?>					
					<div class="media-body innerAll inner-2x padding-right-none padding-bottom-none">
						 <h4 class="media-heading"><a href="profile.php?user=<?php echo $mid ?>" class="text-inverse no-ajaxify"><?php echo $firstname.' '.$lastname?></a></h4>
						  <p>
						 	<!-- <span class="text-success strong"><i class="fa fa-check"></i> Friend</span> &nbsp;  -->
						 	<i class="fa fa-fw fa-star-o text-muted" data-toggle="tooltip" data-original-title="Influential score" data-placement="right"></i>&nbsp;<?php echo $i_score  ?></p> 
							<p>
							<i class="fa fa-fw fa-user"></i> <?php echo $username; ?></p>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="innerAll text-right">
					<div class="btn-group-vertical btn-group-sm">
						<div class="btn-group-vertical btn-group-sm">
					
				<?php 	
					 $result_track_request = mysql_fetch_array(mysql_query("select id,facebook,scribzoo from tbl_connect where (requester='{$_SESSION['SESS_MID']}' and accepter='{$result['m_id']}') or (requester='{$result['m_id']}' and accepter='{$_SESSION['SESS_MID']}')"));
		
			if(!$result_track_request['id'])
					{ ?>
						<a href="#" return false; class="btn btn-primary" id="before_request<?php echo a.$i; ?>" onClick="connect_request('<?php echo $mid; ?>','<?php echo $_SESSION['SESS_MID']; ?>'); update_request<?php echo $i; ?>(); "><i class="fa fa-fw  fa-plus"></i>Connect</a>		
						<a href="#" return false; class="btn btn-primary" id="after_request<?php echo b.$j; ?>" style="float:left;display:none">sent</a>								
					<?php } 
					else if($result_track_request['facebook']==0 && $result_track_request['scribzoo']==0 )
					{ ?>
						<a href="#" return false; class="btn btn-primary" style="padding: 5px;">Already sent</a>	
					<?php } 
						else if($result_track_request['facebook']==1 || $result_track_request['scribzoo']==1 ) { ?>
						<a href="#" return false; class="btn btn-primary" style="padding: 5px;"><i class="fa fa-fw  fa-check"></i>Connected</a>
						<?php }  ?>
					</div>
						
					</div>
				</div>
			</div>
		</div>
	
	</div>
	
		<?php } 
		if($check_rows < '10')
{
?>
	<br><br>
<p>No more results.</p>

<?php 
}else{
		?>
		
			<br><br>
		<a href="#" onClick="load_more_peopleymk('<?php echo $previous_rows_people; ?>'); return false;">Load more</a>
		
		<?php
}
	break;






}





?>



</body>

</html>