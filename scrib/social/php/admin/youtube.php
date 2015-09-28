
<!DOCTYPE html>

<html>
<head>
<style>
.dialogbox{width:100px; height:100px; background:grey;display:none}
</style>

<script src="latest jquery library"></script>

    <script>

    $(document).ready(function(){
    $("#click").click(function(){

    $(".dialogbox").toggle();

    });

    });
   </script>
</head>
  <body>
<a id="click">click here</a>
    <!-- 1. The 'widget' div element will contain the upload widget.

         The 'player' div element will contain the player IFrame. -->

    <div class= "dialogbox" id="widget"></div>

    <div id="player"></div>

  </body>

    <script>

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

          width: 500,

          events: {

            'onUploadSuccess': onUploadSuccess,

            'onProcessingComplete': onProcessingComplete

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

    </script>



</html>