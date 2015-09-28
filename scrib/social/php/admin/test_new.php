<?php ob_start();
?>
<?php include('config.php')?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>

	
	<script>
function myFunction() {
    var myWindow = window.open("https://www.facebook.com/", "", "width=800, height=800");
}
</script>
<script type="text/javascript">
   
</script>

		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Scribzoo | Write a Testimonial</title>
		<meta name="description" content="Fullscreen Form Interface: A distraction-free form concept with fancy animations" />
		<meta name="keywords" content="fullscreen form, css animations, distraction-free, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-skin-boxes.css" />
		<script src="js/modernizr.custom.js"></script>
		<script type="text/javascript" src="js/textext.plugin.tags.js"></script>
	</head>
	<body>
		<div class="container">
<textarea id="textarea" rows="1"></textarea>


			<div class="fs-form-wrap" id="fs-form-wrap">
				<div class="fs-title">
					<h1><center>Write a Testimonial</center></h1>
					
				</div>
				<form id="myform" class="fs-form fs-form-full" action="testimonial_exec.php" method="post"
enctype="multipart/form-data" autocomplete="off">
					<ol class="fs-fields">
					<li data-input-trigger>
							<label class="fs-field-label fs-anim-upper" data-info="We'll make sure to use it all over">Tag it to a board</label>
							<select class="cs-select cs-skin-boxes  fs-anim-lower" name="board">
								<option value="" disabled selected>Pick a Board</option>
							<textarea id="textarea" class="example" rows="1"></textarea>
							</select>
						</li>
					
						<li>
							<label class="fs-field-label fs-anim-upper" for="title">Title your Testimonial</label>
							<input class="fs-anim-lower" id="title" name="title" type="text" placeholder="Title" required/>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="name">Writing this Testimonial for:</label>
							<input class="fs-anim-lower" id="name" name="name" type="text" placeholder="Name" required/>
						</li>
						<li data-input-trigger>
							<label class="fs-field-label fs-anim-upper" for="q3" data-info="This will help us know what kind of service you need">Type Of Testimonial</label>
							<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
								<span><input id="q3b" onclick="myFunction();" name="q3" type="radio" value="conversion"/><label for="q3b" class="radio-conversion">Text</label></span>
								<span><input id="q3c" name="q3" type="radio" value="social"/><label for="q3c" class="radio-social">Audio</label></span>
								<span><input id="q3a" name="q3" type="radio" value="mobile"/><label for="q3a" class="radio-mobile">Video</label></span>
							</div>
						</li> 		
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="description">Description for your Testimonial</label>
							<textarea class="fs-anim-lower" id="description" name="description" placeholder="Describe here"></textarea>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="file">Upload a Image</label>
							<input class="fs-anim-lower" name="file" type="file" id="file" required/>
						</li>

						
			
					</ol><!-- /fs-fields -->
					<button class="fs-submit" type="submit">Shoot</button>
				</form><!-- /fs-form -->
			</div><!-- /fs-form-wrap -->

			
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/selectFx.js"></script>
		<script src="js/fullscreenForm.js"></script>
		<script>
			(function() {
				var formWrap = document.getElementById( 'fs-form-wrap' );

				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx( el, {
						stickyPlaceholder: false,
						onChange: function(val){
							document.querySelector('span.cs-placeholder').style.backgroundColor = val;
						}
					});
				} );

				new FForm( formWrap, {
					onReview : function() {
						classie.add( document.body, 'overview' ); // for demo purposes only
					}
				} );
			})();
		</script>
	</body>
</html>