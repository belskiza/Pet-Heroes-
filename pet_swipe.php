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
    <script type="text/javascript">
        $(document).keydown(function(e) {
            if (e.keyCode === 37) {
                // Next
                $(".carousel-control.right").click();
                return false;
            }

            if (e.keyCode === 39) {
                // Next
                $(".carousel-control.right").click();
                return false;
            }
        })
        ;
    </script>
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
        .carousel {
            margin-top: 2.5%;
            width: 65%;
            margin-left: 17.5%;
        }

        .carousel-inner  .item  img {
            height:640px;
            margin:auto;
        }

        .carousel-caption {
            top: 0;
            bottom: auto;

        }
        .carousel-caption h3 {
            font-size: 4rem;
        }

    </style>
    <?php include_once 'header.php'?>
</head>
<body>
<!-- swipe start -->

<div class="container-fluid text-center">
<!-- swipe end -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="Files/pet%20recommendation%201.jpg" class="image-fluid" >
                <div class="carousel-caption">
                    <h3>Oreo</h3>
                    <p>LA is always so much fun!</p>
                </div>
            </div>

            <div class="item">
                <img src="Files/cute%20cat%203.jpg" alt="New york" class="image-fluid">
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
</div>
</body>
</html>