<html lang="">
	<head>
		  <meta charset="iso=8859-2">
		  <title>TUFIQoE PIQMOS psycho-physical test</title>
		  <link rel="stylesheet" href="css/style.css" type="text/css"/>
	</head>

<body>
	  <section class="container">
		<div class="login">
			<?php
            session_start();
//            $pvs = $_SESSION['pvs'];
//            print_r($pvs);
//            echo '<br>';
//            exit('Exit: testing PVS');
            $file = file_get_contents('config/message.txt');
            $delimiter = strpos($file, PHP_EOL);
            $com = substr($file, 0, $delimiter);
            $message = substr($file, $delimiter);
            echo '<form method="post" action="screenTest.php">';
//            $com = 'Message: Perform the test.';
			$buttonText = 'Start';
            echo '<h3 id="com" style="margin-bottom: 5px;" >';
            echo $com;
//            echo '<h5>Your participation in the experiment "Investigating Quality-of-Pixels Using Non-Neutral Images" is entirely voluntary, and you may refuse to participate or withdraw from the experiment at any time. (Kindly note if you do not want to participate in the experiment or withdraw you will not earn 10 points assigned to this task and for the next exercise. You have the choice to earn these points by doing other activities within the course assigned by the instructor). During test do not to use the zoom-in feature of the web browser. Your submission below indicates that you consent to participate in the experiment.</h5></h3>';
            echo '<h5>'.$message.'</h5></h3>';
			echo '<input type="hidden" name="page" value="1">';
			echo '<p class="submit"><input type="submit" value="'.$buttonText.'"></p>';
            $_SESSION['beginTest'] = 1;
            //session_destroy();
			echo '</form>'
			?>
		</div>
	  </section>
</body>
</html>
