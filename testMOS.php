<html lang="">
<head>
      <meta charset="iso=8859-2">
      <title>TUFIQoEMOS psycho-physical test</title>
      <link rel="stylesheet" href="css/style_test.css" type="text/css"/>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script type="text/javascript" >
    const start = Date.now();

    function checkMos(buttons) {
        if(atLeastOneRadio(buttons)) {
            document.getElementById("nextButton").disabled = false;
        }
    }

    function atLeastOneRadio(buttons) {
        return ($('input[type=radio]:checked').size() > buttons);
    }

    function time(){
        document.getElementById('pvs_duration').value = localStorage.getItem('pvs_duration');
        document.getElementById('quest_duration').value = (Date.now() - start).toString();
    }

    setInterval(time,1);

    // a = localStorage.getItem('pvs_duration');
    // document.getElementById('pvs_duration').value = (Date.now() - start).toString();

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
        <label for="pvs_duration">
            <input id="pvs_duration" name="pvs_duration" value="">
        </label>
        <label for="quest_duration">
            <input id="quest_duration" name="quest_duration" value="">
        </label>
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
//        echo "<input id='pvs_duration' type='hidden' name='pvs_duration' value='$pvs_duration'>";
        $eval = trim($eval_array[$pvs_no]);
        $eval_exploded = explode(':', $eval);
//        echo "$eval<br>";
//        print_r($eval_exploded);
//        print_r("$quest_array<br>");
        $eval_id = $_SESSION['eval_id'];
        $eval_item = $eval_exploded[$eval_id];
        if ($eval_item == 'random') {
            $eval_item = array('mos', 'arousal', 'valence', 'approach/avoidance')[rand(0, 3)];
        }
        echo '<br>';
        echo "eval = $eval<br>";
        echo 'eval_exploded = ';
        print_r($eval_exploded);
        echo '<br>';
        echo "eval_id = $eval_id, eval_item = $eval_item<br>";
        echo "<input id='pre_time' type='hidden' name='eval_item' value='$eval_item'>";
        echo "<input id='pre_time' type='hidden' name='eval_id' value='$eval_id'>";
        if ($eval_item == 'quest'){
            echo "<h3>$quest</h3>";
            echo '<input id="pageNext" type="hidden" name="page" value="answer">';
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='true'> true<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='false'> false<br><br></label>";
        }
        if ($eval_item == 'mos'){
            echo '<h3>Assess quality of material displayed</h3>';
            echo '<input id="pageNext" type="hidden" name="page" value="answer">';
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='1'> bad<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='2'> poor<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='3'> fair<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='4'> good<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='5'> excellent<br><br></label>";
        }
        if ($eval_item == 'arousal'){
            echo '<h3>Assess arousal of material displayed</h3>';
            echo '<input id="pageNext" type="hidden" name="page" value="answer">';
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='1'> 1<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='2'> 2<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='3'> 3<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='4'> 4<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='5'> 5<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='6'> 6<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='7'> 7<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='8'> 8<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='9'> 9<br><br></label>";
        }
        if ($eval_item == 'valence'){
            echo '<h3>Assess valence of material displayed</h3>';
            echo '<input id="pageNext" type="hidden" name="page" value="answer">';
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='1'> 1<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='2'> 2<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='3'> 3<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='4'> 4<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='5'> 5<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='6'> 6<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='7'> 7<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='8'> 8<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='9'> 9<br><br></label>";
        }
        if ($eval_item == 'approach/avoidance'){
            echo '<h3>Assess approach/avoidance of material displayed</h3>';
            echo '<input id="pageNext" type="hidden" name="page" value="answer">';
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='1'> 1<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='2'> 2<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='3'> 3<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='4'> 4<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='5'> 5<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='6'> 6<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='7'> 7<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='8'> 8<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='9'> 9<br><br></label>";
        }
        echo '<input id="nextButton" type="submit" value="Next" disabled>';
        ?>
    </form>
</div>
</body>
</html>
