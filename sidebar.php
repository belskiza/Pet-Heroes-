<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once 'additional/dbh.inc.php';
    session_start();
    ?>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <style>


    .sidenav {
        height: 100%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        overflow-x: hidden;
        padding-top: 15%;

    }

    .sidenav a {
        padding: 6px 6px 6px 10px;
        text-decoration: none;
        font-size: 1.7vw;
        color: black;
        display: block;
        margin-top: 8%;
    }

    .sidenav a:hover {
        color: #BCE76D;
    }

    </style>
<script>
    sessionStorage.clear();
</script>
</head>

<body>
<div id="mySidenav" class="sidenav" style="font-family: 'Chelsea Market'">
    <a href="account.php"><img src='Files/logo_black.png' style='width: 50px;'>Account Details</a>
    <a href="liked_pets.php"><img src='Files/logo_black.png' style='width: 50px;'>Liked Pets</a>
    <a href="#"><img src='Files/logo_black.png' style='width: 50px;'>Matched Pets</a>
    <a href="/additional/logout.inc.php" ><img src='Files/logo_black.png' style='width: 50px;'>Sign Out</a>
</div>
</body>
