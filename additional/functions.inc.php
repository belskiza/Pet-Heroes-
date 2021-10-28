<?php
/**
 * A function which checks if any of the input fields are blank
 * @param $first_name - first name of new user
 * @param $last_name - last name of new user
 * @param $email - email of new user
 * @param $username - username of new user
 * @param $password - password of new user
 * @param $password_confirm - confirmed password of new user
 * @return bool - true if any of the details are empty, false otherwise
 */
function emptyInputSignup($first_name, $last_name, $email, $username, $password, $password_confirm) {
    if (empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($password) ||
        empty($password_confirm)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

/**
 * Checks if any of the inputs are empty when a user is editing their profile
 * @param $first_name - first name of user
 * @param $last_name - last name of user
 * @param $email - email of user
 * @param $username - username of user
 * @return bool - true of any of the details are empty, false otherwise
 */
function emptyInputEdit($first_name, $last_name, $email, $username) {
    if (empty($first_name) || empty($last_name) || empty($email) || empty($username)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

/**
 * Checks if any of the inputs for the pet is empty
 * @param $name - name of the pet
 * @param $location - location of the pet
 * @param $breed - breed of the pet
 * @param $age - age of the pet
 * @param $user_id - id of the pet owner
 * @param $description - description of the pet
 * @param $pet_type - type of pet
 * @param $size - size of pet
 * @param $vaccinated - is the pet vaccinated?
 * @param $desexed - is the pet desexed?
 * @param $microchip - is the pet microchipped?
 * @param $gender - gender of the pet
 * @param $colour - colour of the pet
 * @param $active - is the pet active?
 * @return bool true if any of the inputs are empty. false otherwise
 */
function emptyInputList($name, $location, $breed, $age, $user_id, $description, $pet_type,
                        $size, $vaccinated, $desexed, $microchip, $gender, $colour, $active){
    if(empty($name) || empty($location) || empty($breed) || empty($age) || empty($user_id) || empty($description) || empty($pet_type) ||
    empty($size) || empty($vaccinated) || empty($desexed) || empty($microchip) || empty($gender) || empty($colour)|| empty($active)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;

}

/**
 * Checks to see if either the lat or lon are empty
 * @param $lat - latitude of the user
 * @param $lon - longitude of the user
 * @return bool - true if empty. false if not.
 */
function emptyLatLon($lat, $lon){
    if(empty($lat) || empty($lon)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;

}

/**
 * A function which checks if the username contains invalid characters
 * @param $username - submitted username in sign up form
 * @return bool - false if username is acceptable. True otherwise
 */
function invalidUsername($username) {
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    return $result;
}

/**
 * A function which checks if an email is in the correct format
 * @param $email - submitted email in sign up form
 * @return bool - false if email is in the correct format. True otherwise
 */
function invalidEmail($email) {
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    return $result;
}

/**
 * A function which checks that the passwords match
 * @param $password - password of new user
 * @param $password_confirm - confirmed password of new user
 * @return bool - false if passwords do match. True otherwise
 */
function passwordMatch($password, $password_confirm) {
    $result = false;
    if ($password !== $password_confirm){
        $result = true;
    }
    return $result;
}

/**
 * Checks if both passwords are the same
 * @param $password - password
 * @param $password_confirm - confirm password
 * @return bool - true if they are the same. False otherwise
 */
function passwordCheck($password, $password_confirm) {
    $result = false;
    return $result;
}

/** A function which checks if the given username or email already exist in the users table of our database
 * @param $conn - connection to SQL
 * @param $username - given username
 * @param $email - given email
 * @return bool|string[]|null - returns the row where the username or email may exist. False if it cannot find any
 * matches
 */
function usernameEmailExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

/**
 * Creates the user as a new row in the users table of the database
 * @param $conn - connection to SQL
 * @param $first_name - first name
 * @param $last_name - last name
 * @param $email - email
 * @param $username - username
 * @param $password - password
 */
function createUser($conn, $first_name, $last_name, $email, $username, $password , $acc_type, $phone){
    $sql = "INSERT INTO users (username, password, first_name, last_name, email, acc_type, phone) VALUES (?, ?, ?, ?, ?, ?, ?);";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }
    //encrypts the password so you cant see it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $username, $hashed_password, $first_name, $last_name, $email, $acc_type, $phone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php?message=sign_up_success");
    exit();

    #Can't get this working atm
    #Need to create new row in database with column
    #$id = mysqli_insert_id($stmt);
    #print($id);
    #createAccountSetup($conn, $id);
}

/**
 * Creates the about me for the user in the database
 * @param $conn - connection to the database
 * @param $user_id - id of the user
 * @param $age - age of the user
 * @param $sex - sex of the user
 * @param $occupation - occupation of the user
 * @param $living_status - living status of the user
 * @param $description - description of the user
 */
function submitAboutMe($conn, $user_id, $age, $sex, $occupation, $living_status, $description){
    $sql = "INSERT INTO about_me (user_id, age, sex, occupation, living_status, description) VALUES (?, ?, ?, ?, ?, ?);";

    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssss", $user_id, $age, $sex, $occupation, $living_status, $description);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../account.php?message=edit_profile_success");
    exit();
}

/**
 * Edit the about me for the user in the database
 * @param $conn - connection to the database
 * @param $user_id - id of the user
 * @param $age - age of the user
 * @param $sex - sex of the user
 * @param $occupation - occupation of the user
 * @param $living_status - living status of the user
 * @param $description - description of the user
 */
function editAboutMe($conn, $user_id, $age, $sex, $occupation, $living_status, $description){
    $sql = "UPDATE about_me SET age='$age', sex='$sex', occupation='$occupation', living_status='$living_status', 
description='$description' WHERE user_id ='$user_id';";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../account.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../account.php?message=edit_profile_success");
    exit();
}

/**
 * Update the details of the user in the database
 * @param $conn - connection to the database
 * @param $first_name - first name of the user
 * @param $last_name - last name of the user
 * @param $email - email of the user
 * @param $username - username of the user
 * @param $user_id - id of the user
 * @param $phone - phone number of the user
 */
function updateUser($conn, $first_name, $last_name, $email, $username, $user_id, $phone){
    $sql = "UPDATE users SET username='$username', first_name='$first_name', last_name='$last_name', email='$email', 
phone='$phone' WHERE user_id ='$user_id';";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../account.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../account.php?message=edit_profile_success");
    exit();
}

/**
 * Update the account type of the user
 * @param $conn - connection to the database
 * @param $acc_type - account type of the user (adopter or owner)
 * @param $user_id - id of the user
 */
function updateAccType($conn, $acc_type, $user_id){
    session_start();
    $sql = "UPDATE users SET acc_type='$acc_type' WHERE user_id = '$user_id';";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../account.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['acc_type'] = $acc_type;
    header("location: ../account.php?message=edit_profile_success");
    exit();
}


/**
 * Checks if the inputted fields of the login page are empty
 * @param $username - username
 * @param $password - password
 * @return bool - true if either field is empty. False otherwise
 */
function emptyInputLogin($username, $password) {
    if (empty($username) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

/**
 * Logs the user in to the website and creates global session variables using the users details
 * @param $conn - connection to SQL
 * @param $username - username
 * @param $password - password
 */
function loginUser($conn, $username, $password) {
    $userExists = usernameEmailExists($conn, $username, $username);

    if ($userExists === false) {
        header("location: ../login.php?error=wrong_login");
        exit();
    }

    $passwordHashed = $userExists["password"];
    $checkPassword = password_verify($password, $passwordHashed);

    if ($checkPassword === false) {
        header("location: ../login.php?error=wrong_login");
        exit();
    }
    else if ($checkPassword === true) {
        session_start();
        $_SESSION["user_id"] = $userExists["user_id"];
        $_SESSION["username"] = $userExists["username"];
        $_SESSION["email"] = $userExists["email"];
        $_SESSION["first_name"] = $userExists["first_name"];
        $_SESSION["last_name"] = $userExists["last_name"];
        $_SESSION["acc_type"] = $userExists["acc_type"];
        console.log($_SESSION['user_id']);

        //Cant get this to work currently
        /*
        if($remember_me != 0){
            setcookie('username', $remember_me, time() + 3600 * 24 * 7);
            $_COOKIE['username'] = $remember_me;
        } else {
            setcookie('1', "1", time() + 3600 * 24 * 7);
        } */
        header("location: ../account.php");
        exit();
    }
}

/**
 * Inserts all of the details of the pet into the database
 * @param $conn - connection to the database
 * @param $name - name of the pet
 * @param $location - location of the pet
 * @param $breed - breed of the pet
 * @param $age - age of the pet
 * @param $user_id - id of the owner of the pet
 * @param $picture_destination - destination of the first picture
 * @param $description - desciption of the pet
 * @param $pet_type - type of pet
 * @param $size - size of pet
 * @param $vaccinated - is the pet vaccinated
 * @param $desexed - is the pet desexed?
 * @param $microchip - is the pet microchipped?
 * @param $picture_destination2 - destination of the first picture
 * @param $picture_destination3 - destination of the second picture
 * @param $picture_destination4 - destination of the third picture
 * @param $gender - gender of the pet
 * @param $colour - colour of the pet
 * @param $lat - latitude of the ownerr
 * @param $lon - longitude of the owner
 * @param $active - is the pet active?
 */
function listPet($conn, $name, $location, $breed, $age ,$user_id, $picture_destination, $description,
                 $pet_type, $size, $vaccinated, $desexed, $microchip, $picture_destination2, $picture_destination3,
                 $picture_destination4, $gender, $colour, $lat, $lon, $active){
    $conn->query("INSERT INTO pets (pet_name, location, user_id, breed, age, picture_destination, description,
pet_type, pet_size, vaccinated, desexed, microchip, picture_destination2, picture_destination3, picture_destination4, 
gender, colour, lat, lon, valid_listing, active) VALUES 
('$name', '$location', '$user_id', '$breed', '$age', '$picture_destination', '$description', '$pet_type', '$size', 
'$vaccinated','$desexed','$microchip', '$picture_destination2', '$picture_destination3', '$picture_destination4', 
'$gender', '$colour', '$lat', '$lon', '1', '$active')") or die ($conn->error);
    header("location: ../account.php?message=list_success");
    exit();
}

/**
 * Uploads the profile pic into the database
 * @param $conn - connection to the database
 * @param $destination - filepath of the profile picture
 * @param $user_id - id of the user
 */
function uploadProfilePic($conn, $destination, $user_id){
    $conn->query("INSERT INTO profile_pic (user_id, destination) VALUES ('$user_id', '$destination')") or die ($conn->error);
    header("location: ../account.php?message=pfp_success");
    exit();
}

/**
 * Updates the users profile picture in the database
 * @param $conn - connection to the database
 * @param $destination - filepath of the new profile picture
 * @param $user_id - id of the user
 */
function updateProfilePic($conn, $destination, $user_id){
    $conn->query("UPDATE profile_pic SET destination='$destination' WHERE user_id='$user_id';") or die ($conn->error);
    header("location: ../account.php?message=pfp_success");
    exit();
}

/**
 * Sends a message in the chat
 * @param $conn - connection to the database
 * @param $sender_id - user id of the sender
 * @param $receiver_id - user id of the receiver
 * @param $contents - message contents
 * @param $pet_id - id of the pet in which the sender and reciever are having a conversation about
 */
function sendMessage($conn, $sender_id, $receiver_id, $contents, $pet_id){
    $conn->query("INSERT INTO messages (sender_id, receiver_id, contents, pet_id) VALUES 
('$sender_id', '$receiver_id', '$contents', '$pet_id')") or die ($conn->error);
    header("location: ../message.php?id=$receiver_id&pet=$pet_id");
    exit();
}

/**
 * Fetches the specific profile picture of that user by their ID
 * @param $conn - connection to the database
 * @param $user_id - id of the user
 * @return false|mysqli_result - if the statement fails
 */
function fetchProfilePicById($conn, $user_id){
    $sql = "SELECT * FROM profile_pic WHERE user_id = '$user_id';";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $resultData;
}

/**
 * Returns true if a match exists between you and the owners pet
 * @param $conn - connection to the database
 * @param $their_id - id of the other person
 * @param $your_id - your id
 * @param $pet_id - id of the pet
 * @return bool - true if there is a match. False otherwise
 */
function matchExists($conn, $their_id, $your_id, $pet_id){
    $sql = "SELECT * FROM matches WHERE owner_id = '$your_id' AND adopter_id = '$their_id' AND pet_id = '$pet_id';";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    $results = $resultData->fetch_assoc();

    if(isset($results)){
        return true;
    } else {
        return false;
    }
}

/**
 * Fetches all pets in the database that are currently listed (not adopted)
 * @param $conn - connection to the database
 * @return false|mysqli_result - if the query fails
 */
function fetchPets($conn){
        $sql = "SELECT * FROM pets WHERE valid_listing = '1';";
        // Using a prepared statement to stop the user from being able to write code into the input boxes which could
        // damage the database
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../sign_up.php?error=stmt_failed");
            exit();
        }

        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        mysqli_stmt_close($stmt);

        return $resultData;
}

/**
 * Fetches four pets for the index page. Sorting by latest listing
 * @param $conn - connection to the database
 * @param $int - amount of pets to fetch
 * @return false|mysqli_result - if the query fails
 */
function fetchSomePets($conn, $int){
    $sql = "SELECT * FROM pets WHERE valid_listing = '1'  ORDER BY pet_id DESC LIMIT 4;";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $resultData;
}

/**
 * Fetches all pets listed by the user
 * @param $conn - connection to the database
 * @param $user_id - id of the user
 * @return false|mysqli_result - if the statement fails
 */
function fetchMyPets($conn, $user_id){
    $sql = "SELECT * FROM pets WHERE user_id = $user_id;";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $resultData;
}

/**
 * Fetches all messages between you and other user about a specific pet
 * @param $conn - connection to the database
 * @param $their_id - their id
 * @param $your_id - your id
 * @param $pet_id - the pets id
 * @return false|mysqli_result - if the statement fails
 */
function fetchMessagesForUserAndPet($conn, $their_id, $your_id, $pet_id){
    $sql = "SELECT * FROM messages WHERE sender_id = '$your_id' AND receiver_id = '$their_id' AND pet_id = '$pet_id' 
OR sender_id = '$their_id' AND receiver_id = '$your_id' AND pet_id = '$pet_id';";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $resultData;
}

/**
 * Fetches all right swipes on your pets
 * @param $conn - connection to the database
 * @param $owner_id - id of the owner
 * @return false|mysqli_result - if the statement fails
 */
function swipesWithMyPets($conn, $owner_id){
    $sql = "SELECT * FROM swipes WHERE owner_id = '$owner_id' && ticked = 1;";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $resultData;
}

/**
 * Fetches all matches with your pets
 * @param $conn - connection to the database
 * @param $owner_id - your id
 * @return false|mysqli_result - if the statemnt fails
 */
function matchesWithMyPets($conn, $owner_id){
    $sql = "SELECT * FROM matches WHERE owner_id = '$owner_id';";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $resultData;
}

/**
 * Returns all pets that the user has matched with
 * @param $conn - connection to the database
 * @param $user_id - id of the user
 * @return false|mysqli_result - if the statement fails
 */
function petsIveMatchedWith($conn, $user_id){
    $sql = "SELECT * FROM matches WHERE adopter_id = '$user_id';";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $resultData;
}

/**
 * Deletes the pet from the database
 * @param $conn - connection to the database
 * @param $id - id of the pet to delete
 */
function deletePet($conn, $id){
    $sql = "DELETE FROM pets WHERE pet_id = $id;";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../account.php?message=delete_success");
    exit();

}

/**
 * Fetches a pet from its ID
 * @param $conn - connection to the database
 * @param $id - id of the pet to delete
 * @return false|mysqli_result - if the statement fails
 */
function fetchPetFromId($conn, $id){
    $sql = "SELECT * FROM pets WHERE pet_id = $id;";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $resultData;
}

/**
 * Fetches the about me data of a user from their id
 * @param $conn - connection to the database
 * @param $id - id of the user to fetch the about me of
 * @return false|mysqli_result - if the statement fails
 */
function fetchAboutMeFromId($conn, $id){
    $sql = "SELECT * FROM about_me WHERE user_id = $id;";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $resultData;
}

/**
 * Updates a pet listing
 * @param $conn - connection to the database
 * @param $pet_id - id of the pet
 * @param $name - name of the pet
 * @param $location - location of the pet
 * @param $breed - breed of the pet
 * @param $age - age of the pet
 * @param $description - description of the pet
 * @param $pet_type - type of pet
 * @param $pet_size - size of pet
 * @param $vaccinated - is the pet vaccinated?
 * @param $desexed - is the pet desexed?
 * @param $microchip - is the pet microchipped?
 * @param $active - is the pet active?
 */
function updatePet($conn, $pet_id, $name, $location, $breed, $age, $description, $pet_type, $pet_size, $vaccinated,
                   $desexed, $microchip, $active){
    $conn->query("UPDATE pets SET pet_name='$name', location='$location', breed='$breed', age='$age', description='$description',
 pet_type='$pet_type', pet_size='$pet_size', vaccinated='$vaccinated', desexed='$desexed', microchip='$microchip', 
 active = '$active' WHERE pet_id='$pet_id';") or die ($conn->error);

    header("location: ../account.php?message=update_success");
    exit();
}

/**
 * Fetches a user from their ID
 * @param $conn - connection to the database
 * @param $id - id of the user to fetch
 * @return false|mysqli_result - if the statement fails
 */
function fetchUserFromId($conn, $id){
    $sql = "SELECT * FROM users WHERE user_id = $id;";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
       header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $resultData;
}

/**
 * Fetches all pets that arent listed by the user
 * @param $conn - connection to the database
 * @param $user_id - id of the user
 * @return false|mysqli_result - if the statement fails
 */
function fetchPetsThatArentMine($conn, $user_id) {
    $sql = "SELECT * FROM pets WHERE user_id != $user_id;";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $resultData;
}

/**
 * Fetches all swipes made by the ser
 * @param $conn - connection to the database
 * @param $user_id - id of the user
 * @return false|mysqli_result - if the statement fails
 */
function fetchMySwipes($conn, $user_id){
    $sql = "SELECT * FROM swipes WHERE user_id = $user_id;";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $resultData;

}

/**
 * Creates a swipe of the specific pet
 * @param $conn - connection to the database
 * @param $pet_id - id of the pet
 * @param $user_id - id of the user
 * @param $direction - swiped left or right
 * @param $owner_id - id of the owner
 */
function swipe($conn, $pet_id, $user_id, $direction, $owner_id){
        $conn->query("INSERT INTO swipes (user_id, pet_id, ticked, owner_id) VALUES ('$user_id', '$pet_id', '$direction', 
'$owner_id')") or die ($conn->error);
        header("location: ../swipe.php");
        exit();
}

/**
 * Creates a match if the owner matches with the adopter
 * @param $conn - connection to the database
 * @param $adopter - adopter id
 * @param $owner - owner id
 * @param $pet - pet id
 */
function ownerAdopterMatch($conn, $adopter, $owner, $pet){
    $conn->query("INSERT INTO matches (pet_id, owner_id, adopter_id) VALUES ('$pet', '$owner', '$adopter')") or die ($conn->error);
    header("location: ../chat.php");
    exit();
}

/**
 * Searches on the pet page based on a keyword
 * @param $conn - connection to the database
 * @param $query - query to search
 * @return false|mysqli_result
 */
function search($conn, $query){
    $sql = "SELECT * FROM pets WHERE pet_name LIKE '$query' OR location LIKE '$query' OR age LIKE '$query' 
OR breed LIKE '$query' OR description LIKE '$query';";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../all_pets.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $resultData;
}

/**
 * Inputs quiz answers for user into database
 * @param $conn - connection to the database
 * @param $user_id - id of the user
 * @param $question1 - question 1 answer
 * @param $question2 - question 2 answer
 * @param $question3 - question 3 answer
 * @param $question4 - question 4 answer
 * @param $question5 - question 5 answer
 */
function inputQuizAnswers($conn, $user_id, $question1, $question2, $question3, $question4, $question5) {

    $sql = "INSERT INTO personality_quiz(user_id, question1, question2, question3, question4, question5) 
    VALUES (?, ?, ?, ?, ?, ?)";
    

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }
   
    mysqli_stmt_bind_param($stmt, "sddddd", $user_id, $question1, $question2, $question3, $question4, $question5);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../quiz_finished.php");
    exit();

}

/**
 * Updates quiz answers for user into database
 * @param $conn - connection to the database
 * @param $user_id - id of the user
 * @param $question1 - question 1 answer
 * @param $question2 - question 2 answer
 * @param $question3 - question 3 answer
 * @param $question4 - question 4 answer
 * @param $question5 - question 5 answer
 */
function changeQuizAnswers($conn, $user_id, $question1, $question2, $question3, $question4, $question5) {
    $sql = "UPDATE personality_quiz SET question1 = $question1, question2 = $question2, 
        question3 = $question3, question4 = $question4 , question5 = $question5 where user_id = '$user_id'";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../quiz_finished.php");
    exit();
}

/** Returns quiz answers of the given user id
 * @param $conn - connection to the database
 * @param $user_id - id of the user
 * @return false|mysqli_result - if the statement fails
 */
function getQuiAnswersById($conn, $user_id) {
    $sql = "SELECT * FROM personality_quiz WHERE user_id = $user_id";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../account.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $resultData;
}

/**
 * Confirms an adoption and delists the pet.
 * @param $conn - connection to the database
 * @param $pet_id - id of the pet
 * @param $adopter_id - id of the adopter
 * @param $owner_id - id of the owner
 */
function confirmAdoption($conn, $pet_id, $adopter_id, $owner_id){
    $conn->query("INSERT INTO adopted_pets (pet_id, owner_id, adopter_id) VALUES ('$pet_id', '$owner_id', '$adopter_id')") or die ($conn->error);
    $sql = "UPDATE pets SET valid_listing = '0' WHERE pet_id = '$pet_id'";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../account.php?error=unexpected_error");
        exit();
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "SELECT * FROM adopted_pets WHERE pet_id = $pet_id;";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../account.php?error=unexpected_error");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    $adoption_id = $resultData->fetch_assoc()['adoption_id'];

    header("location: ../adoption.php?adoption=$adoption_id");
    exit();
}

/**
 * Fetches a certain adoption by id
 * @param $conn - connection to the database
 * @param $adoption_id - id of the adoption
 * @return false|mysqli_result - if the statement fails
 */
function fetchAdoptionById($conn, $adoption_id){
    $sql = "SELECT * FROM adopted_pets WHERE adoption_id = $adoption_id";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../account.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $resultData;
}
