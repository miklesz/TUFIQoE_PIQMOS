<html lang="">
<head>
    <meta charset="iso=8859-2">
    <title>TUFIQoE PIQMOS psycho-physical test</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<body>
<?php 
session_start();
//	if(isset($_SESSION['id_user']) && isset($_SESSION['testID']) && isset($_SESSION['testNumber']) && isset($_SESSION['fileMOS']) && $_SESSION['activeFile'] != null && isset($_SESSION['beginTest'])){
//		
//		$_SESSION['beginTest'] = 0;
//		unset($_SESSION['fileMOS']);
//		unset($_SESSION['activeFile']);
//		
//		if(!isset($_SESSION['comm_pl'])) {
//			$_SESSION['comm_pl'] = 'Test został przeprowadzony.';
//		}
//		
//		if(!isset($_SESSION['comm_eng'])) {
//			$_SESSION['comm_eng'] = 'The test is done';
//		}	
//	}
//	else{
//		header( "Location: ../TUFIQoEMOS/index.php" );
//	}
//	
?>
<section class="container">
    <div class="login">
        <h3 id="com" style="margin-bottom: 5px;">The test is done</h3>
        <form method="post" action="indexReturn.php">
            <p class="submit"><input type="submit" name="commit" value="Return"></p>
        </form>
    </div>
</section>
</body>
</html>
