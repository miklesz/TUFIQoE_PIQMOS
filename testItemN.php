<html lang="">
<head>
      <meta charset="iso=8859-2">
      <title>TUFIQoE PIQMOS psycho-physical test</title>
      <title>TUFIQoE PIQMOS psycho-physical test</title>
      <link rel="stylesheet" href="css/style_test.css" type="text/css"/>
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script type="text/javascript" >
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
<body>
<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');

    session_start();

    $srcs = $_SESSION['srcs'];
    $src_id = $_SESSION['src_id'];
    $src = $srcs[$src_id];
    $hrcs = $_SESSION['hrcs'];
    $hrc = $hrcs[$src];
    $pos = strrpos($src, '.');
    $pvs = substr($src, 0, $pos).'_'.$hrc.substr($src, $pos);
    $experiment = $_SESSION['experiment'];
    $group = $_SESSION['group'];
//    $pvs = $src;
//    print_r($srcs);
//    echo '<br>';
//    print_r($src_id);
//    echo '<br>';
//    echo '"'.$pvs.'"<br>';
//    echo 'experiment = "'.$experiment.'"<br>';
//    echo 'group = "'.$group.'"<br>';
?>
<div style="position: relative; width: 100%; height: 100%;">
    <div  id="con" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <?php
//        ini_set('display_errors', '1');
//        ini_set('display_startup_errors', '1');
//
//        session_start();
//
//        $srcs = $_SESSION['srcs'];
//        $src_id = $_SESSION['src_id'];
//        $src = $srcs[$src_id];
//        $hrcs = $_SESSION['hrcs'];
//        $hrc = $hrcs[$src];
//        $pos = strrpos($src, '.');
//        $pvs = substr($src, 0, $pos).'_'.$hrc.substr($src, $pos);
//        $experiment = $_SESSION['experiment'];


        //
//        echo '$srcs = '.print_r($srcs, true).'<br>';
//        echo '$src_id = '.print_r($src_id, true).'<br>';
//        echo '$src = '.print_r($src, true).'<br>';
//        echo '$hrcs = '.print_r($hrcs, true).'<br>';
//        echo '$hrc = '.print_r($hrc, true).'<br>';
//        echo '$pos = '.print_r($pos, true).'<br>';
//        echo '$pvs = '.print_r($pvs, true).'<br>';
//        echo '$experiment = '.print_r($experiment, true).'<br>';
        echo '<img src="Data/'.$pvs.'" alt="" id="image">';

//        if ($experiment) {
//            $pvs = $src;
//        }

//        if (substr($pvs, strrpos($pvs, '.'))=='.jpg'){
////            echo '<a href="testMOS.php"><img src="Data/'.$pvs.'" alt="" id="image" width="50%"></a>';
//            echo '<img src="Data/'.$pvs.'" alt="" id="image">';
//        }else{
//            echo '<a href="testMOS.php">';
//            echo '<video autoplay muted width="150%">';
//            echo '<video autoplay muted>';
//            echo '    <source src="Data_experiment/'.$pvs.'" type="video/mp4" id="image">';
//            echo '</video>';
//            echo '</a>';
//        }
//        $_SESSION['pvs_start_time'] = microtime(true);
        ?>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    // For video experiment
    $(window).load(function() {
        window.setTimeout(function(){
            window.location.href = "testMOS.php";
        }, 3000);
    });

    // For TUFIQoE PIQ
    // document.getElementById('image').onload = () => {
    //     window.setTimeout(function(){
    //         window.location.href = "testMOS.php";
    //     }, 3000);
    // }

    // http://pbz.kt.agh.edu.pl/~testySubiektywne/PIQMOS/testItemN.php
</script>
