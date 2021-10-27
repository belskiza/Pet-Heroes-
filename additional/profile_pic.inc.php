<?php

require_once'dbh.inc.php';
require_once'functions.inc.php';
session_start();

if (isset($_POST["submit"])) {

    $allowed = array('jpg', 'jpeg', 'png');

    // Picture 1 variables
    $picture = $_FILES['picture'];
    $fileName = $_FILES['picture']['name'];
    $fileTmpName = $_FILES['picture']['tmp_name'];
    $fileSize = $_FILES['picture']['size'];
    $fileError = $_FILES['picture']['error'];
    $fileType = $_FILES['picture']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0){
            if ($fileSize < 100000000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                header("location: ../setup_profile_picture.php?error=file_too_big");
                exit();
            }
        } else {
            header("location: ../setup_profile_picture.php?error=uploading_file");
            exit();
        }
    } else {
        header("location: ../setup_profile_picture.php?error=invalid_file_type");
        exit();
    }

uploadProfilePic($conn, $fileNameNew, $_SESSION['user_id']);
}
$profile_pic = fetchProfilePicById($conn, $_SESSION['user_id'])->fetch_assoc();

