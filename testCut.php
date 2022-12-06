<html lang="">
<head>
    <meta charset="iso=8859-2">
    <title>TUFIQoE PIQMOS psycho-physical test</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<!--<script>-->
<!--    function time() {-->
<!--        document.getElementById('com').innerHTML = localStorage.getItem('com');-->
<!--    }-->
<!--    setInterval(time,1);-->
<!--</script>-->
<body>
<?php
session_start();
if ($_GET['com'] == 'The test is done') {
    header( "Location: https://app.prolific.co/submissions/complete?cc=CG7KK0BB" );
}
?>
<section class="container">
    <div class="login">
        <h3 id="com" style="margin-bottom: 5px; text-align: center;">
<!--            <div style="text-align: center;">-->
                <?php echo $_GET['com'] ?>
<!--            </div>-->
        </h3>
<!--        <form method="post" action="indexReturn.php">-->
<!--            <p class="submit"><input type="submit" name="commit" value="Return"></p>-->
<!--        </form>-->
    </div>
</section>
</body>
</html>
