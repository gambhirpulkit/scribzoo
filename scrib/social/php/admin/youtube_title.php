<?php
ob_start();
session_start();
$firstname =$_SESSION['SESS_FIRST_NAME'];
$semail=$_SESSION['SESS_EMAIL'];
 $verb=' wrote a video testimonial';

?>
<!DOCTYPE html>
<html>
<script>
var gv;
</script>
<?php include('config.php');
?>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>scribzoo | video testimonial</title>
  
  <script type='text/javascript' src='jquery-1.9.1.js'></script>
  
  
  

    
 
  


<script type='text/javascript'>


function ajax(url,uqry,div)



{ 



	var xmlhttp = false;



	



	if (window.XMLHttpRequest)



	{



		xmlhttp=new XMLHttpRequest();



	}



	else



	{



        xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");



	}



	xmlhttp.onreadystatechange=function()



	{



		if (xmlhttp.readyState==4 && xmlhttp.status==200)



		{ //alert(xmlhttp.responseText);



			document.getElementById(div).innerHTML = xmlhttp.responseText;



		}



	}



	



	xmlhttp.open("POST",url,true);



	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");



	xmlhttp.send(uqry);



}

function myfunction() {
    setCookie("username", $("#title").val(), 365);
	gv= $("#title").val();

    location.reload();
	
}

// 2. Asynchronously load the Upload Widget and Player API code.
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. Define global variables for the widget and the player.
//    The function loads the widget after the JavaScript code
//    has downloaded and defines event handlers for callback
//    notifications related to the widget.
var widget;
var player;

function onYouTubeIframeAPIReady() {
    widget = new YT.UploadWidget('widget', {
        width: 400,
        events: {
            'onUploadSuccess': onUploadSuccess,
                'onProcessingComplete': onProcessingComplete,
                'onApiReady': onApiReady
        }
    });
}

// 4. This function is called when a video has been successfully uploaded.
function onUploadSuccess(event) {
    alert('Video ID ' + event.data.videoId + ' was uploaded and is currently being processed.');

	
	var url  = 'ajax.php';

var in1 = event.data.videoId;

	var uqry = 'mode=insertvideoid&videoid='+in1;







	var div  = 'datadiv';



        ajax(url,uqry,div);



	
	
	}

// 5. This function is called when a video has been successfully
//    processed.
function onProcessingComplete(event) {
    player = new YT.Player('player', {
        height: 390,
        width: 640,
        videoId: event.data.videoId,
        events: {}
    });
}

function onApiReady(event) {
    console.log("onApiReady is fired");
    widget.setVideoTitle(getCookie("username"));
	widget.setVideoDescription('Testing video description');
        widget.setVideoKeywords("testing", "upload widget", "youtube");  
        widget.setVideoPrivacy("unlisted");

	
	
}

function setCookie(c_name, value, exdays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
    document.cookie = c_name + "=" + c_value;
}

function getCookie(c_name) {
    var i, x, y, ARRcookies = document.cookie.split(";");
    for (i = 0; i < ARRcookies.length; i++) {
        x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
        y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
        x = x.replace(/^\s+|\s+$/g, "");
        if (x == c_name) {
            return unescape(y);
        }
    }
}
 

</script>


</head>
<body>

Title:<input id="title" type="text" value="">
<button onclick="myfunction()">Submit</button>
<br>Click submit to set the title. Then start recording your video.
<br>
<div id="widget"></div>
</body>


</html>

