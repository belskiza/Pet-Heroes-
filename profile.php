<html>
<head>
    <title>Profile</title>
</head>
<body >

<?php include_once 'header.php'?>

<div class="container-fluid">   
    <?php
        echo "<h4> Username: <span class=\"badge bg-secondary\">".$_SESSION['username']."</span></h4>";
        echo "<h4> Firstname: <span class=\"badge bg-secondary\">".$_SESSION['first_name']."</span></h4>";
        echo "<h4> Lastname: <span class=\"badge bg-secondary\">".$_SESSION['last_name']."</span></h4>";
        echo "<h4> Email: <span class=\"badge bg-secondary\">".$_SESSION['email']."</span></h4>";
        echo "<a class=\"btn btn-primary\" href='index.php'?>Settings</a>";
        echo "<a class=\"btn btn-primary\" href='index.php'?>Preferences</a>";
        echo "<a class=\"btn btn-danger\" href='index.php'?>back</a>";
    ?>
</div>

<div class="col-md-6" style="background-color: whitesmoke; margin: auto; height: 100%; padding: 20pt;" >
    <h4 class = "display-6">Welcome back <?php echo $_SESSION['first_name']?>!</h4>
    <p class="lead">
        Your account is not fully set up. Please follow the below steps to set up your account.
    </p>
    <div class="progress">
        <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar"
             aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 30%"></div>
    </div> <br/>
    <div class="mb-3">
        <div class="row g-3">
            <div class="card col">
                <h5 class="card-header">Verify Email Address</h5>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Verify now</a>
                </div>
            </div>
            <div class="card col">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>

