<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once 'additional/dbh.inc.php';
    session_start();
    ?>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once 'header.php'?>
    <?php require_once 'additional/mypets.inc.php'?>
    <?php require_once 'additional/profile_pic.inc.php'?>
    <?php include_once 'sidebar.php'?>

    <style>

        .images{
            position: fixed;
            margin-left: 75%;
            margin-top: 1%;
        }

        .boxhead a {
            color: black;
            text-decoration: none;
        }


        h1 {
            font-family: "Chelsea Market";
            font-size: 2.8vw;
        }

        .card-header {
            background-color: #BCE76D;
            font-family: 'Chelsea Market';
            font-size: 1.2vw;
        }

        h5 {
            font-family: Maku;
            font-size: 1.6vw;
        }
        .btn-success {
            font-family: 'Chelsea Market';
            background-color: #8ab555; border-color: #8ab555
        }
        .btn-success:hover {
            background-color: #547a26;
            border-color: #547a26;
        }

    </style>
    <script>
        sessionStorage.clear();
    </script>
</head>

<body style="background-color: ghostwhite;">

<div class="container" style="margin-top: 2%; margin-left: 20%">
    <?php
    if (isset($_GET["message"])) {
        if ($_GET["message"] == "list_success") {
            echo "<div class=\"alert alert-success\" role=\"alert\">Pet Sucessfully Listed!
                    </div>";
        } else if ($_GET["message"] == "edit_profile_success") {
            echo "<div class=\"alert alert-success\" role=\"alert\">Profile Sucessfully Updated
                    </div>";
        }
    }
    ?>

    <h1 style="position: fixed;
            left: 2%;">My Account</h1>
    <h1 style="margin-left: 70%">Welcome, <?php echo $_SESSION['first_name']?></h1>
    <div class="row">
        <div class="col-sm-6" style="margin-left: 0">
        </div>
    </div>
    <div class="row">
        <div class="col" style="margin-left: 81%">
            Account Type: <?php if ($_SESSION['acc_type'] == 0) echo "Adopter"; else echo "Owner";?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
                <div class="card" style="width: 100%">
                    <div class="card-header">
                        Personality Profile
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Complete your personality quiz to find pets compatible with you!</h5>
                        <a class="btn btn-success" href="setup_preferences1.php">Take Quiz</a>
                    </div>
                </div><br/>
        </div>
        <div class="col-sm-6">
                <div class="card" style="width: 100%">
                    <div class="card-header">
                        About me
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Complete your personality quiz to find pets compatible with you!</h5>
                        <a class="btn btn-success" href="about_me.php" >About Me</a>
                    </div>
                </div><br/>
        </div>
        <div class="col-sm-6">
                <div class="card" style="width: 100%">
                    <div class="card-header">
                        Verify email
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Verify your email to start matching!</h5>
                        <a class="btn btn-success" href="verify_email.php" >Verify Email</a>
                    </div>
                </div>
        </div>
        <div class="col-sm-6">
            <div class="card" style="width: 100%;">
                <div style="width: 400pt; height: 400pt;">
                    <img src="uploads/<?php echo $pfp['destination'];?>" alt="Card image cap" style="width: 400pt; height: 400pt; object-fit: cover; "/>
                </div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col">
                            <?php if ($pfp['destination'] == null) { ?>
                                <a class="btn btn-success text-right" href="setup_profile_picture.php">Upload Profile Picture</a>
                            <?php  } else { ?>
                                <a class="btn btn-success text-right" href="edit_profile_picture.php">Edit Profile Picture</a>
                            <?php } ?>
                        </div>
                        <div class="col">
                            <a class="btn btn-success text-left" href="chg_acc_type.php">Change Account Type</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
    </div>

    <?php
    if (isset($_GET["message"])) {
        echo "<div class='container-fluid' style=\"width:90%; margin-top: 1%\">";
        if ($_GET["message"] == "delete_success") {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Pet Sucessfully Delisted!
                    </div>";
        } else if ($_GET["message"] == "list_success") {
            echo "<div class=\"alert alert-success\" role=\"alert\">Pet Sucessfully Listed!
                    </div>";
        } else if ($_GET["message"] == "update_success") {
            echo "<div class=\"alert alert-info\" role=\"alert\">Pet Sucessfully Updated!
                    </div>";
        }
        echo "</div>";
    }
    ?>
    <?php if ($_SESSION['acc_type'] == 1){?>
        <div class="container-fluid">
            <h1>My Pets</h1> <br/>
            <table class="table table-striped table-hover">
                <thead style="background-color: #182c25; color: white">
                <tr>
                    <th>Image</th>
                    <th>Name </th>
                    <th>Breed</th>
                    <th>Age</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
                </thead>

                <?php while ($row = $result->fetch_assoc()){?>
                    <tr>
                        <td><img src="uploads/<?php echo $row['picture_destination']?>" style="max-width: 150px"/></td>
                        <td><b><?php echo $row['pet_name']?></b></td>
                        <td><?php echo $row['breed']?></td>
                        <td><?php echo $row['age']?></td>
                        <td><?php echo $row['location']?></td>
                        <td>
                            <a href="pet.php?pet=<?php echo $row['pet_id'];?>" class="btn btn-secondary" style="background-color: #455b55">View</a>
                            <?php if ($row['user_id'] == $_SESSION['user_id']){
                                ?>
                                <a href="list.php?edit=<?php echo $row['pet_id'];?>" class="btn btn-secondary" style="background-color: #306844">Edit</a>
                                <a href="additional/list.inc.php?delete=<?php echo $row['pet_id']; ?>" class="btn btn-danger">Delist</a>
                                <?php
                            } else {
                                echo null;
                            } ?>
                        </td>
                    </tr> <?php
                } ?>
            </table>
        </div>
    <?php } else { ?>

    <?php } ?>
</body>