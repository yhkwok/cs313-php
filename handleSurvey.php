//write stuff to file

<?php 
	$name = $eaten = $snow = $burton = $handsome = "";
	
	if(isset($_POST["name"])){
		$name = $_POST["name"];
		$name = htmlspecialchars($name);
	}
	if(isset($_POST["eaten"])){
		$eaten = $_POST["eaten"];
	}
	if(isset($_POST["snow"])){
		$snow = $_POST["snow"];
	}
	if(isset($_POST["burton"])){
		$burton = $_POST["burton"];
	}
	if(isset($_POST["handsome"])){
		$handsome = $_POST["handsome"];
	}

	$handle = fopen("temp.csv", "a");
	$line = array($name, $eaten, $snow, $burton, $handsome);
	//$line = [$name, $eaten, $snow, $burton, $handsome];
	fputcsv($handle, $line);
	fclose($handle);
	
	header('Location: surveyResult.php');
	exit;
?>

//$name = htmlspecialchars($name);