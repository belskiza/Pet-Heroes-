<!DOCTYPE html>
<html lang="en">
<head>

    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js'></script>

    <style>
        .row h1 {
            font-size: 2vw;
            font-family: "Chelsea Market";
            margin-top: 2%;

        }


        .col-sm .btn{
            background: lightgray;
            border-color:lightgray;
            font-size: 1.3vw;
            border-width: 5px;
            font-family: "Chelsea Market";
            color: black;

        }
        .btn:hover{
            background-color: #BCE76D;
            border-color: #BCE76D;
        }
        .btn:focus{
            background-color: yellowgreen;
            border-color: yellowgreen;
        }

    </style>
</head>

<body>
<?php include_once 'header.php'?>
<div class="container">
    <div class="row text-center">
            <h1>Make a post!</h1>
    </div>
    <div class="row text-center" style="margin-top: 2%;">
        <div class="col-sm">
            <h1 style="margin-left: 50%;">Upload a photo:</h1>
        </div>
        <div class="col-sm">
            <button type="button" class="btn  rounded-pill" style="width: 60%; margin-top: 2%;">Choose photo from device</button>
        </div>
        <div class="col-sm">
            <button type="button" class="btn rounded-pill" style="width: 50%; margin-top: 2%; margin-left: -35%;">Take a photo</button>
        </div>

    </div>
</div>

</body>