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

        //Cant get this to work currently
        /*
        if($remember_me != 0){
            setcookie('username', $remember_me, time() + 3600 * 24 * 7);
            $_COOKIE['username'] = $remember_me;
        } else {
            setcookie('1', "1", time() + 3600 * 24 * 7);
        } */
        header("location: ../index.php?message=login");
        exit();
    }
}