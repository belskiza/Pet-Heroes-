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

    <style>
        .col-sm-4 h1 {
            font-size: 7vw;
            color: #FDE9AA;
            font-family: "Chelsea Market";
            margin-left: -20%;
        }
        .container {
            margin-top: 30%;
        }

    </style>
</head>

<body>
<?php include_once 'header.php'?>
<img src="Files/image%208.png" style="position: fixed;  width: 105%; margin-top: 5%;">
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h1>Welcome</h1>
        </div>
    </div>
</div>

</body>