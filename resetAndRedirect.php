<?php
	session_start();
	session_destroy();
	session_reset();
	//unset($_SESSION);
	//$_SESSION["pagecount"] = 1;
	header('Location: phpSurvey.php');
	exit;
?>