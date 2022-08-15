<?php
session_start();
$_SESSION = array();
session_destroy();
exit('Exit: testCut');
header( "Location: index.php" );
