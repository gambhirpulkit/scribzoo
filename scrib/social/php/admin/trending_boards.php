<div class="widget">

	<h5 class="innerAll margin-none border-bottom bg-gray">Trends</h5>

	<div class="widget-body padding-none">
<?php $qry_trending = mysql_query("select h_name from tbl_hashtags order by number desc limit 6"); 
						while($result_trending = mysql_fetch_array($qry_trending))
						{
						?>
				<div class="media border-bottom innerAll margin-none">

		

			<div class="media-body">

				

				<h4 class="margin-none"><a href="<?php echo $path; ?>search.php?keyword=<?php echo substr($result_trending['h_name'],1,30); ?>&src=hashtag" class="no-ajaxify"><?php echo substr($result_trending['h_name'],0,30); ?></a></h4>

				
<small></small>
			</div>

		</div>

			<?php } ?>	

				

				

				

			</div>

</div>