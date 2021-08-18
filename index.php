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
        echo "<div class=\"alert alert-success col-md-5\" role=\"alert\">You are now logged out
                    </div>";
    }
    if ($_GET["message"] == "login") {
        echo "<div class=\"alert alert-success col-md-5\" role=\"alert\">You are now logged in
                    </div>";
    }
    echo "</div>";
}
?>
<br/>
<?php if (isset($_SESSION['acc_type']) && $_SESSION['acc_type'] == 0){
    echo "<h1>Account Type: Adopter</h1>";
} else if (isset($_SESSION['acc_type']) && $_SESSION['acc_type'] == 0){
     echo "<h1>Account Type: Owner</h1>";
} ?>
</body>

</html>