<?php include_once 'header.php'?>
<body>
<?php require_once 'additional/about_me.inc.php'; ?>
<img src="files/landing_image_2.jpeg" style="position: fixed; filter: blur(3px) ; width: 110%; margin-top: -10%; margin-left: -5%; z-index: -1">
<div class="alert alert-secondary" style="margin:auto; margin-top: 1%; padding: 3%; background-color: whitesmoke; width: 50%">
    <form action="additional/about_me.inc.php" method="POST">
        <h1 class="display-6"> About Me </h1>
        <hr class="my-4">
        <div class="row mb-3">
            <div class="input-group col">
                <span class="input-group-text">Age</span>
                <input type="text" name="age" class="form-control" value="<?php echo $age;?>" placeholder="Your Age..."
                       aria-label="First name">
            </div>
            <div class="input-group col">
                <span class="input-group-text">Occupation</span>
                <input type="text" name="occupation" class="form-control" value="<?php echo $occupation;?>" placeholder="Your Occupation..."
                       aria-label="First name">
            </div>
        </div> <br/>

        <div class="row mb-3">
            <div class="input-group col">
                <span class="input-group-text">Sex</span>
                <input type="text" name="sex" class="form-control" value="<?php echo $sex;?>" placeholder="Your Sex..."
                       aria-label="First name">
            </div>
            <div class="input-group col">
                <span class="input-group-text">Living Status</span>
                <input type="text" name="living_status" class="form-control" value="<?php echo $living_status;?>" placeholder="Your Living Status..."
                       aria-label="First name">
            </div>
        </div> <br/>

        <div class="mb-3">
            <label class="form-label">Brief Description: Max 1000 characters</label>
            <textarea name="description" class="form-control" id="form-control" value="" placeholder="Description..."><?php echo $description; ?></textarea>
        </div><br/>

        <div class="mb-3">
            <div class="row g-3">
                <div class="col">
                    <button type="<?php if(isset($about_me)){
                        ?>edit<?php } else { ?>submit<?php
                    } ?>" style="width: 100%" name= "<?php if(isset($about_me)){
                        ?>edit<?php } else { ?>submit<?php
                    } ?>" class="btn btn-primary">Confirm</button>
                </div>
                <div class="col" style="width: 100%">
                    <a class="btn btn-danger" style="width: 100%" href="account.php">Go Back </a>
                </div>
            </div> <br/>
        </div>
    </form>
</div>

</body>



