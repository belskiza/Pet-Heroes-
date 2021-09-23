<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "pet_heroes";


$lat = $_POST["lat"];
$lon = $_POST["lon"];


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO location (lat, lon)
VALUES ($lat, $lon)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>