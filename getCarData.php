<?php
	require "dbConnector.php";
?>
<!DOCTYPE html PUBLIC "-//IETF//DTD HTML 2.0//EN">
<HTML>
   <HEAD>
		<TITLE>Search</TITLE>
   </HEAD>
<BODY background = 'small_steps.png'>
	<a href="guestHomePage.php"><img src="logo.PNG"></a>
	<a href="logout.php"><h3>Logout</h3></a>
	<hr>
<?php
	session_start();
	if (isset($_SESSION['id'])) {
		echo '<h1>Welcome ' . $_SESSION['disp'] . '</h1>';
	} else {
		header("LOCATION:login.php");
	}
	
	if (isset($_POST["makeID"]) and isset($_POST["modelID"]))
		echo "<form action=\"insert.php\" method=\"post\">";
	else
		echo "<form action=\"\" method=\"post\">";
		
		$sql = $conn->query('SELECT * FROM makes');

		echo "Make: <select name=\"makeID\">";
		while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
			if ((isset($_POST["makeID"])) and ($row["id"]===$_POST["makeID"]))
				echo "<option selected ";
			else
				echo "<option ";
			echo "value=\"" . $row["id"] . "\">" . $row["name"] . "</option>";
		}
		echo "</select>";
			
		if (isset($_POST["makeID"]))
		{
			$query='SELECT * FROM models mo where mo.makeID =' . $_POST["makeID"];
			$sql = $conn->query($query);
			echo " Model: <select name=\"modelID\">";
			while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
				if ((isset($_POST["modelID"])) and ($row["id"]===$_POST["modelID"]))
					echo "<option selected ";
				else
					echo "<option ";
				echo "value=\"" . $row["id"] . "\">" . $row["name"] . "</option>";
			}
			echo "</select><br/>";
		}
		
		if (isset($_POST["modelID"]))
		{
			echo "Price: <input type=\"text\" name=\"price\"></input><br/>
			Miles: <input type=\"text\" name=\"miles\"></input><br/>
			Seller's Name: <input type=\"text\" name=\"sellerDisplayName\"></input><br/>
			Seller's Email: <input type=\"text\" name=\"sellerEmail\"></input><br/>";
		}
		if (isset($_POST["makeID"]) and isset($_POST["modelID"]))
		{
			echo "<button type=\"submit\" value=\"Submit\">Submit</button>";
			
		}
			
		else
		{
			echo "<button type=\"submit\" value=\"Submit\">Next</button>";
		}
	?>
	<button type="reset" 
	value="Reset" 
	onclick="location.href = 'getCarData.php';">Reset</button>
	</form>
	</body>
	</html>
	