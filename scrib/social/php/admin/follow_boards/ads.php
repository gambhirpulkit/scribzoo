<li style=" background-color:#f9f9f9; color:#666; height:auto; padding:5px; font-size:14px;">Boards to follow <a class="ref">Refresh</a></li>
<?php
include('config.php');
extract($_REQUEST);
$news=mysql_query('select * from board order by rand() limit 3');
while($full=mysql_fetch_array($news)){
?>

<li id="ad<?php echo $full['id'] ;?>">
<div id="<?php echo $full['id'] ;?>" class="remove"></div>



<div><b><?php echo $full['name']?></b></div><br/>

<a id="<?php echo $full['id']?>" class="follow"><img src="t.jpg" width="16" height="14" border="0" align="absmiddle" style="margin-right:3px;" />Follow</a>

</li>


<?php }?>