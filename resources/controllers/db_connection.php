<?php 

$servername = "localhost"; 
$username = "root"; 
$password = "1234"; 
$database = "facultyinformationsystem";

// Creating a connection 
$conn = new mysqli($servername, $username, $password, $database); 

// Check connection 
if ($conn->connect_error) { 
	die("Connection failure: ".$conn->connect_error); 
} 
?> 
