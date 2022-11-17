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

    jQuery(document).ready(function($) {
        if (window.history && window.history.pushState) {
            window.history.pushState('forward', null, './#forward');
            $(window).on('popstate', function() {
                // localStorage.setItem('com', 'The test is interrupted');
                // window.location.href = "testCut.php";
                window.location.href = "testCut.php?com=The test is interrupted";
            });
        }
    });
</script>
<body onload="checkMos()">
<div class="answer">
    <form id="form" method="post" action="next_page.php" style = "margin-bottom: 0;">
        <label for="duration">
            <input id="duration" type="hidden" name="duration" value="">
        </label>
        <?php
        session_start();
        $button = 'Next';
        $buttons = 0;
        $question = $_SESSION['question'];
        echo "<input id='question' type='hidden' name='question' value='$question'>";
        if ($question){
            echo "<h3>$question</h3>";
            echo '<input id="pageNext" type="hidden" name="page" value="answer">';
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='true'> true<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='false'> false<br><br></label>";
        } else {
            echo '<h3>Assess quality of material displayed</h3>';
            echo '<input id="pageNext" type="hidden" name="page" value="answer">';
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='5'> excellent<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='4'> good<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='3'> fair<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='2'> poor<br><br></label>";
            echo "<label><input type='radio' name='answer' onClick='checkMos($buttons);' value='1'> bad<br><br></label>";
        }
        echo '<input id="nextButton" type="submit" value="Next" disabled>';
        ?>
    </form>
</div>
</body>
</html>
<script type="text/javascript">
    const start = Date.now();
    document.getElementById('nextButton').onclick = (event) => {
        event.preventDefault();
        document.getElementById('duration').value = (Date.now() - start).toString()
        document.getElementById('form').submit()
    }
</script>
