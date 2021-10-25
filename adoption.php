<?php include_once "header.php";?>
<?php include_once "additional/adoption.inc.php";?>
<head>
    <title>Congratulations</title>
</head>

<body style="background-color: ghostwhite">
<div class="container">
    <h1 class="card-title">Adoption Confirmed!</h1>
    <div class="row">
        <img src="uploads/<?php echo $pet['picture_destination']?>" style="width: 65%; margin: auto"/>
    </div>
    <div class="row">
        <div class="col">
            <h3> Adopter: <?php echo $adopter['first_name']?></h3>
        </div>
        <div class="col">
            <h3> Phone Number: <?php echo $adopter['phone']?></h3>
        </div>
        <div class="col">
            <h3> Email: <?php echo $adopter['email']?></h3>
        </div>
    </div>
    <div class="row">
        <a class="btn btn-danger" href="account.php" style="width: 100%">Back to Account </a>
    </div>
    <div class="row">
        Please contact this person directly to arrange adoption. Please be advised that PetHeroes is not responsible for the technicalities of the adoption process
    </div>

</div>
</body>
<?php include_once 'footer.php'?>