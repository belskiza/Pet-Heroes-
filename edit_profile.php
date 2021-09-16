
<head>
    <?php
    require_once 'header.php';
    require_once 'additional/editprofile.inc.php';

    ?>
</head>
<body>
<div class="alert alert-secondary col-md-4" style="margin:auto; margin-top: 1%; padding: 3%; background-color: whitesmoke; min-width: 400pt">
    <form action="additional/editprofile.inc.php" method="post">
        <h1 class="display-6"> Edit Profile </h1>
        <hr class="my-4">

        <div class="mb-3">
            <div class="row g-3">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label" >First Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="First name..."
                           aria-label="First name" value="">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label" ">Last Name</label>
                    <input type="text" name ="last_name" class="form-control" placeholder="Last name..."
                           aria-label="Last name">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label" ">Email address</label>
            <input type="email" name="email" class="form-control" id="form-control" placeholder="name@example.com...">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label" ">Username</label>
            <input type="username" name="username" class="form-control" id="form-control" placeholder="Username...">
        </div>
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-3 pt-0">Account Type:</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="acc_type" id="adopter" value="adopter" checked>
                        <label class="form-check-label" for="adopter">
                            Adopter
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="acc_type" id="owner" value="owner">
                        <label class="form-check-label" for="owner">
                            Owner / Breeder
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
        <br/>
        <div class="mb-3">
            <div class="row g-3">
                <div class="col d-grid gap-2">
                    <a class="btn btn-outline-success" href="<?php echo 'login.php'?>">Log In </a>
                </div>
                <div class="col d-grid gap-2">
                    <a class="btn btn-outline-danger" href="<?php echo 'index.php'?>">Go Back </a>
                </div>
            </div> <br/>
            <div class="col d-grid gap-2">
                <button type="submit" name= "submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

</div>
</body>
