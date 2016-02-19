<?php
	require "dbConnector.php";
	$db = loadDatabase(); 
?>
<!DOCTYPE html PUBLIC "-//IETF//DTD HTML 2.0//EN">
<HTML>
   <HEAD>
      <TITLE>
         Search
      </TITLE>
   </HEAD>
<BODY>
<?php
	//if (isset($_POST["makeID"]) and isset($_POST["modelID"]) and isset($_POST["price"]) and isset($_POST["miles"]) and isset($_POST["sellerDisplayName"]) and isset($_POST["sellerEmail"]))
		//echo "<form action=\"insert.php\" method=\"post\">";
	//else
		echo "<form action=\"\" method=\"post\">";
		
		$sql = $db->query('SELECT * FROM makes');

		echo "Make: <select name=\"makeID\">";
		while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
			if ((isset($_POST["makeID"])) and ($row["id"]===$_POST["makeID"]))
				echo "<option selected ";
			else
				echo "<option ";
			echo "value=\"" . $row["id"] . "\">" . $row["name"] . "</option>";
		}
		echo "</select>";
			
		if (isset($_POST["makeID"]))
		{
			$query='SELECT * FROM models mo where mo.makeID =' . $_POST["makeID"];
			$sql = $db->query($query);
			echo " Model: <select name=\"modelID\">";
			while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
				if ((isset($_POST["modelID"])) and ($row["id"]===$_POST["modelID"]))
					echo "<option selected ";
				else
					echo "<option ";
				echo "value=\"" . $row["id"] . "\">" . $row["name"] . "</option>";
			}
			echo "</select><br/>";
		}
		
		if (isset($_POST["modelID"]))
		{
			echo "Price: <input type=\"text\" name=\"price\"></input><br/>
			Miles: <input type=\"text\" name=\"miles\"></input><br/>
			Seller's Name: <input type=\"text\" name=\"sellerDisplayName\"></input><br/>
			Seller's Email: <input type=\"text\" name=\"sellerEmail\"></input><br/>";
		}
		if (isset($_POST["makeID"]) and isset($_POST["modelID"]))
			echo "<input type=\"submit\" value=\"Submit\">";
		else
			echo "<input type=\"submit\" value=\"Next\"></form>";
		
	 
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
	</body>
	</html>
	