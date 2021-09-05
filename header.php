<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <?php
    include_once 'additional/dbh.inc.php';
    session_start();
    ?>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .topnav{
            background-color: white;
            width: 100%;
        }
        .topnav a h3{
            color: black;
            font-family: "Chelsea Market";
            font-size: 1.5rem;
            position: center;
            margin-top: 30px;
            margin-right: 100px;
        }
        .topnav img {
            width: 80px;
            height: 80px;
        }
        .topnav {
            border-bottom: 3px solid #BCE76D;
        }

    </style>
</head>

<body> <!-- logo placeholder -->

<!-- NAVBAR -->
<div class=" topnav navbar navbar-expand-lg navbar-light">
    <div class="navbar-nav justify-content-between w-100">
    <?php if (isset($_SESSION['username'])){
        echo "<a href='landing_page.php' ><img src='Files/logo.png'></a>";
        echo "<a href='landing_page.php'><h3 style='font-size: 1.5vw'>Home</h3></a>";
        echo "<a href='home.php'><h3 style='font-size: 1.5vw'>Matches</h3></a>";
        echo "<a href='home.php'><h3 style='font-size: 1.5vw'>Upload</h3></a>";
        echo "<a href='account.php'><h3 style='font-size: 1.5vw'>Account</h3></a>";


    } else {
        echo "<a href='sign_up.php'> Sign Up </a>
              <a href='login.php'?>Log In</a>";
        echo "<a href='#about' ?>PLACEHOLDER</a>";

    }
    ?>
    </div>

</div>

</body>