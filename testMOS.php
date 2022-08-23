<html lang="">
	<head>
		  <meta charset="iso=8859-2">
		  <title>TUFIQoEMOS psycho-physical test</title>
		  <link rel="stylesheet" href="css/style_test.css" type="text/css"/>
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script type="text/javascript" >
		function checkMos(buttons) {
			if(atLeastOneRadio(buttons)) {
				document.getElementById("nextButton").disabled = false;
			}
		}
		
		function atLeastOneRadio(buttons) {
			return ($('input[type=radio]:checked').size() > buttons);
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
        <form method="post" action="next_page.php" style = "margin-bottom: 0;">
            <?php
            session_start();
            $button = 'Next';
            $pre_time = microtime(true);
            $pvs_duration = microtime(true) - $_SESSION['pvs_time'];
            $quest_correct = $_SESSION['quest_correct'];
            $pvs_no = $_SESSION['pvs_no'];
            $buttons = 0;
            if ($quest_correct[$pvs_no]){
                $buttons += 1;
                $quest = substr($quest_correct[$pvs_no], 0, strpos($quest_correct[$pvs_no], ','));
                echo "<h3>$quest</h3>";
                echo "<label><input type='radio' name='quest' onClick='checkMos($buttons);' value='true'> true<br><br></label>";
                echo "<label><input type='radio' name='quest' onClick='checkMos($buttons);' value='false'> false<br><br></label>";
            }
//            echo $quest_correct[$pvs_no];
            echo '<h3>Assess quality of material displayed</h3>';
            ?>
            <input id="pageNext" type="hidden" name="page" value="mos">
            <input id="pre_time" type="hidden" name="pre_time" value="<?php echo $pre_time; ?>">
            <input id="pvs_duration" type="hidden" name="pvs_duration" value="<?php echo $pvs_duration; ?>">
            <label>
                <input type="radio" name="mos" onClick="checkMos(<?php echo $buttons; ?>);" value="1"> bad<br><br>
            </label>
            <label>
                <input type="radio" name="mos" onClick="checkMos(<?php echo $buttons; ?>);" value="2"> poor<br><br>
            </label>
            <label>
                <input type="radio" name="mos" onClick="checkMos(<?php echo $buttons; ?>);" value="3"> fair<br><br>
            </label>
            <label>
                <input type="radio" name="mos" onClick="checkMos(<?php echo $buttons; ?>);" value="4"> good<br><br>
            </label>
            <label>
                <input type="radio" name="mos" onClick="checkMos(<?php echo $buttons; ?>);" value="5"> excellent<br><br>
            </label>
            <input id="nextButton" type="submit" value="Next" disabled>
        </form>
	</div>
</body>
</html>
