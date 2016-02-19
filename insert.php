<?php
	require "dbConnector.php";
	$db = loadDatabase(); 
	
	if (isset($_POST["makeID"]) and isset($_POST["modelID"]) and isset($_POST["price"]) and isset($_POST["miles"]) and isset($_POST["sellerDisplayName"]) and isset($_POST["sellerEmail"]))
	{
		$price = $_POST["price"];
		$miles = $_POST["miles"];
		$sdn = $_POST["sellerDisplayName"];
		$se = $_POST["sellerEmail"];
		date_default_timezone_set('America/Denver');
		$date = date('m/d/Y h:i:s a', time());
		$modelID = $_POST["modelID"];
		$insert = $db->prepare('INSERT INTO cars (price, miles, sellerDisplayName, sellerEmail, postDate, modelID) VALUES ($price, $miles, $sdn, $se, $date, $modelID)');
		$ID = $db->lastInsertId();
		
		$query='SELECT * FROM cars where id =' . $ID;
			$sql = $db->query($query);
			echo "Below is the entries you have just inserted: ";
			while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
				echo $row["price"] . " " . 	$row["miles"] . " " . $row["sellerDisplayName"] . " " . $row["sellerEmail"] . " " . $row["postDate"] . " " . $row["modelID"];
			}
		
	}
?>