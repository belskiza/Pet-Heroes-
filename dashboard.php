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

    <style>

        /* Set black background color, white text and some padding */
        footer {
            background-color: limegreen;
            color: white;
            padding: 5px;
            position: fixed;
            bottom: 0;
            width: 100%;

        }

        .display-6{
            color: limegreen;
        }
        .col-sm-6{
            margin-bottom: 2%;
        }
        .btn-success{
            padding-left: 30%;
            padding-right: 30%;
        }
        .move-left{
            margin-left: 10%;
        }



    </style>
    <a href="index.php"><h1 class="display-6">Pet Heroes</h1></a>
</head>
<body>
<div class="container-fluid">
    <div class="row move-left">
        <div class="col-sm-6">
            <a href="dashboard.php" class="btn-success btn-lg">
                Matched Pets
            </a>
        </div>
        <div class="col-sm-6">
            <a href="dashboard.php" class="btn-success btn-lg">
                Liked Pets
            </a>
        </div>
    </div>

</div>
<div class="container-fluid bg-3 text-center">
    <div class="row">
        <div class="col-sm-4">
            <img src="Files/cute%20cat%203.jpg" class="img-responsive margin" style="width:100%" alt="Image">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="col-sm-4">
            <img src="Files/cute%20cat%203.jpg" class="img-responsive margin" style="width:100%" alt="Image">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="col-sm-4">
            <img src="Files/cute%20cat%203.jpg" class="img-responsive margin" style="width:100%" alt="Image">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <img src="Files/cute%20cat%203.jpg" class="img-responsive margin" style="width:100%" alt="Image">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="col-sm-4">
            <img src="Files/cute%20cat%203.jpg" class="img-responsive margin" style="width:100%" alt="Image">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="col-sm-4">
            <img src="Files/cute%20cat%203.jpg" class="img-responsive margin" style="width:100%" alt="Image">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>
</div>

<footer class="container-fluid text-center fixed-bottom">
    <p>Footer Text</p>
</footer>

</body>
</html>




