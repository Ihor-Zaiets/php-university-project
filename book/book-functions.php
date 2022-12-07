<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'library_application');

// initialize variables
$name = "";
$isbn = "";
$id = 0;
$update = false;

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $isbn = $_POST['isbn'];

    mysqli_query($db, "INSERT INTO book (name, isbn) VALUES ('$name', '$isbn')");
    $_SESSION['message'] = "isbn saved";
    header('location: books.php');
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $isbn = $_POST['isbn'];

    mysqli_query($db, "UPDATE book SET name='$name', isbn='$isbn' WHERE id=$id");
    $_SESSION['message'] = "isbn updated!";
    header('location: books.php');
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM book WHERE id=$id");
    $_SESSION['message'] = "Address deleted!";
    header('location: books.php');
}