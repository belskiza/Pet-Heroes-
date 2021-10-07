<?php require_once 'header.php';
require_once 'additional/swipe.inc.php';?>

<head>
    <link rel="stylesheet" href="css/flickity.css" media="screen">
    <script src="css/flickity.pkgd.min.js"></script>

    <style>

        .animation{

            animation: 1s ease-out 0s 1 slideInFromLeft;
            background-color: ghostwhite;


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

        body { font-family: sans-serif;}

        .carousel {
            background: #FAFAFA;
        }

        .carousel img {
            display: block;
            height: 400pt;
        }
    </style>
    <title>Swipe</title>

</head>

<body style="background-color: ghostwhite">

<div class="animation" >
<?php $pet = $result[0];
if (count($pet) > 0){?>
<div class="container" style="background-color: ghostwhite">
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

    <div class="container">
        <div class="row">
            <div class="col-sm text-right" style="background-color: transparent">
                <a class="btn btn-lg btn-danger" href="additional/swipe.inc.php?swipe=left&id=<?php echo $pet['pet_id']?>"> Swipe Left</a>
            </div>
            <div class="col-sm text-left" style="background-color: transparent">
                <a class="btn btn-lg btn-success" href="additional/swipe.inc.php?swipe=right&id=<?php echo $pet['pet_id']?>">Swipe Right</a>
            </div>
        </div>

    </div> <br/><br/>

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
            <div class="row">
                <div class="col">
                    <a class="btn btn-lg btn-info" target="_blank" href=" http://maps.google.com/?q=<?php echo $pet['lat']?>,<?php echo $pet['lon']?>">Find Location</a>

                </div>

            </div>
        </div>



        <br>


    </div> <br/>
    <div class="container row">
        <h5 class="col-lg-9"><b>Description:</b> <br/> <?php echo $pet['description']?></h5>
    </div>
</div>
</div>
</body>

<?php } else { ?>

    <div class="alert alert-secondary col-md-4" style="margin:auto; margin-top: 2%; padding: 3%; background-color: whitesmoke; min-width: 400pt">
            <h1 class="display-6"> No New Pets </h1>
            <hr class="my-4">
            <h4> Wow! It looks like you have swiped your way through all of the pets. Check back later to see if there are any new listings. In the meantime you can check out
            all pets below</h4>
            <a href="all_pets.php" class="btn btn-success">All Pets</a>

    </div>



<?php } ?>
<?php include_once 'footer.php'?>
