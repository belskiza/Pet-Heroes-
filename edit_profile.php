
<head>
    <?php
    require_once 'header.php';
    require_once 'additional/editprofile.inc.php';
    require_once 'additional/about_me.inc.php' ?>

    ?>

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
</head>
<body>
<img src="files/landing_image_5.jpeg" style="position: fixed; filter: blur(5px) ; width: 105%; margin: -5%; z-index: -1">
<div class="alert alert-secondary col-md-4" style="margin:auto; margin-top: 1%; padding: 3%; background-color: whitesmoke; min-width: 400pt">
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

        <div class="mb-3">
            <div class="row g-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label" >First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name..."
                           aria-label="First name" value="<?php echo $first_name;?>">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label" ">Last Name</label>
                    <input type="text" id="last_name" name ="last_name" class="form-control" placeholder="Last name..."
                           aria-label="Last name" value="<?php echo $last_name;?>">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="row g-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="username" name="username" class="form-control" id="username" placeholder="Username..." value="<?php echo $username;?>">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phonee..." value="<?php echo $phone;?>">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label" ">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com..." value="<?php echo $email;?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label" ">Current Password</label>
            <input type="password" name="password" class="form-control" id="form-control" placeholder="Current Password...">
        </div>
        <br/>
        <div class="mb-3">
            <div class="row g-3">
                <div class="col">
                    <a class="btn btn-secondary" href="chg_acc_type.php" style="width: 100%">Change Account Type</a>
                </div>
                <?php if(isset($about_me)){ ?>
                    <div class="col">
                        <a class="btn btn-success" href="about_me.php"  style="background-color: #306844; width: 100%">Edit About Me</a>
                    </div>

                <?php } ?>
            </div>

        </div>
        <div class="mb-3">
            <div class="row g-3">
                <div class="col">
                    <a class="btn btn-outline-danger" href="<?php echo 'account.php'?>" style="width: 100%">Go Back </a>
                </div>
                <div class="col">
                    <button type="submit" name= "submit" class="btn btn-primary" style="width: 100%">Submit</button>
                </div>
            </div>

        </div>




    </form>

</div>
</body>
