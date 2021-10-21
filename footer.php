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
        .col-md-3 {
        }
        .col-md-3 a{
            color: grey;
        }
        .col-md-3 a:hover{
            color: #BCE76D;
        }
        .links a{
            text-decoration: none;
        }
        .links a {
            opacity: 70%;
        }
        .links a:hover {
            opacity: 100%;
        }
    </style>
</head>

<!-- Footer -->
<footer class="text-center text-lg-start  text-muted" style="background-color: ghostwhite; font-size: 1.5vw">
    <!-- Section: Social media -->
    <section
            class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
            style="background-color: ghostwhite">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div class="links">
            <a href="https://www.facebook.com/profile.php?id=100073803489883" class="me-4 text-reset">
                <img style="width: 35px" src="files/facebook.png">
            </a>
            <a href="https://www.instagram.com/_pet_heroes/" class="me-4 text-reset">
                <img style="width: 35px" src="files/instagram.jpg">
            </a>
            <a href="https://mobile.twitter.com/_Pet_Heroes?fbclid=IwAR2KOvZupi76Nn27RdgeJ8KToXpVDg6qyKQXigu_dnxLtXcdCuWYFaiNRLM" class="me-4 text-reset">
                <img style="width: 35px" src="files/twitter.png">
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="" style="background-color: ghostwhite; height: 30%">
        <div class="container text-center text-md-start mt-5" style="background-color: ghostwhite">
            <!-- Grid row -->
            <div class="row mt-3" style="background-color: ghostwhite;">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4"">
                        <i class="fas fa-gem me-3"></i>Pet Heroes
                    </h6>
                    <p>
                        "More than pets"
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="account.php" class="text-reset">Account</a>
                    </p>
                    <p>
                        <a href="swipe.php" class="text-reset">Matching</a>
                    </p>
                    <p>
                        <a href="liked_pets.php" class="text-reset">Liked Pets</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Contact
                    </h6>
                    <p><i class="fas fa-home me-3"></i> Brisbane, AU</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        pet.heroes@outlook.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> + 0417 699 292</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

</footer>
<!-- Footer -->