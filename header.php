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
        }
    </style>
</head>

<body> <!-- logo placeholder -->

<!-- NAVBAR -->

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
</body>