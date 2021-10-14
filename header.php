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
            padding-top: 10pt;
        }
        .navbar-item{
            color: whitesmoke;
            text-decoration: none;
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
            width: 50%;

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
            <div class="row text-center">
                <div class="col-sm">
                </div>
                <div class="col-sm">
                    <a class="navbar-item" href='index.php' ><img src='files/logo.png' style='width: 70px;'></a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='all_pets.php' style='font-size: 20pt'>pets</a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='chat.php' style='font-size: 20pt'>chat</a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='swipe.php'style='font-size: 20pt' >swipe</a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='account.php' style='font-size: 20pt'><?php echo $_SESSION['username']; ?></a>
                </div>
                <div class="col-sm">
                </div>
            </div>
        </div>
   <?php } else { ?>
        <div class='container-fluid' id='navbar'>
            <div class="row text-center">
                <div class="col-sm">
                </div>
                <div class="col-sm">
                    <a class="navbar-item" href='index.php' ><img src='files/logo.png' style='width: 70px;'></a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='all_pets.php' style='font-size: 20pt'>pets</a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='chat.php' style='font-size: 20pt'>chat</a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='list.php' style='font-size: 20pt'>list</a>
                </div>
                <div class="col-sm" id="navbar-text">
                    <a class='navbar-item' href='account.php' style='font-size: 20pt'><?php echo $_SESSION['username']; ?></a>
                </div>
                <div class="col-sm">
                </div>
            </div>
        </div>
   <?php }?>

<?php
} else { ?>
<div class='container-fluid' id='navbar'>
    <div class="row text-center">
        <div class="col-sm" id="navbar-text">
        </div>
        <div class="col-sm">
            <a class="navbar-item" href='index.php' ><img src='Files/logo.png' style='width: 70px;'></a>
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
<br/><br/><br/><br/>
</body>