<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <?php
    include_once 'additional/dbh.inc.php';
    session_start();
    ?>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .topnav{
            background-color: limegreen;
        }
    </style>
</head>

<body> <!-- logo placeholder -->

<!-- NAVBAR -->

<div class="topnav">
    <?php if (isset($_SESSION['username'])){
        echo "<a href='profile.php'?>".$_SESSION['first_name']."</a>";
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




</div>
</body>