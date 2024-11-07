<?php
$servername   = "localhost";
$database = "raheja";
$username = "raheja";
$password = "f*Y17r0n";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
  echo "Connected successfully";
?>