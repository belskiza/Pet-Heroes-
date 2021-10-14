<?php require_once 'header.php';
require_once 'additional/message.inc.php'?>
<head>
    <title>Chat</title>
</head>

<body>
<div class="container">
    <h1 class="card-title">Conversation with <?php echo $user['first_name'].' '.$user['last_name'];?></h1>
    <h5 class="card-text">They want to adopt: <?php echo fetchPetFromId($conn, $_GET['pet'])->fetch_assoc()['pet_name'];?></h5>
    <div class="alert alert-secondary" style="height: 80%">
        <?php while ($row = $messages->fetch_assoc()){
            if ($row['sender_id'] == $_SESSION['user_id']){
                $pfp = fetchProfilePicById($conn,$_SESSION['user_id'])->fetch_assoc();?>
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">
                        <div class="alert alert-primary">
                            <div class="row">
                                <div class="col-sm-1">
                                    <img src="uploads/<?php if(isset($pfp['destination'])){
                                        echo $pfp['destination'];
                                    } else { echo 'profile_picture.png';}?>"  style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%"/>
                                </div>
                                <div class="col">
                                    <h5><b><a href="user.php?id=<?php echo $_SESSION['user_id'];?>"><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'];?></a></b></h5>
                                </div>
                            </div>
                            <p><?php echo $row['contents'];?></p>
                        </div>
                    </div>
                </div>
            <?php }  else {
                $pfp = fetchProfilePicById($conn,$user['user_id'])->fetch_assoc();?>
                <div class="alert alert-dark" style="width: 50%">
                    <div class="row">
                        <div class="col-sm-1">
                            <img src="uploads/<?php if(isset($pfp['destination'])){
                                echo $pfp['destination'];
                            } else { echo 'profile_picture.png';}?>"  style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%"/>
                        </div>
                        <div class="col">
                            <h5><b><a href="user.php?id=<?php echo $user['user_id'];?>"><?php echo " ".$user['first_name'].' '.$user['last_name'];?></a></b></h5>
                        </div>
                    </div>
                    <p><?php echo $row['contents'];?></p>
                </div>

            <?php }?>
       <?php } ?>
        <form action="additional/message.inc.php"method="post">
            <input type="hidden" value="<?php echo $their_id ?>" name="receiver_id">
            <input type="hidden" value="<?php echo $_GET['pet'] ?>" name="pet_id">
            <div class="mb-3">
                <label class="form-label">Message:</label>
                <textarea name="message" class="form-control" id="form-control" value="" placeholder="Message..."></textarea>
            </div><br/>
            <div class="row col">
                <button type="submit" name= "submit" class="btn btn-primary" style="width: 100%">Send</button>
            </div>
        </form>
    </div>
</div>

</body>
<?php require_once 'footer.php'?>
