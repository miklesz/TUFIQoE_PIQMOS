<html lang="">
	<head>
		  <meta charset="iso=8859-2">
		  <title>TUFIQoEMOS psycho-physical test</title>
		  <link rel="stylesheet" href="css/style_test.css" type="text/css"/>
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script type="text/javascript" >
		function checkMos() {	
			if(atLeastOneRadio()) {
				document.getElementById("nextButton").disabled = false;
			}
		}
		
		function atLeastOneRadio() {
			return ($('input[type=radio]:checked').size() > 0);
		}	
		
		
		// 	jQuery(document).ready(function($) {
        //
		// if (window.history && window.history.pushState) {
        //
		// 	window.history.pushState('forward', null, './#forward');
        //
		// 	$(window).on('popstate', function() {
		// 		window.location.href = "testCut.php";
		// 	});
        //
		// }
		// });
		

	</script>

<body onload="checkMos()">
	<div class="answer">
		<?php 
		session_start();
        $mes = 'Assess quality of material displayed';
        $button = 'Next';
        $pre_time = microtime(true);
        $pvs_duration = microtime(true) - $_SESSION['pvs_time']
        ?>
		
<!--		if(isset($_SESSION['lan'])){-->
<!--			$lan = $_SESSION['lan'];-->
<!--			if($lan == 'pl'){-->
<!--				$mes = 'Oceń jakość przedstawionego materiału';-->
<!--				$button = 'Dalej';-->
<!--			}-->
<!--			else {-->
<!--				$mes = 'Assess quality of material displayed';-->
<!--				$button = 'Next';-->
<!--			}		-->
<!--		}-->
<!--		else {-->
<!--			header( "Location: ../TUFIQoEMOS/index.php" );-->
<!--		}-->
<!--			-->
<!--		?>-->
		<h3><?php echo $mes; ?></h3>
<!--        --><?php
//        echo $_SESSION['pre_time'];
//        ?>
		<!--p style=" margin-top: 5px; margin-bottom: 2px; ">Rating</p-->
		<form method="post" action="next_page.php" style = "margin-bottom: 0;">
            <input id="pageNext" type="hidden" name="page" value="mos">
            <input id="pre_time" type="hidden" name="pre_time" value="<?php echo $pre_time; ?>">
            <input id="pvs_duration" type="hidden" name="pvs_duration" value="<?php echo $pvs_duration; ?>">
            <label>
                <input type="radio" name="mos" onClick="checkMos();" value="1"> bad<br><br>
            </label>
            <label>
                <input type="radio" name="mos" onClick="checkMos();" value="2"> poor<br><br>
            </label>
            <label>
                <input type="radio" name="mos" onClick="checkMos();" value="3"> fair<br><br>
            </label>
            <label>
                <input type="radio" name="mos" onClick="checkMos();" value="4"> good<br><br>
            </label>
            <label>
                <input type="radio" name="mos" onClick="checkMos();" value="5"> excellent<br><br>
            </label>
            <input id="nextButton" type="submit" value="Next" disabled>
<!--            --><?php
//            exit('Exit: testMOS');
//            ?>
<!---->
<!--		--><?php //
//			if(isset($_SESSION['pageIndex'])) {
//				?><!--				-->
<!--					<input id="pageNext" type="hidden" name="page" value=" --><?php //echo  $_SESSION['pageIndex']; ?><!-- ">-->
<!--				--><?php
//			}
//			else {
//				session_destroy();
//				header( "Location: ../TUFIQoEMOS/index.php" );
//			}
//
//			if(isset($_SESSION['mosMAX'])) {
//				$maxMOS = $_SESSION['mosMAX'];
//			}
//			else{
//				$maxMOS = 5;
//			}
//
//			//for ($i = 1; $i <= $maxMOS; $i++) {
//			for ($i = $maxMOS; $i >= 1; $i--) {
//				switch($i) {
//					case 1:
//						if($lan == 'pl') {
//							$mos_mes = "zła";
//						}
//						else {
//							$mos_mes = "bad";
//						}
//						break;
//					case 2:
//						if($lan == 'pl') {
//							$mos_mes = "słaba";
//						}
//						else {
//							$mos_mes = "poor";
//						}
//						break;
//					case 3:
//						if($lan == 'pl') {
//							$mos_mes = "średnia";
//						}
//						else {
//							$mos_mes = "fair";
//						}
//						break;
//					case 4:
//						if($lan == 'pl') {
//							$mos_mes = "dobra";
//						}
//						else {
//							$mos_mes = "good";
//						}
//						break;
//					case 5:
//						if($lan == 'pl') {
//							$mos_mes = "doskonała";
//						}
//						else {
//							$mos_mes = "excellent";
//						}
//						break;
//					default:
//						echo "One shall neve get here!";
//				}
//				?>
<!--					<label>-->
<!--						<input type="radio" name="mos" onClick="checkMos();" value="--><?php //echo $i?><!--"> --><?php //echo $mos_mes?><!--<br><br>-->
<!--					</label>-->
<!--				--><?php
//			}
//		?><!--		-->
<!--			<input id="nextButton" type="submit" value="--><?php //echo $button; ?><!--" disabled = true>			-->
		</form>
	</div>
</body>
</html>
