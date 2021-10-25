<?php include_once 'dbh.inc.php';
include_once 'functions.inc.php';
session_start();


$adoption = fetchAdoptionById($conn, $_GET['adoption'])->fetch_assoc();
$pet = fetchPetFromId($conn, $adoption['pet_id'])->fetch_assoc();
$adopter = fetchUserFromId($conn, $adoption['adopter_id'])->fetch_assoc();
