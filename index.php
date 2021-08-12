<?php
include_once 'additional/dbh.inc.php'
?>
<html>
<head>
    <title>Pet Heroes</title>
</head>

<body>
<?php include_once 'header.php'?>
<h1>Pet Heroes</h1>
<?php
    $sql = "SELECT * FROM users;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0 ){
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['first_name'];
        }
    }
?>

</body>

</html>