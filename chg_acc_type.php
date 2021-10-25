
<head>
    <?php
    require_once 'header.php';
    require_once 'additional/editprofile.inc.php';

    ?>

    <script>
        window.onload = function() {

            // If sessionStorage is storing default values (ex. name), exit the function and do not restore data
            if (sessionStorage.getItem('name') == "name") {
                return;
            }

            // If values are not blank, restore them to the fields
            var owner = sessionStorage.getItem('owner');
            if (owner !== null) $('#owner').val(owner);

            var adopter = sessionStorage.getItem('adopter');
            if (adopter !== null) $('#adopter').val(adopter);
        }

        // Before refreshing the page, save the form data to sessionStorage
        window.onbeforeunload = function() {
            sessionStorage.setItem("adopter", $('#adopter').val());
            sessionStorage.setItem("owner", $('#owner').val());
        }
    </script>
    <style>
        .col a {
            font-size: 1.2vw;
        }
        .col button {
            font-size: 1.2vw;
        }
    </style>
</head>
<body style="font-family: Maku;">
<img src="files/landing_image_4.jpeg" style="position: fixed; filter: blur(5px) ; width: 105%; margin: -5%; z-index: -1">
<div class="alert alert-secondary col-md-4" style="margin:auto; margin-top: 1%; padding: 3%; background-color: whitesmoke; min-width: 400pt">
    <form action="additional/editprofile.inc.php" method="post">
        <h1 class="display-6"> Change Account Type </h1>
        <hr class="my-4">
        <div class="alert alert-danger" style="font-size: 1.2vw">
            Please be advised that changing from Adopter/Owner will delete all of your data including listings and swipes
        </div>
        <fieldset class="form-group">
            <div class="row" style="font-size: 1.4vw">
                <div class="col-sm-10">
                <legend class="col-form-label  pt-0">Account Type:</legend>
                </div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="acc_type" id="adopter" value="adopter" <?php if($user['acc_type'] == 0) echo 'checked' ?>/>
                        <label class="form-check-label" for="adopter">
                            Adopter
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="acc_type" id="owner" value="owner" <?php if($user['acc_type'] == 1) echo 'checked' ?>/>
                        <label class="form-check-label" for="owner">
                            Owner / Breeder
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="mb-3">
            <div class="row g-3">
                <div class="col">
                    <a class="btn btn-danger" href="<?php echo 'account.php'?>" style="width: 100%">Go Back </a>
                </div>
                <div class="col">
                    <button type="submit" name= "chg_acc_type" class="btn btn-primary" style="width: 100%">Submit</button>
                </div>
            </div>

        </div>
    </form>

</div>
</body>
