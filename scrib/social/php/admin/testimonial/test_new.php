<?php ob_start();
?>
<?php include('../../../../../config.php')?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
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
	</head>
	<body>
		<div class="container">

			<div class="fs-form-wrap" id="fs-form-wrap">
				<div class="fs-title">
					<h1><center>Write a Testimonial</center></h1>
					
				</div>
				<form id="myform" class="fs-form fs-form-full" action="testimonial_exec.php" method="post"
enctype="multipart/form-data" autocomplete="off">
					<ol class="fs-fields">
						<li>
							<label class="fs-field-label fs-anim-upper" for="title">Title your Testimonial</label>
							<input class="fs-anim-lower" id="title" name="title" type="text" placeholder="Title" required/>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="name">Writing this Testimonial for:</label>
							<input class="fs-anim-lower" id="name" name="name" type="text" placeholder="Name" required/>
						</li>
					<!--	<li data-input-trigger>
							<label class="fs-field-label fs-anim-upper" for="q3" data-info="This will help us know what kind of service you need">Type Of Testimonial</label>
							<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
								<span><input id="q3b" name="q3" type="radio" value="conversion"/><label for="q3b" class="radio-conversion">Text</label></span>
								<span><input id="q3c" name="q3" type="radio" value="social"/><label for="q3c" class="radio-social">Audio</label></span>
								<span><input id="q3a" name="q3" type="radio" value="mobile"/><label for="q3a" class="radio-mobile">Video</label></span>
							</div>
						</li> -->			
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="description">Description for your Testimonial</label>
							<textarea class="fs-anim-lower" id="description" name="description" placeholder="Describe here"></textarea>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="file">Upload a Image</label>
							<input class="fs-anim-lower" name="file" type="file" id="file" required/>
						</li>

						<li data-input-trigger>
							<label class="fs-field-label fs-anim-upper" data-info="We'll make sure to use it all over">Tag it to a board</label>
							<select multiple class="cs-select cs-skin-boxes  fs-anim-lower">
								<option value="" disabled selected>Pick a Board</option>
								<option value="FRIENDSHIP" data-class="color-588c75">Friendship</option>
								<option value="#b0c47f" data-class="color-b0c47f">Politics</option>
								<option value="#f3e395" data-class="color-f3e395">college</option>
								<option value="#f3ae73" data-class="color-f3ae73">jfjff</option>
								<option value="#da645a" data-class="color-da645a">#da645a</option>
								<option value="#79a38f" data-class="color-79a38f">#79a38f</option>
								<option value="#c1d099" data-class="color-c1d099">#c1d099</option>
								<option value="#f5eaaa" data-class="color-f5eaaa">#f5eaaa</option>
								<option value="#f5be8f" data-class="color-f5be8f">#f5be8f</option>
								<option value="#e1837b" data-class="color-e1837b">#e1837b</option>
								<option value="#9bbaab" data-class="color-9bbaab">#9bbaab</option>
								<option value="#d1dcb2" data-class="color-d1dcb2">#d1dcb2</option>
								<option value="#f9eec0" data-class="color-f9eec0">#f9eec0</option>
								<option value="#f7cda9" data-class="color-f7cda9">#f7cda9</option>
								<option value="#e8a19b" data-class="color-e8a19b">#e8a19b</option>
								<option value="#bdd1c8" data-class="color-bdd1c8">#bdd1c8</option>
								<option value="#e1e7cd" data-class="color-e1e7cd">#e1e7cd</option>
								<option value="#faf4d4" data-class="color-faf4d4">#faf4d4</option>
								<option value="#fbdfc9" data-class="color-fbdfc9">#fbdfc9</option>
								<option value="#f1c1bd" data-class="color-f1c1bd">#f1c1bd</option>
							</select>
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