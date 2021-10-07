<?php

if (isset($_POST["submit"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];
    $phone = $_POST['phone'];

    if(!isset($_POST["acc_type"])){
        header("location: ../sign_up.php?error=no_account_type");
        exit();
    } else {
        if ($_POST["acc_type"] == "adopter"){
            $acc_type = 0;
        } else if ($_POST["acc_type"] == "owner") {
            $acc_type = 1;
        } else {
            header("location: ../sign_up.php?error=no_account_type");
            exit();
        }
    }

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

    ?>
    <script>
        sessionStorage.clear();
    </script>
    <?php
    createUser($conn, $first_name, $last_name, $email, $username, $password , $acc_type, $phone);
} else {
    header("location: ../sign_up.php");
    exit();
}


