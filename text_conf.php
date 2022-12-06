<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

session_start();

if( !$_SESSION['session_id']){
    echo 'Nie wpisano wszystkich danych.<br/> Wróć do poprzedniej strony i spróbuj ponownie!';
    exit;
}


if (file_exists('results/'.$_SESSION['session_id'].'.csv') or file_exists('results/'.$_SESSION['session_id'].'_screen.csv')) {
    echo 'Warning: User already exists!<br>';
    header( "Location: testCut.php?com=User already exists" );
    exit();
}

file_put_contents(
    'results/'.$_SESSION['session_id'].'.csv',
    'prolific_pid,study_id,session_id,order_id,timestamp,src_id,hrc,pvs,submitted_mos,mos_duration,question,submitted_answer,real_answer,answer_duration,valence,av_ap,arousal,luminance,contrast,jpeg_size80,labl,laba,labb,entropy,desired_metric,achieved_metric,distance_index,distance'.PHP_EOL
);

$order_id = file('config/max_order.txt')[0];
file_put_contents('config/max_order.txt',$order_id+1);
//    file_put_contents('config/max_order.txt','2');
$_SESSION['order_id'] = $order_id;

$orders = file('config/orders.csv');
$srcs = explode(',', substr($orders[0], 0, -1));

$order = explode(',', substr($orders[$order_id+1], 0, -1));

array_shift($srcs);
array_shift($order);
$hrcs = array_combine($srcs, $order);
$_SESSION['hrcs'] = $hrcs;

shuffle($srcs);
$_SESSION['srcs'] = $srcs;

$_SESSION['question'] = null;
$_SESSION['submitted_answer'] = null;
$_SESSION['real_answer'] = null;
$_SESSION['answer_duration'] = null;

echo '$_SESSION["prolific_pid"] = '.$_SESSION["prolific_pid"].'<br>';
echo '$_SESSION["study_id"] = '.$_SESSION["study_id"].'<br>';
echo '$_SESSION["session_id"] = '.$_SESSION["session_id"].'<br>';
echo '$_SESSION["order_id"] = '.$_SESSION["order_id"].'<br>';
//    echo 'substr($orders[$order_id+1], 0, -1) = "';
//    print_r(substr($orders[$order_id+1], 0, -1));
//    echo '"<br><br>';
//exit;

header( "Location: testStart.php" );
