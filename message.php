<?php require_once 'header.php';
require_once 'additional/message.inc.php'?>
<head>
    <title>Chat</title>
</head>

<body style="background-color: ghostwhite; font-family: Maku;">
<div style="width: 65%; margin: auto; ">
    <h1 class="card-title" style="font-size: 3vw">Conversation with <a href="user.php?id=<?php echo $user['user_id'];?>&pet=<?php echo $_GET['pet']; ?>">
            <?php echo $user['first_name'].' '.$user['last_name'];?></a></h1>
    <div class="row mb-3">
        <div class="col">
            <h5 class="card-text" style="font-size: 2.1vw">They want to adopt: <?php echo fetchPetFromId($conn, $_GET['pet'])->fetch_assoc()['pet_name'];?></h5>
        </div>
        <div class="col" style="text-align: center">
            <a class="btn btn-success" href="additional/confirm_adoption.inc.php?pet=<?php echo $_GET['pet'];?>&user=<?php echo $user['user_id'];?>" style="width: 80%;font-size: 1.3vw">Confirm Adoption </a>
        </div>
    </div>

</div>
<div style="width: 65%; margin: auto;max-height: 70%; overflow-y: auto">
    <div class="alert alert-secondary" style="background-color: #cacaca">
        <?php while ($row = $messages->fetch_assoc()){
            if ($row['sender_id'] == $_SESSION['user_id']){
                $pfp = fetchProfilePicById($conn,$_SESSION['user_id'])->fetch_assoc();?>
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">
                        <div class="alert alert-primary" style="background-color: #94DB39; border-color:#94DB39 ">
                            <div class="row">
                                <div class="col-sm-1">
                                    <img src="uploads/<?php if(isset($pfp['destination'])){
                                        echo $pfp['destination'];
                                    } else { echo 'profile_picture.png';}?>"  style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%"/>
                                </div>
                                <div class="col">
                                    <h5><b><a  style="color: black;" href="user.php?id=<?php echo $_SESSION['user_id'];?>"><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'];?></a></b></h5>
                                </div>
                            </div>
                            <p style="color: black"><?php echo $row['contents'];?></p>
                        </div>
                    </div>
                </div>
            <?php }  else {
                $pfp = fetchProfilePicById($conn,$user['user_id'])->fetch_assoc();?>
                <div class="alert alert-dark" style="width: 50%; background-color: #535353">
                    <div class="row">
                        <div class="col-sm-1">
                            <img src="uploads/<?php if(isset($pfp['destination'])){
                                echo $pfp['destination'];
                            } else { echo 'profile_picture.png';}?>"  style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%"/>
                        </div>
                        <div class="col">
                            <h5><b><a style="color: white;" href="user.php?id=<?php echo $user['user_id'];?>"><?php echo " ".$user['first_name'].' '.$user['last_name'];?></a></b></h5>
                        </div>
                    </div>
                    <p style="color: white;"><?php echo $row['contents'];?></p>
                </div>

            <?php }?>
       <?php } ?>

    </div>
</div>
<div style="width: 65%; margin:auto;">
    <form action="additional/message.inc.php"method="post">
        <input type="hidden" value="<?php echo $their_id ?>" name="receiver_id">
        <input type="hidden" value="<?php echo $_GET['pet'] ?>" name="pet_id">
        <div class="mb-3" style="font-size: 1.3vw">
            <label class="form-label">Message:</label>
            <textarea name="message" class="form-control" id="form-control" value="" placeholder="Message..."></textarea>
        </div><br/>
        <div class="row">
            <div class="col">
                <a class="btn btn-danger" href="chat.php" style="width: 100%;font-size: 1.3vw">Go Back </a>
            </div>
            <div class="col">
                <button type="submit" name= "submit" class="btn btn-primary" style="width: 100%;font-size: 1.3vw">Send</button>
            </div>
        </div>
    </form>
</div>

</body>
<?php require_once 'footer.php'?>
