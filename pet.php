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
            background: #EEE;
        }

        .carousel-cell {
            width: 100%;
            height: 850px;
            margin-right: 20px;
            overflow: hidden;
        }

        .carousel-cell img {
            display: block;
            object-fit: cover;
            border-radius: 25px;
        }

        @media screen and ( min-width: 768px ) {
            .carousel-cell img {
                width: 100%;
                height: 100%;
            }
        }
    </style>
</head>

<body>
<?php $pet = $result->fetch_assoc();?>
<div class="container-fluid" style="margin:auto; padding-top: 1%; background-color: whitesmoke; width: 80%">
    <div style="position: absolute; width: 75%; margin-left: 2%; margin-top: 35%; z-index: 1; color: white; background-color: rgba(0, 0, 0, 0.4);height: 20%; border-radius: 25px; padding: 1%">
        <div class="row">
            <div class="col" style="margin-left: 5%;">
                <h1 style="font-family: 'Snell Roundhand, cursive'; font-size: 110px"> <?php echo $pet['pet_name'] ?></h1>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h2>Age: </h2>
                    </div>
                    <div class="col jus">
                        <h2 style="float: right"><?php echo $pet['age']?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>Breed: </h2>
                    </div>
                    <div class="col">
                        <h2 style="float: right"><?php echo $pet['breed']?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>Size: </h2>
                    </div>
                    <div class="col">
                        <h2 style="float: right"><?php echo $pet['pet_size']?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>Gender: </h2>
                    </div>
                    <div class="col">
                        <h2 style="float: right"><?php if($pet['gender'] == 1){
                                echo "Female"; } else {
                                echo "Male";
                            }?></h2>
                    </div>
                </div>
            </div>
            <div class="col" style="margin-right: 2%">
                <div class="row">
                    <div class="col">
                        <h2>Location: </h2>
                    </div>
                    <div class="col">
                        <h2 style="float: right"><?php echo $pet['location']?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>Desexed: </h2>
                    </div>
                    <div class="col">
                        <h2 style="float: right"><?php if($pet['desexed'] == 1){
                                echo "Yes"; } else {
                                echo "No";
                            }?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>Vaccinated: </h2>
                    </div>
                    <div class="col">
                        <h2 style="float: right"><?php if($pet['vaccinated'] == 1){
                                echo "Yes"; } else {
                                echo "No";
                            }?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>Microchipped: </h2>
                    </div>
                    <div class="col">
                        <h2 style="float: right"><?php if($pet['microchip'] == 1){
                                echo "Yes"; } else {
                                echo "No";
                            }?></h2>
                    </div>
                </div>
            </div>

        </div>

        </div>
    </div>
        <div class="carousel" style="z-index: 0">
            <div class="carousel-cell">
                <img src="uploads/<?php echo $pet['picture_destination']?>" style=""/>
            </div>
            <div class="carousel-cell">
                <img src="uploads/<?php echo $pet['picture_destination2']?>" style=""/>
            </div>
            <div class="carousel-cell">
                <img src="uploads/<?php echo $pet['picture_destination3']?>" style=""/>
            </div>
            <div class="carousel-cell">
                <img src="uploads/<?php echo $pet['picture_destination4']?>" style=""/>
            </div>
        </div>
        <br/><br/>

            <div class="row">
                <div class="alert alert-secondary" style="margin-left: 2%; margin-right: 2%; margin-top: 1%; width: 100%">
                    <h5 style="width: 100%"><b>Description:</b> <br/> <?php echo $pet['description']?></h5>
                </div>
            </div>



</div>
<script>
    // external js: flickity.pkgd.js

    var $carousel = $('.carousel').flickity({
        imagesLoaded: true,
        percentPosition: false,
    });

    var $imgs = $carousel.find('.carousel-cell img');
    // get transform property
    var docStyle = document.documentElement.style;
    var transformProp = typeof docStyle.transform == 'string' ?
        'transform' : 'WebkitTransform';
    // get Flickity instance
    var flkty = $carousel.data('flickity');

    $carousel.on( 'scroll.flickity', function() {
        flkty.slides.forEach( function( slide, i ) {
            var img = $imgs[i];
            var x = ( slide.target + flkty.x ) * -1/3;
            img.style[ transformProp ] = 'translateX(' + x  + 'px)';
        });
    });


</script>
</body>
