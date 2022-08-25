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
        $quest_array = $_SESSION['quest_array'];
        $correct_array = $_SESSION['correct_array'];
        $eval_array = $_SESSION['eval_array'];
        $pvs_no = $_SESSION['pvs_no'];
        $buttons = 0;
        $quest = $quest_array[$pvs_no];
        echo "<input id='pre_time' type='hidden' name='pre_time' value='$pre_time'>";
        echo "<input id='pvs_duration' type='hidden' name='pvs_duration' value='$pvs_duration'>";
        if ($quest){
            $buttons += 1;
            echo "<h3>$quest</h3>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='true'> true<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='false'> false<br><br></label>";
        }
        $eval = $eval_array[$pvs_no];
        $eval_exploded = explode(';', $eval);
        echo "$eval<br>";
        print_r("$eval_exploded<br>");
//        print_r("$quest_array<br>");
        echo '<h3>Assess quality of material displayed</h3>';
        ?>
        <input id="pageNext" type="hidden" name="page" value="mos">
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
