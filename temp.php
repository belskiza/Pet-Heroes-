<html>
<head>
    <title>Pet Heroes</title>
</head>

<body>
<?php include_once 'header.php'?>

<div class="container-fluid">
    <?php
        echo "<h4> Username: <span class=\"badge bg-secondary\">".$_SESSION['username']."</span></h4>";
        echo "<h4> Firstname: <span class=\"badge bg-secondary\">".$_SESSION['first_name']."</span></h4>";
        echo "<h4> Lastname: <span class=\"badge bg-secondary\">".$_SESSION['last_name']."</span></h4>";
        echo "<h4> Email: <span class=\"badge bg-secondary\">".$_SESSION['email']."</span></h4>";
        echo "<a class=\"btn btn-primary\" href='index.php'?>Account Settings</a>";
        echo "<a class=\"btn btn-primary\" href='index.php'?>Account Preferences</a>";
        echo "<a class=\"btn btn-primary\" href='index.php'?></a>";
        echo "<a class=\"btn btn-primary\" href='index.php'?>  </a>";
        echo "<a class=\"btn btn-primary\" href='index.php'?>  </a>";
        echo "<a class=\"btn btn-danger\" href='index.php'?>back</a>";
    ?>

</div>

</body>

</html>