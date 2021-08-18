<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <?php
    include_once 'additional/dbh.inc.php';
    session_start();
    ?>
</head>

<body>
<a href="index.php"><h1 class="display-6">Pet Heroes</h1></a> <!-- logo placeholder -->

<div class="container-fluid">
    <?php if (isset($_SESSION['username'])){
        echo "<a class=\"btn btn-primary\" href='profile.php'?>".$_SESSION['first_name']."</a>";
        echo "<a class=\"btn btn-warning\" href='additional/logout.inc.php'?>Log Out</a>";
    } else {
        echo "<a class=\"btn btn-primary\" href='sign_up.php'?> Sign Up </a>
              <a class=\"btn btn-primary\" href='login.php'?>Log In</a>";
    }
    ?>

</div>
</body>