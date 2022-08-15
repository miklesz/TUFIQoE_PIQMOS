<?php

include 'function.php';
session_start();

$testDocOption = $_POST['testDocOption'];         
$activeTestOption = $_POST['activeTestOption']; 	
$numberTest = $_POST['numberTest'];
$maxMOS = $_POST['maxMOS'];

	if( !$testDocOption || !$activeTestOption || !$numberTest  || !$maxMOS){
		echo 'Nie wpisano wszystkich danych.<br/> Wróć do poprzedniej strony i spróbuj ponownie!';
		header( "Location: ../TUFIQoEMOS/admin_data.php" );
		exit;
	}
	else
	{	
		if($activeTestOption == 1){
		
			$dbhandle = connectToDB();	
			mysql_query("START TRANSACTION");
			$q_one = mysql_query("UPDATE `TESTS_DOC` SET ACTIVE = 0");
			$q_two = mysql_query("UPDATE `TESTS_DOC` SET ACTIVE = 1 WHERE ID = ('$testDocOption')");
			$q_three = mysql_query("UPDATE `TESTS_DOC` SET NUMBER = ('$numberTest') WHERE ID = ('$testDocOption')");	
			$q_four = mysql_query("UPDATE `TESTS_DOC` SET MOS_MAX = ('$maxMOS') WHERE ID = ('$testDocOption')");
			
			if ($q_one and $q_two and $q_three) {
				mysql_query("COMMIT");
			} else {        
				mysql_query("ROLLBACK");
			}
			
			$_SESSION['setData'] = 1;
			$_SESSION['lastUpdate'] = $testDocOption;
			header( "Location: ../TUFIQoEMOS/admin_data.php" );
		}
		else{
			header( "Location: ../TUFIQoEMOS/admin_data.php" );
		}
		
	}
	
?>
