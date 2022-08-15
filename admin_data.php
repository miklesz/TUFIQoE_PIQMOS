<?php

	include 'function.php';

	session_start();
	if($_SESSION['login'] != null && $_SESSION['pass'] != null && $_SESSION['setData'] != null) {
		connectToDBAndSetData();
	}
	else {

		$login = $_POST['admin_log']; //or die('Koniec. Brak danych.');        
		$pass = $_POST['admin_pass']; //or die('Koniec. Brak danych.');  

		if( !$pass || !$login ){
			echo 'Nie wpisano wszystkich danych.<br/> Wróc do poprzedniej strony i spróbuj ponownie!';
			header( "Location: ../TUFIQoEMOS/index_admin.php" );
			exit;
		}
		else
		{
			$dbhandle = connectToDB();
			$result = mysql_query("SELECT * FROM `SUPER_USERS` WHERE NAME = ('$login')");
			
			while ($row = mysql_fetch_array($result)) {
			   $passfromDB = $row{'PASS'};
			   break;
			}
			
			$salt = '$r{x/Jg9t~8d@:PZ3ctU{@rgd}"8zcb^u@r\yyZQxgLc./UH)4<jS\-M[GbqB_jL;rChE*P3(/5XXf,z9X?~Q"CF[EUsrU3~3>}?';
			$hash = md5($salt . $pass); 		
			if($hash == $passfromDB)
			{
				//session_start();
				$_SESSION['login'] = $login;
				$_SESSION['pass'] = $passfromDB;
				
				$resultS = mysql_query("SELECT * FROM `TESTS_DOC`");
				mysql_close($dbhandle);
				$data = array();
				while ($row = mysql_fetch_array($resultS)) {
					$row_array['ID'] = $row{'ID'};
					$row_array['TEST_DOC_NAME'] = $row{'TEST_DOC_NAME'};
					$row_array['ACTIVE'] = $row{'ACTIVE'};
					$row_array['COMMENT'] = $row{'COMMENT'};
					$row_array['NUMBER'] = $row{'NUMBER'};
					$row_array['MAX_MOS'] = $row{'MOS_MAX'};
					array_push($data,$row_array);
					
				}
				
				$_SESSION['resultS'] = (json_encode($data));
				header( "Location: ../TUFIQoEMOS/admin_config.php" );
			}
			else {
				header( "Location: ../TUFIQoEMOS/index_admin.php" );
			}
		}

	}
	
	function ifFileExistInDB($fileName) {
		connectToDB();	
	}

?>
