<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

//include 'function.php';

session_start();

$id_user = 	$_SESSION['id_user'];
$mos = $_POST['mos'];
$pvs = $_SESSION['pvs'];
$pvs_no = $_SESSION['pvs_no'];
$current_pvs = $pvs[$pvs_no];
$quest_duration = microtime(true) - $_POST['pre_time'];
$pvs_duration = $_POST['pvs_duration'];

//print_r($_SESSION);
//echo '<br>';
//echo 'id_user='.$id_user.'<br>';
//echo 'pvs_no='.$pvs_no.'<br>';
//echo 'current_pvs='.$current_pvs.'<br>';
//echo 'mos='.$mos.'<br>';

file_put_contents(
    'results/'.$id_user.'.csv',
    $current_pvs.','.$pvs_duration.',,,,'.$mos.',,,,'.$quest_duration.PHP_EOL,
    FILE_APPEND | LOCK_EX
);

$_SESSION['pvs_no'] += 1;
$pvs_no = $_SESSION['pvs_no'];
//echo 'pvs_no='.$pvs_no.'<br>';
//echo count($pvs).'<br>';

if($pvs_no==count($pvs)) {
	header( "Location: testEnd.php" );
}
else{
	header( "Location: testItemN.php" );
}

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
