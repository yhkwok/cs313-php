<?php
	session_unset();
	$_SESSION["pagecount"] = 1;
	header('Location: phpSurvey.php');
	exit;
?>