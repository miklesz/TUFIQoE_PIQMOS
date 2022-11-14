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
<div style="position: relative; width: 100%; height: 100%;">
    <div  id="con" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <?php
//        ini_set('display_errors', '1');
//        ini_set('display_startup_errors', '1');
        session_start();

        $srcs = $_SESSION['srcs'];
//        echo '$srcs = ';
//        print_r($srcs);
//        echo '<br><br>';

        $src_id = $_SESSION['src_id'];
//        echo '$src_id = ';
//        print_r($src_id);
//        echo '<br><br>';

        $src = $srcs[$src_id];
//        echo '$src = ';
//        print_r($src);
//        echo '<br><br>';

        $hrcs = $_SESSION['hrcs'];
//        echo '$hrcs = ';
//        print_r($hrcs);
//        echo '<br><br>';

        $hrc = $hrcs[$src];
//        echo '$hrc = "';
//        print_r($hrc);
//        echo '"<br><br>';

        $pos = strrpos($src, '.');
//        echo '$pos = ';
//        print_r($pos);
//        echo '<br><br>';

        $pvs = substr($src, 0, $pos).'_'.$hrc.substr($src, $pos);
//        echo '$pvs = ';
//        print_r($pvs);
//        echo '<br><br>';

//        $id_user = $_SESSION['id_user'];
//            echo 'id_user='.$id_user.'<br>';
//        $_SESSION['eval_id'] = 0;
//        echo '<a href="testMOS.php">NEXT</a>';

        if (substr($pvs, strrpos($pvs, '.'))=='.mp4'){
            echo '<video autoplay muted>';
            echo '    <source src="Data/'.$pvs.'" type="video/mp4">';
            echo '</video>';
        }else{
            echo '<img src="Data/'.$pvs.'" alt="">';
        }
//        $_SESSION['pvs_start_time'] = microtime(true);
        ?>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    function time(){
        localStorage.setItem('pvs_duration', (Date.now() - start).toString());
    }

    setInterval(time, 1);

    $(window).load(function() {
        window.setTimeout(function(){
            window.location.href = "testMOS.php";
        }, 3000);
    });

    const start = Date.now();

    // const beforeUnloadListener = (event) => {
    //     event.preventDefault();
    //     return event.returnValue = "Are you sure you want to exit?";
    //     // localStorage.setItem('pvs_duration', (Date.now() - start).toString());
    // };

    // const nameInput = document.querySelector("#name");

    // nameInput.addEventListener("input", (event) => {
    //     if (event.target.value !== "") {
    //         addEventListener("beforeunload", beforeUnloadListener, {capture: true});
    //     } else {
    //         removeEventListener("beforeunload", beforeUnloadListener, {capture: true});
    //     }
    // });

    // addEventListener("beforeunload", beforeUnloadListener, {capture: true});

    // http://pbz.kt.agh.edu.pl/~testySubiektywne/PIQMOS/testItemN.php
</script>
