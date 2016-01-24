<?php
	session_unset();
	unset($_SESSION);
	//$_SESSION["pagecount"] = 1;
	header('Location: phpSurvey.php');
	exit;
?>