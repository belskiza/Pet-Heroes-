<?php require_once 'dbh.inc.php';
require_once 'functions.inc.php';
session_start();

if(isset($_GET['pet'])){

    $pet = fetchPetFromId($conn, $_GET['pet'])->fetch_assoc();
    $user = fetchUserFromId($conn, $_GET['user'])->fetch_assoc();
    confirmAdoption($conn, $pet['pet_id'], $user['user_id'], $_SESSION['user_id']);
}
?>
