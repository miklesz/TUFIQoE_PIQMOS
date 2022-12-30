<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

//include 'function.php';

session_start();

$ask_question = false;
$srcs = $_SESSION['srcs'];
$src_id = $_SESSION['src_id'];
$src = $srcs[$src_id];
$hrcs = $_SESSION['hrcs'];
$hrc = $hrcs[$src];
$pos = strrpos($src, '.');
$pvs = substr($src, 0, $pos).'_'.$hrc.substr($src, $pos);

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

//NAPS parameters
$valence = '';
$av_ap = '';
$arousal = '';
$luminance = '';
$contrast = '';
$jpeg_size80 = '';
$labl = '';
$laba = '';
$labb = '';
$entropy = '';
$naps_file = file('config/13428_2013_379_MOESM1_ESM.csv');
foreach ($naps_file as $naps_line) {
    $naps_elements = explode(";", $naps_line);
    if ($naps_elements[0].'.jpg' == $src) {
        $valence = str_replace(",", ".", $naps_elements[17]);
        $av_ap = str_replace(",", ".", $naps_elements[19]);
        $arousal = str_replace(",", ".", $naps_elements[21]);
        $luminance = str_replace(",", ".", $naps_elements[25]);
        $contrast = str_replace(",", ".", $naps_elements[26]);
        $jpeg_size80 = str_replace(",", ".", $naps_elements[27]);
        $labl = str_replace(",", ".", $naps_elements[28]);
        $laba = str_replace(",", ".", $naps_elements[29]);
        $labb = str_replace(",", ".", $naps_elements[30]);
        $entropy = str_replace(",", ".", $naps_elements[31]);
    }
}

//PVS parameters
$desired_metric = '';
$achieved_metric = '';
$distance_index = '';
$distance = '';
$pvs_file = file('config/pvs_stats.csv');
echo 'Looking for PVS entry<br>';
foreach ($pvs_file as $pvs_line) {
    $pvs_elements = explode(",", $pvs_line);
//    echo substr($pvs_elements[0], 0, -4).'_'.$pvs_elements[1].'.jpg'.'<br>';
//    echo $pvs.'<br>';

    $comp_pos = strrpos($pvs_elements[0], '.');
    $comp_pvs = substr($pvs_elements[0], 0, $comp_pos).'_'.$pvs_elements[1].substr($pvs_elements[0], $comp_pos);
//    if ($pvs_elements[0] == $src) {
    if ($comp_pvs == $pvs) {
        echo 'Found PVS entry<br>';
        echo '$comp_pvs = '.$comp_pvs.'<br>';
        print_r($pvs_elements);
        echo '<br>';
        $desired_metric = $pvs_elements[2];
        $achieved_metric = $pvs_elements[3];
        $distance_index = $pvs_elements[4];
        $distance = $pvs_elements[5];
    }
}
echo 'Finished looking for PVS entry<br>';

//Either come back with question or store to file
if ($ask_question) {
    header("Location: testMOS.php");
//    echo '<a href="testMOS.php">testMOS.php</a>';
} else {
    //'id_user,order_id,timestamp,src_id,hrc,pvs,submitted_mos,mos_duration,question,submitted_answer,real_answer,answer_duration'.PHP_EOL
    $prolific_pid = $_SESSION['prolific_pid'];
    $study_id = $_SESSION['study_id'];
    $session_id = $_SESSION['session_id'];
    $order_id = $_SESSION['order_id'];
    date_default_timezone_set('Europe/Warsaw');
    $timestamp = date('Y-m-d H:i:s');
    $submitted_mos = $_SESSION['submitted_mos'];
    $mos_duration = $_SESSION['mos_duration'];
    $submitted_answer = $_SESSION['submitted_answer'];
    $answer_duration = $_SESSION['answer_duration'];
    $pos = strrpos($src, '.');
    $pvs = substr($src, 0, $pos).'_'.$hrc.substr($src, $pos);

    echo '$session_id = '.$session_id.'<br>';
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
        'results/'.$session_id.'.csv',
        "$prolific_pid,$study_id,$session_id,$order_id,$timestamp,$src_id,$hrc,$pvs,$submitted_mos,$mos_duration,$question,$submitted_answer,$real_answer,$answer_duration,$valence,$av_ap,$arousal,$luminance,$contrast,$jpeg_size80,$labl,$laba,$labb,$entropy,$desired_metric,$achieved_metric,$distance_index,$distance".PHP_EOL,
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
