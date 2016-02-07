<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styleSheet.css" />
	<title>Filtered Result</title>
</head>

<body background = 'dark_embroidery.png'>
	<h1>Car Inventory</h1>

<?php
require("dbConnector.php"); 
$db = loadDatabase(); 
$filter = $value = "";

if($_POST["filter"] == 'all'){
	$filter = "";
}
if($_POST["filter"] == 'year>' && isset($_POST["input"])){
	$filter = "WHERE mo." . $_POST["filter"] . $_POST["input"];
}
if($_POST["filter"] == 'year<' && isset($_POST["input"])){
	$filter = "WHERE mo." . $_POST["filter"] . $_POST["input"];
}
if($_POST["filter"] == 'make=' && isset($_POST["input"])){
	$filter = "WHERE maname='" . $_POST["input"] . "'";
}
if($_POST["filter"] == 'miles>' && isset($_POST["input"])){
	$filter = "WHERE c." . $_POST["filter"] . $_POST["input"];
}
if($_POST["filter"] == 'miles<' && isset($_POST["input"])){
	$filter = "WHERE c." . $_POST["filter"] . $_POST["input"];
}
if($_POST["filter"] == 'price>' && isset($_POST["input"])){
	$filter = "WHERE c." . $_POST["filter"] . $_POST["input"];
}
if($_POST["filter"] == 'price<' && isset($_POST["input"])){
	$filter = "WHERE c." . $_POST["filter"] . $_POST["input"];
}

$queryString = 'SELECT mo.year, ma.name as maname, mo.name as moname, c.miles, c.price, c.sellerDisplayName
FROM cars c 
JOIN models mo ON c.modelId = mo.id 
JOIN makes ma ON mo.makeId = ma.id ' . $filter;
;

echo "<div>";
echo "<h1>Here is the result: </h1>";
echo "<table>";
echo "<tr><td>Year</td>";
echo "<td>Make</td>";
echo "<td>Model</td>";
echo "<td>Miles</td>";
echo "<td>Price</td>";
echo "<td>Seller</td></tr>";
foreach ($db->query($queryString) as $row)
{
	echo "<tr><td>".$row['year']."</td>";
	echo "<td>".$row['maname']."</td>";
	echo "<td>".$row['moname']."</td>";
	echo "<td>".$row['miles'] ."</td>";
	echo "<td>".$row['price'] ."</td>";
	echo "<td>".$row['sellerDisplayName']."</td></tr>";
}
echo "</table></div>";
?>
<a href="assignments.html" class="link" id="link">Back to Assignment Page</a><br/><br/>

</body>

</html>