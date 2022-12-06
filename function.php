<?php
ini_set('display_errors', '1');

//function connectToDB() {
//	$username = "pradzik";
//	$password = "RyygpfR1CvaeX5ko";
//	$hostname = "pbz.kt.agh.edu.pl";
//
//	echo "mysql_connect<br>";
////	$dbhandle = mysql_connect($hostname, $username, $password);
//	$dbhandle = mysql_connect($hostname, $username, $password) or die("Unable to connect to MySQL");
////	$dbhandle = mysql_connect($hostname, $username, $password) or echo("Unable to connect to MySQL");
//	echo "mysql_select_db<br>";
//	$selected = mysql_select_db("TUFIQoEMOS",$dbhandle) or die("Could not select examples");
//
//	return $dbhandle;
//}
//
//function connectToDBAndSetData() {
//
//	$_SESSION['setData'] != null;
//	$dbhandle = connectToDB();
//	$resultS = mysql_query("SELECT * FROM `TESTS_DOC`");
//	mysql_close($dbhandle);
//	$data = array();
//	while ($row = mysql_fetch_array($resultS)) {
//		$row_array['ID'] = $row{'ID'};
//		$row_array['TEST_DOC_NAME'] = $row{'TEST_DOC_NAME'};
//		$row_array['ACTIVE'] = $row{'ACTIVE'};
//		$row_array['COMMENT'] = $row{'COMMENT'};
//		$row_array['NUMBER'] = $row{'NUMBER'};
//		$row_array['MAX_MOS'] = $row{'MOS_MAX'};
//
//		array_push($data,$row_array);
//	}
//
//	$_SESSION['resultS'] = (json_encode($data));
//	header( "Location: ../PIQMOS/admin_config.php" );
//}
//
//function connectToDBAndSetData2() {
//
//	$dbhandle = connectToDB();
//	$resultS = mysql_query("SELECT * FROM `TESTS_DOC`");
//	mysql_close($dbhandle);
//	$data = array();
//	while ($row = mysql_fetch_array($resultS)) {
//		$row_array['ID'] = $row{'ID'};
//		$row_array['TEST_DOC_NAME'] = $row{'TEST_DOC_NAME'};
//		$row_array['ACTIVE'] = $row{'ACTIVE'};
//		$row_array['COMMENT'] = $row{'COMMENT'};
//		$row_array['NUMBER'] = $row{'NUMBER'};
//		$row_array['MAX_MOS'] = $row{'MOS_MAX'};
//		array_push($data,$row_array);
//	}
//
//	$_SESSION['resultS'] = (json_encode($data));
//}
//
//function getFilesSelectionsNumUsingHistory($testSet) {
//
//	$dbhandle = connectToDB();
//
//	$allFileIds = array();
//	foreach ($testSet as $testFile) {
//		$testFileId = (int) $testFile['FILE_ID'];
//		array_push($allFileIds, $testFileId);
//	}
//
//	$idsJoined = implode(', ', $allFileIds);
//
//	// Fetch PVSs in a random order
//	$submittedAnswersForRands = "
//		SELECT ID_FILE AS file_id, COUNT(res.ID_FILE) AS picked_num
//			FROM `RESULTS` AS res
//				WHERE res.ID_FILE IN ($idsJoined)
//				AND ID_TEST = (SELECT ID FROM TESTS_DOC WHERE ACTIVE = 1)
//			GROUP BY res.ID_FILE
//	";
//
//	$counts = mysql_query($submittedAnswersForRands);
//
//	$idsArray = array();
//	if($counts !== false && mysql_num_rows($counts) > 0) {
//		while ($row = mysql_fetch_assoc($counts)) {
//			$idsArray[$row['file_id']] = $row['picked_num'];
//		}
//	}
//	mysql_close($dbhandle);
//
//	$selectionCounts = array();
//	foreach ($allFileIds as $fileIndexId) {
//		if (isset($idsArray[$fileIndexId])) {
//			$selectionCounts[$fileIndexId] = (int) $idsArray[$fileIndexId];
//		} else {
//			$selectionCounts[$fileIndexId] = 0;
//		}
//	}
//
//	// TODO: debug -> to be removed
////	echo "<pre>";
////	var_dump($testSet);
////	var_dump(mysql_num_rows($counts));
////	var_dump($allFileIds);
////	var_dump($idsJoined);
////	var_dump( "County: " + var_dump($idsArray));
////	var_dump( "County II: " + var_dump($selectionCounts));
////	exit;
//
//	return $selectionCounts;
//}
//
//function searchQualityByFileId($fileId, $singleSetArray) {
//	foreach ($singleSetArray as $key => $val) {
//		if ($val['FILE_ID'] === $fileId) {
//			return $key;
//		}
//	}
//	return null;
//}
//
//function getTheBestFitForRandomQuality($testSet) {
//
//	$selectionCounts = getFilesSelectionsNumUsingHistory($testSet);
//
//	$minValue = min($selectionCounts);
//	$fileIdsForSelection = array_keys($selectionCounts, $minValue);
//
//    $randomKey = array_rand($fileIdsForSelection, 1);
//
//    $randomFileId = $fileIdsForSelection[$randomKey];
//
//	// TODO: debug -> to be removed
////	echo "<pre>";
////	var_dump($randomKey);
////	var_dump($randomFileId);
////	var_dump($fileIdsForSelection);
////
////	var_dump($minValue);
////	var_dump($selectionCounts);
////	var_dump(searchQualityByFileId($randomFileId, $testSet));
////	exit;
//
//	$quality = searchQualityByFileId($randomFileId, $testSet);
//	return $quality;
//}

//function show($var) {
//	echo $var;
//}
