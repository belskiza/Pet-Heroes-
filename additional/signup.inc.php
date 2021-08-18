<?php

if (isset($_POST["submit"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];

    require_once'dbh.inc.php';
    require_once'functions.inc.php';


    if(emptyInputSignup($first_name, $last_name, $email, $username, $password, $password_confirm) !== false) {
        header("location: ../sign_up.php?error=empty_input");
        exit();
    }

    if(invalidUsername($username) !== false) {
        header("location: ../sign_up.php?error=invalid_username");
        exit();
    }

    if(invalidEmail($email) !== false) {
        header("location: ../sign_up.php?error=invalid_email");
        exit();
    }

    if(passwordCheck($password, $password_confirm) !== false) {
        header("location: ../sign_up.php?error=password_unacceptable");
        exit();
    }

    if(passwordMatch($password, $password_confirm) !== false) {
        header("location: ../sign_up.php?error=invalid_password_match");
        exit();
    }

    if(usernameEmailExists($conn, $username, $email) !== false) {
        header("location: ../sign_up.php?error=username_email_exists");
        exit();
    }

    createUser($conn, $first_name, $last_name, $email, $username, $password);


} else {
    header("location: ../sign_up.php");
    exit();
}
