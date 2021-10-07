<?php require_once 'additional/user.inc.php'?>
<?php require_once 'header.php'?>
<head>
    <title><?php echo $user['first_name']." ".$user['last_name'];?></title>
</head>
<body>
<div class="container">
    <h1 class="card-title"><?php echo $user['first_name']." ".$user['last_name'];?> </h1><hr/>
    <div class="row">
        <div class="col">
            <img src="uploads/<?php if(isset($pfp['destination'])) { echo $pfp['destination'];} else { echo 'profile_picture.png';}?>" alt="Card image cap" style="width: 400pt; height: 400pt; object-fit: cover; "/>
        </div>
        <div class="col">
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
            <h1>Unfortuantely this user has not completed their about me section yet</h1>
        <?php } ?>
        </div>
    </div> <br/>
    <a class="btn btn-danger" href="account.php">Go back</a>
</div>
</body>
