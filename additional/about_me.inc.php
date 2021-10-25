<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';
session_start();



$about_me = fetchAboutMeFromId($conn, $_SESSION['user_id'])->fetch_assoc();

$personality = getQuiAnswersById($conn, $_SESSION['user_id'])->fetch_assoc();

if(isset($about_me)){
    $age = $about_me['age'];
    $sex = $about_me['sex'];
    $description = $about_me['description'];
    $living_status = $about_me['living_status'];
    $occupation = $about_me['occupation'];
} else {
    $age = '';
    $sex = '';
    $description = '';
    $living_status = '';
    $occupation = '';
}


if(isset($_POST['submit'])){
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $description = $_POST['description'];
    $living_status = $_POST['living_status'];
    $occupation = $_POST['occupation'];

    submitAboutMe($conn, $_SESSION['user_id'], $age, $sex, $occupation, $living_status, $description);
}

if(isset($_POST['edit'])){
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $description = $_POST['description'];
    $living_status = $_POST['living_status'];
    $occupation = $_POST['occupation'];

    editAboutMe($conn, $_SESSION['user_id'], $age, $sex, $occupation, $living_status, $description);
}

