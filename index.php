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
<?php
    $sql = "SELECT * FROM users;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0 ){
        while ($row = mysqli_fetch_assoc($result)) {
            echo 'this is an SQL test: '.$row['first_name'];
        }
    }
?>
<br/>
<div class="container-fluid">
    <a class="btn btn-primary" href="<?php echo 'sign_up.php'?>"> Sign Up </a>
    <a class="btn btn-primary" href="<?php echo 'login.php'?>">Log In</a>
</div>

</body>

</html>