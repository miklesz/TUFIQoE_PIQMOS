<html lang="">
	<head>
		  <meta charset="iso=8859-2">
		  <title>TUFIQoE PIQMOS psycho-physical test</title>
		  <title>TUFIQoE PIQMOS psycho-physical test</title>
		  <link rel="stylesheet" href="css/style_test.css" type="text/css"/>
	</head>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script type="text/javascript" >
        $(window).load(function() {
            window.setTimeout(function(){
                window.location.href = "testMOS.php";
            }, 3000);
        });
    </script>
<!--	<script type="text/javascript" >-->
<!---->
<!--		$(document).ready(function() {-->
<!--			$(window).load(function() {-->
<!--				var temp = document.getElementById('testItem');-->
<!--				if(temp.tagName == 'VIDEO')-->
<!--				{-->
<!--					temp.addEventListener('ended',endVideo,false);-->
<!--					temp.play();-->
<!--				}-->
<!--			});-->
<!--		});-->
<!---->
<!--		function endVideo() {-->
<!--			window.location.href = "testMOS.php";-->
<!--		}-->
<!---->
<!--		jQuery(document).ready(function($) {-->
<!---->
<!--			if (window.history && window.history.pushState) {-->
<!--				window.history.pushState('forward', null, './#forward');-->
<!--				$(window).on('popstate', function() {-->
<!--					window.location.href = "testCut.php";-->
<!--				});-->
<!--			}-->
<!--		});-->
<!--						-->
<!--	</script>-->
		
<body>	
	<div style="position: relative; width: 100%; height: 100%;">
		<div  id="con" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
			<?php
            ini_set('display_errors', '1');
            ini_set('display_startup_errors', '1');
            session_start();
            $pvs = $_SESSION['pvs'];
//            print_r($pvs);
//            echo '<br>';
            $pvs_no = $_SESSION['pvs_no'];
//            echo 'pvs_no='.$pvs_no.'<br>';
            $id_user = $_SESSION['id_user'];
//            echo 'id_user='.$id_user.'<br>';
            echo '<a href="testMOS.php"><img src="Data/'.$pvs[$pvs_no].'" alt=""></a>';
            $_SESSION['pvs_time'] = microtime(true);
            ?>
		</div>
	</div>
</body>
</html>
