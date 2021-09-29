<?php

require_once'dbh.inc.php';
require_once'functions.inc.php';
session_start();

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = fetchUserFromId($conn, $id);

    if(count($result) == 1){
        $row = $result->fetch_array();
        $username = $row['username'];
        $email = $row['email'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
    }
}

if (isset($_POST["submit"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    /*
    $password_confirm = $_POST["password_confirm"]; */

    if (emptyInputEdit($first_name, $last_name, $email, $username) !== false) {
        header("location: ../edit_profile.php?error=empty_input");
        exit();
    }

    if (invalidUsername($username) !== false) {
        header("location: ../edit_profile.php?error=invalid_username");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../edit_profile.php?error=invalid_email");
        exit();
    }

    if (passwordCheck($password, $password) !== false) {
        header("location: ../sign_up.php?error=password_unacceptable");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $result = fetchUserFromId($conn, $_SESSION['user_id']);

    if(count($result) == 1){
        $row = $result->fetch_array();
        $password_in_db = $row['password'];
    }

    if(!password_verify($password, $password_in_db)){
        header("location: ../edit_profile.php?error=incorrect_password");
        exit();
    }

    updateUser($conn, $first_name, $last_name, $email, $username, $_SESSION['user_id']);

}

if (isset($_POST['chg_acc_type'])){
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
    updateAccType($conn, $acc_type, $_SESSION['user_id']);

}

$user = fetchUserFromId($conn, $_SESSION['user_id'])->fetch_assoc();


