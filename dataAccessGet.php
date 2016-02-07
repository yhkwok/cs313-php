<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="styleSheet.css" />
	<title>Search page</title>
</head>

<body background = 'paisley.png'>
<h1>Please pick a method to filter the results:</h1>
<hr/>
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
<p>Greater then / Less than / Brand name / N/A</p><input type="text" name="input">
<hr/>

<hr/>
<button type="submit">Submit</button>
</form>
</div>
<a href="assignments.html" class="link" id="link">Back to Assignment Page</a><br/><br/>
</body>

</html>