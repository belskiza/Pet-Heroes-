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


        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}


        /* Set black background color, white text and some padding */
        footer {
            background-color: limegreen;
            color: white;
            padding: 10px;
            width: 100%;
            position: fixed;
            bottom: 0;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .row.content {height:auto;}
        }
        .carousel{
            width: 40%;
            margin-left: 30%;
            margin-bottom: 2%;
        }

        .move-down{
            padding-top: 3%;
        }
        .move {
            margin-top: 2%;
        }

    </style>
    <?php include_once 'header.php'?>
</head>
<body>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2">

        </div>

        <div class="col-sm-12 move-down">
            <h1>Welcome <?php echo $_SESSION['first_name']?></h1>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="move">New Pets!</h2>
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="Files/cute%20cat%203.jpg" class="image-fluid" alt="Los Angeles" style="width:100%;">
                                    <div class="carousel-caption">
                                        <h3>Los Angeles</h3>
                                        <p>LA is always so much fun!</p>
                                    </div>
                                </div>

                                <div class="item">
                                    <img src="" alt="New york" style="width:70%;">
                                </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <a href='pet_swipe.php' class="btn btn-success btn-lg">
                            Start Matching
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>

</body>
</html>


