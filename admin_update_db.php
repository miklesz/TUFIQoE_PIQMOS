
<?php 
	
include 'function.php';
	
	echo "Start";
	include(dirname(__DIR__).'/TUFIQoEMOS/TestDoc');
	$dir = '../TUFIQoEMOS/TestDoc';
	$files = scandir($dir, 1);
	$dbhandle = connectToDB();
	foreach ($files as $docFile) {	
		if( $docFile != '.' &&  $docFile != '..'){

			if($dbhandle != null){		
				$selected = mysql_select_db("lzielins", $dbhandle) or die("Could not select examples");
				$resultS = mysql_query("SELECT * FROM `TESTS_DOC` WHERE `TEST_DOC_NAME` like ('$docFile')");	
						
					if(mysql_num_rows($resultS) == 0)
					{					
						$resultInsert = mysql_query("INSERT INTO `TESTS_DOC`(`TEST_DOC_NAME`, `ACTIVE`, `COMMENT`, `NUMBER`) VALUES (('$docFile'), 0,'brak_narazie',1)");						
						if($resultInsert) {
							$resultSID = mysql_query("SELECT * FROM `TESTS_DOC` WHERE `TEST_DOC_NAME` like ('$docFile')");	
							
							echo "Nie ma w DB";
							while ($row = mysql_fetch_array($resultSID)) {
								$ID = $row{'ID'};
							  
								$handle = fopen($dir . '/' . $docFile, "r");
								$state = True;
								if ($handle) {
									while (($line = fgets($handle)) !== false) {
										//echo $line;
										//echo "<br>";	
										$resultInsertPath = mysql_query("INSERT INTO `TESTS_FILE`(`ID_TEST`, `FILE_PATH`) VALUES (($ID), ('$line'))");
										$state  = $state AND $resultInsertPath;							
									}
									fclose($handle);
								}
								else {
									echo "Nie można otworzyć pliku.";
								}
								
								if($state)
									mysql_query("COMMIT");
								else
									mysql_query("ROLLBACK");
								
							   break;
							}						
						}
						else	
							mysql_query("ROLLBACK");						
					}				
			}
			else
				echo 'Błąd!';
		}
	}
	
	session_start();
	$_SESSION['refresh'] = 1;
	header( "Location: ../TUFIQoEMOS/admin_config.php" );
	
?>
