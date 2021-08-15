<html>
<head>
    <title>Pet Heroes</title>
</head>

<body >
<?php include_once 'header.php'?>
<!-- Container for sign up form -->
<div class="col-md-4" style="margin:auto; margin-top: 8%; padding: 3%; background-color: whitesmoke; min-width: 400pt">
    <form action="additional/login.inc.php" method="post">
        <div class="card-title">
            <h1> Log In </h1> <br/>
        </div>
        <?php
        if (isset($_GET["message"]) || isset($_GET["error"])) {
            echo "<div class='mb-3'>";
            if ($_GET["message"] == "sign_up_success") {
                echo "<div class=\"alert alert-success\" role=\"alert\">Account created successfully! Please log in.
                    </div>";
            } else if ($_GET["error"] == "empty_input") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Please ensure you fill in all fields.</div>";
            } else if ($_GET["error"] == "wrong_login") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Username / Password is incorrect.</div>";
            }
            echo "</div>";
        }
        ?>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label" ">Username / Email</label>
            <input type="text" name="username" class="form-control" id="form-control" placeholder="Username / Email...">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label" ">Password</label>
            <input type="password" name="password" class="form-control" id="form-control" placeholder="Password...">
        </div>
        <br/>
        <div class="mb-3">
            <div class="row g-3">
                <div class="col d-grid gap-2">
                    <a class="btn btn-outline-danger" href="<?php echo 'index.php'?>">Go Back </a>
                </div>
                <div class="col d-grid gap-2">
                    <button type="submit" name= "submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>


</body>

</html>
