<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

//include 'function.php';

session_start();
$question = $_SESSION['question'];
if ($question){
    $_SESSION['submitted_answer'] = $_POST['answer'];
    $_SESSION['answer_duration'] = $_POST['duration'];
} else {
    $_SESSION['submitted_mos'] = $_POST['answer'];
    $_SESSION['mos_duration'] = $_POST['duration'];
    $questions_csv = file('config/questions.csv');
//    print_r($questions_csv);
    $question = false;
    foreach ($questions_csv as $questions_csv_line) {
        $questions_csv_line_elements = explode(',', $questions_csv_line);
        print_r($questions_csv_line_elements);
        echo '<br>';
    }
}

echo 'mos = ';
echo $_POST['answer'];
echo '<br>';
echo 'duration = ';
echo $_POST['duration'];

exit;

$id_user = 	$_SESSION['id_user'];
$mos = $_POST['answer'];
$pvs_array = $_SESSION['pvs_array'];
$quest_array = $_SESSION['quest_array'];
$correct_array = $_SESSION['correct_array'];
$eval_array = $_SESSION['eval_array'];
$pvs_no = $_SESSION['pvs_no'];
$current_pvs = $pvs_array[$pvs_no];
$quest_duration = microtime(true) - $_POST['pre_time'];
$quest_duration = $_POST['quest_duration'];
$pvs_duration = $_POST['pvs_duration'];
$eval_item = $_POST['eval_item'];
$eval_id = $_POST['eval_id'];
if (array_key_exists("answer", $_POST)) {
    $answer = $_POST['answer'];
} else {
    $answer = NULL;
}
if ($eval_item == 'quest') {
    $quest = $quest_array[$pvs_no];
    $correct = $correct_array[$pvs_no];
} else {
    $quest = '';
    $correct = '';
}

print_r($_SESSION);
echo '<br>';
print_r($_POST);
echo '<br>';
//exit();
//echo '<br>';
//echo 'id_user='.$id_user.'<br>';
//echo 'pvs_no='.$pvs_no.'<br>';
//echo 'current_pvs='.$current_pvs.'<br>';
//echo 'mos='.$mos.'<br>';
//$timestamp = str_replace(',', '', date('r', time()));
date_default_timezone_set('Europe/Warsaw');
$timestamp = date('Y-m-d H:i:s');

//'id_user,pvs,pvs_duration,eval_id,eval_item,answer,duration,quest,correct,timestamp'.PHP_EOL
file_put_contents(
    'results/'.$id_user.'.csv',
    "$id_user,$current_pvs,$pvs_duration,$eval_id,$eval_item,$answer,$quest_duration,$quest,$correct,$timestamp".PHP_EOL,
    FILE_APPEND | LOCK_EX
);
//exit();

$eval = trim($eval_array[$pvs_no]);
$eval_exploded = explode(':', $eval);
$eval_count = count($eval_exploded);

echo "eval = $eval<br>";
echo 'eval_exploded = ';
print_r($eval_exploded);
echo '<br>';
echo "eval_id = $eval_id<br>";
echo "eval_count = $eval_count<br>";

if ($eval_id < $eval_count - 1) {
    echo("$eval_id < $eval_count - 1<br>");
    $_SESSION['eval_id'] += 1;
    header( "Location: testMOS.php" );
} else {
    $_SESSION['pvs_no'] += 1;
    $pvs_no = $_SESSION['pvs_no'];
//    echo 'pvs_no='.$pvs_no.'<br>';
//    echo count($pvs).'<br>';
    if ($pvs_no==count($pvs_array)) {
        header( "Location: testCut.php?com=The test is done" );
    } else{
        header( "Location: testItemN.php" );
    }
}

//exit();

//exit('Exit: next_page');

////session_destroy();
//if(isset($_POST['mos']) && isset($_SESSION['id_user']) && isset($_SESSION['testID']) && isset($_SESSION['testNumber']) && isset($_POST['page']) && $_SESSION['activeFile'] != null &&  isset($_SESSION['mosMAX'])) {
//
//	$mos = $_POST['mos'];
//	$pageId = (int) $_POST['page'];
//
//	$versionsWithFiles =  json_decode($_SESSION['activeFile'], true);
//	$idFile = 0;
//
//	$id_user = 	$_SESSION['id_user'];
//	$idTest = $_SESSION['testID'];
//	$testNumber = $_SESSION['testNumber'];
//	$maxMOS = $_SESSION['mosMAX'];
//
////	// TODO: debug -> to be removed
////	echo "<pre>";
////	var_dump($_POST);
////	var_dump($_SESSION);
////	exit;
//
//	if (isset($_SESSION['currentTestItem'])) {
//		$currentItem = json_decode($_SESSION['currentTestItem'], true);
//
//		if (isset($currentItem['FILE_ID'])) {
//			$idFile = (int) $currentItem['FILE_ID'];
//		}
//
//		// CLEAN UP SESSION STEP
//		unset($_SESSION['currentTestItem']);
//	}
//
//	// TODO: debug -> to be removed
////	echo "<pre>";
////	var_dump(isset($_SESSION['currentTestItem']));
////	var_dump($_POST);
////	var_dump($idFile);
////	var_dump($_SESSION);
////	exit;
//
//	if($idFile != 0)	{
//		$dbhandle = connectToDB();
//		$q_one = mysql_query("SELECT * FROM `RESULTS` WHERE ID_USER = (SELECT ID FROM `USER` WHERE NUMBER = ('$id_user')) AND ID_FILE = ('$idFile') AND ID_TEST = ('$idTest') AND TEST_NUMBER = ('$testNumber')");
//
//		mysql_query("START TRANSACTION");
//		if(mysql_num_rows($q_one) > 0) {
//
//			while ($row = mysql_fetch_array($q_one)) {
//				$IDr = $row{'ID'};
//				break;
//			}
//
//			$q_three = mysql_query("UPDATE `RESULTS` SET `MOS` = ('$mos'), `TEST_DATE` = NOW() WHERE ID = ('$IDr')");
//		}
//		else {
//			$q_two = mysql_query("INSERT INTO `RESULTS`(`ID_USER`, `TEST_DATE`, `MOS`, `MOS_MAX`,`ID_FILE`, `ID_TEST`, `TEST_NUMBER`) VALUES ((SELECT ID FROM `USER` WHERE NUMBER = ('$id_user')), NOW(),('$mos'),('$maxMOS'),('$idFile'),('$idTest'),('$testNumber'))");
//		}
//
//		if ($q_two or $q_three) {
//			mysql_query("COMMIT");
//		} else {
//			mysql_query("ROLLBACK");
//		}
//	}
//
//	$versionsWithFiles = json_decode($_SESSION['activeFile'], true);
//	$maxIndex = count($versionsWithFiles);
//
//	$nextPage = 0;
//	if(($pageId + 1) > $maxIndex) {
//		// If you want to ask the tester about something, uncomment
//		// the following line:
//		// header( "Location: ../TUFIQoEMOS/questionnaire.php" );
//
//		// TODO: debug -> to be removed
////		echo "<pre>";
////		var_dump(count($versionsWithFiles));
////		var_dump($nextPage);
////		var_dump($maxIndex);
////		exit;
//
//		// If you have no questions, go to the last page of the test
//		header( "Location: ../TUFIQoEMOS/testEnd.php" );
//		exit;
//	}
//	else {
//		$nextPage = $pageId + 1;
//	}
//
//	$_SESSION['pageIndex'] = $nextPage;
//	header( "Location: ../TUFIQoEMOS/testItemN.php" );
//}
//else
//{
//	exit('TODO remove that - ERR');
//	echo "no mos";
//}
