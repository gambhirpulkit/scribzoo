

<div class="widget">
	<h5 class="innerAll margin-none border-bottom bg-gray">	Follow boards to get started</h5>
	<div class="widget-body padding-none">
			
				<div class="media border-bottom innerAll margin-none">
			<?php $qry_suggestion = mysql_query("select * from board order by rand() limit 7 ");
									
$i=1;
$j=1;
			while($result_suggestion=mysql_fetch_array($qry_suggestion)) 
			{


$i=$i*2;
$j=$j*3;
?>
<script>
function accept_request<?php echo $i ?>()
{


document.getElementById('<?php echo $i ?>').style.display="none";
document.getElementById('<?php echo $j ?>').style.display="block";


}

</script>

			<div style=" margin-left:auto; margin-right:auto" class="media-body">
				<a href="#" class="pull-right text-muted innerT half">
				
				</a>
				
				<h5 class="margin-none">&nbsp;<a href="#" class="text-inverse"><?php echo substr($result_suggestion['name'],0,18); ?></a></h5>
				
				<small>
				<!-- follow up code STARTS here--> 
			 
		  <?php  

						 if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != '')) {
//getting session email from session
 ?>  
<a href="#" id="<?php echo $i ?>" class="btn btn-primary"style="float:right;" onclick =" accept_request<?php echo $i; ?>(); follow_request('<?php echo $result_suggestion['name']; ?>','<?php echo $_SESSION['SESS_MID']; ?>'); " ><i class="fa fa-fw fa-thumbs-up"></i>follow</a>
					<a href="#"  class="btn btn-primary" type="hidden" id="<?php echo $j ?>" style="display:none; float:right;">followed</a>
						 
   
		<?php  }?>   
		   
		  
		  <!-- follow ends here-->		  
				
				</small> 
			</div>
			
			<?php }?>	
		</div>
		
			
				
			</div>

			
			</div>

			<center>
		<a href="main_timeline.php?register=first_time" class="btn btn-info btn-sm" >

						<i class="icon-turn-right" ></i>Visit My Timeline 

					</a>		
			</center>
			