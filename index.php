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
<section class="container">
    <div class="login">
        <h1 style="	margin-bottom: 5px; margin-top: 5px;"  id="loginCom">Login to the test system</h1>
        <form method="post" action="text_conf.php">
            <p><label for="inputPlaceHolder"></label><input type="number" name="id_user" value="" placeholder="Id number" min="0" id="inputPlaceHolder"></p>
            <label for="soflow"></label><select name="countries" class="countries" id="soflow" onchange="onLanguageChange()">
                <option value="eng" data-title="English" name="language">English</option>
                <!--	<option value="pl"  data-title="Polski" name="language">Polski</option>-->
            </select>
            <p class="submit"><input type="submit" name="commit" value="Login"></p>
        </form>
    </div>
</section>
</body>
</html>