<?php
extract($_REQUEST);
include('config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>jQuery Twitter Like Follow &amp; Unfollow</title>

<style>

body{ font-family:Tahoma, Geneva, sans-serif; color:#000; font-size:11px; background-color:#09C; margin:0; padding:0;}

#info{ position:fixed; width:100%; height:20px;-webkit-box-shadow: 0 1px 2px #666;box-shadow: 0 1px 2px #666; top:0; padding:10px; background-color:#F60; color:#FFF; font-size:14px;}

.lessoncup{width:320px; background-color:rgba(255,255,255,0.5); height:250px;font-family:Tahoma, Geneva, sans-serif;font-size:11px;margin:0 auto; padding:10px;margin-top:100px; border-radius:5px;}

.lessoncup ul{list-style:none; margin:0;border-radius:5px; padding:10px; position:absolute; width:300px; background-color:#f9f9f9;}

.lessoncup ul li{padding:8px 20px 10px 5px;height:50px;color:#333;}

.img{width:50px; height:50px; margin:0 5px 5px 0; float:left;}

.remove{position:absolute; right:5px; background-image:url(icons/x.png); width:11px; height:11px; background-repeat:no-repeat;}

.remove:hover{cursor:pointer;background-image:url(icons/x1.png); width:11px; height:11px; background-repeat:no-repeat;}

.follow{ background-image:linear-gradient(#fff,#ddd);margin-top:5px;padding:2px 9px 2px 9px; border-radius:4px; border:solid #cccccc 1px; background-color:#ebebeb;color:#000; font-weight:bold; cursor:pointer;}

.following{background-image:linear-gradient(#2fb9ed,#059cd4);background-color:#009999;margin-top:5px;padding:2px 9px 2px 9px; border-radius:4px; border:solid #057ed0 1px; color:#fff; font-weight:bold; cursor:pointer;}

.unfollow{background-image:linear-gradient(#eb5c58,#c73e38);background-color:#009999;margin-top:5px;padding:2px 9px 2px 9px; border-radius:4px; border:solid #a93730 1px; color:#fff; font-weight:bold; cursor:pointer;}

.ref{color:#00a5c0; cursor:pointer;}
</style>


<script type="text/javascript" src="jquery-1.10.2.min.js"></script>

<script>


$(document).ready(function(){

	
	$('body').on("click",".ref",function(){
		
		$('.lessoncup ul').load('ads.php');
		
	});
	
	
	$('body').on("mouseover",".following",function(){
		
		$(this).removeClass('follow').addClass('unfollow').text('Unfollow');
		
	});
	
	$('body').on("mouseout",".following",function(){
		
		$(this).removeClass('unfollow').text('Following');
		
	});

	
	$('body').on("click",".follow",function(){
		
		var element = $(this);
		var follower = element.attr("id");
		
		$(this).remove('img').addClass('following').text('Following');
		
		var datasend = "followid="+follower;

		$.ajax({
			
			type:"POST",
			url:"getad.php",
			data:datasend,
			cache:false,
			success:function(msg){
				
				$('#ad'+follower).delay(2000).fadeOut('slow',function(){
					
					$('#ad'+follower).replaceWith(msg);
					
				});
				
			}
			
			
		});
		
	});
	
	
	$('body').on("click",".remove",function(){
		
		var element = $(this);
		var id = element.attr("id");
	
		$.ajax({
			
			type:"POST",
			url:"getad.php",
			cache:false,
			success:function(msg){
				
				$('#ad'+id).fadeOut('slow',function(){
					
					$('#ad'+id).replaceWith(msg);
					
				});
				
			}
			
			
		});

	});
					
});


</script>

</head>

<body>

<div id="info">Lessoncup Programming Blog - for more lessons<strong> visit @ &nbsp;
<a href="http://www.lessoncup.com" style="text-transform:lowercase; color:#FF0; text-decoration:none;" target="_blank">www.lessoncup.com</a></strong></div>


<div class="lessoncup">

<ul><?php include('ads.php');?></ul>

</div>

</body>
</html>