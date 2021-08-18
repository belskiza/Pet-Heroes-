<?php
include_once 'additional/dbh.inc.php';
include_once 'additional/config.php';
?>
<html>
<head>
    <title>Pet Heroes</title>
</head>

<body style="background-color: whitesmoke">
<?php include_once 'header.php'?>
<br/>
<?php
if (isset($_GET["message"])) {
    echo "<div class='mb-3'>";
    if ($_GET["message"] == "logout") {
        echo "<div class=\"alert alert-success\" role=\"alert\">You are now logged out
                    </div>";
    }
    if ($_GET["message"] == "login") {
        echo "<div class=\"alert alert-success\" role=\"alert\">You are now logged in
                    </div>";
    }
    echo "</div>";
}
?>
<div class="container-fluid">
    <?php if (isset($_SESSION['username'])){
        echo "<a class=\"btn btn-primary\" href='profile.php'?>".$_SESSION['first_name']."</a>";
        echo "<a class=\"btn btn-warning\" href='additional/logout.inc.php'?>Log Out</a>";
    } else {
        echo "<a class=\"btn btn-primary\" href='sign_up.php'?> Sign Up </a>
              <a class=\"btn btn-primary\" href='login.php'?>Log In</a>";
    }
    ?>

</div>

</body>

</html>