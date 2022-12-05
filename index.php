<html lang="">
	<head>
		  <meta charset="iso=8859-2">
		  <title>TUFIQoE PIQMOS psycho-physical test</title>
		  <link rel="stylesheet" href="css/style.css" type="text/css"/>
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script type="text/javascript" >
		function onLanguageChange() {
            const select = document.getElementById("soflow");
            if(select != null){
				// var l = select.value;
				// if(l == "pl") {
				// 	$('#loginCom').text('Logowanie do systemu testów');
				// 	$("#inputPlaceHolder").attr("placeholder", "Nr indeksu");
				// }
				// else {
				// 	$('#loginCom').text('Login to the test system');
				// 	$("#inputPlaceHolder").attr("placeholder", "Id number");
				// }
                $('#loginCom').text('Login to the test system');
                $("#inputPlaceHolder").attr("placeholder", "Id number");
            }
		}
		
		$(window).load(function() {
			//$('#soflow').val('pl');
			$('#soflow').val('eng');
		});

        jQuery(document).ready(function($) {
            if (window.history && window.history.pushState) {
                window.history.pushState('forward', null, './#forward');
                $(window).on('popstate', function() {
                    // window.location.href = "testCut.php";
                    window.location.href = "testCut.php?com=The test is interrupted";
                });
            }
        });
    </script>
<body>
<table style="width:100%">
    <tr>
        <td style="width:33%"></td>
        <td style="width:34%">
            <section class="container">
                <div class="login">
                    <h1 style="	margin-bottom: 5px; margin-top: 5px;"  id="loginCom">Login to the test system</h1>
                    <?php
                        session_start();
                        $_SESSION = array();
                        session_destroy();
                        session_start();
//                        $_SESSION['experiment'] = $_GET['experiment'];
                        $_SESSION['experiment'] = false;
                        $_SESSION['group'] = $_GET['group'];
//                        echo 'Debug:<br>';
                        echo 'PROLIFIC_PID = '.$_GET['PROLIFIC_PID'].'<br>';
                        echo 'STUDY_ID = '.$_GET['STUDY_ID'].'<br>';
                        echo 'SESSION_ID = '.$_GET['SESSION_ID'].'<br>';

//                        http://pbz.kt.agh.edu.pl/~testySubiektywne/PIQMOS/index.php?experiment=true&group=normal
//                        http://pbz.kt.agh.edu.pl/~testySubiektywne/PIQMOS/index.php?experiment=true&group=repeat
                    ?>
                    <form method="post" action="text_conf.php">
                        <p>
                            <label for="inputPlaceHolder"></label>
                            <input type="number" name="id_user" value="ABC" placeholder="Id number" min="0" id="inputPlaceHolder">
<!--                            <input type="text" name="id_user" value="--><?php //echo $_GET['SESSION_ID'];?><!--" min="0" id="inputPlaceHolder">-->
                        </p>
                        <label for="soflow"></label>
                        <select name="countries" class="countries" id="soflow" onchange="onLanguageChange()" hidden>
                            <option value="eng" data-title="English" name="language">English</option>
<!--                            <option value="pl"  data-title="Polski" name="language">Polski</option>-->
                        </select>
                        <p class="submit"><input type="submit" name="commit" value="Login"></p>
                    </form>
                </div>
            </section>
        </td>
        <td style="width:33%; vertical-align: top; text-align: right;">
            <img src="https://uploads-ssl.webflow.com/5ed38b28a553da56c8e4bb1e/62a75e1ee5dc8339085b165e_norwayGrants.png" alt="">
        </td>
    </tr>
</table>
</body>
</html>