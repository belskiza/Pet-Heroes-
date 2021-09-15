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
        .navbar .navbar-nav .nav-link:hover {
            color: yellowgreen;
        }
        .navbar img {
            width: 40%;
            height: 40%;
        }
        @media only screen and (min-width: 960px) {
            .navbar .navbar-nav .nav-link {
                padding: 1em 0.7em;
            }
            .navbar {
                padding: 0;
            }
        }
        .navbar .navbar-nav .nav-link {
            position: relative;
            color: black;
        }
        .navbar .navbar-nav .nav-link::after {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            background-color: #BCE76D;
            color: transparent;
            width: 0%;
            content: '';
            height: 3px;
            transition: all 0.5s;
        }
        .navbar .navbar-nav .nav-link:hover::after {
            width: 100%;
        }

        .navbar li{
            font-family: "Chelsea Market";
            color: black;
            position: center;
            margin-right: 25%;
            margin-left: 25%;
        }
        .navbar{
            width: 100%;
            border-bottom: 3px solid #BCE76D;
        }

    </style>
</head>

<body> <!-- logo placeholder -->

<?php if (isset($_SESSION['username'])){
    echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>
                <a href='landing_page.php' ><img src='Files/logo.png'></a>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarToggler9'>
    <ul class='navbar-nav'>
      <li class='nav-item active'>
        <a class='nav-link' href='all_pets.php' style='font-size: 1.5vw'>All Pets</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='home.php'style='font-size: 1.5vw' >Matches</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='list.php' style='font-size: 1.5vw'>Upload</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='account.php' style='font-size: 1.5vw'>Account</a>
      </li>
    </ul>
  </div>
</nav>";


} else {
    echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>
                <a href='landing_page.php' ><img src='Files/logo.png'></a>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarNav'>
    <ul class='navbar-nav'>
      <li class='nav-item active'>
        <a class='nav-link' href='sign_up.php' style='font-size: 1.5vw'>Sign Up</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='login.php' style='font-size: 1.5vw'>Log In</a>
      </li>

    </ul>
  </div>
</nav>";

}
?>


</body>