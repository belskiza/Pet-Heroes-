<?php include_once 'header.php'?>
<body>
    <?php require_once 'additional/list.inc.php'; ?>

        <div class="alert alert-secondary col-md-4" style="margin:auto; margin-top: 1%; padding: 3%; background-color: whitesmoke; min-width: 400pt">
            <form action="additional/list.inc.php" method="POST">
                <input type="hidden" name="pet_id" value="<?php if (isset($_GET['edit'])){
                    echo $_GET['edit'];}?>">
                <h1 class="display-6"> <?php if (isset($_GET['edit'])){
                    ?> Edit Listing <?php
                    } else {?>List a Pet <?php } ?></h1>
                <hr class="my-4">
                <div class="mb-3">
                    <label class="form-label" ">Pet's Name</label>
                    <input type="text" name="pet_name" class="form-control" value="<?php echo $name;?>" placeholder="Pet's Name..."
                           aria-label="First name">
                </div>
                <div class="mb-3">
                    <label class="form-label" ">Location</label>
                    <input type="text" name ="location" class="form-control" value="<?php echo $location; ?>" placeholder="Your Location..."
                           aria-label="Location">
                </div>
                <div class="mb-3">
                    <label class="form-label" ">Breed</label>
                    <input type="text" name="breed" class="form-control" id="form-control" value="<?php echo $breed; ?>" placeholder="Breed...">
                </div>
                <div class="mb-3">
                    <label class="form-label" ">Age</label>
                    <input type="text" name="age" class="form-control" id="form-control" value="<?php echo $age; ?>" placeholder="Age...">
                </div>
                <div class="mb-3">
                    <div class="row g-3">
                        <div class="col d-grid gap-2">
                            <button type="submit" name= "<?php if (isset($_GET['edit'])){
                                ?>update<?php
                            } else {?>submit<?php } ?>" class="btn btn-primary"><?php if (isset($_GET['edit'])){
                                    ?> Update <?php
                                } else {?>Confirm Listing <?php } ?></button>
                        </div>
                        <div class="col d-grid gap-2">
                            <a class="btn btn-danger" href="<?php if (isset($_GET['edit'])){
                                ?> all_pets.php <?php
                            } else {?>index.php <?php } ?>">Go Back </a>
                        </div>
                    </div> <br/>
                </div>
            </form>
        </div>

</body>


