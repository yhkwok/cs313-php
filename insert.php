<?php
	require "dbConnector.php";
	$db = loadDatabase(); 
	
	if (isset($_POST["makeID"]) and isset($_POST["modelID"]) and isset($_POST["price"]) and isset($_POST["miles"]) and isset($_POST["sellerDisplayName"]) and isset($_POST["sellerEmail"]))
	{
		$price = $_POST["price"];
		$miles = $_POST["miles"];
		$sdn = $_POST["sellerDisplayName"];
		$se = $_POST["sellerEmail"];
		$date = date('Y-m-d H:i:s');
		$modelID = $_POST["modelID"];
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = "INSERT INTO cars 
		(price, miles, sellerDisplayName, sellerEmail, postDate, modelID) 
		VALUES ('$price', '$miles', '$sdn', '$se', '$date', '$modelID')";
		$db->exec($query);
		$ID = $db->lastInsertId();
		
		$query='SELECT * FROM cars where id =' . $ID;
		$sql = $db->query($query);
		echo "Below is the entries you have just inserted: ";
		while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
			echo $row["price"] . " " . 	$row["miles"] . " " . $row["sellerDisplayName"] . " " . $row["sellerEmail"] . " " . $row["postDate"] . " " . $row["modelID"];
		}
	}
	$_POST["makeID"] = $_POST["modelID"] = $_POST["price"] = $_POST["miles"] = $_POST["sellerDisplayName"] = $_POST["sellerEmail"] = "";
?>