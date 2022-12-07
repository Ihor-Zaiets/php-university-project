<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'library_application');

// initialize variables
$name = "";
$owner = "";
$id = 0;
$update = false;

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $owner = $_POST['owner'];

    mysqli_query($db, "INSERT INTO library (name, owner) VALUES ('$name', '$owner')");
    $_SESSION['message'] = "Library saved";
    header('location: libraries.php');
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $owner = $_POST['owner'];

    mysqli_query($db, "UPDATE library SET name='$name', owner='$owner' WHERE id=$id");
    $_SESSION['message'] = "Library updated!";
    header('location: libraries.php');
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM library WHERE id=$id");
    $_SESSION['message'] = "Library deleted!";
    header('location: libraries.php');
}