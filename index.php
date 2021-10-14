<!DOCTYPE html>
<html lang="en">
<head>

    <title>Pet Heroes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/additional/parallax/parallax.js"></script>

    <style>
        .container {
            width: 100%;
            position: relative;

        }

        .parallax-window {
            background: transparent;
            height: 100em;
        }

        .text {
            padding-top: 20pt;
            padding-bottom: 20pt
        }

        .header {
            z-index: 2;
            position: relative;
            color: #1a1e21;
            margin-left: 60%;
            width: 40%;
        }

        #index_card:hover{
            width: 30rem;
            height: 40rem;
        }

    </style>
</head>

<body style="background-color: ghostwhite">
<?php include_once 'header.php'?>
<?php include_once 'additional/allpets.inc.php'?>
<div class="container-fluid">

    <div class="parallax-window" data-parallax="scroll" data-image-src="files/landing_image_1.jpeg" data-z-index="1" data-position="0 -70">
        <img class="header" id="box" src="files/logo_black.png"/>
    </div>

    <div class="container text">
        <h1 class="modal-title">
            <b>What are we? </b> <hr/>
        </h1>git
        <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac tristique diam. Ut id auctor magna,
            nec blandit nunc. Phasellus faucibus interdum purus, eget auctor nulla bibendum lacinia. Sed lobortis sagittis urna a tempor.
            Morbi et nunc sit amet odio malesuada sollicitudin. Integer fermentum a massa eget finibus. Proin non facilisis ante.
            Sed dictum augue elementum, malesuada purus sit amet, consectetur tortor. Morbi consequat diam ex, in faucibus tellus
            iaculis sit amet. Curabitur cursus eu ligula a tempus. Phasellus sit amet finibus sapien. Suspendisse laoreet, urna a
            interdum molestie, odio nibh lobortis ante, ac ullamcorper elit eros sed ipsum. Aenean varius magna diam, in aliquet
            purus dapibus et. Suspendisse id iaculis sapien. Curabitur pretium scelerisque magna a luctus. Donec id imperdiet ipsum,
            non condimentum est. </h1>
    </div>

    <div class="parallax-window" data-parallax="scroll" data-image-src="files/landing_image_2.jpeg" data-z-index="1" data-position="0 -200"></div>

    <div class="container text">
        <h1 class="modal-title">
            <b>Our Goal? </b> <hr/>
        </h1>
        <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac tristique diam. Ut id auctor magna,
            nec blandit nunc. Phasellus faucibus interdum purus, eget auctor nulla bibendum lacinia. Sed lobortis sagittis urna a tempor.
            Morbi et nunc sit amet odio malesuada sollicitudin. Integer fermentum a massa eget finibus. Proin non facilisis ante.
            Sed dictum augue elementum, malesuada purus sit amet, consectetur tortor. Morbi consequat diam ex, in faucibus tellus
            iaculis sit amet. Curabitur cursus eu ligula a tempus. Phasellus sit amet finibus sapien. Suspendisse laoreet, urna a
            interdum molestie, odio nibh lobortis ante, ac ullamcorper elit eros sed ipsum. Aenean varius magna diam, in aliquet
            purus dapibus et. Suspendisse id iaculis sapien. Curabitur pretium scelerisque magna a luctus. Donec id imperdiet ipsum,
            non condimentum est. </h1>
    </div>

    <div class="parallax-window" data-parallax="scroll" data-image-src="files/landing_image_3.jpeg" data-z-index="1" data-position="0 -200"></div>

    <div class="container text">
        <h1 class="modal-title">
            <b>See Our Latest Listings</b> <hr/>
        </h1>
    </div>
    <div class="container">
        <div class="row">
            <?php while ($row = $someResult->fetch_assoc()){?>
                <div class="col">

                    <div class="card" style="width: 25rem; height: 34rem" id="index_card">
                        <img style="object-fit: cover; width: 25rem; height: 22rem" src="uploads/<?php echo $row['picture_destination']?>">
                        <div class="card-body text-center">
                            <h1 class="card-title"><?php echo $row['pet_name']?></h1>
                            <div class="container-fluid">
                                <a href="pet.php?pet=<?php echo $row['pet_id'];?>" class="btn btn-lg  btn-secondary" style="width: 100%; background-color: #306844">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } ?>
        </div>
    </div>





</div>
</body>
<?php include_once 'footer.php'?>