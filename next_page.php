<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

//include 'function.php';

session_start();

$ask_question = false;
$srcs = $_SESSION['srcs'];
$src_id = $_SESSION['src_id'];
$src = $srcs[$src_id];
$question = $_SESSION['question'];
$real_answer = $_SESSION['real_answer'];

# Saving old and checking if there is a need for a question
if ($question){
    $_SESSION['submitted_answer'] = $_POST['answer'];
    $_SESSION['answer_duration'] = $_POST['duration'];
} else {
    $_SESSION['submitted_mos'] = $_POST['answer'];
    $_SESSION['mos_duration'] = $_POST['duration'];
    $questions_csv = file('config/questions.csv');
    $question = null;
    $real_answer = null;
    foreach ($questions_csv as $questions_csv_line) {
        $questions_csv_line_elements = explode(',', $questions_csv_line);
        $src_candidate = $questions_csv_line_elements[0];
        if ($src == $src_candidate) {
            echo $src.' == '.$src_candidate.'<br>';
            $question = $questions_csv_line_elements[1];
            $real_answer = substr($questions_csv_line_elements[2], 0, -1);
            echo '$question = '.$question.'<br>';
            echo '$real_answer = '.$real_answer.'<br>';
            $_SESSION['question'] = $question;
            $_SESSION['real_answer'] = $real_answer;
            $ask_question = true;
        }
    }
}

# Either come back with question or store to file
if ($ask_question) {
    header("Location: testMOS.php");
//    echo '<a href="testMOS.php">testMOS.php</a>';
} else {
    //'id_user,order_id,timestamp,src_id,hrc,pvs,submitted_mos,mos_duration,question,submitted_answer,real_answer,answer_duration'.PHP_EOL
    $id_user = $_SESSION['id_user'];
    $order_id = $_SESSION['order_id'];
    date_default_timezone_set('Europe/Warsaw');
    $timestamp = date('Y-m-d H:i:s');
    $hrcs = $_SESSION['hrcs'];
    $hrc = $hrcs[$src];
    $submitted_mos = $_SESSION['submitted_mos'];
    $mos_duration = $_SESSION['mos_duration'];
    $submitted_answer = $_SESSION['submitted_answer'];
    $answer_duration = $_SESSION['answer_duration'];
    $pos = strrpos($src, '.');
    $pvs = substr($src, 0, $pos).'_'.$hrc.substr($src, $pos);

    echo '$id_user = '.$id_user.'<br>';
    echo '$order_id = '.$order_id.'<br>';
    echo '$timestamp = '.$timestamp.'<br>';
    echo '$src_id = '.$src_id.'<br>';
    echo '$hrc = '.$hrc.'<br>';
    echo '$pvs = '.$pvs.'<br>';
    echo '$submitted_mos = '.$submitted_mos.'<br>';
    echo '$mos_duration = '.$mos_duration.'<br>';
    echo '$question = '.$question.'<br>';
    echo '$submitted_answer = '.$submitted_answer.'<br>';
    echo '$real_answer = '.$real_answer.'<br>';
    echo '$answer_duration = '.$answer_duration.'<br>';

    file_put_contents(
        'results/'.$id_user.'.csv',
        "$id_user,$order_id,$timestamp,$src_id,$hrc,$pvs,$submitted_mos,$mos_duration,$question,$submitted_answer,$real_answer,$answer_duration".PHP_EOL,
        FILE_APPEND | LOCK_EX
    );

    $_SESSION['question'] = null;
    $_SESSION['submitted_answer'] = null;
    $_SESSION['real_answer'] = null;
    $_SESSION['answer_duration'] = null;
    $_SESSION['src_id'] += 1;
    $src_id = $_SESSION['src_id'];
    if ($src_id == count($srcs)) {
        header("Location: testCut.php?com=The test is done");
//        echo '<a href="testCut.php?com=The test is done">testCut.php?com=The test is done</a>';
    } else{
        header("Location: testItemN.php");
//        echo '<a href="testItemN.php">testItemN.php</a>';
    }
}

//exit;
//
//$id_user = 	$_SESSION['id_user'];
//$mos = $_POST['answer'];
//$pvs_array = $_SESSION['pvs_array'];
//$quest_array = $_SESSION['quest_array'];
//$correct_array = $_SESSION['correct_array'];
//$eval_array = $_SESSION['eval_array'];
//$pvs_no = $_SESSION['pvs_no'];
//$current_pvs = $pvs_array[$pvs_no];
//$quest_duration = microtime(true) - $_POST['pre_time'];
//$quest_duration = $_POST['quest_duration'];
//$pvs_duration = $_POST['pvs_duration'];
//$eval_item = $_POST['eval_item'];
//$eval_id = $_POST['eval_id'];
//if (array_key_exists("answer", $_POST)) {
//    $answer = $_POST['answer'];
//} else {
//    $answer = null;
//}
//if ($eval_item == 'quest') {
//    $quest = $quest_array[$pvs_no];
//    $correct = $correct_array[$pvs_no];
//} else {
//    $quest = '';
//    $correct = '';
//}
//
//print_r($_SESSION);
//echo '<br>';
//print_r($_POST);
//echo '<br>';
////exit();
////echo '<br>';
////echo 'id_user='.$id_user.'<br>';
////echo 'pvs_no='.$pvs_no.'<br>';
////echo 'current_pvs='.$current_pvs.'<br>';
////echo 'mos='.$mos.'<br>';
////$timestamp = str_replace(',', '', date('r', time()));
//date_default_timezone_set('Europe/Warsaw');
//$timestamp = date('Y-m-d H:i:s');
//
////'id_user,pvs,pvs_duration,eval_id,eval_item,answer,duration,quest,correct,timestamp'.PHP_EOL
//file_put_contents(
//    'results/'.$id_user.'.csv',
//    "$id_user,$current_pvs,$pvs_duration,$eval_id,$eval_item,$answer,$quest_duration,$quest,$correct,$timestamp".PHP_EOL,
//    FILE_APPEND | LOCK_EX
//);
////exit();
//
//$eval = trim($eval_array[$pvs_no]);
//$eval_exploded = explode(':', $eval);
//$eval_count = count($eval_exploded);
//
//echo "eval = $eval<br>";
//echo 'eval_exploded = ';
//print_r($eval_exploded);
//echo '<br>';
//echo "eval_id = $eval_id<br>";
//echo "eval_count = $eval_count<br>";
//
//if ($eval_id < $eval_count - 1) {
//    echo("$eval_id < $eval_count - 1<br>");
//    $_SESSION['eval_id'] += 1;
//    header( "Location: testMOS.php" );
//} else {
//    $_SESSION['pvs_no'] += 1;
//    $pvs_no = $_SESSION['pvs_no'];
////    echo 'pvs_no='.$pvs_no.'<br>';
////    echo count($pvs).'<br>';
//    if ($pvs_no==count($pvs_array)) {
//        header( "Location: testCut.php?com=The test is done" );
//    } else{
//        header( "Location: testItemN.php" );
//    }
//}
