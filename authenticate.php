<?php	
	require "password.php";
	require "dbConnector.php";
	
	session_start();
	if (isset($_POST['user']) && isset($_POST['pass'])) {
		$stmt = $conn->prepare("SELECT * FROM user WHERE userName = :user");
		$stmt->bindParam(":user", $_POST['user']);
		$stmt->execute();
		$user = $stmt->fetch();

		if (password_verify($_POST['pass'], $user['password'])) {
    		$_SESSION['id'] = $user['id'];
    		$_SESSION['disp'] = $user['displayName'];
    		header("LOCATION:getCarData.php");
		} else {
			header("LOCATION:login.php");
		}
	}
?>