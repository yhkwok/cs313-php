<?php
	//remove PHPSESSID from browser
	if ( isset( $_COOKIE[session_name()] ) )
	setcookie( session_name(), бзби, time()-3600, бз/би );
	//clear session from globals
	$_SESSION = array();
	//clear session from disk
	session_destroy();

	header('Location: phpSurvey.php');
	exit;
?>