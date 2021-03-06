<!--
This page is for signing up the users to the platform.
It allows for users to enter their details which will be added to the database
which then is used throughout the platform.
-->
<html>
<head>
    <title>Pet Heroes</title>
</head>

<script>
    window.onload = function() {

        // If sessionStorage is storing default values (ex. name), exit the function and do not restore data
        if (sessionStorage.getItem('name') == "name") {
            return;
        }

        // If values are not blank, restore them to the fields
        var first_name = sessionStorage.getItem('first_name');
        if (first_name !== null) $('#first_name').val(first_name);

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

<body style="font-family: Maku;">
<?php include_once 'header.php'?>
<img src="files/background.jpeg" style="position: fixed; filter: blur(20px) ; width: 105%; margin: -5%; z-index: -1">
<!-- Container for sign up form -->
<div class="alert alert-secondary col-md-4" style="margin:auto; margin-top: 1%; padding: 3%; background-color: whitesmoke; min-width: 400pt">
    <form action="additional/signup.inc.php" method="post">
        <h1 class="display-6"> Sign Up </h1>
        <hr class="my-4">
        <?php
        if (isset($_GET["error"])) {
            echo "<div class='mb-3'>";
            if ($_GET["error"] == "empty_input") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Please ensure you fill in all fields.</div>";
            }
            else if ($_GET["error"] == "invalid_username") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Please enter a valid username.</div>";
            }
            else if ($_GET["error"] == "invalid_email") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Please enter a valid email.</div>";
            }
            else if ($_GET["error"] == "password_unacceptable") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Please ensure the password follows all given 
                        guidelines.</div>";
            }
            else if ($_GET["error"] == "invalid_password_match") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">The two passwords did not match. Please try
                    again.</div>";
            }
            else if ($_GET["error"] == "username_email_exists") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">The username or email are already taken. Please 
                    try another one or <a href='login.php'>Log In</a>.</div>";
            }
            else if ($_GET["error"] == "stmt_failed") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Oops! Something on the back end went wrong.
                    </div>";
            }
            else if ($_GET["error"] == "no_account_type") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Please select an account type.
                    </div>";
            }
            else if ($_GET["error"] == "username_too_long") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Please enter a username that is 10 characters or less
                    </div>";
            }
            echo "</div>";
        }
        ?>
        <div class="mb-3">
            <div class="row g-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label" ">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First name..."
                           aria-label="First name">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label" ">Last Name</label>
                    <input type="text" name ="last_name" class="form-control" id="last_name" placeholder="Last name..."
                           aria-label="Last name">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com...">
        </div>
        <div class="mb-3">
            <div class="row g-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="username" name="username" class="form-control" id="form-control" id="username" placeholder="Username...">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                    <input type="username" name="phone" class="form-control" id="phone" placeholder="Phone...">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label" ">Password</label>
            <input type="password" name="password" class="form-control" id="form-control" placeholder="Password...">
        </div>
        <div class="mb-3">
            <input type="password" name="password_confirm" class="form-control" id="form-control"
                   placeholder="Confirm Password">
        </div>
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-3 pt-0">Account Type:</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="acc_type" id="adopter" value="adopter" checked>
                        <label class="form-check-label" for="adopter">
                            Adopter
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="acc_type" id="owner" value="owner">
                        <label class="form-check-label" for="owner">
                            Owner / Breeder
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
        <br/>
        <div class="row">
            <div class="col">
                <a class="btn btn-danger" href="<?php echo 'index.php'?>" style="width: 100%">Go Back </a>
            </div>
            <div class="col">
                <button type="submit" name= "submit" class="btn btn-primary text-center" style="width: 100%">Sign Up</button>
            </div>
        </div> <br/>
        <div class="row">
            <div class="col">
                <a class="btn btn-success" href="<?php echo 'login.php'?>" style="width: 100%">Already have an account? Log In </a>
            </div>
        </div>
    </form>

</div>


</body>

</html>
