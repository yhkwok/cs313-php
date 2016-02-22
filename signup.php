<?php
	session_start();
	require "dbConnector.php";
	require "password.php";
?>
<!DOCTYPE html PUBLIC "-//IETF//DTD HTML 2.0//EN">
<HTML>
   <HEAD>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<TITLE>Sign Up Page</TITLE>
   </HEAD>
<BODY background = 'small_steps.png'>
	<a href="guestHomePage.php"><img src="logo.PNG"></a>
	<a href="login.php"><h3>Back to Login page</h3></a>
	<hr>
	<h1>Sign Up to be an Admin!</h1>
	
	<div>
	<form action="createUser.php" method="post">
		User: <input type="text" name="user"></input><br/>
		Password: <input type="password" name="pass"></input><br/>
		Display Name: <input type="text" name="disp"></input><br/>
		<button type="submit">Submit</button>
		<button type="reset" value="Reset" onclick="location.href = 'signup.php';">Reset</button>
	</form> 
	</div>
</BODY>
</HTML>