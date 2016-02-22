<?php	
	session_start();
	require "password.php";
	require "dbConnector.php";
	
	if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['disp'])) {
		$hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$stmt = $conn->prepare("INSERT INTO user (userName, displayName, password) VALUES (:user, :disp, :pass)");
		$stmt->bindParam(":user", $_POST['user']);
		$stmt->bindParam(":disp", $_POST['disp']);
		$stmt->bindParam(":pass", $hash);
		$stmt->execute();
		$_SESSION['id'] = $conn->lastInsertId();
		$_SESSION['disp'] = $_POST['disp'];
		header('LOCATION:getCarData.php');
	}
?>