<?php
session_start();

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

$pet_id = 0;
$name = '';
$location = '';
$age = '';
$breed = '';


if (isset($_POST['submit'])){
    $name = $_POST['pet_name'];
    $location = $_POST['location'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $user_id = $_SESSION['user_id'];

    $picture = $_FILES['picture'];
    $fileName = $_FILES['picture']['name'];
    $fileTmpName = $_FILES['picture']['tmp_name'];
    $fileSize = $_FILES['picture']['size'];
    $fileError = $_FILES['picture']['error'];
    $fileType = $_FILES['picture']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0){
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                header("location: ../list.php?error=file_too_big");
                exit();
            }
        } else {
            header("location: ../list.php?error=uploading_file");
            exit();
        }
    } else {
        header("location: ../list.php?error=invalid_file_type");
        exit();
    }

    listPet($conn, $name, $location, $breed, $age, $user_id, $fileNameNew);
}

if (isset($_GET['delete'])){
    $id_to_delete = $_GET['delete'];
    deletePet($conn, $id_to_delete);
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = fetchPetFromId($conn, $id);

    if(count($result) == 1){
        $row = $result->fetch_array();
        $name = $row['pet_name'];
        $location = $row['location'];
        $breed = $row['breed'];
        $age = $row['age'];
    }
}

if (isset($_POST['update'])){
    $pet_id = $_POST ['pet_id'];
    $name = $_POST['pet_name'];
    $location = $_POST['location'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];

    updatePet($conn, $pet_id, $name, $location, $breed, $age);
}


