<?php require_once 'header.php';
require_once 'additional/swipe.inc.php';?>


<head>
    <link rel="stylesheet" href="css/flickity.css" media="screen">
    <script src="css/flickity.pkgd.min.js"></script>

    <style>

        .animation{

            animation: 1s ease-out 0s 1 slideInFromLeft;


        }

        @keyframes slideInFromLeft {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(0);
            }
        }




        * { box-sizing: border-box; }

        body { font-family: sans-serif; }

        .carousel {
            background: #FAFAFA;
        }

        .carousel img {
            display: block;
            height: 400pt;
        }
        .container {
            font-family: Maku;
        }
        .row h5 {
            font-size: 2vw;
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
        .buttons {
            opacity: 0.9;
        }
        .buttons:hover{
            opacity: 1;
        }
        .button {
            background-color: #306844;
            color: white;
        }
        .button:hover {
            background-color: darkgreen;
        }
    </style>
    <title>Swipe</title>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
        })
    </script>
</head>

<body style="background-color: ghostwhite; font-family: Maku;">

<div class="animation" style="width: 65%;margin:auto;">
<?php $pet = $result[0];
if (count($pet) > 0){
$owner = fetchUserFromId($conn, $pet['user_id'])->fetch_assoc();?>
    <div class="container">
        <div class="content_img">
        <img src="files/Group%205.png" style="margin-left: 50%; margin-top: 1%; z-index: 99999; width: 3%; position: absolute;
        <?php if($pet['vaccinated'] == 1){
            echo 'width: 3%';
        } else { echo 'width: 0%';}?>"/>
            <div style="margin-right: 25%; background: #0038FF;"> Vaccinated </div>
        </div>
        <div class="content_img">
        <img src="files/Group%206.png" style="margin-left: 54%; margin-top: 1%; z-index: 99999; width: 3%; position: absolute;
        <?php if($pet['microchip'] == 1){
            echo 'width: 3%';
        } else { echo 'width: 0%';}?>"/>
            <div style="margin-right: 21%; background: #1BAD29;"> Microchipped </div>
        </div>
        <div class="content_img">
        <img src="files/Group%207.png" style="margin-left: 58%; margin-top: 1%; z-index: 99999; width: 3%; position: absolute;
        <?php if($pet['desexed'] == 1){
            echo 'width: 3%';
        } else { echo 'width: 0%';}?>"/>
            <div style="margin-right: 16%; background: #ED7200;"> Desexed </div>
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
        </div> <br/>
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
                        <a class="btn btn-secondary" href="list.php?edit=<?php echo $pet['pet_id'];?>" style="width: 100%; background-color: #306844">Edit Listing</a>
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
    <div class="container">
        <div class="row">
            <div class="col-sm text-right" style="background-color: transparent">
                <a href="additional/swipe.inc.php?swipe=left&id=<?php echo $pet['pet_id']?>"><img class="buttons" src="files/cross.png" style="width: 25%"> </a>
            </div>
            <div class="col-sm text-left" style="background-color: transparent">
                <a href="additional/swipe.inc.php?swipe=right&id=<?php echo $pet['pet_id']?>"><img class="buttons"src="files/Tick.png" style="width: 25%"></a>
            </div>
        </div>

    </div> <br/><br/>
</div>
</div>
</body>

<?php } else { ?>

    <div class="alert alert-secondary col-md-4" style="margin: 5% auto 13%; padding: 3%; background-color: whitesmoke; min-width: 400pt">
            <h1 class="display-6"> No New Pets </h1>
            <hr class="my-4">
            <h4> Wow! It looks like you have swiped your way through all of the pets. Check back later to see if there are any new listings. In the meantime you can check out
            all pets below</h4>
            <a href="all_pets.php" class="btn btn-success" style="font-size: 1.3vw;">All Pets</a>

    </div>



<?php } ?>

<?php include_once 'footer.php'?>