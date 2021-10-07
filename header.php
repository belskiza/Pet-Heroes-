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
        .navbar {
            border-bottom-style: solid;
            color: #BCE76D;
        }
        .navbar-nav{
            width: 100%;
        }
        .nav-item1 {
            margin-left: 2%;
        }
        .navbar .navbar-nav .nav-link:hover {
            color: yellowgreen;
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
            z-index: 2;
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

        .nav-item{
            margin-left: 13%;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js'></script>
</head>

<body>
<?php if (isset($_SESSION['username'])){ ?>
    <nav class='navbar sticky-top navbar-expand-lg navbar-light bg-light' style="font-family: 'Chelsea Market'">
        <a href='swipe.php' ><img src='Files/logo_black.png' style='width: 70px; margin-left: 5%'></a>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarToggler9'>
    <ul class='navbar-nav'>
      <li class='nav-item active'>
        <a class='nav-link' href='all_pets.php' style='font-size: 1.5vw'>Pets</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='home.php'style='font-size: 1.5vw' >Matches</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='list.php' style='font-size: 1.5vw'>Upload</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link float-md-right' href='account.php' style='font-size: 1.5vw'><?php echo $_SESSION['username']; ?></a>
      </li>
    </ul>
  </div>
</nav>
<?php
} else {
    echo "<nav class='navbar sticky-top navbar-expand-lg navbar-light bg-light'>
                <a href='index.php' ><img src='Files/logo_black.png' style='width: 70px; margin-left: 5%'></a>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarNav'>
    <ul class='navbar-nav'>
      <li class='nav-item1 active'>
        <a class='nav-link' href='sign_up.php' style='font-size: 1.5vw'>Sign Up</a>
      </li>
      <li class='nav-item1'>
        <a class='nav-link' href='login.php' style='font-size: 1.5vw'>Log In</a>
      </li>

    </ul>
  </div>
</nav>";

}
?>

</body>