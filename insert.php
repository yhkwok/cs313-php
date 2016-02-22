<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styleSheet.css" />
	<title>Inserted Result</title>
	<?php
		//every protected page should have this in header
		session_start();
		if (!isset($_SESSION['id'])) {
			header("LOCATION:login.php");
		}
	?>
</head>

<BODY background = 'small_steps.png'>
	<a href="guestHomePage.php"><img src="logo.PNG"></a>
	<a href="logout.php"><h3>Logout</h3></a>
	<hr>
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
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = "INSERT INTO cars 
		(price, miles, sellerDisplayName, sellerEmail, postDate, modelID) 
		VALUES ('$price', '$miles', '$sdn', '$se', '$date', '$modelID')";
		$conn->exec($query);
		$ID = $conn->lastInsertId();
		
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
		foreach ($conn->query($queryString) as $row)
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