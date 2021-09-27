<?php

require_once 'header.php';
require_once 'additional/pet.inc.php';

?>
<head>
    <link rel="stylesheet" href="css/flickity.css" media="screen">
    <script src="css/flickity.pkgd.min.js"></script>

    <style>
        * { box-sizing: border-box; }

        body { font-family: sans-serif; }

        .carousel {
            background: #FAFAFA;
        }

        .carousel img {
            display: block;
            height: 400pt;
        }
        </style>

        </head>

<body>
<?php $pet = $result->fetch_assoc();?>
<div class="container" >
    <div class="row">
        <div class="col-sm-6">
            <h1><?php echo $pet['pet_name']?></h1>
        </div>
        <div class="col-sm-6">
            <div class="row" style="margin-top: 1%">
                <div class="col">

                </div>
                <?php if ($pet['user_id'] == $_SESSION['user_id']){ ?>
                    <div class="col">
                        <a class="btn btn-secondary" href="list.php?edit=<?php echo $pet['pet_id'];?>" style="width: 100%; background-color: #306844">Edit Listing</a>
                    </div> <?php
                } else {?>
                <div class="col">
                    <a class="btn btn-secondary" href="contact_owner.php?pet_id=<?php echo $pet['pet_id']?>" style="width: 100%; background-color: #306844">Contact Owner</a>
                </div> <?php }?>
            </div>
        </div>
    </div>
    <hr/>
</div>

<div class="container" style="margin:auto; padding-top: 1%; width: 80%">

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

    <div class="container row">
        <div class="col-sm-8">
            <div class="row">
                <div class="col">
                    <h5>Age: <?php echo $pet['age']?></h5>
                </div>
                <div class="col">
                    <h5>Breed: <?php echo $pet['breed']?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5>Size: <?php echo $pet['pet_size']?></h5>
                </div>
                <div class="col">
                    <h5>Sex: <?php if($pet['gender'] == 1){
                            echo "Female"; } else {
                            echo "Male";
                        }?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5>Location: <?php echo $pet['location']?></h5>
                </div>
                <div class="col">
                    <h5>Desexed: <?php if($pet['desexed'] == 1){
                            echo "Yes"; } else {
                            echo "No";
                        }?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5>Vaccinated: <?php if($pet['vaccinated'] == 1){
                            echo "Yes"; } else {
                            echo "No";
                        }?></h5>
                </div>
                <div class="col">
                    <h5>Microchipped: <?php if($pet['microchip'] == 1){
                            echo "Yes"; } else {
                            echo "No";
                        }?></h5>
                </div>
            </div>
        </div>
        <div class="col-sm" style="background-color: blue"> <h3> This is where we will put the google maps API</h3></div>

    </div> <br/>
    <div class="container row">
        <h5 class="col-lg-9"><b>Description:</b> <br/> <?php echo $pet['description']?></h5>
    </div>
</div>
</body>
