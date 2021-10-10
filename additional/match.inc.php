<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
session_start();

if(isset($_GET['adopter']) && isset($_GET['pet'])){
    $adopter = $_GET['adopter'];
    $pet = $_GET['pet'];
    $owner = $_SESSION['user_id'];

    ownerAdopterMatch($conn, $adopter, $owner, $pet);
    // header to chat function with this adopter
} else {
    // header to account page
}



