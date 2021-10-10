<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
session_start();

if (isset($_GET['id']) && isset($_GET['pet'])){
    $their_id = $_GET['id'];
    $pet_id = $_GET['pet'];

    $user = fetchUserFromId($conn, $their_id)->fetch_assoc();
    $messages = fetchMessagesForUserandPet($conn, $their_id, $_SESSION['user_id'], $pet_id);
}

if(isset($_POST['submit'])){
    $sender_id = $_SESSION['user_id'];
    $receiver_id = $_POST['receiver_id'];
    $contents = $_POST['message'];
    $pet_id = $_POST['pet_id'];
    sendMessage($conn, $sender_id, $receiver_id, $contents, $pet_id);
}

