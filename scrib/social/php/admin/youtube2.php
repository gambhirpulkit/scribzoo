<?php include('config.php');?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Scribzoo | video testimonial</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <link type="text/css"
		href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" rel="stylesheet" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="jquery.youtubepopup.js"></script>
    <script type="text/javascript">
		$(function () {
			$("a.youtube").YouTubePopup({ autoplay: 0 });
		});
    </script>
</head>
<body>

<?php
$qry_name= mysql_query("select home_page from visits where id='2'");

		$result_name = mysql_fetch_array($qry_name);
		?>
	<a class="youtube" href="http://www.youtube.com/watch?v=<?php echo $result_name['home_page']; ?>" title="jQuery YouTube Popup Player Plugin TEST">Test Me</a>
</body>
</html>