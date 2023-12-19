<?php

$hostname     = "localhost";
$username     = "root";
$password     = "";
$databasename = "db_elearning";

$connection = mysqli_connect($hostname, $username, $password,$databasename);

if (!$connection) {
    die("Unable to Connect database: " . mysqli_connect_error());
}

?>