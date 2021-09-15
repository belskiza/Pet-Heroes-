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
    <title>Profile</title>
</head>
<body>


<h2> Profile Picture </h2>
<?php 
if (empty($_FILES['file']['files/profilePicture.png'])) {
    echo "<img src=\"files/profilePicture.png\" class=\"image-fluid\" style=\"width:300;\">";
} else {
    echo "<img src=\"files/default.png\" class=\"image-fluid\" style=\"width:300;\">";
}
?>
<div class="col-md-6" style="background-color: whitesmoke; margin: auto; height: 100%; padding: 20pt;" >
    <h4 class = "display-6">Welcome <?php echo $_SESSION['first_name']?>!</h4>
    <p class="lead">
        Your account is not fully set up. Please follow the below steps to set up your account.
    </p>
    <div class="progress">
        <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar"
             aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 30%"></div>
    </div> <br/>
    <div class="mb-3">
        <div class="row g-3">
            <div class="card col">
                <h5 class="card-header">Setup Preferences</h5>
                <div class="card-body">
                    <p class="card-text">Answer a few simple questions to understand your preferences</p>
                    <a href="setup_preferences_home.php" class="btn btn-primary">Preferences</a>
                </div>
            </div>
            <div class="card col">
                <h5 class="card-header">Verify Email</h5>
                <div class="card-body">
                    <p class="card-text">Verify your email</p>
                    <a href="verify_email.php" class="btn btn-primary">Send Email</a>
                </div>
            </div>
            <div class="card col">
                <h5 class="card-header">Set Profile Picture</h5>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">Upload a profile picture</p>
                    <a href="setup_profile_picture.php" class="btn btn-primary">Profile Picture</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

