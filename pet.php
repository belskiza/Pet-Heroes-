<?php

require_once 'header.php';
require_once 'additional/pet.inc.php';


?>
<head>
    <link rel="stylesheet" href="css/flickity.css" media="screen">
    <script src="css/flickity.pkgd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <style>
        * { box-sizing: border-box; }

        body { font-family: sans-serif; }

        .carousel {
            background: #FAFAFA;
        }

        .animation{



        }
        .container {
            font-family: Maku;
        }


        .carousel img {
            display: block;
            height: 400pt;
        }
        .content_img div{
            position: absolute;
            right: 0;
            margin-top: 5%;
            z-index: 99999;
            color: white;
            margin-bottom: 5px;
            font-family: sans-serif;
            opacity: 0;
            visibility: hidden;
            -webkit-transition: visibility 0s, opacity 0.5s linear;
            transition: visibility 0s, opacity 0.5s linear;
            text-align: center;
        }

        /* Hover on Parent Container */
        .content_img:hover{
            cursor: pointer;
        }

        .content_img:hover div{
            width: 150px;
            padding: 8px 15px;
            visibility: visible;
            opacity: 0.8;
        }
        .row h5 {
            font-size: 2vw;
        }
        .button {
            background-color: #306844;
            color: white;
        }
        .button:hover {
            background-color: darkgreen;
        }
        </style>

        </head>

<body style="font-family: Maku;">
<div class="animation" style="margin-top: -5%; background-color: ghostwhite;">

<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
    })
</script>
<?php $pet = $result;?>

<div class="container" style="margin:auto; width: 80%">
    <div class="content_img">
        <img src="files/Group%205.png" style="margin-left: 64%; margin-top: 1%; z-index: 99999; width: 3%; position: absolute;
        <?php if($pet['vaccinated'] == 1){
            echo 'width: 3%';
        } else { echo 'width: 0%';}?>"/>
        <div style="margin-right: 17.5%; background: #0038FF;"> Vaccinated </div>
    </div>
    <div class="content_img">
        <img src="files/Group%206.png" style="margin-left: 68%; margin-top: 1%; z-index: 99999; width: 3%; position: absolute;
        <?php if($pet['microchip'] == 1){
            echo 'width: 3%';
        } else { echo 'width: 0%';}?>"/>
        <div style="margin-right: 14%; background: #1BAD29;"> Microchipped </div>
    </div>
    <div class="content_img">
        <img src="files/Group%207.png" style="margin-left: 72%; margin-top: 1%; z-index: 99999; width: 3%; position: absolute;
        <?php if($pet['desexed'] == 1){
            echo 'width: 3%';
        } else { echo 'width: 0%';}?>"/>
        <div style="margin-right: 10%; background: #ED7200;"> Desexed </div>
    </div>
    <div class="carousel"
         data-flickity='{ "freeScroll": true, "wrapAround": true, "autoPlay": true , "imagesLoaded": true }'>
        <img src="uploads/<?php echo $pet['picture_destination']?>"/>
        <?php if (isset($pet['picture_destination2'])){ ?>
            <img src="uploads/<?php echo $pet['picture_destination2']?>"/> <?php
        } ?>
        <?php if (isset($pet['picture_destination3'])){ ?>
            <img src="uploads/<?php echo $pet['picture_destination3']?>"/> <?php
        } ?>
        <?php if (isset($pet['picture_destination4'])){ ?>
            <img src="uploads/<?php echo $pet['picture_destination4']?>"/> <?php
        } ?>
    </div> <br/> <hr/>

</div>

    <div class="container" >
        <div class="row">
            <div class="col-sm-6">
                <h1 style="font-size: 3.5vw"><?php echo $pet['pet_name']?>, <?php echo $pet['age']?></h1>
                <h5>Sex: <?php if($pet['gender'] == 1){
                        echo "Female"; } else {
                        echo "Male";
                    }?></h5>
                <h5>Size: <?php echo $pet['pet_size']?></h5>
                <h5>Breed: <?php echo $pet['breed']?></h5>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col"></div>
                    <div class="col"></div>
                        <div class="col-1">
                        <img src="uploads/<?php if (isset($pfp['destination'])) echo $pfp['destination']; else echo 'profile_picture.png'?>"
                             style="width: 45px; height: 45px; object-fit: cover; border-radius: 50%"/>
                        </div>
                    <div class="col-5 text-center">
                        <h5 style="margin-top: 10px">  <?php echo $owner['first_name']." ".$owner['last_name'];?> </h5>
                    </div>
                </div>
                <div class="row" style="margin-top: 1%">
                    <div class="col">
                    </div>
                    <?php if ($pet['user_id'] == $_SESSION['user_id']){ ?>
                        <div class="col">
                            <a class="btn btn-lg btn-info" href="list.php?edit=<?php echo $pet['pet_id'];?>" style="width: 100%; background-color: #306844">Edit Listing</a>
                        </div> <?php
                    } else {?>
                        <div class="col">
                            <button type="button" class="btn button" data-toggle="modal" data-target="#exampleModal" style="width: 100%; font-size: 1.5vw;" >
                                Contact Owner
                            </button>
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Contact Owner</h5>
                                        <img src="uploads/<?php if (isset($pfp['destination'])) echo $pfp['destination']; else echo 'profile_picture.png'?>"
                                             style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%"/>

                                    </div>
                                    <div class="modal-body">
                                        <p>Owner Name: <?php echo $owner['first_name']." ".$owner['last_name'];?></p>
                                        <p>Owner Email: <?php echo $owner['email'];?></p>
                                        <p>Owner Number: <?php echo $owner['phone'];?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div> <?php }?>
                </div>
                <div class="row" style="margin-top: 1%">
                    <div class="col">

                    </div>
                    <div class="col">
                        <a class="btn btn-lg btn-info" style="width: 100%" href=" http://maps.google.com/?q=<?php echo $pet['lat']?>,<?php echo $pet['lon']?>">Find Location</a>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
    </div>
    <div class="container" style="border-top: solid; border-color:#e9e9e9;">
        <h5 style="font-size: 2vw;"><b>Description:</b> <br/> <?php echo $pet['description']?></h5>
    </div>
</div>
</div>
<?php include_once 'footer.php'?>
</body>

