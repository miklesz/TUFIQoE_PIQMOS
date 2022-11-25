<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

$id_user = $_POST['id_user'];
$lan = $_POST['countries'];

echo 'id_user='.$id_user.'<br>';
echo 'lan='.$lan.'<br>';

if( !$id_user || !$lan){
	echo 'Nie wpisano wszystkich danych.<br/> Wróć do poprzedniej strony i spróbuj ponownie!';
	exit;
}
else {
	echo 'All data correct<br><br>';
	session_start();

    $experiment = $_SESSION['experiment'];

    if($id_user % 2 == 0){
        $_SESSION['group'] = 'normal';
    }
    else{
        $_SESSION['group'] = 'repeat';
    }
    $group = $_SESSION['group'];

    echo '$experiment = '.print_r($experiment, true).'<br>';
    echo '$group = '.print_r($group, true).'<br>';
//    exit;

	$_SESSION['id_user'] = $id_user;

	if (file_exists('results/'.$id_user.'.csv') or file_exists('results/'.$id_user.'_screen.csv')) {
		echo 'Warning: User already exists!<br>';
        header( "Location: testCut.php?com=User already exists" );
        exit();
	}

    file_put_contents(
        'results/'.$id_user.'.csv',
        'id_user,order_id,timestamp,src_id,hrc,pvs,submitted_mos,mos_duration,question,submitted_answer,real_answer,answer_duration'.PHP_EOL
    );

    $order_id = file('config/max_order.txt')[0];
    file_put_contents('config/max_order.txt',$order_id+1);
//    file_put_contents('config/max_order.txt','2');
    echo '$order_id = ';
    print_r($order_id);
    echo '<br><br>';
    $_SESSION['order_id'] = $order_id;

    if ($experiment) {
        $orders = file('config/orders_experiment_'.$group.'.csv');
    } else {
        $orders = file('config/orders.csv');
    }

    $srcs = explode(',', substr($orders[0], 0, -1));
//    echo 'substr($orders[0], 0, -1) = "';
//    print_r(substr($orders[0], 0, -1));
//    echo '"<br><br>';

    $order = explode(',', substr($orders[$order_id+1], 0, -1));
    echo 'substr($orders[$order_id+1], 0, -1) = "';
    print_r(substr($orders[$order_id+1], 0, -1));
    echo '"<br><br>';

    array_shift($srcs);
    array_shift($order);
    $hrcs = array_combine($srcs, $order);
//    echo '$hrcs = ';
//    print_r($hrcs);
//    echo '<br><br>';
    $_SESSION['hrcs'] = $hrcs;

    shuffle($srcs);
//    echo '$srcs = ';
//    print_r($srcs);
//    echo '<br><br>';
    $_SESSION['srcs'] = $srcs;

//    header( "Location: testStart.php" );

    $_SESSION['question'] = null;
    $_SESSION['submitted_answer'] = null;
    $_SESSION['real_answer'] = null;
    $_SESSION['answer_duration'] = null;

//    exit;
//    $_SESSION['ask_question'] = true;

//    $src_table = file('config/src.csv');
//    array_shift($src_table);
//    print_r($src_table);
//    echo '<br>';
//    shuffle($src_table);
//    print_r($src_table);
//    echo '<br>';
//
//    echo 'hrc:<br>';
//    $hrc = file('config/hrc.txt');
//    print_r($hrc);
//    echo '<br>';
//
//    $ext = file_get_contents('config/ext.txt');
//    echo $ext.'<br>';
//    $pvs_array = array();
//    $quest_array = array();
//    $correct_array = array();
//    $eval_array = array();
//    foreach ($src_table as $src_row){
//        $src_row_array = explode(',', $src_row);
//        print_r($src_row_array);
//        echo '<br>';
//        $quest_array[] = $src_row_array[1];
//        $correct_array[] = $src_row_array[2];
//        if ($src_row_array[1]) {
//            $eval_array[] = 'quest:'.$src_row_array[3];
//        } else {
//            $eval_array[] = $src_row_array[3];
//        }
//        $current_hrc_key = array_rand($hrc);
//        $current_pvs = trim($src_row_array[0]).'_'.trim($hrc[$current_hrc_key]).'.'.trim($ext);
//        $pvs_array[] = $current_pvs;
////        echo "src_line = $src_row, current_src = $current_src, current_pvs = $current_pvs, current_quest_correct = $current_quest_correct<br>";
//    }
//    print_r($pvs_array);
//    echo '<br>';
//    print_r($quest_array);
//    echo '<br>';
//    print_r($correct_array);
//    echo '<br>';
//    print_r($eval_array);
//    echo '<br>';
//    $_SESSION['pvs_array'] = $pvs_array;
//    $_SESSION['quest_array'] = $quest_array;
//    $_SESSION['correct_array'] = $correct_array;
//    $_SESSION['eval_array'] = $eval_array;

//    exit();
//    exit('Randomisation exit');
    header( "Location: testStart.php" );
}