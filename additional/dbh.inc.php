<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "pet_heroes";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName, 8888);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}