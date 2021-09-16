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
            background-color: darkgrey;

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
            width: 100%;
            padding-left: 50%;
        }





    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js'></script>
</head>

<body> <!-- logo placeholder -->

<?php if (isset($_SESSION['username'])){
    echo "<nav class='navbar sticky-top navbar-expand-lg navbar-light bg-light'>
                <a href='landing_page.php' ><img src='Files/logo.png'></a>
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
        <a class='nav-link float-md-right' href='account.php' style='font-size: 1.5vw'>";echo $_SESSION['username']; echo"</a>
      </li>
    </ul>
  </div>
</nav>"; ?>


<div class="topnav">
    <img src="files/logo.png" style="width: 40px; position:fixed;"/>
    <?php if (isset($_SESSION['username'])){
        echo "<a href='profile.php' style='margin-left: 50px;' ?>".$_SESSION['first_name']."</a>";
        echo "<a href='home.php'?>Home</a>";
        echo "<a href='additional/logout.inc.php'?>Log Out</a>";
        echo "<a href='#about' ?>PLACEHOLDER</a>";

    } else {
        echo "<a href='sign_up.php'?> Sign Up </a>
              <a href='login.php'?>Log In</a>";
        echo "<a href='#about' ?>PLACEHOLDER</a>";

    }
    ?>
</div>
<?php
} else {
    echo "<nav class='navbar sticky-top navbar-expand-lg navbar-light bg-light'>
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