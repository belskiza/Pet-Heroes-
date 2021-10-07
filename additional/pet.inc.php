<?php

session_start();

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(isset($_GET['pet'])){
    $pet_id = $_GET['pet'];
    $result = fetchPetFromId($conn, $pet_id)->fetch_assoc();

    $owner = fetchUserFromId($conn, $result['user_id'])->fetch_assoc();

    $pfp = fetchProfilePicById($conn, $result['user_id'])->fetch_assoc();
}
