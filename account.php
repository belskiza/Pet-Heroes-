<!--
This page is the account page. It displays their account account information and profile picture. If they haven't
completed their account information, questionnaire or uploaded a profile picture, these options are displayed. If the
user is an owner, an extra section is down the bottom that shows the pets they listed.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once 'additional/dbh.inc.php';
    session_start();
    ?>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once 'header.php'?>
    <?php require_once 'additional/mypets.inc.php'?>
    <?php require_once 'additional/profile_pic.inc.php'?>
    <?php require_once 'additional/functions.inc.php'?>
    <?php require_once 'additional/about_me.inc.php'?>

    <style>

        .animation{


        }

        @keyframes slideInFromLeft {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(0);
            }
        }

        .boxhead a {
            color: black;
            text-decoration: none;
        }

        .card-header{
            font-size: 2vw;
        }
        .card-body{
            font-size: 1.7vw;
        }
        .card-body a {
            font-size: 1.2vw;
        }
        .button {
            background-color: #306844;
            border-color: #306844;
            color: white;
        }
        .button:hover {
            background-color: green;
            border-color: green;
            color: white;
        }
        .button2 {
            background-color: #182c25;
            border-color: #182c25;
            color: white;
        }
        .button2:hover {
            background-color:#42574f;
            border-color: #42574f;
            color: white;
        }
        .input-group span{
            background-color: #306844;
            border-color: #306844;
            color: white;
        }
        .span1 {
            background-color: white;
        }
    </style>
    <script>
        sessionStorage.clear();
    </script>
</head>

<body style="background-color: ghostwhite; font-family: Maku;">

<div class="animation">

<div class="container" style="width: 65%">
    <?php
    if (isset($_GET["message"])) {
        if ($_GET["message"] == "list_success") {
            echo "<div class=\"alert alert-success\" role=\"alert\">Pet Sucessfully Listed!
                    </div>";
        } else if ($_GET["message"] == "edit_profile_success") {
            echo "<div class=\"alert alert-success\" role=\"alert\">Profile Sucessfully Updated
                    </div>";
        }
    }
    ?>
    <div class="row">
        <div class="col-sm-6">
            <h4 style="font-size: 3vw;">Welcome back, <?php echo $_SESSION['first_name']; ?></h4>
        </div>
        <div class="col-sm-6">
            <div class="row" style="margin-top: 3%">
                <div class="col">
                    <a class="btn button" href="edit_profile.php?edit=<?php echo $_SESSION['user_id']?>" style="width: 100%; font-size: 1.5vw">Edit Profile</a>
                </div>
                <div class="col">
                    <a class="btn button2" href="/additional/logout.inc.php" style="width: 100%; font-size: 1.5vw">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col" style="font-size: 1.7vw">
            Account Type: <?php if ($_SESSION['acc_type'] == 0) echo "Adopter"; else echo "Owner";?>
        </div>
    </div>
    <hr/>
</div>

