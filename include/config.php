<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_management_system";

$con = mysqli_connect($servername, $username, $password, $dbname);
if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
	}
?>