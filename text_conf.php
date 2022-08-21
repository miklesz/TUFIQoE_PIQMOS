<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

//include 'function.php';
$id_user = $_POST['id_user'];
$lan = $_POST['countries'];

echo 'id_user='.$id_user.'<br>';
echo 'lan='.$lan.'<br>';
//exit;

//$maxQuestionsNum = 10;
//	$maxQuestionsNum = null; // all items defined in Database within a particular test

if( !$id_user || !$lan){
	echo 'Nie wpisano wszystkich danych.<br/> Wróć do poprzedniej strony i spróbuj ponownie!';
	exit;
//	header( "Location: index.php" );
}
else {
	echo 'All data correct';
//	exit;
	// JN: The code below looks like some bad practices
	session_start();
	$_SESSION = array();
	session_destroy();

	session_start();

	$_SESSION['id_user'] = $id_user;

//			echo '$dbhandle = connectToDB();<br>';
//			$dbhandle = connectToDB();
//			echo $dbhandle;

//			$resultS = mysql_query("SELECT * FROM `USER` WHERE NUMBER = ('$id_user')");
//			if(mysql_num_rows($resultS) == 0)
//			{
//				// Add user ID to database
//				$resultInsert = mysql_query("INSERT INTO `USER`(`NUMBER`) VALUES (('$id_user'))");
//				if(!$resultInsert) {
//					echo "Error when adding the user. Come back to the previous page and try again";
//					header( "Location: ../PIQMOS/index.php" );
//					exit;
//				}
//			}
	if(file_exists('results/'.$id_user.'.csv')){
		echo 'Warning: User already exists!<br>';
	}
    file_put_contents(
        'results/'.$id_user.'.csv',
        'pvs,pvs_duration,question,answer,correct,mos,arousal,valence,approach_avoidance,quest_duration'.PHP_EOL
    );
//    $src = array("Volvo", "BMW", "Toyota");
    $src = file('config/src.txt');
    print_r($src);
    echo '<br>';
    shuffle($src);
    print_r($src);
    echo '<br>';
    $hrc = file('config/hrc.txt');
    print_r($hrc);
    echo '<br>';
    $ext = file_get_contents('config/ext.txt');
    echo $ext.'<br>';
    $pvs = array();
    foreach ($src as $current_src){
        $current_hrc_key = array_rand($hrc);
        $current_pvs = trim($current_src).'_'.trim($hrc[$current_hrc_key]).'.'.trim($ext);
        $pvs[] = $current_pvs;
//        echo $current_pvs.'<br>';
    }
    print_r($pvs);
    echo '<br>';
    $_SESSION['pvs'] =  $pvs;
//    exit('Randomisation exit');
    header( "Location: testStart.php" );
//	exit('Exit: Trap.');

//			// Fetch PVSs in a proper order (sorted by SORT_ID / VERSION_NUM)
//			$filesForTestsQuery = "
//				SELECT *
//				FROM `TESTS_FILE` AS mp
//				WHERE mp.ID IN (
//					SELECT * FROM (
//						  SELECT pr.ID
//						  FROM `TESTS_FILE` AS pr
//						  ORDER BY pr.VERSION_NUM
//					  ) as filtered
//				)
//			    AND ID_TEST = (SELECT ID FROM TESTS_DOC WHERE ACTIVE = 1)
//			    ORDER BY mp.SORT_ID ASC, mp.VERSION_NUM ASC
//			";
//
//			$filesForRandomSelection = mysql_query($filesForTestsQuery);
//
//			if(mysql_num_rows($filesForRandomSelection) > 0) {
//
//				$versionsWithFiles = array();
//				$selectValue = array();
//
//				$testItemsNum = 0;
//				$lastVersionId = null;
//
//				while ($poolFileRow = mysql_fetch_array($filesForRandomSelection)) {
//
//					$versionId = (int) $poolFileRow['VERSION_NUM'];
//
//					if ($lastVersionId !== $versionId) {
//						$lastVersionId = $versionId;
//						$testItemsNum++;
//					}
//
//					if (((int) $maxQuestionsNum > 0) && ($testItemsNum > $maxQuestionsNum)) {
//						break;
//					}
//
//					if (false === isset($versionsWithFiles[$versionId])) {
//						$versionsWithFiles[$versionId] = array();
//					}
//
//					$testFileId = (int) $poolFileRow['ID'];
//
//					$quality = array(
//						'FILE_ID' => $testFileId,
//						'FILE_PATH' => $poolFileRow['FILE_PATH'],
//					);
//
//					$versionsWithFiles[$versionId][$poolFileRow['QUALITY']] = $quality;
//				}
//
//				// TODO: debug -> to be removed
////				echo "<pre>";
////				var_dump($versionsWithFiles);
////				exit;
//
//				$resultTestIdAndNumber = mysql_query("SELECT * FROM `TESTS_DOC` WHERE ACTIVE = 1");
//
//				if(mysql_num_rows($resultTestIdAndNumber) > 0)
//				{
//					while ($row = mysql_fetch_array($resultTestIdAndNumber)) {
//						$testID = $row{'ID'};
//						$testNumber = $row{'NUMBER'};
//						$mosMAX = $row{'MOS_MAX'};
//						break;
//					}
//
//					// Check whether the test was already performed by the
//					// current tester
//					$resultExist = mysql_query("SELECT * FROM `RESULTS` WHERE ID_USER = (SELECT ID FROM USER WHERE NUMBER = ('$id_user')) AND ID_TEST = ('$testID') AND TEST_NUMBER =  ('$testNumber')");
//					mysql_close($dbhandle);
//
//					if($lan == 'pl' || $lan == 'eng')
//					{
//						$_SESSION['lan'] =  $lan;
//					}
//					else
//					{
//						$_SESSION['lan'] =  'eng';
//					}
//
//					if(mysql_num_rows($resultExist) > 0)
//					{
//						// Messages to the user
//						// The test has already been performed.
//						$_SESSION['comm_pl'] = 'Komunikat: Test został przeprowadzony. Nie masz aktywnych testów do wykonania.';
//						$_SESSION['comm_eng'] = 'Message: Test has been ended. You don\'t have any active tests.';
//						header( "Location: ../PIQMOS/testStart.php" );
//					}
//					else
//					{
//						$_SESSION['testID'] =  $testID;
//						$_SESSION['testNumber'] =  $testNumber;
//						$_SESSION['mosMAX'] =  $mosMAX;
//
//						$_SESSION['activeFile'] = (json_encode($versionsWithFiles));
//						$_SESSION['fileMOS'] = (json_encode($selectValue));
//
//						header( "Location: ../PIQMOS/testStart.php" );
//					}
//				}
//			}
//			else
//			{
//				exit('exit');
//				echo "No active test exists";
//				header( "Location: ../PIQMOS/index.php");
//			}
}