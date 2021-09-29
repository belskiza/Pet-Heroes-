<?php

require_once'dbh.inc.php';
require_once'functions.inc.php';

if (isset($_GET['search'])){
    $query = $_GET['search'];
    $searchResult = search($conn, $query);
    header("location");
}
