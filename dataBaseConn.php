<?php
// Create connection
$conn = mysqli_connect('localhost', 'u539703395_bravo', 'Jokerpong006!', 'u539703395_bravo');

//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>