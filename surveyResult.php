<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styleSheet.css" />
		<title>PHP Survey Result</title>
	</head>

	<body background = 'paisley.png'>

	<?php
	$file = fopen("temp.csv","r");

	$q1Total = $q2Total = $q3Total = $q4Total = 0;
	$q1y = $q2y = $q3y = $q4y = 0;
	$q1n = $q2n = $q3n = $q4n = 0;

	while(! feof($file))
	{		
		//$temp[] = array_map('string_getcsv', file($file));  
		$temp = (fgetcsv($file, 1024));
		if ($temp[1] == "Yes" || $temp[1] == "No"){
			$q1Total += 1;
			if ($temp[1] == "Yes"){
				$q1y += 1;
			} else {
				$q1n += 1;
			}	
		}	
		if ($temp[2] == "Yes" || $temp[2] == "No"){
			$q2Total += 1;
			if ($temp[2] == "Yes"){
				$q2y += 1;
			} else {
				$q2n += 1;
			}
		}
		if ($temp[3] == "Yes" || $temp[3] == "No"){
			$q3Total += 1;
			if ($temp[3] == "Yes"){
				$q3y += 1;
			} else {
				$q3n += 1;
			}
		}	
		if ($temp[4] == "Yes" || $temp[4] == "No"){
			$q4Total += 1;
			if ($temp[4] == "Yes"){
				$q4y += 1;
			} else {
				$q4n += 1;
			}
		}	
	}

	fclose($file);
	//Display the data
	echo "<h1>Here is the result: </h1>";
	echo "<div><h2>Question 1: Have you eaten yet?</h2><br/>";
	$q1yper = strval(intval($q1y) / intval ($q1Total) * 100);
	$q1nper = strval(intval($q1n) / intval ($q1Total) * 100);
	echo "<h3>" . $q1yper . "% answered Yes, and</h3>";
	echo "<h3>" . $q1nper . "% answered No. </h3>";
	echo "<h4>Vote Yes: " . $q1y . "</h4>";
	echo "<h4>Vote No: " . $q1n . "</h4>";
	echo "<h4>Total votes: " . $q1Total . "</h4>";
	echo "<hr/>";

	echo "<h2>Question 2: Do you like snow?</h2><br/>";
	$q2yper = strval(intval($q2y) / intval ($q2Total) * 100);
	$q2nper = strval(intval($q2n) / intval ($q2Total) * 100);
	echo "<h3>" . $q2yper . "% answered Yes, and</h3>";
	echo "<h3>" . $q2nper . "% answered No. </h3>";
	echo "<h4>Vote Yes: " . $q2y . "</h4>";
	echo "<h4>Vote No: " . $q2n . "</h4>";
	echo "<h4>Total votes: " . $q2Total . "</h4>";
	echo "<hr/>";

	echo "<h2>Question 3: Is Brother Burton awesome?</h2><br/>";
	$q3yper = strval(intval($q3y) / intval ($q3Total) * 100);
	$q3nper = strval(intval($q3n) / intval ($q3Total) * 100);
	echo "<h3>" . $q3yper . "% answered Yes, and</h3>";
	echo "<h3>" . $q3nper . "% answered No. </h3>";
	echo "<h4>Vote Yes: " . $q3y . "</h4>";
	echo "<h4>Vote No: " . $q3n . "</h4>";
	echo "<h4>Total votes: " . $q3Total . "</h4>";
	echo "<hr/>";

	echo "<h2>Question 4: Are you handsome?</h2><br/>";
	$q4yper = strval(intval($q4y) / intval ($q4Total) * 100);
	$q4nper = strval(intval($q4n) / intval ($q4Total) * 100);
	echo "<h3>" . $q4yper . "% answered Yes, and</h3>";
	echo "<h3>" . $q4nper . "% answered No. </h3>";
	echo "<h4>Vote Yes: " . $q4y . "</h4>";
	echo "<h4>Vote No: " . $q4n . "</h4>";
	echo "<h4>Total votes: " . $q4Total . "</h4>";
	echo "<hr/>";

	echo "<button onclick="location.href='resetAndRedirect.php'">Make another vote</button><br/>";
	
	echo "</div>";

?>
	</body>
</html>