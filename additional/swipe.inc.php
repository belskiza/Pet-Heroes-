<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';
session_start();

$petsThatArentMine = fetchPetsThatArentMine($conn, $_SESSION['user_id']);

$pet_ids = array();

$owner = fetchUserFromId($conn, $result['user_id'])->fetch_assoc();

$myMatches = fetchMySwipes($conn, $_SESSION['user_id']);

$petsToFeedToUser = array();


if (count($myMatches->fetch_all()) < 1) {
    foreach ($petsThatArentMine as $pet){
        array_push($petsToFeedToUser, $pet);
    }

    $result = $petsToFeedToUser;
} else {

    foreach ($petsThatArentMine as $pet){
        foreach($myMatches as $match){
            if ($pet['pet_id'] == $match['pet_id']){
                array_push($pet_ids, $pet['pet_id']);
            }
        }
    }

    foreach ($petsThatArentMine as $pet){
        if (!in_array($pet['pet_id'], $pet_ids)){
            array_push($petsToFeedToUser, $pet);
        }
    }

    $result = $petsToFeedToUser;
}

if(isset($_GET['swipe']) && isset($_GET['id'])){
    $owner_id = fetchPetFromId($conn, $_GET['id'])->fetch_assoc()['user_id'];

    if ($_GET['swipe'] == 'left'){
        swipe($conn, $_GET['id'], $_SESSION['user_id'], 0, $owner_id);
    } else if ($_GET['swipe'] == 'right'){
        swipe($conn, $_GET['id'], $_SESSION['user_id'], 1, $owner_id);
    }
}


