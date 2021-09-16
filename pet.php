<?php

require_once 'header.php';
require_once 'additional/pet.inc.php';

?>

<body>
<?php $pet = $result->fetch_assoc();?>
<div class="container alert alert-secondary" style="margin:auto; margin-top: 1%; padding: 3%; background-color: whitesmoke; min-width: 400pt">
    <h1><?php echo $pet['pet_name'] ?></h1>
    <hr/>
    <img src="uploads/<?php echo $pet['picture_destination']?>" style="max-width: 700px"/>
    <br/><br/><h3>Age: <?php echo $pet['age']?></h3>
    <h3>Breed: <?php echo $pet['breed']?></h3>
    <h3>Location: <?php echo $pet['location']?></h3>
    <h3>Description: <?php echo $pet['description']?></h3>
</div>
</body>
