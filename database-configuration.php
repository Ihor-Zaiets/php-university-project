<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_application";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if ($connection === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}