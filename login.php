<!DOCTYPE html PUBLIC "-//IETF//DTD HTML 2.0//EN">
<HTML>
   <HEAD>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<TITLE>Login Page</TITLE>
   </HEAD>
<BODY background = 'small_steps.png'>
	<a href="guestHomePage.php"><img src="logo.PNG"></a>
	<hr>
	<h1>Only permitted person can add entries</h1>
	
	<div>
	<form action="authenticate.php" method="post">
		User: <input type="text" name="user"></input><br/>
		Pass: <input type="password" name="pass"></input><br/>
		<button type="submit">Submit</button>
		<a href="signup.php">Sign up now!</a>
	</form> 
	</div>
</BODY>
</HTML>