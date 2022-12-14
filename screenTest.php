<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">
	<meta name="Author" content="Bruno Gardlo, gardlo@ftw.at">

	<title>Screen Quality Test</title>
	<meta name="description" content="This application is a very simple screen quality test, which enables you to compare your monitor quality with others.  Simply count the visible number and answer the questions.">

	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
		<!--[if lt IE 7]>
				<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->
		<div class="container-narrow">

			<div class="header">
<!--
				<ul class="nav nav-pills pull-right">
					<li class="dropdown active">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							Test <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Screen</a></li>
							<li><a href="#">Player</a></li>
						</ul>
					</li>
				</ul>
-->
				<a href="#"><h3 class="text-muted">Screen Quality Test</h3></a>
			</div>

			<!-- Main Content -->
			<form class="form-horizontal" role="form" action="screenTestResults.php" method="post" id="frm-screenTestForm">

				<blockquote>
<!--					<p> <strong>!!!Please press the F11 key or turn on full screen mode!!! </strong> </p>-->
                    <p> <strong>!!!Please turn on immersive full screen mode!!! </strong> </p>
                    <p> <strong>!!!(Windows: press the F11 key; macOS: press the ????F, then ??????F key)!!! </strong> </p>
				</blockquote>
				<blockquote>
					<p>Please select the minimum and maximum<strong> visible number</strong> in the white box below.</p>
					<small><span class="label label-danger">Attention:</span> It's <cite title="zero or more of them!">possible that no digits are visible.	</cite>In such a case please select "none".</small>
				</blockquote>

				<div id="smallestVisible">

					<label>The smallest visible number:</label>

					<div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons">
						<label class="btn btn-default" for="frmscreenTestForm-smallestNumber-0">
							<input type="radio" name="smallestNumber" id="frmscreenTestForm-smallestNumber-0" required="required" value="9" />  9
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-smallestNumber-1">
							<input type="radio" name="smallestNumber" id="frmscreenTestForm-smallestNumber-1" required="required" value="8" />  8
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-smallestNumber-2">
							<input type="radio" name="smallestNumber" id="frmscreenTestForm-smallestNumber-2" required="required" value="7" />  7
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-smallestNumber-3">
							<input type="radio" name="smallestNumber" id="frmscreenTestForm-smallestNumber-3" required="required" value="6" />  6
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-smallestNumber-4">
							<input type="radio" name="smallestNumber" id="frmscreenTestForm-smallestNumber-4" required="required" value="5" />  5
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-smallestNumber-5">
							<input type="radio" name="smallestNumber" id="frmscreenTestForm-smallestNumber-5" required="required" value="4" />  4
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-smallestNumber-6">
							<input type="radio" name="smallestNumber" id="frmscreenTestForm-smallestNumber-6" required="required" value="3" />  3
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-smallestNumber-7">
							<input type="radio" name="smallestNumber" id="frmscreenTestForm-smallestNumber-7" required="required" value="2" />  2
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-smallestNumber-8">
							<input type="radio" name="smallestNumber" id="frmscreenTestForm-smallestNumber-8" required="required" value="1" />  1
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-smallestNumber-9">
							<input type="radio" name="smallestNumber" id="frmscreenTestForm-smallestNumber-9" required="required" value="0" />  0
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-smallestNumber-10">
							<input type="radio" name="smallestNumber" id="frmscreenTestForm-smallestNumber-10" required="required" value="none" />  none
						</label>
					</div>
				</div>

				<div id="highestVisible">

					<label>The biggest visible number</label>

					<div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons">
						<label class="btn btn-default" for="frmscreenTestForm-highestNumber-0">
							<input type="radio" name="highestNumber" id="frmscreenTestForm-highestNumber-0" required="required" value="0" />  0
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-highestNumber-1">
							<input type="radio" name="highestNumber" id="frmscreenTestForm-highestNumber-1" required="required" value="1" />  1
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-highestNumber-2">
							<input type="radio" name="highestNumber" id="frmscreenTestForm-highestNumber-2" required="required" value="2" />  2
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-highestNumber-3">
							<input type="radio" name="highestNumber" id="frmscreenTestForm-highestNumber-3" required="required" value="3" />  3
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-highestNumber-4">
							<input type="radio" name="highestNumber" id="frmscreenTestForm-highestNumber-4" required="required" value="4" />  4
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-highestNumber-5">
							<input type="radio" name="highestNumber" id="frmscreenTestForm-highestNumber-5" required="required" value="5" />  5
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-highestNumber-6">
							<input type="radio" name="highestNumber" id="frmscreenTestForm-highestNumber-6" required="required" value="6" />  6
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-highestNumber-7">
							<input type="radio" name="highestNumber" id="frmscreenTestForm-highestNumber-7" required="required" value="7" />  7
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-highestNumber-8">
							<input type="radio" name="highestNumber" id="frmscreenTestForm-highestNumber-8" required="required" value="8" />  8
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-highestNumber-9">
							<input type="radio" name="highestNumber" id="frmscreenTestForm-highestNumber-9" required="required" value="9" />  9
						</label>
						<label class="btn btn-default" for="frmscreenTestForm-highestNumber-10">
							<input type="radio" name="highestNumber" id="frmscreenTestForm-highestNumber-10" required="required" value="none" />  none
						</label>
					</div>
				</div>

				<div class="contrast-wp" id="numbers">
						<div class="con11">1</div>
						<div class="con12">2</div>
						<div class="con13">3</div>
						<div class="con14">4</div>
						<div class="con15">5</div>
						<div class="con16">6</div>
						<div class="con17">7</div>
						<div class="con18">8</div>
				</div>

				<blockquote>
					<p>Please click on <strong>all visible stars</strong> in the picture below.</p>
					<small><span class="label label-danger">Attention:</span> There could be <cite title="zero or more of them!">zero or more stars!</cite></small>
				</blockquote>

			    <!-- Contrast wrapper form with black stars -->
			    <div class="contrast-wp contrastBlack-wp" id="contrastBlack-wp">
			        <input type="checkbox" name="blackStars[]" id="frmscreenTestForm-blackStars-0" value="1" />
			        <label for="frmscreenTestForm-blackStars-0">
			        	<span class="con21 stars clickable">
			        		<div aria-hidden="true" data-icon="&#xe000;"></div>
			        	</span>
			        </label>
			        <input type="checkbox" name="blackStars[]" id="frmscreenTestForm-blackStars-1" value="2" />
			        <label for="frmscreenTestForm-blackStars-1">
			        	<span class="con22 stars clickable">
			        		<div aria-hidden="true" data-icon="&#xe000;"></div>
			        	</span>
			        </label>
			        <input type="checkbox" name="blackStars[]" id="frmscreenTestForm-blackStars-2" value="3" />
			        <label for="frmscreenTestForm-blackStars-2">
			        	<span class="con23 stars clickable">
			        		<div aria-hidden="true" data-icon="&#xe000;"></div>
			        	</span>
			        </label>
			        <input type="checkbox" name="blackStars[]" id="frmscreenTestForm-blackStars-3" value="4" />
			        <label for="frmscreenTestForm-blackStars-3">
			        	<span class="con24 stars clickable">
			        		<div aria-hidden="true" data-icon="&#xe000;"></div>
			        	</span>
			        </label>
			        <input type="checkbox" name="blackStars[]" id="frmscreenTestForm-blackStars-4" value="5" />
			        <label for="frmscreenTestForm-blackStars-4">
			        	<span class="con25 stars clickable">
			        		<div aria-hidden="true" data-icon="&#xe000;"></div>
			        	</span>
			        </label>
			        <input type="checkbox" name="blackStars[]" id="frmscreenTestForm-blackStars-5" value="6" />
			        <label for="frmscreenTestForm-blackStars-5">
			        	<span class="con26 stars clickable">
			        		<div aria-hidden="true" data-icon="&#xe000;"></div>
			        	</span>
			        </label>
			        <input type="checkbox" name="blackStars[]" id="frmscreenTestForm-blackStars-6" value="7" />
			        <label for="frmscreenTestForm-blackStars-6">
			        	<span class="con27 stars clickable">
			        		<div aria-hidden="true" data-icon="&#xe000;"></div>
			        	</span>
			        </label>
			        <input type="checkbox" name="blackStars[]" id="frmscreenTestForm-blackStars-7" value="8" />
			        <label for="frmscreenTestForm-blackStars-7">
			        	<span class="con28 stars clickable">
			        		<div aria-hidden="true" data-icon="&#xe000;"></div>
			        	</span>
			        </label>
			    </div>

				<!-- Hidden inputs for aplication layer monitoring -->

			    <div class="hidden"><input type="hidden" name="screen" id="frmscreenTestForm-screen" value="" /></div>
			    <div class="hidden"><input type="hidden" name="focusTime" id="frmscreenTestForm-focusTime" value="" /></div>
			    <div class="hidden"><input type="hidden" name="clickNo" id="frmscreenTestForm-clickNo" value="" /></div>
			    <div class="hidden"><input type="hidden" name="clickCounter" id="frmscreenTestForm-clickCounter" value="" /></div>
			    <div class="hidden"><input type="hidden" name="browser" id="frmscreenTestForm-browser" value="" /></div>

				<div class="btn-continue">
					<input class="btn btn-lg btn-success" type="submit" name="submit_" id="frmscreenTestForm-submit" value="Click to continue" />
				</div>

			</form>
			<!-- /.Main Content -->

			<div class="footer">
				<p class="pull-right"><small>&copy; FTW 2013</small></p>
			</div>

		</div>
		<!-- /.container-narrow -->

		<script src="js/vendor/jquery-1.10.1.min.js"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/main.min.js"></script>

</body>
</html>
