<?php


if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username, $password) !== false) {
        header("location: ../login.php?error=empty_input");
        exit();
    }

    //Remembers username for 30 days (can't get this to work currently)
    /*
    if(!empty($_POST['remember'])){
        $remember_me = $_POST['remember'];
    } else {
        $remember_me = 0;
    } */

    loginUser($conn, $username, $password);

} else {
    header("location: ../login.php");
    exit();
}