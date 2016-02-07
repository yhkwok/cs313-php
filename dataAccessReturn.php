<!DOCTYPE html>
<html>
<head>
</head>

<body>
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
if($_POST["filter"] == 'brand' && isset($_POST["input"])){
	$filter = "WHERE ma." . $_POST["filter"] . $_POST["input"];
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

$queryString = 'SELECT mo.year, ma.name, mo.name, c.miles, c.price, c.sellerDisplayName
FROM cars c 
JOIN models mo ON c.modelId = mo.id 
JOIN makes ma ON mo.makeId = ma.id ' . $filter;
;

foreach ($db->query($queryString) as $row)
{
	echo $row . "<br />";
}
?>

</body>

</html>