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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js'></script>
    <?php include_once 'header.php'?>

    <style>

        .header h1 {
            font-size: 3vw;
            color: black;
            font-family: "Chelsea Market";
            margin-top: 10%;
        }
        .header img{
            margin-left: 55%;
            margin-top: 3%;
        }
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

        .btn{
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
<div class="images">
    <img src="Files/image%202.png" style="width: 80%">
    <button type="button" class="btn rounded-pill" style="width: 50%; margin-top: 2%; margin-left: 15%;">Edit Profile</button>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm header">
            <h1>Hi <?php echo $_SESSION['first_name']?> <?php echo $_SESSION['first_name']?></h1>
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

</body>