<?php
//every protected page should have this in header
session_start();
if (isset($_SESSION['id'])) {
	echo 'Welcome ' . $_SESSION['disp'];
} else {
	header("LOCATION:login.php");
}
?>