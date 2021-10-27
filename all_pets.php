<!--
This page is the all pets page. It shows a table of all the pets currently listed. It contains information such as the
pets main image, name, age, breed, location and contains a view button so the user can view more.
-->
<head>
    <?php
    require_once 'header.php';
    require_once 'additional/allpets.inc.php';
    require_once 'additional/search.inc.php';
    ?>


    <style>
        tr td {
            font-size: 1.4vw
        }

        .button {
            background-color: #306844;
            border-color: #306844;
            color: white;
        }
        .button:hover {
            background-color: green;
            border-color: green;
            color: white;
        }

    </style>
</head>

<body style="background-color: ghostwhite;font-family: Maku;">
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
<div class="container-fluid" style="width:65%;  background-color: white;">

    <form class="form-inline" action="all_pets.php" method="get" style="padding-top: 1%; ">
        <?php if(isset($searchResult)){ ?>
            <div>
                <h1 > Search: </h1>
            </div>
        <?php } ?>
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" style="width: 90%; font-size: 1.4vw" value="<?php if(isset($_GET['search'])) echo $_GET['search'];?>">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="font-size: 1.4vw">Search</button>
    </form>
    <?php if(isset($searchResult)){ ?>
        <div>
            <p> <i>Showing search results for: </i> <b><?php echo $_GET['search'] ?></b></p>
                <a class="btn btn-danger" href="<?php echo 'all_pets.php'?>" style="width: 20%">Go Back </a>
        </div>
    <?php } ?>
    <table class="table table-striped table-hover">
        <thead style="background-color: #306844; color: white; font-size: 1.4vw">
        <tr>
            <th>Image</th>
            <th>Name </th>
            <th>Breed</th>
            <th>Age</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php if (isset($searchResult)){
            while ($row = $searchResult->fetch_assoc()){?>
                <tr>
                    <td><img src="uploads/<?php echo $row['picture_destination']?>" style="max-width: 150px"/></td>
                    <td><b><?php echo $row['pet_name']?></b></td>
                    <td><?php echo $row['breed']?></td>
                    <td><?php echo $row['age']?></td>
                    <td><?php echo $row['location']?></td>
                    <td>
                        <a href="pet.php?pet=<?php echo $row['pet_id'];?>" class="btn button">View</a>
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
            }
        } else {
            while ($row = $result->fetch_assoc()){?>
                <tr>
                    <td><img src="uploads/<?php echo $row['picture_destination']?>" style="max-width: 150px"/></td>
                    <td><b><?php echo $row['pet_name']?></b></td>
                    <td><?php echo $row['breed']?></td>
                    <td><?php echo $row['age']?></td>
                    <td><?php echo $row['location']?></td>
                    <td>
                        <a href="pet.php?pet=<?php echo $row['pet_id'];?>" class="btn button">View</a>
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
            }
        } ?>
    </table>
</div>
</body>
<?php require_once 'footer.php' ?>


