<!DOCTYPE html>
<html lang="en">
<?php include_once 'header.php'?>
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

    <style>

        .header h1 {
            font-size: 4vw;
            color: black;
            font-family: "Chelsea Market";
            margin-top: 5%;
        }
        .header img{
            margin-left: 55%;
            margin-top: 3%;
        }
        .container {
            margin-left: 2%;
        }
        .col-sm-6 {
            margin-top: 3%;
            margin-left: 3%;
        }
        .col-sm-6 h1 {
            font-size: 3vw;
            color: black;
            font-family: "Chelsea Market";
        }
        .col-sm-8 {
            margin-left: 3%;
        }
        .col-sm-8 p {
            font-size: 2vw;
            color: black;
            font-family: "Chelsea Market";
            margin-right: 20%;
        }
        .images{
            position: fixed;
            margin-left: 70%;
        }

    </style>
</head>

<body>



<div class="images">
    <img src="Files/image%202.png" style="width: 100%">
    <img src="Files/image%203.png" style="width: 100%">
</div>
<div class="container">
    <div class="row">
        <div class="col-sm header">
            <h1>Welcome !</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h1>For Adopters</h1>
        </div>
        <div class="col-sm-8">
            <hr style="height:5px; width:80%; color:#BCE76D; background-color:#BCE76D; opacity: 100%">



            <p>Pet Heroes wants to match you with your perfect pet and create families. Find your new best furry-friend today!</p>





        </div>

    </div>
    <div class="row">
        <div class="col-sm-6">
            <h1>For Re-homers</h1>
        </div>
        <div class="col-sm-8">
            <hr style="height:5px; width:80%; color:#BCE76D; background-color:#BCE76D; opacity: 100%">
            <p>Found a stray or needing to rehome your pet for any reason? Look no further! We will match your pet to the most suitable adopter and find them the forever home they deserve.</p>
        </div>
    </div>
</div>

</body>