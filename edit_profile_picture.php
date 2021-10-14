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
<form action="additional/update_profile_pic.inc.php" method="POST" enctype="multipart/form-data">
    <div class="container">
        <h1>
            Edit Profile Picture
        </h1>
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