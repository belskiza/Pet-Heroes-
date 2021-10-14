<?php
session_start();
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
$user_id = $_SESSION['user_id'];

$result = fetchMyPets($conn, $user_id);


