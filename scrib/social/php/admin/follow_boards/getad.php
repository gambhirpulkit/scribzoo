<?php
session_start();
include('config.php');
extract($_REQUEST);

mysql_query("update board_follow set follower= '{$_SESSION['SESS_MID']}' and board= 'hello'");


$boards=mysql_query('select * from board order by rand() limit 1');
while($full=mysql_fetch_array($boards)){
	
	
?>
<li id="ad<?php echo $full['id']?>">
<div id="<?php echo $full['id']?>" class="remove"></div>



<div><b><?php echo $full['name']?></b></div><br/>

<a id="<?php echo $full['id']?>" class="follow"><img src="t.jpg" width="16" height="14" border="0" align="absmiddle" style="margin-right:3px;" />Follow</a>

</li>

<?php }?>