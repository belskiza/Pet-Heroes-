<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
session_start();

if (isset($_GET['id'])){
    $their_id = $_GET['id'];

    $user = fetchUserFromId($conn, $their_id)->fetch_assoc();
    $messages = fetchMessagesForUser($conn, $their_id, $_SESSION['user_id']);
}

if(isset($_POST['submit'])){
    $sender_id = $_SESSION['user_id'];
    $receiver_id = $_POST['receiver_id'];
    $contents = $_POST['message'];
    sendMessage($conn, $sender_id, $receiver_id, $contents);
}

