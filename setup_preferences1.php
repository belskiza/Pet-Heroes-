<html>
<head>
<?php include_once 'header.php'?>

<style>
    .down-one {
        margin-bottom: 1cm;
    }

    .header h1 {
        font-size: 3vw;
        color: black;
        font-family: "Chelsea Market";
        margin-top: 10%;
    }
    .header img{
        margin-left: 55%;
        margin-top: 3%;
    }

    .left_container {
        margin-top: 3.5%;
    }

    .container {
        margin-top: 3.5%;
        margin-left: 5%;
    }
    
    .questions {
        margin-top: 5%;
    }
    .questions h1 {
        font-size: 2.5vw;
        color: black;
        font-family: "Chelsea Market";
        margin-top: 1%;
    }
    .questions h4 {
        font-size: 1.75vw;
        color: black;
        font-family: "Chelsea Market";
        margin-top: 1%;
    }
    .container h6 {
        font-size: 1.25vw;
        color: black;
        font-family: "Chelsea Market";
        margin-top: 1%;
    }
    .container h1 {
        font-size: 4vw;
        color: black;
        font-family: "Chelsea Market";
        margin-top: 1%;
        font-weight: 500;
    }
    .col-sm-6 {
        margin-top: 1%;
    }
    .col-sm-6 h1 {
        font-size: 2.5vw;
        color: black;
        font-family: "Chelsea Market";
        margin-top: 1%;
    }
    .col-sm-8 h1 {
        font-size: 2.5vw;
        color: black;
        font-family: "Chelsea Market";
        margin-top: 7%;
    }
    .col-sm-8 p {
        font-size: 2vw;
        color: black;
        font-family: "Chelsea Market";
    }
    .images{
        position: fixed;
        margin-left: 75%;
        margin-top: 9%;
    }

    .btn{
        background: #BCE76D;
        border-color:#BCE76D;
        width: 25%;
        font-size: 1.3vw;
        margin-left: 7%;
        border-width: 5px;
        font-family: "Chelsea Market";
    }
</style>

<body>

<div class="container">
    <form action="additional/quiz.php" method="post">
        <?php
            if (isset($_GET["message"]) || isset($_GET["error"])) {
                echo "<div class='left_container'>";
                if ($_GET["error"] == "invalid_answers") {
                    echo "<div class=\"alert alert-danger col-md-5\" role=\"alert\">Invalid Answers, please fill in all questions.</div>";
                } 
                echo "</div>";
            }
        ?>
        <h1> Personality Quiz </h1> 
        <h6> Pick the most appropriate answer to the questions so we can give you the best matches</h6>
        <div class="questions">
            <label for="exampleDataList" class="form-label"><h4>Are you an active person?</h4></label>
            <select name="question1" id="question1" class="form-select" aria-label="Default select example" style="position: relative; right: -100px" required>
                <option value="0">Select</option>
                <option value="1">Yes</option>
                <option value="2">No</option>
            </select>

            <p class='down-one'>
            </p>

            <label for="exampleDataList" class="form-label"><h4>What is your favourite colour?</h4></label>
            <select name="question2" id="question2" class="form-select" aria-label="Default select example" style="position: relative; right: -55px" required>
                <option value="0">Select</option>
                <option value="1">Yes</option>
                <option value="2">No</option>
            </select>

            <p class='down-one'>
            </p>

            <label for="exampleDataList" class="form-label"><h4>Do you like to help others?</h4></label>
            <select name="question3" id="question3" class="form-select" aria-label="Default select example" style="position: relative; right: -90px" required>
                <option value="0">Select</option>
                <option value="1">Yes</option>
                <option value="2">No</option>
            </select>

            <p class='down-one'>
            </p>

            <label for="exampleDataList" class="form-label"><h4>Are you affectionate?</h4></label>
            <select name="question4" id="question4" class="form-select" aria-label="Default select example" style="position: relative; right: -145px" required>
                <option value="0">Select</option>
                <option value="1">Yes</option>
                <option value="2">No</option>
            </select>

            <p class='down-one'>
            </p>
            
            <button class="btn btn-primary" type="submit" style="width: 20%; margin-top: 2%; margin-left: 0%;">Next Page</button>
        </div>
    </form>
</div>
</body>
</head>
<html>