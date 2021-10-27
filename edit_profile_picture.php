<!--
This page is the edit profile picture page. It allows the user to change their profile picture with the one they desire.
-->
<html>

<?php include_once 'header.php'?>

<style>
    .down-three {
        margin-bottom: 3cm;
    }
</style>

<head>
    <title>Profile Picture</title>
</head>
<body>

<script src="./dropzone.js"></script>
<link rel="stylesheet" href="./css/dropzone.css">


</p>
<div class="alert alert-secondary" style="margin:auto; margin-top: 1%; padding: 3%; background-color: whitesmoke; width: 65%;">
<form action="additional/update_profile_pic.inc.php" method="POST" enctype="multipart/form-data">
    <div class="container">
        <h1>
            Edit Profile Picture
        </h1>
            <div class="card" style="width: 100%; height: 90%;">
                <div style="width: 100%; height: 100%; margin-left: 10%; margin-top: 10%">
                    <img src="uploads/<?php if(isset($pfp['destination'])){
                        echo $pfp['destination'];
                    } else {
                        echo 'profile_picture.png';
                    }?>" alt="Card image cap" style="width: 80%; height: 80%; object-fit: cover; "/>
                </div>

        <?php
                if (isset($_GET["error"])) {
                    echo "<div class='mb-3'>";
                    if ($_GET["error"] == "invalid_file_type") {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">That file type is invalid</div>";
                    }
                    else if ($_GET["error"] == "uploading_file") {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">Unexpected error uploading file. Please try again</div>";
                    }
                    else if ($_GET["error"] == "file_too_big") {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">That file is too big. Please upload a smaller file</div>";
                    }
                    echo "</div>";
                }
        ?>
            </div>
        <div class="row mb-3" style="margin-top: 5%">
            <div class="input-group col">
                <span class="input-group-text">Profile Photo</span>
                <input type="file" name="picture" class="form-control" id="profilePicture" placeholder="Upload Picture...">
            </div>
        </div>
        <div class = "row">
            <div class = "col">
                <a class="btn btn-danger" href="<?php echo 'account.php'?>" style="width: 100%" >Go Back </a>
            </div>
            <div class = "col">
                <button class="btn btn-secondary" type="submit" style="width: 100%; background-color: #306844" name="submit">Submit</button>
            </div>
        </div>


</form>
</div>
</body>

<html>

