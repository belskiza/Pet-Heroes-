<?php
/**
 * A function which checks if any of the input fields are blank
 * @param $first_name - first name of new user
 * @param $last_name -  last name of new user
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

function emptyInputEdit($first_name, $last_name, $email, $username) {
    if (empty($first_name) || empty($last_name) || empty($email) || empty($username)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputList($name, $location, $breed, $age, $user_id, $description, $pet_type,
                        $size, $vaccinated, $desexed, $microchip, $gender, $colour){
    if(empty($name) || empty($location) || empty($breed) || empty($age) || empty($user_id) || empty($description) || empty($pet_type) ||
    empty($size) || empty($vaccinated) || empty($desexed) || empty($microchip) || empty($gender) || empty($colour)){
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

// need to write this
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
 * Creates the user id account setup row in database
 * @param $conn - connection to SQL
 * @param $user_id - user id primary key
 */
function createAccountSetup($conn, $user_id){

    #ini_set('display_errors', 1);
    #ini_set('display_startup_errors', 1);
    #error_reporting(E_ALL);

    $sql = "INSERT INTO account_setup (user_id) VALUES (?)";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    exit();
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
function createUser($conn, $first_name, $last_name, $email, $username, $password , $acc_type){
    $sql = "INSERT INTO users (username, password, first_name, last_name, email, acc_type) VALUES (?, ?, ?, ?, ?, ?);";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }
    //encrypts the password so you cant see it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $username, $hashed_password, $first_name, $last_name, $email, $acc_type);
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

function updateUser($conn, $first_name, $last_name, $email, $username){
    $sql = "UPDATE users SET username='$username', first_name='$first_name', last_name='$last_name', email='$email';";
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
 * Creates a Pet in the pets table
 * @param $conn
 * @param $name
 * @param $location
 * @param $breed
 * @param $age
 * @param $user_id
 * @param $picture_destination
 * @param $description
 * @param $pet_type
 * @param $size
 * @param $vaccinated
 * @param $desexed
 * @param $microchip
 * @param $picture_destination2
 * @param $picture_destination3
 * @param $picture_destination4
 */
function listPet($conn, $name, $location, $breed, $age ,$user_id, $picture_destination, $description,
                 $pet_type, $size, $vaccinated, $desexed, $microchip, $picture_destination2, $picture_destination3, $picture_destination4
, $gender, $colour){
    $conn->query("INSERT INTO pets (pet_name, location, user_id, breed, age, picture_destination, description,
pet_type, pet_size, vaccinated, desexed, microchip, picture_destination2, picture_destination3, picture_destination4, gender, colour) VALUES 
('$name', '$location', '$user_id', '$breed', '$age', '$picture_destination', '$description', '$pet_type', '$size', 
'$vaccinated','$desexed','$microchip', '$picture_destination2', '$picture_destination3', '$picture_destination4', '$gender', '$colour')") or die ($conn->error);
    /*
    $sql =

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    */
    header("location: ../account.php?message=list_success");
    exit();
}

function fetchPets($conn){
        $sql = "SELECT * FROM pets;";
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
 * Creates a Pet in the pets table
 * @param $conn
 * @param $pet_id
 * @param $name
 * @param $location
 * @param $breed
 * @param $age
 * @param $description
 * @param $pet_type
 * @param $pet_size
 * @param $vaccinated
 * @param $desexed
 * @param $microchip
 */
function updatePet($conn, $pet_id, $name, $location, $breed, $age, $description, $pet_type, $pet_size, $vaccinated, $desexed, $microchip){
    $sql = "UPDATE pets SET pet_name='$name', location='$location', breed='$breed', age='$age', description='$description',
 pet_type='$pet_type', pet_size='$pet_size', vaccinated='$vaccinated', desexed='$desexed', microchip='$microchip' WHERE pet_id='$pet_id';";
    // Using a prepared statement to stop the user from being able to write code into the input boxes which could
    // damage the database
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../account.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../account.php?message=update_success");
    exit();
}

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

function fetchMyMatches($conn, $user_id){
    $sql = "SELECT * FROM matches WHERE user_id = $user_id;";
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

function swipe($conn, $pet_id, $user_id, $direction){

        $conn->query("INSERT INTO matches (user_id, pet_id, ticked) VALUES ('$user_id', '$pet_id', '$direction')") or die ($conn->error);
        header("location: ../swipe.php");
        exit();
}