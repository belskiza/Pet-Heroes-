<?php require_once 'additional/user.inc.php'?>
<?php require_once 'header.php'?>
<?php $pet_id = $_GET['pet']; ?>

<head>
    <title><?php echo $user['first_name']." ".$user['last_name'];?></title>
</head>
<body>
<div class="container">

    <div class="row" style="margin-top: 1%; background-color: " >
        <div class="col">
            <h1 class="card-title"><?php echo $user['first_name']." ".$user['last_name'];?> </h1>
        </div>

            <div class="col">
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
                        <?php if($_SESSION['acc_type'] == 1){
                            if (!matchExists($conn, $user['user_id'], $_SESSION['user_id'], $pet_id)){ ?>
                                <a class="btn btn-primary" href="additional/match.inc.php?adopter=<?php echo $user['user_id'];?>&pet=<?php echo $pet_id?>" style="width: 100%;">Match</a>
                            <?php } else { ?>
                                <button type="button" class="btn btn-primary" style="width: 100%;" disabled>Already Matched</button>
                            <?php }?>
                       <?php } ?>
                    </div>
                </div>
            </div>
    </div><hr/>

    <div class="row">
        <div class="col">
            <img src="uploads/<?php if(isset($pfp['destination'])) { echo $pfp['destination'];} else { echo 'profile_picture.png';}?>" alt="Card image cap" style="width: 400pt; height: 400pt; object-fit: cover; "/>
        </div>
        <div class="col">
            <div class="row">
                <?php if (isset($about_me)){ ?>
                    <div class="row">
                        Age: <?php echo $about_me['age']; ?>
                    </div>
                    <div class="row">
                        Sex: <?php echo $about_me['sex']; ?>
                    </div>
                    <div class="row">
                        Living Status: <?php echo $about_me['living_status']; ?>
                    </div>
                    <div class="row">
                        Occupation: <?php echo $about_me['occupation']; ?>
                    </div>
                    <div class="row">
                        Description: <?php echo $about_me['description']; ?>
                    </div>
                <?php } else {?>
                    <h5 class="alert alert-danger">Unfortuantely this user has not completed their about me section yet</h5>
                <?php } ?>
            </div>
            <div class="row">

                <?php if(isset($_GET['pet'])){ ?>
                    <?php $pet = fetchPetFromId($conn, $_GET['pet'])->fetch_assoc();?>
                    <div class="card" style="width: 100%">
                        <div class="card-header">
                            Enquiring to adopt:
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="uploads/<?php if(isset($pet['picture_destination'])){
                                        echo $pet['picture_destination'];
                                    } else { echo 'profile_picture.png';}?>"  style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%"/>
                                </div>
                                <div class="col">
                                    <h4> <?php echo $pet['pet_name'];?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
               <?php } ?>

            </div>

        </div>
    </div> <br/>
    <a class="btn btn-danger" href="account.php">Go back</a>
</div>
</body>
