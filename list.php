<?php include_once 'header.php'?>
<head>
    <script>
        window.onload = function() {

            // If sessionStorage is storing default values (ex. name), exit the function and do not restore data
            if (sessionStorage.getItem('name') == "name") {
                return;
            }

            // If values are not blank, restore them to the fields
            var pet_name = sessionStorage.getItem('pet_name');
            if (pet_name !== null) $('#pet_name').val(pet_name);

            var pet_type = sessionStorage.getItem('pet_type');
            if (pet_type !== null) $('#pet_type').val(pet_type);

            var gender = sessionStorage.getItem('gender');
            if (gender !== null) $('#gender').val(gender);

            var colour = sessionStorage.getItem('colour');
            if (colour !== null) $('#colour').val(colour);

            var location = sessionStorage.getItem('location');
            if (location !== null) $('#location').val(location);

            var breed = sessionStorage.getItem('breed');
            if (breed !== null) $('#breed').val(breed);

            var size = sessionStorage.getItem('size');
            if (size !== null) $('#size').val(size);

            var age = sessionStorage.getItem('age');
            if (age !== null) $('#age').val(age);

            var vaccinated = sessionStorage.getItem('vaccinated');
            if (vaccinated !== null) $('#vaccinated').val(vaccinated);

            var desexed = sessionStorage.getItem('desexed');
            if (desexed !== null) $('#desexed').val(desexed);

            var microchip = sessionStorage.getItem('microchip');
            if (microchip !== null) $('#microchip').val(microchip);

            var description = sessionStorage.getItem('description');
            if (description !== null) $('#description').val(description);

            var picture1 = sessionStorage.getItem('picture1');
            if (picture1 !== null) $('#picture1').val(picture1);

            var picture2 = sessionStorage.getItem('picture2');
            if (picture2 !== null) $('#picture2').val(picture2);

            var picture3 = sessionStorage.getItem('picture3');
            if (picture3 !== null) $('#picture3').val(picture3);

            var picture4 = sessionStorage.getItem('picture4');
            if (picture4 !== null) $('#picture4').val(picture4);

        }

        // Before refreshing the page, save the form data to sessionStorage
        window.onbeforeunload = function() {
            sessionStorage.setItem("pet_name", $('#pet_name').val());
            sessionStorage.setItem("pet_type", $('#pet_type').val());
            sessionStorage.setItem("gender", $('#gender').val());
            sessionStorage.setItem("colour", $('#colour').val());
            sessionStorage.setItem("location", $('#location').val());
            sessionStorage.setItem("breed", $('#breed').val());
            sessionStorage.setItem("size", $('#size').val());
            sessionStorage.setItem("age", $('#age').val());
            sessionStorage.setItem("vaccinated", $('#vaccinated').val());
            sessionStorage.setItem("microchip", $('#microchip').val());
            sessionStorage.setItem("desexed", $('#desexed').val());
            sessionStorage.setItem("descripton", $('#description').val());
            sessionStorage.setItem("picture1", $('#picture1').val());
            sessionStorage.setItem("picture2", $('#picture2').val());
            sessionStorage.setItem("picture3", $('#picture3').val());
            sessionStorage.setItem("picture4", $('#picture4').val());


        }
    </script>
