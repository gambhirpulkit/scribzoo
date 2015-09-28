<div class="widget">
	<h5 class="innerAll margin-none border-bottom bg-gray">Related Testimonials</h5>
	<div class="widget-body padding-none">
				<div class="media border-bottom innerAll margin-none">
				
				<?php 
				
				$qry_trending = mysql_query("select t1.m_id, t2.title, t2.views, t2.pid, t2.imgname, t2.s_name from member t1, posts t2 where t1.login = t2.s_email and pid != '$pid' and t2.hide = '0' and deactive_status != '1' order by rand() desc limit 12"); 

						while($result_trending = mysql_fetch_array($qry_trending))

						{
                               if($result_trending['s_name'] == ''){
							   
							   continue;
							   
							   }else{
						?><br><?php if($result_trending['imgname'] != ''){ ?>
		<a href="testimonial.php?id=<?php echo $result_trending['pid']; ?>"><img src="imageupload/uploads_testimonial/<?php echo $result_trending['imgname']; ?>" height="35" width="35" class="pull-left media-object no-ajaxify"/></a>			<?php }else{ ?>			<a href="testimonial.php?id=<?php echo $result_trending['pid']; ?>"><img src="imageupload/uploads_testimonial/sample_testimonial_image.jpg" height="35" width="35"class="pull-left media-object no-ajaxify"/></a>							<?php } ?>
			<div class="media-body">
				<a href="#" class="pull-right text-muted innerT half">
					<i class="fa fa-eye"></i> <?php echo $result_trending['views']; ?><br>
				</a>
				<h5 class="margin-none">&nbsp;<a href="testimonial.php?id=<?php echo $result_trending['pid']; ?>" class="text-inverse no-ajaxify"><?php echo substr($result_trending['title'],0,25); ?></a></h5>
				<small>&nbsp;written by&nbsp;<a href="profile.php?user=<?php echo $result_trending['m_id']; ?>" class=" no-ajaxify"><?php echo $result_trending['s_name']  ?></a></small> 
			</div>
			
			<?php }} ?>	
		</div>
				
			
				
				
			</div>
</div>

			<!-- Widget -->