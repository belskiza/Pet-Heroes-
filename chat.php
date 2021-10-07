<?php require_once 'header.php'?>
<?php require_once 'additional/chat.inc.php'?>
<head>
    <title>Chat</title>
</head>

<body>
<div class="container">
    <h1 class="card-title">Chat</h1><hr/>
    <?php foreach ($available_chats as $user){
        $pfp = fetchProfilePicById($conn,$user['user_id'])->fetch_assoc();?>

        <div class="alert alert-secondary">
            <div class="row">
                <div class="col-sm-1">
                    <img src="uploads/<?php if(isset($pfp['destination'])){
                        echo $pfp['destination'];
                    } else { echo 'profile_picture.png';}?>"  style="width: 45px; height: 45px; object-fit: cover; border-radius: 50%"/>
                </div>
                <div class="col-md-10 ">
                    <h2>
                        <?php echo $user['first_name'].' '.$user['last_name'];?>
                    </h2>
                </div>
                <div class="align-content-end">
                    <a href="message.php?id=<?php echo $user['user_id']?>" class="btn btn-lg btn-primary" style="width: 4">Chat </a>

                </div>

            </div>
        </div>
   <?php } ?>
</div>

</body>
