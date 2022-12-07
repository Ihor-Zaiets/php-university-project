<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'library_application');

// initialize variables
$name = "";
$surname = "";
$age = "";
$pesel = "";

$id = 0;
$update = false;

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];
    $pesel = $_POST['pesel'];

    mysqli_query($db, "INSERT INTO user (name, surname, age, pesel) VALUES ('$name', 'surname', '$age', '$pesel')");
    $_SESSION['message'] = "User saved";
    header('location: users.php');
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];
    $pesel = $_POST['pesel'];

    mysqli_query($db, "UPDATE user SET name='$name', surname='$surname', age='$age', pesel='$pesel' WHERE id=$id");
    $_SESSION['message'] = "User updated!";
    header('location: users.php');
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM user WHERE id=$id");
    $_SESSION['message'] = "User deleted!";
    header('location: users.php');
}