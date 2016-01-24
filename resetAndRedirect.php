<?php
	session_abort();
	//unset($_SESSION);
	//$_SESSION["pagecount"] = 1;
	header('Location: phpSurvey.php');
	exit;
?>