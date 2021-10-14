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
        width: 21%;

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
    <a href="account.php">
        <div class="row" style="margin-right: 0;">
        <div class="col-2">
            <img src='Files/Account_cogs.png' style='width: 40px;'>
        </div>
        <div class="col-10">
            Account Details
        </div>
        </div>
    </a>
    <a href="liked_pets.php">
        <div class="row">
            <div class="col-2">
                <img src='Files/paw.png' style='width: 40px;'>
            </div>
            <div class="col-10">
                Liked Pets
            </div>
        </div>
    </a>
    <a href="#">
        <div class="row" style="margin-right: 0;">
            <div class="col-2">
                <img src='Files/heart.png' style='width: 40px;'>
            </div>
            <div class="col-10">
                Matched Pets
            </div>
        </div>
    </a>
    <a href="/additional/logout.inc.php">
        <div class="row" style="margin-right: 0;">
            <div class="col-2">
                <img src='Files/exit_sign.png' style="width: 40px;">
            </div>
            <div class="col-10">
                Sign Out
            </div>
        </div>
    </a>

</div>
</body>
