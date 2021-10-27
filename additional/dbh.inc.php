<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "pet_heroes";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName, 8889);
$conn = new PDO("mysql:host=localhost;dbname=pet_heroes", $dbPassword, $dbName);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
