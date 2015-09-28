<div class="widget">

	<h5 class="innerAll margin-none border-bottom bg-gray">Boards I Follow</h5>

	<div class="widget-body padding-none">
<?php $qry_user = mysql_query("select board from board_follow where follower = '{$_SESSION['SESS_MID']}' limit 5"); $result_board = mysql_fetch_array($qry_user);
						while($result_board)
						{
						?>
				<div class="media border-bottom innerAll margin-none">

		

			<div class="media-body">

				

				<h5 class="margin-none"><a href="board.php?board=<?php echo $result_board['board']; ?>" class="text-inverse"><?php echo substr($result_board['board'],0,18); ?></a></h5>

				
<small></small>
			</div>

		</div>

			<?php } ?>	

			</div>

</div>