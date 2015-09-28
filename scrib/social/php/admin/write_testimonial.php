<?php ob_start();
session_start();
$visitor_id=$_SESSION['SESS_MID'];

?>

<head>
<?php include('header.php'); 
include('config.php')?>
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script>
		google.load("jquery", "1.5");
	</script>
	<script type="text/javascript" src="jquery.multipage.js"></script>
	

	<script type="text/javascript">
		$(window).ready(function() {
                        $('#multipage').multipage({transitionFunction:transition,stateFunction: textpages});
			
		});
		
		function generateTabs(tabs) { 
		
			html = '';
			for (var i in tabs) { 
				tab = tabs[i];
				html = html + '<li class="multipage_tab"><a href="#" onclick="return $(\'#multipage\').gotopage(' + tab.number + ');">' + tab.title + '</a></li>';				
			}
			$('<ul class="multipage_tabs" id="multipage_tabs">'+html+'<div class="clearer"></div></ul>').insertBefore('#multipage');
		}
		function setActiveTab(selector,page) { 
			$('#multipage_tabs li').each(function(index){ 
				if ((index+1)==page) { 
					$(this).addClass('active');
				} else {
					$(this).removeClass('active');
				}
			});			
		}
		
		function transition(from,to) {
			$(from).fadeOut('fast',function(){$(to).fadeIn('fast');});
		
		}
		function textpages(obj,page,pages) { 
			$(obj).html(page + ' of ' + pages);
		}

	</script>
	<style type='text/css'>
		body { font-family:helvetica;}

		
		p.input label { display:block; }
		
		
		p.input input { width: 200px; }
		.clearer { clear:both; width:100%; height:0px; } 
	</style>
</head>

<body>


	<div style="width:500px; margin:200px; hieght:300px; padding:10px; border:20px solid #F0F0F0;">
	<form id="multipage" action= "testimonial_exec.php" method="POST" enctype="multipart/form-data" >
		<fieldset id="page_one">
			<legend></legend>
			<p class="input">
				<label for="title">Title</label>
				<input name="title" id="title" value="" />
			</p>	
			<p class="input">
				<label for="name">Writing for:</label>
				<input name="name" id="name" value="" />
			</p>	
		</fieldset>
		<fieldset id="page_two">
			<legend>Upload a photo</legend>
			<label for="file">Filename:</label>
            <input type="file" name="file" id="file"><br>

				<!--<label for="name">Name</label>-->
			<!--	<input name="name" id="name" value="" />
			</p>	

			<p class="input">
				<label for="loc">Location</label>
				<input name="loc" id="loc" value="" />
			</p>		
			
			<p class="input">
				<label for="tags">
				Tags</label>
				<input name="tags" id="tags" value="foo,bar,baz,booda" />
			</p>-->
		</fieldset>
		<fieldset id="page_three">
			<legend>Description for testimonial</legend>
			<p class="input">
				<label for="description">description</label>
				<textarea name="description">Enter text here...</textarea>
			</p>	
			<p class="input">
				
				<input type="hidden" id="select2_5" name ="tag"style="width: 100%;" value="brown,red,green" />
			</p>		
		</fieldset>
		<input type="submit" value="Create User" />
	</form>
	</div>
	


</body>

