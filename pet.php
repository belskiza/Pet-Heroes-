<?php

require_once 'header.php';
require_once 'additional/pet.inc.php';

?>

<body>
<?php $pet = $result->fetch_assoc();?>
<div class="container-fluid" style="margin:auto; padding-top: 3%; background-color: whitesmoke; width: 60%">
    <div class="container">
            <div class="row">
                <div class="col">
                    <h1><?php echo $pet['pet_name'] ?></h1>
                </div>
                <div class="col">
                </div>
                <div class="col">
                </div>
            </div> <hr/>
            <div class="row">
                <div class="col">
                    <img src="uploads/<?php echo $pet['picture_destination']?>" style="max-width: 600px"/>
                </div>
                <div class="col">
                    <div class="alert alert-secondary">
                        <h5><b>Age:</b> <?php echo $pet['age']?></h5>
                    </div>
                    <div class="alert alert-secondary">
                        <h5><b>Breed: </b><?php echo $pet['breed']?></h5>
                    </div>
                    <div class="alert alert-secondary">
                        <h5><b>Size: </b><?php echo $pet['pet_size']?></h5>
                    </div>
                    <div class="alert alert-secondary">
                        <h5><b>Location: </b><?php echo $pet['location']?></h5>
                    </div>
                    <div class="alert alert-secondary">
                        <h5><b>Desexed: </b><?php if($pet['desexed'] == 1){
                                echo "Yes"; } else {
                                echo "No";
                            }?></h5>
                    </div>
                    <div class="alert alert-secondary">
                        <h5><b>Vaccinated: </b><?php if($pet['vaccinated'] == 1){
                            echo "Yes"; } else {
                            echo "No";
                            }?></h5>
                    </div>
                    <div class="alert alert-secondary">
                        <h5><b>Microchipped: </b><?php if($pet['microchip'] == 1){
                                echo "Yes"; } else {
                                echo "No";
                            }?></h5>
                    </div>
                    <div class="alert alert-secondary">
                        <h5><b>Gender: </b><?php if($pet['gender'] == 1){
                                echo "Female"; } else {
                                echo "Male";
                            }?></h5>
                    </div>
                    <div class="alert alert-secondary">
                        <h5><b>colour: </b><?php if($pet['colour'] == 0){
                                echo "White"; } else if ($pet['colour'] == 1) {
                                echo "Black"; } else {echo "Brown";}
                            ?></h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <img src="uploads/<?php echo $pet['picture_destination2']?>" style="max-width: 200px"/>
                </div>
                <div class="col">
                    <img src="uploads/<?php echo $pet['picture_destination3']?>" style="max-width: 200px"/>
                </div>
                <div class="col">
                    <img src="uploads/<?php echo $pet['picture_destination4']?>" style="max-width: 200px"/>
                </div>
            </div>
            <div class="row">
                <div class="alert alert-secondary" style="margin-left: 2%; margin-right: 2%; margin-top: 1%; width: 100%">
                    <h5 style="width: 100%"><b>Description:</b> <br/> <?php echo $pet['description']?></h5>
                </div>
            </div>



    </div>
</div>
</body>
