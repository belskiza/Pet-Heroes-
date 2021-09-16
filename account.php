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

    <style>
        .container {
            margin-left: 2%;
        }
        .col-sm-6 {
            margin-top: 1%;
        }
        .col-sm-6 h1 {
            font-size: 2.5vw;
            color: black;
            font-family: "Chelsea Market";
            margin-top: 1%;
        }
        .col-sm-8 h1 {
            font-size: 2.5vw;
            color: black;
            font-family: "Chelsea Market";
            margin-top: 7%;
        }
        .col-sm-8 p {
            font-size: 2vw;
            color: black;
            font-family: "Chelsea Market";
        }
        .images{
            position: fixed;
            margin-left: 75%;
            margin-top: 9%;
        }

        .boxhead a {
            color: black;
            text-decoration: none;
        }

        .btn{
            background: #BCE76D;

            border-color:#BCE76D;
            width: 25%;
            font-size: 1.3vw;
            margin-left: 7%;
            border-width: 5px;
            font-family: "Chelsea Market";
        }
    </style>
</head>

<body style="background-color: whitesmoke">
<?php
if (isset($_GET["message"])) {
    echo "<div class='mb-3'>";
    if ($_GET["message"] == "list_success") {
        echo "<div class=\"alert alert-success\" role=\"alert\">Pet Sucessfully Listed!
                    </div>";
    }
    echo "</div>";
}
?>

<div class="images">
    <img src="Files/image%202.png" style="width: 80%">
    <a class="btn btn-primary" href="edit_profile.php?edit=<?php echo $_SESSION['user_id']?>" style="width: 50%; margin-top: 2%; margin-left: 15%;">Edit Profile</a>

    <button type="button" class="boxhead a btn rounded-pill" style="width: 50%; margin-top: 2%; margin-left: 15%;"><a href="/additional/logout.inc.php">Logout</a></button>

</div>
<div class="container">
    <div class="row">
        <div class="col-sm header">
            <h1>Hi <?php echo $_SESSION['first_name']?>,</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <h1>Personality Profile:</h1>
            <a type="button" class="btn rounded-pill" href='setup_preferences1.php'>Take Quiz</a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8">
            <h1>Preferences:</h1>
        </div>
        <div class="col-sm-8">
            <p>Pet Heroes wants to match you with your perfect pet and create families. Find your new best furry-friend today!</p>

        </div>

    </div>
    <div class="row">
        <div class="col-sm-8">
            <h1>About me:</h1>
        </div>

        <div class="col-sm-8">
            <p></p>
        </div>
    </div>
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
<div class="container-fluid">
    <h1>My Pets</h1>
    <table class="table table-striped table-hover">
        <thead style="background-color: #343a40; color: white">
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
                    <a href="pet.php?pet=<?php echo $row['pet_id'];?>" class="btn btn-secondary">View</a>
                    <?php if ($row['user_id'] == $_SESSION['user_id']){
                        ?>
                        <a href="list.php?edit=<?php echo $row['pet_id'];?>" class="btn btn-warning">Edit</a>
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

</body>