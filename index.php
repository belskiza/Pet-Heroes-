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
            width: 103.2%;
            margin-left: -2%;
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
        /*.parallax-window {*/
        /*    width: 1450px;*/
        /*    margin-left: -2%;*/
        /*}*/

        .button {
            background-color: #306844;
            color: white;
        }
        .button:hover {
            background-color: darkgreen;
            color: white;
        }
    </style>
</head>
<body style="background-color: ghostwhite; font-family: Maku;">
<?php include_once 'header.php'?>
<?php include_once 'additional/allpets.inc.php'?>
<div class="container-fluid" style="margin-top: -5%;">

    <div class="parallax-window" data-parallax="scroll" data-image-src="files/landing_image_1.jpeg" data-z-index="1" data-position="0 -70">
        <img class="header" id="box" src="files/logo_black.png"/>
    </div>

    <div class="container text">
        <h1 class="modal-title">
            <b>What are we? </b> <hr/>
        </h1>
        <h1>We are Pet Heroes! Started by a group of university friends, Pet Heroes wants to help stray pets, abandoned pets, and any pet seeking a home find a home. A forever home. So we aim to match ‘Re-homers’ with prospective adopters so that we can reduce, and hopefully one day, eradicate the issue of un-homed pets. We also hope to relieve the stress of both adopters making sure that their pet has an ideal and safe home, and the stress of adoptees making sure they have found the right fit for their family.  </h1>
    </div>

    <div class="parallax-window" data-parallax="scroll" data-image-src="files/landing_image_2.jpeg" data-z-index="1" data-position="0 -200"></div>

    <div class="container text">
        <h1 class="modal-title">
            <b>Our Goal? </b> <hr/>
        </h1>
        <h1>Our goal is to reduce the amount of animals killed due to over whelmed shelters by 20% by the year 2025. Every year in Australia animals with so much love and potential are needlessly euthanised due to shelters across the country being overrun, overfilled and understaffed. They need our help! So we hope that by streamlining the adoption process we can reduce the amount of pets needing a home and stop preventable euthanasia. There is also an economic benefit in reducing the amount of stray animals, animal shelters would have a lesser burden and council’s would not have to spend as much time to rescue stray animals. Online partner matching services have had such great success, so why not meet the new love of your life today with Pet Heroes. Because they are more than pets. They are family. </h1>
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
                                <a href="pet.php?pet=<?php echo $row['pet_id'];?>" class="btn btn-lg  button" style="width: 100%; font-size: 1vw">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } ?>
        </div>
    </div>





</div>
<?php include_once 'footer.php'?>
</body>
