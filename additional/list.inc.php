<?php
session_start();

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

$pet_id = 0;
$name = '';
$location = '';
$age = '';
$breed = '';
$description = '';
$pet_type = '';
$pet_size = '';
$vaccinated = '';
$desexed = '';
$microchip = '';
$gender = '';
$colour = '';
$active = '';


if (isset($_POST['submit'])){
    $name = $_POST['pet_name'];
    $location = $_POST['location'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $user_id = $_SESSION['user_id'];
    $description = $_POST['description'];
    $pet_type = $_POST['pet_type'];
    $size = $_POST['size'];
    $vaccinated = $_POST['vaccinated'];
    $desexed = $_POST['desexed'];
    $microchip = $_POST['microchip'];
    $gender = $_POST['gender'];
    $colour = $_POST['colour'];
    $lat = $_POST["lat"];
    $lon = $_POST["lon"];
    $active = $_POST["active"];

    if(emptyInputList($name, $location, $breed, $age, $user_id, $description, $pet_type,
            $size, $vaccinated, $desexed, $microchip, $gender, $colour, $active) !== false) {
        header("location: ../list.php?error=empty_input");
        exit();
    }

    if(emptyLatLon($lat, $lon) != false) {
        header("location: ../list.php?error=no_lat_lon");
        exit();
    }

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

    // Picture 2
    if($_FILES['picture2']['name'] != ""){
        $picture2 = $_FILES['picture2'];
        $fileName2 = $_FILES['picture2']['name'];
        $fileTmpName2 = $_FILES['picture2']['tmp_name'];
        $fileSize2 = $_FILES['picture2']['size'];
        $fileError2 = $_FILES['picture2']['error'];
        $fileType2 = $_FILES['picture2']['type'];

        $fileExt2 = explode('.', $fileName2);
        $fileActualExt2 = strtolower(end($fileExt2));

        if (in_array($fileActualExt2, $allowed)) {
            if ($fileError2 === 0){
                if ($fileSize2 < 100000000000) {
                    $fileNameNew2 = uniqid('', true).".".$fileActualExt2;
                    $fileDestination2 = '../uploads/'.$fileNameNew2;
                    move_uploaded_file($fileTmpName2, $fileDestination2);
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
    }

    if($_FILES['picture3']['name'] != ""){
        $picture3 = $_FILES['picture3'];
        $fileName3 = $_FILES['picture3']['name'];
        $fileTmpName3 = $_FILES['picture3']['tmp_name'];
        $fileSize3 = $_FILES['picture3']['size'];
        $fileError3 = $_FILES['picture3']['error'];
        $fileType3 = $_FILES['picture3']['type'];

        $fileExt3 = explode('.', $fileName3);
        $fileActualExt3 = strtolower(end($fileExt3));

        if (in_array($fileActualExt3, $allowed)) {
            if ($fileError3 === 0){
                if ($fileSize3 < 100000000000) {
                    $fileNameNew3 = uniqid('', true).".".$fileActualExt3;
                    $fileDestination3 = '../uploads/'.$fileNameNew3;
                    move_uploaded_file($fileTmpName3, $fileDestination3);
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

    }

    if($_FILES['picture4']['name'] != ""){
        $picture4 = $_FILES['picture4'];
        $fileName4 = $_FILES['picture4']['name'];
        $fileTmpName4 = $_FILES['picture4']['tmp_name'];
        $fileSize4 = $_FILES['picture4']['size'];
        $fileError4 = $_FILES['picture4']['error'];
        $fileType4 = $_FILES['picture4']['type'];

        $fileExt4 = explode('.', $fileName4);
        $fileActualExt4 = strtolower(end($fileExt4));

        if (in_array($fileActualExt4, $allowed)) {
            if ($fileError4 === 0){
                if ($fileSize < 100000000000) {
                    $fileNameNew4 = uniqid('', true).".".$fileActualExt4;
                    $fileDestination4 = '../uploads/'.$fileNameNew4;
                    move_uploaded_file($fileTmpName4, $fileDestination4);
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
    }

    listPet($conn, $name, $location, $breed, $age, $user_id, $fileNameNew, $description,
    $pet_type, $size, $vaccinated, $desexed, $microchip, $fileNameNew2, $fileNameNew3, $fileNameNew4, $gender,
        $colour, $lat, $lon, $active);
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
        $description = $row['description'];
        $pet_type = $row['pet_type'];
        $pet_size = $row['pet_size'];
        $vaccinated = $row['vaccinated'];
        $desexed = $row['desexed'];
        $microchip = $row['microchip'];
        $active = $row['active'];
    }
}

if (isset($_POST['update'])){
    $pet_id = $_POST ['pet_id'];
    $name = $_POST['pet_name'];
    $location = $_POST['location'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $description = $_POST['description'];
    $pet_type = $_POST['pet_type'];
    $size = $_POST['size'];
    $vaccinated = $_POST['vaccinated'];
    $desexed = $_POST['desexed'];
    $microchip = $_POST['microchip'];
    $active = $_POST['active'];

    if(emptyInputList($name, $location, $breed, $age, $user_id, $description, $pet_type,
            $size, $vaccinated, $desexed, $microchip, $gender, $colour, $active) !== false) {
        header("location: ../list.php?error=empty_input");
        exit();
    }

    updatePet($conn, $pet_id, $name, $location, $breed, $age, $description, $pet_type, $size, $vaccinated, $desexed, $microchip, $active);
}


