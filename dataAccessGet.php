<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="styleSheet.css" />
	<title>Search page</title>
</head>

<BODY background = 'small_steps.png'>
<a href="guestHomePage.php"><img src="logo.PNG"></a>
<hr>
<h1>Please pick a method to filter the results:</h1>

<div>
<form action="dataAccessReturn.php" method="post">
<input type="radio" name="filter" value="year>">Greater than a Year<br/>
<input type="radio" name="filter" value="year<">Less than a Year<br/>
<input type="radio" name="filter" value="brand=">Brand Name<br/>
<input type="radio" name="filter" value="miles>">Greater than miles<br/>
<input type="radio" name="filter" value="miles<">Less than a miles<br/>
<input type="radio" name="filter" value="price>">Greater than price<br/>
<input type="radio" name="filter" value="price<">Less than a price<br/>
<input type="radio" name="filter" value="all">Just show me the whole inventory<br/>
<b>Greater then / Less than / Brand name / N/A:</b><br>
<input type="text" name="input">

<button type="submit">Submit</button>
</form>
</div>

</body>

</html>