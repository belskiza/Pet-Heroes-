<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';
session_start();

$petsThatArentMine = fetchPetsThatArentMine($conn, $_SESSION['user_id']);
$personality = getQuiAnswersById($conn, $_SESSION['user_id'])->fetch_assoc();
$myMatches = fetchMySwipes($conn, $_SESSION['user_id']);

$cat_or_dog = $personality['question1'];
$living_size = $personality['question2'];
$free_time = $personality['question3'];
$active = $personality['question4'];
$colour = $personality['question5'];


$pet_ids = array();
$petsToFeedToUser = array();
// Adds all of their matched pets to a list to compare later
foreach ($petsThatArentMine as $pet){
    foreach($myMatches as $match){
        if ($pet['pet_id'] == $match['pet_id']){
            array_push($pet_ids, $pet['pet_id']);
        }
    }
}

// If they haven't done the personality quiz don't use recommendation algorithm
if(!isset($personality)){
    // Just feed them all pets they haven't matched with yet
    foreach ($petsThatArentMine as $pet){
        if (!in_array($pet['pet_id'], $pet_ids)){
            array_push($petsToFeedToUser, $pet);
        }
    }
} else {
    // If they haven't swiped on this pet yet
    foreach ($petsThatArentMine as $pet){
        if (!in_array($pet['pet_id'], $pet_ids)){
            //Score counter
            $score = 0;
            // If the type of animal is their preference or they want to see both
            if($pet["pet_type"] == $cat_or_dog || $pet['pet_type'] == 3){
                $score += 20;
            }
            // If the pet is suitable for their living space
            if($pet["pet_size"] <= $living_size){
                $score += 20;
            }
            // If the pet is active and the person is active
            // OR if the person is not active and the pet is small or old or a cat
            // OR if the person is active and the pet is big or young dog
            if($pet["active"] == $active || $pet["active"] == 0 || $pet["active"] == 1 && ($pet['pet_size'] >= 2 || ($pet['age'] <= 6 && $pet['pet_type'] == 2))
                || $pet["active"] == 2 && ($pet['pet_size'] <= 2 || $pet['age'] >= 6 || $pet['pet_type'] == 1)){
                $score += 20;
            }
            // If the person has enough time for a dog or not much time for a cat
            if($pet["pet_type"] == 2 && $free_time <= 2 || $pet['pet_type'] == 1 && $free_time >= 2){
                $score += 20;
            }
            // If the pet is the same colour as their preference
            if($pet['colour'] == 3 || $pet['colour'] == $colour){
                $score += 20;
            }
            // If they have 60% compatibility or more with the pet add it to the swipe feed
            if($score >= 60){
                array_push($petsToFeedToUser, $pet);
            }
        }
    }
}
$result = $petsToFeedToUser;


//Swipe functionality
if(isset($_GET['swipe']) && isset($_GET['id'])){
    $owner_id = fetchPetFromId($conn, $_GET['id'])->fetch_assoc()['user_id'];

    if ($_GET['swipe'] == 'left'){
        swipe($conn, $_GET['id'], $_SESSION['user_id'], 0, $owner_id);
    } else if ($_GET['swipe'] == 'right'){
        swipe($conn, $_GET['id'], $_SESSION['user_id'], 1, $owner_id);
    }
}


