<?php

require_once'dbh.inc.php';
require_once'functions.inc.php';

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = fetchUserFromId($conn, $id);

    if(count($result) == 1){
        $row = $result->fetch_array();
        $username = $row['username'];
        $email = $row['email'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
    }
}
