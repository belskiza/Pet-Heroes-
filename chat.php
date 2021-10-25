<?php require_once 'header.php'?>
<?php require_once 'additional/chat.inc.php'?>
<head>
    <title>Chat</title>
    <meta http-equiv="refresh" content="5">

</head>

<body style="background-color: ghostwhite; font-family: Maku;">
<div class="container" >
    <h1 class="card-title" style="font-size: 3.2vw;">Chat</h1><hr/>
    <?php if ($_SESSION['acc_type'] == 0){ ?>
        <div class="alert alert-warning" style="font-size: 1.4vw">
            You will need to wait for owners to accept your swipe before you can message them
        </div>
   <?php } ?>
    <?php foreach ($available_chats as $user_pet){
        $user = $user_pet[0];
        $pfp = fetchProfilePicById($conn,$user['user_id'])->fetch_assoc();?>

        <div class="alert alert-secondary">
            <div class="row">
                <div class="col-sm-1">
                    <img src="uploads/<?php if(isset($pfp['destination'])){
                        echo $pfp['destination'];
                    } else { echo 'profile_picture.png';}?>"  style="width: 45px; height: 45px; object-fit: cover; border-radius: 50%"/>
                </div>
                <div class="col">
                    <h2> <?php echo $user['first_name'].' '.$user['last_name'];?></h2>
                </div>
                <div class="col">
                    <h5> Enquiring about: <?php echo fetchPetFromId($conn, $user_pet[1])->fetch_assoc()['pet_name'];?></h5>
                </div>
                <div class="align-content-end">
                    <a href="message.php?id=<?php echo $user['user_id']?>&pet=<?php echo $user_pet[1]?>" class="btn btn-lg btn-primary">Chat </a>
                </div>
            </div>
        </div>
   <?php } ?>
</div>

</body>
<?php require_once 'footer.php'?>
