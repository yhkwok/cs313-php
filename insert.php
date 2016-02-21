<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styleSheet.css" />
	<title>Inserted Result</title>
</head>

<body>
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
		
		$queryString = 'SELECT mo.year, ma.name as maname, mo.name as moname, c.miles, c.price, c.sellerDisplayName,
		c.sellerEmail, c.postDate
		FROM cars c 
		JOIN models mo ON c.modelId = mo.id 
		JOIN makes ma ON mo.makeId = ma.id where c.id =' . $ID;

		echo "<div>";
		echo "<h1>Here is the result: </h1>";
		echo "<table>";
		echo "<tr><td>Year</td>";
		echo "<td>Make</td>";
		echo "<td>Model</td>";
		echo "<td>Miles</td>";
		echo "<td>Price</td>";
		echo "<td>Seller</td>";
		echo "<td>Seller's Email</td>";
		echo "<td>Post Date</td>";
		echo "</tr>";
		foreach ($db->query($queryString) as $row)
		{
			echo "<tr><td>".$row['year']."</td>";
			echo "<td>".$row['maname']."</td>";
			echo "<td>".$row['moname']."</td>";
			echo "<td>".$row['miles'] ."</td>";
			echo "<td>".$row['price'] ."</td>";
			echo "<td>".$row['sellerDisplayName']."</td>";
			echo "<td>".$row['sellerEmail']."</td>";
			echo "<td>".$row['postDate']."</td>";
			echo "</tr>";
		}
		echo "</table></div>";
	}
	
	
	echo "<a href=\"getCarData.php\" class=\"link\" id=\"link\">Insert Another Car</a>";
?>


</body>

</html>