</head>
<body>
    <?php require_once 'additional/list.inc.php'; ?>
    <img src="files/landing_image_2.jpeg" style="position: fixed; filter: blur(3px) ; width: 110%; margin-top: -10%; margin-left: -5%; z-index: -1">
        <div class="alert alert-secondary" style="margin:auto; margin-top: 1%; padding: 3%; background-color: whitesmoke; width: 50%">
            <form action="additional/list.inc.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="pet_id" value="<?php if (isset($_GET['edit'])){
                    echo $_GET['edit'];}?>">
                <h1 class="display-6"> <?php if (isset($_GET['edit'])){
                    ?> Edit Listing <?php
                    } else {?>List a Pet <?php } ?></h1>
                <hr class="my-4">
                <?php
                if (isset($_GET["error"])) {
                    echo "<div class='mb-3'>";
                    if ($_GET["error"] == "invalid_file_type") {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">That file type is invalid</div>";
                    }
                    else if ($_GET["error"] == "uploading_file") {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">Unexpected error uploading file. Please try again</div>";
                    }
                    else if ($_GET["error"] == "file_too_big") {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">That file is too big. Please upload a smaller file</div>";
                    }
                    else if ($_GET["error"] == "empty_input") {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">Please fill in all fields</div>";
                    }
                    echo "</div>";
                }
                ?>
                <div class="row mb-3">
                    <div class="input-group col">
                        <span class="input-group-text">Pet's Name</span>
                        <input type="text" name="pet_name" id="pet_name" class="form-control" value="<?php echo $name;?>" placeholder="Pet's Name..."
                               aria-label="First name">
                    </div>
                    <div class="input-group col">
                        <span class="input-group-text">Type of Pet</span>
                        <select class="form-control" id="pet_type" name="pet_type" aria-label="Default select example">
                            <?php if ($pet_type == ''){
                                ?><option selected>Please select the type of your pet</option><?php
                            }?>
                            <option <?php if ($pet_type == 1){echo 'selected="selected"';} ?> value="1">Cat</option>
                            <option <?php if ($pet_type == 2){echo 'selected="selected"';} ?> value="2">Dog</option>
                            <option <?php if ($pet_type == 1){echo 'selected="selected"';} ?> value="3">Bird</option>
                        </select>
                    </div>
                </div> <br/>

                <div class="row mb-3">
                    <div class="input-group col">
                        <span class="input-group-text">Gender</span>
                        <select class="form-control" id="gender" name="gender" aria-label="Default select example">
                            <?php if ($gender == ''){
                                ?><option selected>Please select the Gender of your pet</option><?php
                            }?>
                            <option <?php if ($gender == 1){echo 'selected="selected"';} ?> value="1">Male</option>
                            <option <?php if ($gender == 2){echo 'selected="selected"';} ?> value="2">Female</option>
                        </select>
                    </div>
                    <div class="input-group col">
                        <span class="input-group-text">Colour</span>
                        <select class="form-control" id="colour" name="colour" aria-label="Default select example">
                            <?php if ($colour == ''){
                                ?><option selected>Select Colour</option><?php
                            }?>
                            <option <?php if ($colour == 1){echo 'selected="selected"';} ?> value="1">White</option>
                            <option <?php if ($colour == 2){echo 'selected="selected"';} ?> value="2">Black</option>
                            <option <?php if ($colour == 3){echo 'selected="selected"';} ?> value="3">Brown</option>
                        </select>
                    </div>
                </div> <br/>

                <div class="row mb-3">
                    <div class="input-group col">
                        <span class="input-group-text">Location</span>
                        <input type="text" name ="location" id="location" class="form-control" value="<?php echo $location; ?>" placeholder="Your Location..."
                               aria-label="Location">
                    </div>
                    <div class="input-group col">
                        <span class="input-group-text">Breed</span>
                        <input type="text" name="breed" class="form-control" id="breed" value="<?php echo $breed; ?>" placeholder="Breed...">
                    </div>
                </div><br/>
                <div class="row mb-3">
                    <div class="input-group col">
                        <span class="input-group-text">Size</span>
                        <select class="form-control" name="size" id="size" aria-label="Default select example">
                            <?php if ($pet_size == ''){
                                ?><option selected>Please select the Size of your pet</option><?php
                            }?>
                            <option <?php if ($pet_size == 1){echo 'selected="selected"';} ?>value="1">Small</option>
                            <option <?php if ($pet_size == 2){echo 'selected="selected"';} ?>value="2">Medium</option>
                            <option <?php if ($pet_size == 3){echo 'selected="selected"';} ?>value="3">Large</option>
                        </select>
                    </div>
                    <div class="input-group col">
                        <span class="input-group-text">Age</span>
                        <input type="text" name="age" class="form-control" id="age" value="<?php echo $age; ?>" placeholder="Age...">
                    </div>
                </div><br/>
                <div class="row mb-3">
                    <div class="input-group col">
                        <span class="input-group-text">Vaccinated?</span>
                        <select class="form-control" id="vaccinated" name="vaccinated" aria-label="Default select example"">
                        <?php if ($vaccinated == ''){
                            ?><option selected>Choose</option><?php
                        }?>
                            <option <?php if ($vaccinated == 1){echo 'selected="selected"';} ?>value="1">Yes</option>
                            <option <?php if ($vaccinated == 2){echo 'selected="selected"';} ?>value="2">No</option>
                        </select>
                    </div>
                    <div class="input-group col">
                        <span class="input-group-text">Desexed?</span>
                        <select class="form-control" id="desexed" name="desexed" aria-label="Default select example">
                            <?php if ($desexed == ''){
                                ?><option selected>Choose</option><?php
                            }?>
                            <option <?php if ($desexed == 1){echo 'selected="selected"';} ?>value="1">Yes</option>
                            <option <?php if ($desexed == 2){echo 'selected="selected"';} ?>value="2">No</option>
                        </select>
                    </div>
                    <div class="input-group col">
                        <span class="input-group-text">Microchipped?</span>
                        <select class="form-control" id="microchip" name="microchip" aria-label="Default select example">
                            <?php if ($microchip == ''){
                                ?><option selected>Choose</option><?php
                            }?>
                            <option <?php if ($microchip == 1){echo 'selected="selected"';} ?>value="1">Yes</option>
                            <option <?php if ($microchip == 2){echo 'selected="selected"';} ?>value="2">No</option>
                        </select>
                    </div>
                </div><br/>
                <div class="mb-3">
                    <label class="form-label">Brief Description: Max 1000 characters</label>
                    <textarea name="description" class="form-control" id="description" value="" placeholder="Description..."><?php echo $description; ?></textarea>
                </div><br/>
                <?php if (!isset($_GET['edit'])){
                    ?>

                    <div class="row mb-3">
                        <div class="input-group col">
                            <span class="input-group-text">Main Photo</span>
                            <input type="file" name="picture" class="form-control" id="picture1" placeholder="Upload Picture...">
                        </div>
                        <div class="input-group col">
                            <span class="input-group-text">Second Photo</span>
                            <input type="file" name="picture2" class="form-control" id="picture2" placeholder="Upload Picture...">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="input-group col">
                            <span class="input-group-text">Third Photo</span>
                            <input type="file" name="picture3" class="form-control" id="picture3" placeholder="Upload Picture...">
                        </div>
                        <div class="input-group col">
                            <span class="input-group-text">Fourth Photo</span>
                            <input type="file" name="picture4" class="form-control" id="picture4" placeholder="Upload Picture...">
                        </div>
                    </div><br/>

                    <?php
                } else {?> <?php } ?>
                <div class="mb-3">
                    <div class="row g-3">
                        <div class="col" style="width: 100%">
                            <a class="btn btn-danger" style="width: 100%" href="<?php if (isset($_GET['edit'])){
                                ?> all_pets.php <?php
                            } else {?>index.php <?php } ?>">Go Back </a>
                        </div>
                        <div class="col">
                            <button type="submit" style="width: 100%; background-color: #306844" name= "<?php if (isset($_GET['edit'])){
                                ?>update<?php
                            } else {?>submit<?php } ?>" class="btn btn-secondary"><?php if (isset($_GET['edit'])){
                                    ?> Update <?php
                                } else {?>Confirm Listing <?php } ?></button>
                        </div>
                    </div> <br/>
                </div>
            </form>
        </div>

</body>