<div class="container" style="width: 65%">
    <div class="row">
        <div class="col-sm-6">
            <?php if(!isset($about_me)){ ?>
                <div class="row">
                    <div class="card" style="width: 100%">
                        <div class="card-header" style="background-color: #306844; color: white">
                            About me
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Complete your About me page to stand out from other adopters to owners!</h5>
                            <a class="btn button" href="about_me.php" >About Me</a>
                        </div>
                    </div>
                </div> <br/>
            <?php } else {?>
                    <div class="row mb-3">
                    <div class="input-group col-sm-12" >
                        <span class="input-group-text" style="width: 20%; font-size: 1.5vw;">Age</span>
                        <span class="input-group-text span1" style="width: 20%; font-size: 1.5vw; background-color: white; color: black"> <?php echo $age;?></span>

                    </div>
                    </div>
                <div class="row mb-3">
                    <div class="input-group col-sm-12">
                        <span class="input-group-text" style="width: 20%; font-size: 1.5vw;"">Sex</span>
                        <span class="input-group-text span1" style="width: 20%; font-size: 1.5vw; background-color: white; color: black"> <?php echo $sex;?></span>
                    </div>
                    <div class="input-group col-sm-2">
                    </div>
                </div>
                <div class="row mb-3">

                    <div class="input-group col-sm-12">
                        <span class="input-group-text" style="width: 30%; font-size: 1.5vw">Occupation</span>
                        <span class="input-group-text span1" style="width: 40%; font-size: 1.5vw; background-color: white; color: black"> <?php echo $occupation;?></span>
                    </div>
                    <div class="input-group col-sm-4">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="input-group col-sm-12">
                        <div class="card" style="width: 100%">
                            <div class="card-header" style="background-color: #306844; color: white; font-size: 1.5vw; height: 40%; margin-top: 0;">
                                Description
                            </div>
                            <div class="card-body" style="font-size: 1.3vw">
                                <?php echo $description;?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php } if (!isset($personality)){ ?>
                    <div class="row mb-3">
                        <div class="card" style="width: 100%">
                            <div class="card-header" style="background-color: #306844; color: white">
                                Compatibility Quiz
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Complete your compatibility quiz to get recommended pets that suit your lifestyle!</h5>
                                <a class="btn button" href="compatibility_quiz.php" >Take Quiz</a>
                            </div>
                        </div>
                    </div> <br/>
           <?php } else { ?>
                <div class="row mb-3">
                    <div class="input-group col-sm-12">
                        <div class="card" style="width: 100%">
                            <div class="card-header" style="background-color: #306844; color: white; font-size: 1.5vw; height: 40%; margin-top: 0;">
                                Quiz Answers:     
                            </div>
                            <div class="card-body" style="font-size: 1.3vw">
                                <h5><b>Cat or dog person</b></h5>
                                <p><?php switch ($personality['question1']){
                                    case 1:
                                        echo "Cat Person";
                                        break;
                                    case 2:
                                        echo "Dog Person";
                                        break;
                                    case 3:
                                        echo "Both";
                                        break;
                                }?></p>
                                <h5><b>Living arrangement size</b></h5>
                                <p><?php switch ($personality['question2']){
                                    case 1:
                                        echo "Small";
                                        break;
                                    case 2:
                                        echo "Medium";
                                        break;
                                    case 3:
                                        echo "Large";
                                        break;
                                }?></p>
                                    <h5><b>Free time</b></h5>
                                <p><?php switch ($personality['question3']){
                                        case 1:
                                            echo "Lots";
                                            break;
                                        case 2:
                                            echo "Some";
                                            break;
                                        case 3:
                                            echo "Not Much";
                                            break;
                                    }?></p>
                                    <h5><b>Active?</b></h5>
                                <p><?php switch ($personality['question4']){
                                        case 1:
                                            echo "Yes";
                                            break;
                                        case 2:
                                            echo "No";
                                            break;
                                    }?></p>
                                <h5><b>Animal Colour Preference</b></h5>
                                <p><?php switch ($personality['question5']){
                                        case 1:
                                            echo "Light";
                                            break;
                                        case 2:
                                            echo "Dark";
                                            break;
                                    }?></p>
                                <a class="btn button" href="compatibility_quiz_retake.php" style="margin-left: 5;">Retake Quiz</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
           <?php }?>

        </div>
        <div class="col-sm-6">
            <div class="card" style="width: 100%; height: 98%;">
                <div style="width: 100%; height: 100%; margin-left: 10%; margin-top: 10%">
                    <img src="uploads/<?php if(isset($pfp['destination'])){
                        echo $pfp['destination'];
                    } else {
                        echo 'profile_picture.png';
                    }?>" alt="Card image caps" style="width: 80%; height: 80%; object-fit: cover; "/>
                </div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col">
                            <?php if ($pfp['destination'] == null) { ?>
                                <a class="btn button text-right" href="setup_profile_picture.php">Upload Profile Picture</a>
                           <?php  } else { ?>
                                <a class="btn button text-right" href="edit_profile_picture.php">Edit Profile Picture</a>
                           <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<?php
if (isset($_GET["message"])) {
    echo "<div class='container-fluid' style=\"width:90%; margin-top: 1%\">";
    if ($_GET["message"] == "delete_success") {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Pet Sucessfully Delisted!
                    </div>";
    } else if ($_GET["message"] == "list_success") {
        echo "<div class=\"alert alert-success\" role=\"alert\">Pet Sucessfully Listed!
                    </div>";
    } else if ($_GET["message"] == "update_success") {
        echo "<div class=\"alert alert-info\" role=\"alert\">Pet Sucessfully Updated!
                    </div>";
    }
    echo "</div>";
}
?>
    <?php if ($_SESSION['acc_type'] == 1){?>
        <div class="container-fluid" style="width: 65%">
            <h1>My Pets</h1> <br/>
            <table class="table table-striped table-hover">
                <thead style="background-color: #182c25; color: white; text-align: center">
                <tr>
                    <th>Image</th>
                    <th>Name </th>
                    <th>Breed</th>
                    <th>Age</th>
                    <th>Location</th>
                    <th>Action</th>
                    <th>Swipes</th>
                </tr>
                </thead>

                <?php while ($row = $result->fetch_assoc()){?>
                    <tr style="text-align: center">
                        <td><img src="uploads/<?php echo $row['picture_destination']?>" style="max-width: 150px"/></td>
                        <td><b><?php echo $row['pet_name']?></b></td>
                        <td><?php echo $row['breed']?></td>
                        <td><?php echo $row['age']?></td>
                        <td><?php echo $row['location']?></td>
                        <td>
                            <?php if ($row ['valid_listing'] == 1){ ?>
                                <a href="pet.php?pet=<?php echo $row['pet_id'];?>" class="btn btn-secondary" style="background-color: #455b55">View</a>
                                <?php if ($row['user_id'] == $_SESSION['user_id']){
                                    ?>
                                    <a href="list.php?edit=<?php echo $row['pet_id'];?>" class="btn btn-secondary" style="background-color: #306844">Edit</a>
                                    <a href="additional/list.inc.php?delete=<?php echo $row['pet_id']; ?>" class="btn btn-danger">Delist</a>
                                    <?php
                                } else {
                                    echo null;
                                } ?>
                            <?php } else { ?>
                                <button type="button" class="btn btn-secondary" disabled>Adopted</button>
                                <a href="additional/list.inc.php?delete=<?php echo $row['pet_id']; ?>" class="btn btn-danger">Delete</a>
                           <?php  }?>

                        </td>
                        <td><?php if ($row ['valid_listing'] == 1){ ?>
                                <?php $matches = swipesWithMyPets($conn, $user_id);
                                while ($match = $matches->fetch_assoc()) {
                                    if($match['pet_id'] == $row['pet_id']){
                                        $user = fetchUserFromId($conn,$match['user_id'])->fetch_assoc();
                                        $pfp = fetchProfilePicById($conn,$user['user_id'])->fetch_assoc();
                                        ?> <div class="row">
                                            <a href="user.php?id=<?php echo $user['user_id'];?>&pet=<?php echo $row['pet_id'];?>" class="btn btn-outline-dark">
                                                <div class="col">
                                                    <img src="uploads/<?php if(isset($pfp['destination'])){
                                                        echo $pfp['destination'];
                                                    } else { echo 'profile_picture.png';}?>"  style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%"/>
                                                </div>
                                                <?php echo $user['username'];?>
                                            </a>
                                        </div>

                                        <br/>
                                        <?php
                                    }
                                }?>
                           <?php }?>
                        </td>
                    </tr>
                    <?php
                } ?>
            </table>
        </div>
    <?php } else { ?>

<?php } ?>
</div>
</body>
<?php include_once 'footer.php'?>