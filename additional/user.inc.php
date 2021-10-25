<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
session_start();



$about_me = fetchAboutMeFromId($conn, $_GET['id'])->fetch_assoc();
$user = fetchUserFromId($conn, $_GET['id'])->fetch_assoc();
$profile_pic = fetchProfilePicById($conn,$user['user_id'])->fetch_assoc();
$personality = getQuiAnswersById($conn, $_GET['id'])->fetch_assoc();

