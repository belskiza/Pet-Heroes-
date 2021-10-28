<!--
This page is for the user details.
This page displays all details regarding the user.
Simalir to that of a landing page for an account, which shows all details regarding that user.
-->
<?php require_once 'additional/user.inc.php'?>
<?php require_once 'header.php'?>
<?php $pet_id = $_GET['pet']; ?>

<head>
    <title><?php echo $user['first_name']." ".$user['last_name'];?></title>
    <style>
        .input-group span{
            background-color: #306844;
            border-color: #306844;
            color: white;
        }
    </style>
</head>
<body style="background-color: ghostwhite; font-family: Maku;">
<div class="container" style="width: 65%">

    <div class="row" style="margin-top: 1%; background-color: " >
        <div class="col">
            <h1 class="card-title"><?php echo $user['first_name']." ".$user['last_name'];?> </h1>
        </div>

            <div class="col">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-danger" href="account.php"style="width: 100%; font-size: 1.4vw">Go back</a>
                    </div>
                    <div class="col">
                        <?php if($_SESSION['acc_type'] == 1){
                            if (!matchExists($conn, $user['user_id'], $_SESSION['user_id'], $pet_id)){ ?>
                                <a class="btn btn-primary" href="additional/match.inc.php?adopter=<?php echo $user['user_id'];?>&pet=<?php echo $pet_id?>" style="width: 100%; font-size: 1.4vw">Match</a>
                            <?php } else { ?>
                                <button type="button" class="btn btn-primary" style="width: 100%;font-size: 1.4vw" disabled>Already Matched</button>
                            <?php }?>
                       <?php } ?>
                    </div>
                </div>
            </div>
    </div><hr/>

    <div class="row">
        <div class="col">
            <img src="uploads/<?php if(isset($profile_pic['destination'])) { echo $profile_pic['destination'];} else { echo 'profile_picture.png';}?>" alt="Card image cap" style="width: 100%; height100%: cover; "/>
        </div>
            <div class="col">
                <?php if(isset($_GET['pet'])){ ?>
                    <?php $pet = fetchPetFromId($conn, $_GET['pet'])->fetch_assoc();?>
                    <div class="card" style="width: 100%">
                        <div class="card-header" style="background-color: #306844; color: white; font-size: 1.5vw;font-size: 1.3vw">
                            <?php if($_SESSION['acc_type'] == 0){
                                echo "You are Enquiring to adopt:";
                            } else {
                                echo "They are trying to adopt:";
                            } ?>
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
    </div> <br/>
        <div class="row">
            <div class="col-sm" style="background-color: ghostwhite">
                <form action="additional/list.inc.php" method="POST" enctype="multipart/form-data" >
                    <div class="row mb-3">
                        <div class="input-group col-sm-10" >
                            <span class="input-group-text" style="width: 10%; font-size: 1.5vw;">Age</span>
                            <span class="input-group-text" style="width: 50%; font-size: 1.5vw; background-color: white; color: black"> <?php if(isset($about_me)) {
                                echo $about_me['age']; }
                              else {
                                  echo "This user has not set their about information";
                            } ?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="input-group col-sm-10">
                            <span class="input-group-text" style="width: 10%; font-size: 1.5vw;"">Sex</span>
                            <span class="input-group-text span1" style="width: 50%; font-size: 1.5vw; background-color: white; color: black"> <?php if(isset($about_me)) {
                                    echo $about_me['sex']; }
                                else {
                                    echo "This user has not set their about information";
                                } ?></span>
                        </div>
                        <div class="input-group col-sm-2">
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="input-group col-sm-8">
                            <span class="input-group-text" style="width: 20%; font-size: 1.5vw">Occupation</span>
                            <span class="input-group-text span1" style="width: 65%; font-size: 1.5vw; background-color: white; color: black"> <?php if(isset($about_me)) {
                                    echo $about_me['occupation']; }
                                else {
                                    echo "This user has not set their about information";
                                } ?></span>
                        </div>
                        <div class="input-group col-sm-4">
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                    <div class="input-group">
                        <div class="card" style="width: 100%">
                            <div class="card-header" style="background-color: #306844; color: white; font-size: 1.5vw; height: 50%; margin-top: 0;">
                                Description
                            </div>
                            <div class="card-body" style="font-size: 1.3vw">
                                <?php echo $about_me['description']; ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>


    <br/>
</div>
</body>
<?php require_once 'footer.php'?>
