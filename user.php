<?php require_once 'additional/user.inc.php'?>
<?php require_once 'header.php'?>
<?php $pet_id = $_GET['pet']; ?>
<?php if(isset($profile_pic)){
    $profile_pic = $profile_pic['destination'];
} else {
    $profile_pic = 'profile_picture.png';
} ?>

<head>
    <title><?php echo $user['first_name']." ".$user['last_name'];?></title>
</head>
<body style="background-color: ghostwhite">
<div class="container" style="height: 80%">

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
            <div class="card" style="width: 100%; height: 98%;">
                <div style="width: 100%; height: 100%; margin-top: 10%">
                    <img src="uploads/<?php echo $profile_pic?>"  style="width: 100%; height: 98%; object-fit: cover"/>
                </div>
                <div class="card-body text-center">
                    <div class="row">
                    </div>
                </div>
            </div>

        </div>
        <div class="col">
            <div class="row mb-3">
                <?php if (isset($about_me)){ ?>
                    <div class="card" style="width: 100%">
                        <div class="card-header" style="background-color: #306844; color: white; font-size: 1.5vw; height: 40%; margin-top: 0;">
                            About <?php echo $user['first_name']?>:
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <b>Age: </b> <?php echo " ".$about_me['age']; ?>
                            </div>
                            <div class="row">
                                <b>Sex: </b> <?php echo " ".$about_me['sex']; ?>
                            </div>
                            <div class="row">
                                <b>Living Status: </b> <?php echo " ".$about_me['living_status']; ?>
                            </div>
                            <div class="row">
                                <b>Occupation:</b> <?php echo " ".$about_me['occupation']; ?>
                            </div>
                            <div class="row">
                                <b>Description: </b><?php echo " ".$about_me['description']; ?>
                            </div>
                        </div>
                    </div>

                <?php } else {?>
                    <h5 class="alert alert-danger">Unfortuantely this user has not completed their about me section yet</h5>
                <?php } ?>
            </div>
            <div class="row mb-3">

                <?php if(isset($_GET['pet'])){ ?>
                    <?php $pet = fetchPetFromId($conn, $_GET['pet'])->fetch_assoc();?>
                    <div class="card" style="width: 100%">
                        <div class="card-header" style="background-color: #306844; color: white; font-size: 1.5vw; height: 40%; margin-top: 0;">
                            <?php if ($_SESSION['acc_type'] == 0){ ?>
                                Owner of:
                            <?php } else { ?>
                                Enquiring  to adopt:
                            <?php } ?>
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
            <?php if(isset($personality)){ ?>
                <div class="row mb-3">
                        <div class="card" style="width: 100%">
                            <div class="card-header" style="background-color: #306844; color: white; font-size: 1.5vw; height: 40%; margin-top: 0;">
                                Quiz Answers
                            </div>
                            <div class="card-body" style="font-size: 1.3vw">
                                <h5><b>Cat or dog person</b></h5>
                                <p><?php switch ($personality['question1']){
                                        case 1:
                                            echo "Cat Person";
                                            break;
                                        case 2:
                                            echo "Dog Person";
                                            break;
                                        case 3:
                                            echo "Both";
                                            break;
                                    }?></p>
                                <h5><b>Living arrangement size</b></h5>
                                <p><?php switch ($personality['question2']){
                                        case 1:
                                            echo "Small";
                                            break;
                                        case 2:
                                            echo "Medium";
                                            break;
                                        case 3:
                                            echo "Large";
                                            break;
                                    }?></p>
                                <h5><b>Free time</b></h5>
                                <p><?php switch ($personality['question3']){
                                        case 1:
                                            echo "Lots";
                                            break;
                                        case 2:
                                            echo "Some";
                                            break;
                                        case 3:
                                            echo "Not Much";
                                            break;
                                    }?></p>
                                <h5><b>Active?</b></h5>
                                <p><?php switch ($personality['question3']){
                                        case 1:
                                            echo "Yes";
                                            break;
                                        case 2:
                                            echo "No";
                                            break;
                                    }?></p>
                            </div>
                        </div>
                </div>
           <?php } ?>

        </div>
    </div> <br/>
    <div class="row" style="justify-content: center">
        <a class="btn btn-danger" href="account.php" style="width: 50%">Go back</a>
    </div>

</div>
</body>
<?php require_once 'footer.php'?>
