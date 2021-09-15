<head>
    <?php
    require_once 'header.php';
    require_once 'additional/allpets.inc.php'
    ?>

</head>

<body>
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
<div class="container-fluid" style="width:90%; margin-top: 1%">
    <table class="table table-striped table-hover">
        <thead style="background-color: #343a40; color: white">
        <tr>
            <th>Name </th>
            <th>Breed</th>
            <th>Age</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
        </thead>

        <?php while ($row = $result->fetch_assoc()){?>
        <tr>
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



