<!DOCTYPE html>

<html>

<?php
session_start();

if (!isset($_SESSION["pagecount"])){
	$_SESSION["pagecount"] = 1;
}
else{
	$_SESSION["pagecount"] += 1;
}

if ($_SESSION["pagecount"] > 1){
header('Location: surveyResult.php');

//http://php.net/manual/en/function.header.php
exit;
}

?>

<head>
	<link rel="stylesheet" type="text/css" href="styleSheet.css" />
	<title>PHP Survey</title>
</head>

<body background = 'paosley.png'>
<button onclick="location.href='surveyResult.php'">
     Just show me the result</button>
<form action="handleSurvey.php" method="post">
<p>Name</p><input type="text" name="name">

<p>Q1: Have you eaten yet?</p>
<input type="radio" name="eaten" value="Yes">Yes<br/>
<input type="radio" name="eaten" value="No">No<br/>

<p>Q2: Do you like snow?</p>
<input type="radio" name="snow" value="Yes">Love it(Yes)<br/>
<input type="radio" name="snow" value="No">O STOP IT!(No)<br/>

<p>Q3: Is Brother Burton awesome?</p>
<input type="radio" name="burton" value="Yes">Absolutely!!(Yes)<br/>
<input type="radio" name="burton" value="No">I don't think so...(No)<br/>

<p>Q4: Are you handsome?</p>
<input type="radio" name="handsome" value="Yes">Why am I so handsome?(Yes)<br/>
<input type="radio" name="handsome" value="No">Nooo...I don't think so(No)<br/>
<br/>
<button type="submit">Submit</button>
</form>

</body>

</html>