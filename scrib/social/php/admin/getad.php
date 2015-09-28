<?php
$copy_date = "Copyright #1999";
$copy_date = preg_replace('/#([\\d\\w]+)/', '<a href="http://twitter.com/search?q=%23$1&src=hash">$0</a>', $copy_date);
print $copy_date;
?>