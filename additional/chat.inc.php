<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';
session_start();

$available_chats = array();
$matches = matchesWithMyPets($conn, $_SESSION['user_id']);

while ($match = $matches->fetch_assoc()) {
    $user = fetchUserFromId($conn, $match['adopter_id'])->fetch_assoc();
    $pet_id = $match['pet_id'];
    $user_pet = array();
    array_push($user_pet, $user);
    array_push($user_pet, $pet_id);

    if(!in_array($user_pet, $available_chats)){
        array_push($available_chats, $user_pet);
    }
}

$pets_ive_matched_with = petsIveMatchedWith($conn, $_SESSION['user_id']);

while ($match = $pets_ive_matched_with->fetch_assoc()) {
    $user = fetchUserFromId($conn, $match['owner_id'])->fetch_assoc();
    $pet_id = $match['pet_id'];
    $user_pet = array();
    array_push($user_pet, $user);
    array_push($user_pet, $pet_id);

    if(!in_array($user_pet, $available_chats)){
        array_push($available_chats, $user_pet);
    }
}