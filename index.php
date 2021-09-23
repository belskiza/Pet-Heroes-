<?php
include_once 'additional/dbh.inc.php';
include_once 'additional/config.php';
?>
<html>
<head>
    <title>Pet Heroes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js'></script>
</head>

<body style="background-color: whitesmoke">
<?php include_once 'header.php'?>
<br/>
<?php
if (isset($_GET["message"])) {
    echo "<div class='mb-3'>";
    if ($_GET["message"] == "logout") {
        echo "<div class=\"alert alert-success col-md-5\" role=\"alert\">You are now logged out
                    </div>";
    }
    if ($_GET["message"] == "login") {
        echo "<div class=\"alert alert-success col-md-5\" role=\"alert\">You are now logged in
                    </div>";
    }
    echo "</div>";
}
?>
<br/>
<?php if (isset($_SESSION['acc_type']) && $_SESSION['acc_type'] == 0){
    echo "<h1>Account Type: Adopter</h1>";
} else if (isset($_SESSION['acc_type']) && $_SESSION['acc_type'] == 1){
     echo "<h1>Account Type: Owner</h1>";
} ?>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="..." alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="..." alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="..." alt="Third slide">
        </div>
    </div>
</div>
</body>

</html>