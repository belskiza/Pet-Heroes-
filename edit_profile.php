
<head>
    <?php
    require_once 'header.php';
    require_once 'additional/editprofile.inc.php';
    require_once 'additional/about_me.inc.php' ?>


    <script>
        window.onload = function() {

            // If sessionStorage is storing default values (ex. name), exit the function and do not restore data
            if (sessionStorage.getItem('name') == "name") {
                return;
            }

            // If values are not blank, restore them to the fields
            var first_name = sessionStorage.getItem('first_name');
            if (first_name != null) $('#first_name').val(first_name);

            var last_name = sessionStorage.getItem('last_name');
            if (last_name !== null) $('#last_name').val(last_name);

            var username = sessionStorage.getItem('username');
            if (username !== null) $('#username').val(username);

            var email = sessionStorage.getItem('email');
            if (email !== null) $('#email').val(email);

            var acc_type = sessionStorage.getItem('acc_type');
            if (acc_type !== null) $('#acc_type').val(acc_type);

            var phone = sessionStorage.getItem('phone');
            if (phone !== null) $('#phone').val(phone);

        }

        // Before refreshing the page, save the form data to sessionStorage
        window.onbeforeunload = function() {
            sessionStorage.setItem("first_name", $('#first_name').val());
            sessionStorage.setItem("last_name", $('#last_name').val());
            sessionStorage.setItem("username", $('#username').val());
            sessionStorage.setItem("email", $('#email').val());
            sessionStorage.setItem("acc_type", $('#acc_type').val());
            sessionStorage.setItem("phone", $('#phone').val());
        }
    </script>
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
            font-size: 1.2vw;ß
        }
    </style>ß
</head>
<body style="background-color: ghostwhite; font-family: Maku;">
<div class="alert alert-secondary" style="margin:auto;padding: 3%; background-color: whitesmoke; width: 65%">
    <form action="additional/editprofile.inc.php" method="post">
        <h1 class="display-6"> Edit Profile </h1>
        <hr class="my-4">
        <?php
        if (isset($_GET["message"]) || isset($_GET["error"])) {
            echo "<div class='mb-3'>";
            if ($_GET["error"] == "incorrect_password") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Incorrect Password
                    </div>";
            } else if ($_GET["error"] == "invalid_username") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Incorrect Username Format</div>";
            } else if ($_GET["error"] == "invalid_email") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Incorrect Email Format</div>";
            }
            else if ($_GET["error"] == "password_unacceptable") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Incorrect Password Format</div>";
            }
            echo "</div>";
        }
        ?>
        <div class="row mb-3">
            <div class="input-group col">
                <span class="input-group-text">First Name</span>
                <input type="text" name="pet_name" class="form-control" value="<?php echo $first_name;?>" placeholder="First Name..."
                       aria-label="First name">
            </div>
            <div class="input-group col">
                <span class="input-group-text">Last Name</span>
                <input type="text" name="pet_name" class="form-control" value="<?php echo $last_name;?>" placeholder="Last Name..."
                       aria-label="First name">
            </div>
        </div> <br/>
        <div class="row mb-3">
            <div class="input-group col">
                <span class="input-group-text">Username</span>
                <input type="text" name="pet_name" class="form-control" value="<?php echo $username;?>" placeholder="Username..."
                       aria-label="First name">
            </div>
            <div class="input-group col">
                <span class="input-group-text">Phone</span>
                <input type="text" name="pet_name" class="form-control" value="<?php echo $phone;?>" placeholder="Phone..."
                       aria-label="First name">
            </div>
        </div> <br/>
        <div class="row mb-3">
            <div class="input-group col">
                <span class="input-group-text">Email Address</span>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com..." value="<?php echo $email;?>">
            </div>
        </div> <br/>
        <div class="row mb-3">
            <div class="input-group col">
                <span class="input-group-text">Current Password</span>
                <input type="password" name="password" class="form-control" id="form-control" placeholder="Current Password...">
            </div>
        </div> <br/>
        <div class="mb-3">
            <div class="row g-3">
                <div class="col">
                    <a class="btn btn-secondary" href="chg_acc_type.php" style="width: 100%">Change Account Type</a>
                </div>
                <?php if(isset($about_me)){ ?>
                    <div class="col">
                        <a class="btn button" href="about_me.php"  style=" width: 100%">Edit About Me</a>
                    </div>

                <?php } ?>
            </div>

        </div>
        <div class="mb-3">
            <div class="row g-3">
                <div class="col">
                    <a class="btn btn-danger" href="<?php echo 'account.php'?>" style="width: 100%">Go Back </a>
                </div>
                <div class="col">
                    <button type="submit" name= "submit" class="btn btn-primary" style="width: 100%">Submit</button>
                </div>
            </div>

        </div>




    </form>

</div>
</body>
<?php include_once 'footer.php'?>