<?php


echo $_POST["question1"];

session_start();
if (isset($_POST["question1"]) && isset($_POST["question2"]) && isset($_POST["question3"]) && isset($_POST["question4"]) && isset($_SESSION["user_id"])) {
    
    if ($_POST["question1"] == "0" || $_POST["question2"] == "0" || $_POST["question3"] == "0" || $_POST["question4"] == "0") {
        header("location: ../compatibility_quiz_retake.php?error=invalid_answers");
        exit();
    }

    $user_id = $_SESSION["user_id"];
    $question1 = $_POST["question1"];
    $question2 = $_POST["question2"];
    $question3 = $_POST["question3"];
    $question4 = $_POST["question4"];
    $question5 = $_POST["question5"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    changeQuizAnswers($conn, $user_id, $question1, $question2, $question3, $question4, $question5);

} else {
    header("location: ../compatibility_quiz_retake.php?error=invalid_answers");
    exit();
}