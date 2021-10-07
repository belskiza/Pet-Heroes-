<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';
session_start();

$available_chats = array();
$matches = matcheswithMyPets($conn, $_SESSION['user_id']);

while ($match = $matches->fetch_assoc()) {
    $user = fetchUserFromId($conn, $match['user_id'])->fetch_assoc();

    if(!in_array($user, $available_chats)){
        array_push($available_chats, $user);
    }
}
