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
?>
<section class="container">
    <div class="login">
<!--        <h3 id="com" style="margin-bottom: 5px;">The test is interrupted</h3>-->
        <h3 id="com" style="margin-bottom: 5px;"><?php echo $_GET['com'] ?></h3>
<!--        <form method="post" action="indexReturn.php">-->
        <form method="post" action="https://app.prolific.co/submissions/complete?cc=CG7KK0BB">
            <?php
            if ($_GET['com'] == 'The test is done') {
                header( "Location: https://app.prolific.co/submissions/complete?cc=CG7KK0BB" );
                echo '<p class="submit"><input type="submit" name="commit" value="Return"></p>';
            }
            ?>
        </form>
    </div>
</section>
</body>
</html>
