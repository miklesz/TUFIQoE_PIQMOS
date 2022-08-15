<?php
include 'function.php';
session_start();
if(isset($_SESSION['id_user']) && isset($_SESSION['testID']) && isset($_SESSION['testNumber']) && isset($_SESSION['fileMOS']) && $_SESSION['activeFile'] != null && isset($_SESSION['beginTest'])){
$user_id = $_SESSION['id_user'];
$test_id = $_SESSION['testID'];
$test_number = $_SESSION['testNumber'];


$dbhandle = connectToDB();
foreach ($_POST as $key => $value){
	mysql_real_escape_string($key);
	mysql_real_escape_string($value);
	// Not the safest method, however we need a lot of flexibility and simplicity
	$result = mysql_query("SELECT ID FROM `QUESTIONS` WHERE POST_ID='$key'");
	$question_id = mysql_fetch_array($result);
	$question_id = $question_id[0];
	$q_one = mysql_query("INSERT INTO `QUESTIONNAIRE_ANSWERS` (`USER_ID`, `TEST_ID`, `TEST_NUMBER`, `QUESTION_ID`, `ANSWER`) VALUES ('$user_id','$test_id','$test_number','$question_id','$value')");
}

header( "Location: ../TUFIQoEMOS/testEnd.php" );
exit;
}

?>