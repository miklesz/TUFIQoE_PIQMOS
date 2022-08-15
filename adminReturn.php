<?php 
	
	session_start();	
	$_SESSION = array();
	session_destroy();
	header( "Location: ../TUFIQoEMOS/index_admin.php" );

?>
