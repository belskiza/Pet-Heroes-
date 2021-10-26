<?php include_once 'header.php'?>
<head>
    <style>
        .button {
            background-color: #306844;
            color: white;
        }
        .button:hover {
            background-color: green;
            border-color: green;
            color: white;
        }
        .col label {
            font-size: 2vw;
        }
        .input-group span {
            background-color: #306844;
            color: white;
            font-size: 1.2vw;
        }
        .input-group input {
            font-size: 1.2vw;
        }
        .col a {
            font-size: 1.2vw;
        }
        .col button {
            font-size: 1.2vw;
        }
    </style>
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

            var microchipped = sessionStorage.getItem('microchipped');
            if (microchipped !== null) $('#microchipped').val(microchipped);

            var description = sessionStorage.getItem('description');
            if (description !== null) $('#description').val(description);

            var active = sessionStorage.getItem('active');
            if (active !== null) $('#active').val(active);


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
            sessionStorage.setItem("desexed", $('#desexed').val());
            sessionStorage.setItem("microchipped", $('#microchipped').val());
            sessionStorage.setItem("description", $('#description').val());
            sessionStorage.setItem("active", $('#active').val());

        }
    </script>
</head>
<body style="background-color: ghostwhite; font-family: Maku;">
    <?php require_once 'additional/list.inc.php'; ?>
        <div class="alert alert-secondary" style="margin:auto; margin-top: 1%; padding: 3%; background-color: whitesmoke; width: 65%">
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
                    else if ($_GET["error"] == "empty_input") {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">Please ensure you fill in all of the fields</div>";
                    }
                    else if ($_GET["error"] == "file_too_big") {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">That file is too big. Please upload a smaller file</div>";
                    }
                    else if ($_GET["error"] == "no_lat_lon") {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">Please press the 'Find Location' button before proceeding</div>";
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
                            <option <?php if ($colour == 3){echo 'selected="selected"';} ?> value="3">Cream</option>
                        </select>
                    </div>
                </div> <br/>

                <div class="row mb-3">
                    <div class="input-group col">
                        <span class="input-group-text">Location</span>
                        <input type="text" name ="location" id ="location" class="form-control" value="<?php echo $location; ?>" placeholder="Your Location..."
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
                    <div class="input-group col">
                        <span class="input-group-text">Active?</span>
                        <select class="form-control" id="active" name="active" aria-label="Default select example">
                            <?php if ($active == ''){
                                ?><option selected>Is your pet active?</option><?php
                            }?>
                            <option <?php if ($active == 1){echo 'selected="selected"';} ?> value="1">Yes</option>
                            <option <?php if ($active == 2){echo 'selected="selected"';} ?> value="2">No</option>
                        </select>
                    </div>
                </div><br/>
                <div class="row mb-3">
                    <div class="input-group col">
                        <span class="input-group-text">Vaccinated?</span>
                        <select class="form-control" name="vaccinated" id="vaccinated" aria-label="Default select example"">
                        <?php if ($vaccinated == ''){
                            ?><option selected>Choose</option><?php
                        }?>
                            <option <?php if ($vaccinated == 1){echo 'selected="selected"';} ?>value="1">Yes</option>
                            <option <?php if ($vaccinated == 2){echo 'selected="selected"';} ?>value="2">No</option>
                        </select>
                    </div>
                    <div class="input-group col">
                        <span class="input-group-text">Desexed?</span>
                        <select class="form-control" name="desexed" id="desexed" aria-label="Default select example">
                            <?php if ($desexed == ''){
                                ?><option selected>Choose</option><?php
                            }?>
                            <option <?php if ($desexed == 1){echo 'selected="selected"';} ?>value="1">Yes</option>
                            <option <?php if ($desexed == 2){echo 'selected="selected"';} ?>value="2">No</option>
                        </select>
                    </div>
                    <div class="input-group col">
                        <span class="input-group-text">Microchipped?</span>
                        <select class="form-control" name="microchip" id="microchipped" aria-label="Default select example">
                            <?php if ($microchip == ''){
                                ?><option selected>Choose</option><?php
                            }?>
                            <option <?php if ($microchip == 1){echo 'selected="selected"';} ?>value="1">Yes</option>
                            <option <?php if ($microchip == 2){echo 'selected="selected"';} ?>value="2">No</option>
                        </select>
                    </div>
                </div><br/>
                <div class="mb-3" style="font-size: 1.2vw">
                    <label class="form-label">Brief Description: Max 1000 characters</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Description..."><?php echo $description; ?></textarea>
                </div><br/>
                <?php if (!isset($_GET['edit'])){
                    ?>

                    <div class="row mb-3">
                        <div class="input-group col">
                            <span class="input-group-text">Main Photo</span>
                            <input type="file" name="picture" class="form-control" id="form-control" placeholder="Upload Picture...">
                        </div>
                        <div class="input-group col">
                            <span class="input-group-text">Second Photo</span>
                            <input type="file" name="picture2" class="form-control" id="form-control" placeholder="Upload Picture...">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="input-group col">
                            <span class="input-group-text">Third Photo</span>
                            <input type="file" name="picture3" class="form-control" id="formFile" placeholder="Upload Picture...">
                        </div>
                        <div class="input-group col">
                            <span class="input-group-text">Fourth Photo</span>
                            <input type="file" name="picture4" class="form-control" id="form-control" placeholder="Upload Picture...">
                        </div>
                    </div>

                    <p id = "status"></p>
                    <a id = "map-link" target="_blank"></a>
                    <input class = "btn btn-dark" id = "test" type="button" value="Find Location"/>
                    <input id="lat" type="hidden" value="" name="lat">
                    <input id="long" type="hidden" value="" name="lon">

                    <br/><br/>

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
                            <button type="submit" style="width: 100%" name= "<?php if (isset($_GET['edit'])){
                                ?>update<?php
                            } else {?>submit<?php } ?>" class="btn button"><?php if (isset($_GET['edit'])){
                                    ?> Update <?php
                                } else {?>Confirm Listing <?php } ?></button>
                        </div>
                    </div> <br/>
                </div>
            </form>
        </div>

    <script>
        function geoFindMe() {

            const status = document.querySelector('#status');
            const mapLink = document.querySelector('#map-link');

            mapLink.href = '';
            mapLink.textContent = '';

            function success(position) {
                var latitude  = position.coords.latitude;
                var longitude = position.coords.longitude;
                document.getElementById('lat').value = latitude;
                document.getElementById('long').value = longitude;

                status.textContent = '';
                mapLink.href = `https://google.com/maps?q=${latitude},${longitude}`;
                mapLink.textContent = '';

            }

            function error() {
                status.textContent = 'Unable to retrieve your location';
            }

            if(!navigator.geolocation) {
                status.textContent = 'Geolocation is not supported by your browser';
            } else {
                status.textContent = 'Locating…';
                navigator.geolocation.getCurrentPosition(success, error);
            }

        }

        document.querySelector('#test').addEventListener('click', geoFindMe);
    </script>

</body>
<?php include_once 'footer.php'?>
