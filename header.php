<!--
This page is the header page. It contains the navigation bar which has a logo, a pets link, a chat link, and an account
link. For adopters it has a swipe link and for owners it has a list link. Each link has a icon attached to it. This
nav bar appears at the top of the screen.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.css">

    <title> Pet Heroes </title>
    <link rel="shortcut icon" type="image/jpg" href="files/big_black_logo.png"/>
    <?php
    include_once 'additional/dbh.inc.php';
    session_start();
    ?>
    <?php require_once 'additional/profile_pic.inc.php'?>
    <link rel="stylesheet" href="css/style.css">
    <style>

        #navbar{
            position: fixed;
            z-index: 5;
        }
        .navbar-item:hover {
            color: yellowgreen;
        }
        @media only screen and (min-width: 960px) {
            .navbar .navbar-nav .nav-link {
                padding: 1em 0.7em;
            }
        }
        .col-sm {
            position: relative;
            background-color: #306844;
            color: antiquewhite;
        }
        #navbar-text{
            padding-top: 0.7%;

        }
        .navbar-item{
            color: whitesmoke;
            text-decoration: none;
            font-family:Maku;

        }
        .navbar-item:hover {
            text-decoration: none;
        }
        .navbar-item::after {
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
        .navbar-item:hover::after {
            width: 70%;
        }


        #navbar{
            position: sticky;
        }


    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js'></script>
</head>

<body>
<?php if (isset($_SESSION['username'])){
    if ($_SESSION['acc_type'] == 0) { ?>
        <div class='container-fluid' id='navbar'>
            <div class="row text-center" style="height: 70px">
                <div class="col-sm" style="background-color: #306844;">
                    <a  href='index.php' ><img src='files/Logo.PNG' style='width: 70px;margin-right: 50%;'></a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='all_pets.php' style='font-size: 2vw'>
                        <img src="files/Paw nav.png" style="width: 50px; height: 50px">
                        Pets</a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='chat.php' style='font-size: 2vw'>
                        <img src="files/chat.png" style="width: 65px; height: 50px">
                        Chat</a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='swipe.php'style='font-size: 2vw' >
                        <img src="files/Swipe.png" style="width: 53px; height: 50px">
                        Swipe</a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='account.php' style='font-size: 2vw'>
                        <img  src="uploads/<?php if(isset($profile_pic['destination'])){
                            echo $profile_pic['destination'];
                        } else {
                            echo 'profile_picture.png';
                        }?>" style="width: 50px; height:50px; border-radius: 50%;object-fit: cover;">

                        <?php echo ucfirst($_SESSION['username']); ?></a>
                </div>

                <div class="col-sm-2" style="background-color: #306844;"></div>
            </div>
        </div>
    <?php } else { ?>
        <div class='container-fluid' id='navbar'>
            <div class="row text-center" style="height: 70px">
                <div class="col-sm">
                    <a href='index.php' ><img src='files/Logo.PNG' style='width: 70px;margin-right: 50%;'></a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='all_pets.php' style='font-size: 2vw'>
                        <img src="files/Paw nav.png" style="width: 50px; height: 50px">
                        Pets</a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='chat.php' style='font-size: 2vw'>
                        <img src="files/chat.png" style="width: 65px; height: 50px">
                        Chat</a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='list.php' style='font-size: 2vw'>
                        <img src="files/list.png" style="width: 50px; height: 50px">
                        List</a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='account.php' style='font-size: 2vw'>
                        <img  src="uploads/<?php if(isset($profile_pic['destination'])){
                            echo $profile_pic['destination'];
                        } else {
                            echo 'profile_picture.png';
                        }?>" style="width: 50px; height:50px; border-radius: 50%;object-fit: cover;">

                        <?php echo ucfirst($_SESSION['username']); ?></a>
                </div>
                <div class="col-sm-2" style="background-color: #306844;"></div>
            </div>
        </div>
    <?php }?>

    <?php
} else { ?>
    <div class='container-fluid' id='navbar'>
        <div class="row text-center" style="height: 70px">
            <div class="col-sm" id="navbar-text">
            </div>
            <div class="col-sm">
                <a class="navbar-item" href='index.php' ><img src='files/logo.png' style='width: 70px;'></a>
            </div>
            <div class="col-sm" id="navbar-text">
                <a class='navbar-item' href='sign_up.php' style='font-size: 20pt'>sign up</a>
            </div>
            <div class="col-sm" id="navbar-text">
                <a class='navbar-item' href='login.php' style='font-size: 20pt'>log in</a>
            </div>
            <div class="col-sm" id="navbar-text">
            </div>
        </div>
    </div>
    <?php
}
?>

<br/>
</body>