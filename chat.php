<!--
This page is the chat page. It contains the current open chats between adopters and owners. It will show information
about the user and the pet they are either adopting or giving away.
-->
<?php require_once 'header.php'?>
<?php require_once 'additional/chat.inc.php'?>
<head>
    <title>Chat</title>
    <meta http-equiv="refresh" content="5">
    <style>
        .button {
            background-color: #306844;
            border-color: #306844;
            color: white;
        }
        .button:hover {
            background-color: green;
            border-color: green;
            color: white;
        }
    </style>
</head>

<body style="background-color: ghostwhite; font-family: Maku;"">
<div class="container" style=" height: 50%; width: 65%">
    <h1 class="card-title" style="font-size: 3.2vw;">Chat</h1><hr/>
    <?php if ($_SESSION['acc_type'] == 0){ ?>
        <div class="alert alert-warning" style="font-size: 1.4vw">
            You will need to wait for owners to accept your swipe before you can message them
        </div>
   <?php } ?>
    <?php foreach ($available_chats as $user_pet){
        $user = $user_pet[0];
        $pfp = fetchProfilePicById($conn,$user['user_id'])->fetch_assoc();?>
        <?php if(fetchPetFromId($conn, $user_pet[1])->fetch_assoc()['valid_listing'] == 1){ ?>
            <div class="alert alert-secondary">
                <div class="row">
                    <div class="col-sm-1">
                        <img src="uploads/<?php if(isset($pfp['destination'])){
                            echo $pfp['destination'];
                        } else { echo 'profile_picture.png';}?>"  style="width: 45px; height: 45px; object-fit: cover; border-radius: 50%"/>
                    </div>
                    <div class="col">
                        <h2><a style="color: green" href="user.php?id=<?php echo $user['user_id'];?>&pet=<?php echo $user_pet[1]?>"> <?php echo $user['first_name'].' '.$user['last_name'];?></a></h2>
                    </div>
                    <div class="col">
                        <h5> Enquiring about: <?php echo fetchPetFromId($conn, $user_pet[1])->fetch_assoc()['pet_name'];?></h5>
                    </div>
                    <div class="align-content-end">
                        <a class="btn button" href="message.php?id=<?php echo $user['user_id']?>&pet=<?php echo $user_pet[1]?>" class="btn btn-lg btn-primary">Chat </a>
                    </div>
                </div>
            </div>
        <?php }?>
   <?php } ?>
</div>

</body>
<?php require_once 'footer.php'?>
