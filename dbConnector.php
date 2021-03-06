<?php

function loadDatabase() 
{}
$dbHost = "";
$dbPort = "";
$dbUser = "";
$dbPassword = "";
$dbName = "carseller";

$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

if ($openShiftVar === null || $openShiftVar == "")
{
    // Not in the openshift environment
    //echo "Using local credentials: "; 
    $conn = new PDO('mysql:host=127.0.0.1;dbname=carseller', 'movieGuy', 'password!');
}
else 
{ 
    // In the openshift environment
    //echo "Using openshift credentials: ";
    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
    $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
	$conn = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
} 





?>