<?php
// Standard inclusions     
include("pChart/pData.class");  
include("pChart/pChart.class");  
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
echo "Question 1: Have you eaten yet?<br/>";
$DataSet = new pData;
$DataSet->AddPoint(array($q1y, $q1n),"Serie1");
$DataSet->AddPoint(array("Yes", "No"),"Serie2");
$DataSet->AddAllSeries();
$DataSet->SetAbsciseLabelSerie("Serie2");

// Initialise the graph  
 $Test = new pChart(380,200);  
 $Test->drawFilledRoundedRectangle(7,7,373,193,5,240,240,240);  
 $Test->drawRoundedRectangle(5,5,375,195,5,230,230,230);  
 
 // Draw the pie chart  
 $Test->setFontProperties("Fonts/tahoma.ttf",8);  
 $Test->drawPieGraph($DataSet->GetData(),$DataSet->GetDataDescription(),150,90,110,PIE_PERCENTAGE,TRUE,50,20,5);  
 $Test->drawPieLegend(310,15,$DataSet->GetData(),$DataSet->GetDataDescription(),250,250,250);  
  
 $Test->Render("example10.png");

echo $q1y . '/' . $q1Total . " answered Yes<br/>";
echo $q1n . '/' . $q1Total . " answered No<br/>";
echo "<br/>";

echo "Question 2: Do you like snow?<br/>";
echo $q2y . '/' . $q2Total . " answered Yes<br/>";
echo $q2n . '/' . $q2Total . " answered No<br/>";
echo "<br/>";

echo "Question 3: Is Brother Burton awesome?<br/>";
echo $q3y . '/' . $q3Total . " answered Yes<br/>";
echo $q3n . '/' . $q3Total . " answered No<br/>";
echo "<br/>";

echo "Question 4: Are you handsome?<br/>";
echo $q4y . '/' . $q4Total . " answered Yes<br/>";
echo $q4n . '/' . $q4Total . " answered No<br/>";
echo "<br/>";

?>