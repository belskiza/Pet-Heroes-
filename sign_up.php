<?php
include_once 'additional/dbh.inc.php'
?>
<html>
<head>
    <title>Pet Heroes</title>
</head>

<body style="background-color: whitesmoke">
<?php include_once 'header.php'?>
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
<div class="col-md-4" style="margin:auto; margin-top: 10%;">
    <div class="card-title">
        <h1> Sign Up </h1> <br/>
    </div>
    <div class="mb-3">
        <div class="row g-3">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label" ">First Name</label>
                <input type="text" class="form-control" placeholder="First name" aria-label="First name">
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label" ">Last Name</label>
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label" ">Username</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Username">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label" ">Password</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Password">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label" ">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div> <br/>
    <div class="mb-3">
        <div class="row g-3">
            <div class="col d-grid gap-2">
                <button type="button" class="btn btn-outline-danger" value="submit">Go Back</button>
            </div>
            <div class="col d-grid gap-2">
                <button type="button" class="btn btn-primary" value="submit">Submit</button>
            </div>
        </div>
    </div>
</div>


</body>

</html>
