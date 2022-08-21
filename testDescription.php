<html lang="">
<head>
    <meta charset="iso=8859-2">
    <title>TUFIQoE PIQMOS psycho-physical test</title>
    <link rel="stylesheet" href="css/style_test.css" type="text/css"/>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script type="text/javascript" >
    $(window).load(function() {
        window.setTimeout(function(){
            window.location.href = "testItemN.php";
            }, 3000);
    });
    // jQuery(document).ready(function($) {
    //     if (window.history && window.history.pushState) {
    //         window.history.pushState('forward', null, './#forward');
    //         $(window).on('popstate', function() {
    //             window.location.href = "testCut.php";
    //         });
    //     }
    // });
</script>
<body>
<section class="container">
    <div class="noteText">
        <?php 
		session_start();
		?>
        <h3>In a moment, the test will begin</h3>
    </div>
</section>	
<?php
$_SESSION['pvs_no'] = 0;
if(!isset($_SESSION['pageIndex'])) {
    $_SESSION['pageIndex'] = 1;
} 
?>
</body>
</html>
