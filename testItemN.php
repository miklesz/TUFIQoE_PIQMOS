<html lang="">
	<head>
		  <meta charset="iso=8859-2">
		  <title>TUFIQoE PIQMOS psycho-physical test</title>
		  <title>TUFIQoE PIQMOS psycho-physical test</title>
		  <link rel="stylesheet" href="css/style_test.css" type="text/css"/>
	</head>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
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
            echo '<a href="testMOS.php"><img src="Data/'.$pvs[$pvs_no].'"></a>';

//            exit('Exit: Trap');
//            include 'function.php';

//            if(isset($_SESSION['id_user']) && isset($_SESSION['beginTest']) && isset($_SESSION['pageIndex'])) {
//                if($_SESSION['beginTest'] == 1 && $_SESSION['activeFile'] != null) {
//
//                    $versionsWithFiles = json_decode($_SESSION['activeFile'], true);
//
//                    $pageNum = $_SESSION['pageIndex'];
//
////                        // TODO: debug -> to be removed
////                        echo "<pre>";
////                        var_dump($versionsWithFiles);
////                        var_dump(count($versionsWithFiles));
////                        var_dump($page);
////                        exit;
//
//                    if(count($versionsWithFiles) < $pageNum) {
//                         header( "Location: ../TUFIQoEMOS/testEnd.php" );
//                        exit;
//                    }
//
//                    if($pageNum > 0){
//
//                        $currentKey = array_keys($versionsWithFiles)[$pageNum-1];
//                        $currentlyTestedAllItems = $versionsWithFiles[$currentKey];
//
//                        $randomQuality = getTheBestFitForRandomQuality($currentlyTestedAllItems);
//                        $currentlyTestedItem = (object) $currentlyTestedAllItems[$randomQuality];
//
//                        // TODO: debug -> to be removed
////                            echo "<pre>";
////                            var_dump($currentKey);
////                            var_dump($currentlyTestedAllItems);
////                            var_dump($currentlyTestedItem);
////                            var_dump("Page : $pageNum");
////                            exit;
//
//                        $_SESSION['currentTestItem'] = json_encode($currentlyTestedItem);
//
//                        $ext = pathinfo($currentlyTestedItem->FILE_PATH, PATHINFO_EXTENSION);
//                        $ext = str_replace(array("\n","\r"), '', $ext);
//
//                        if((strcmp($ext , "mp4") == 0) or (strcmp($ext , "ogg") == 0) or (strcmp($ext , "webm") == 0)) {
//
//                        ?><!--<video width=1280 id="testItem">--><?php
//                            switch($ext){
//                                case "mp4":
//                                    ?><!--<source src="--><?php //echo $currentlyTestedItem->FILE_PATH; ?><!--" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"'style="width:1280px;"/>--><?php
//                                    break;
//                                case "ogg":
//                                    ?><!--<source src="--><?php //echo $currentlyTestedItem->FILE_PATH; ?><!--" type="video/ogg"style="width:1280px;"/>--><?php
//                                    break;
//                                case "webm":
//                                    ?><!--<source src="--><?php //echo $currentlyTestedItem->FILE_PATH; ?><!--" type='video/webm;codecs="vp8, vorbis"'style="width:1280px;"/>--><?php
//                                    break;
//                            }
//                            ?><!--</video> --><?php
//                        }
//                        // Define what to do if showing images
//                        elseif( (strcmp($ext , "jpg") == 0)  or (strcmp ($ext , "png") == 0) or (strcmp($ext , "JPG") == 0) or (strcmp($ext, "bmp" == 0))){
//                            ?><!--<img src="--><?php //echo $currentlyTestedItem->FILE_PATH; ?><!--" alt="Test image" id="testItem"height=720>--><?php
//                            echo"<script language='javascript'>
//                                document.onclick = function(){
//                                    window.location.href = \"testMOS.php\";
//                                }
//                            </script>";
//                        }
//                        else {
//                            echo "Nie rozpoznany format.";
//                        }
//                    }
//                    else {
//                        session_destroy();
//                        header( "Location: ../TUFIQoEMOS/index.php" );
//                    }
//                }
//                else {
//                    session_destroy();
//                    header( "Location: ../TUFIQoEMOS/index.php" );
//                }
//            }
//            else
//            {
//                session_destroy();
//                header( "Location: ../TUFIQoEMOS/index.php" );
//            }
            ?>
<!--            <script language='javascript'>-->
<!--                document.onclick = function(){-->
<!--                    window.location.href = \"testMOS.php\";" +-->
<!--                }-->
<!--            </script>";-->
		</div>
	</div>
</body>
</html>
