<html lang="">
	<head>
		  <meta charset="iso=8859-2">
		  <title>TUFIQoE PIQMOS psycho-physical test</title>
		  <title>TUFIQoE PIQMOS psycho-physical test</title>
		  <link rel="stylesheet" href="css/style_test.css" type="text/css"/>
	</head>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script type="text/javascript" >

        function time(){
            // document.getElementById('pvs_duration').innerHTML = (Date.now() - start).toString();
            localStorage.setItem('pvs_duration', (Date.now() - start).toString());
            // document.getElementById('pvs_duration').innerHTML = localStorage.getItem('pvs_duration');
        }

        $(window).load(function() {
            window.setTimeout(function(){
                window.location.href = "testMOS.php";
            }, 3000);
        });

        const start = Date.now();
        setInterval(time, 1);
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
<!--<span id="pvs_duration"></span>-->
<div style="position: relative; width: 100%; height: 100%;">
    <div  id="con" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <?php
//        ini_set('display_errors', '1');
//        ini_set('display_startup_errors', '1');
        session_start();
        $pvs_array = $_SESSION['pvs_array'];
//            print_r($pvs);
//            echo '<br>';
        $pvs_no = $_SESSION['pvs_no'];
//            echo 'pvs_no='.$pvs_no.'<br>';
        $id_user = $_SESSION['id_user'];
//            echo 'id_user='.$id_user.'<br>';
//        $_SESSION['pvs_time'] = microtime(true);
        $_SESSION['eval_id'] = 0;
        echo '<a href="testMOS.php"><img src="Data/'.$pvs_array[$pvs_no].'" alt=""></a>';
        ?>
    </div>
</div>
</body>
</html>
