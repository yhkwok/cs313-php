<?php

$servername = "mysql:host=127.0.0.1;dbname=imdb";
$username = "root";
$password = "";
try{
// Create connection
$conn = new PDO($servername, $username, $password);
} catch (PDOException $ex) {
	echo "Error!: " . $ex->getMessage();
	die();
}
/*
$sql = $conn->query('SELECT book, chapter, verse, content FROM scriptures');

while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
	echo "<b>" . $row["book"] . " " . $row["chapter"] . ":" . $row["verse"] . " - </b>\"" . $row["content"] . "\"<br><br>" ;
}*/
?>