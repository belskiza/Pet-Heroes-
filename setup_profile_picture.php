<html>

<?php include_once 'header.php'?>

<style>
    .down-three {
        margin-bottom: 3cm;
    }
</style>

<p class='down-three'>
</p>

<head>
    <title>Profile Picture</title>
</head>
<body>

<script src="./dropzone.js"></script>
<link rel="stylesheet" href="./css/dropzone.css">


</p>
<form action="additional/profile_pic.inc.php" method="POST" enctype="multipart/form-data">
    <div class="container">
        <h1>
            Upload Profile Picture
        </h1>
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
        <div class="row mb-3">
            <div class="input-group col">
                <span class="input-group-text">Profile Photo</span>
                <input type="file" name="picture" class="form-control" id="profilePicture" placeholder="Upload Picture...">
            </div>
        </div>
        <button class="btn btn-secondary" type="submit" style="width: 100%; background-color: #306844" name="submit">Submit</button>
    </div>
</form>
</body>

<html>