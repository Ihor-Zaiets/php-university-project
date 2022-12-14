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

    mysqli_query($db, "INSERT INTO library (name, owner) VALUES ('$name', (select id from user where pesel = '$owner'))");
    $_SESSION['message'] = "Library saved";
    header('location: libraries.php');
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $owner = $_POST['owner'];

    mysqli_query($db, "UPDATE library SET name='$name', owner=(select id from user where pesel = '$owner') WHERE id=$id");
    $_SESSION['message'] = "Library updated!";
    header('location: libraries.php');
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM library WHERE id=$id");
    $_SESSION['message'] = "Library deleted!";
    header('location: libraries.php');
}

if (isset($_POST['addBook'])) {
    $book_isbn = $_POST['book_isbn'];
    $library_id = $_POST['library_id'];
    mysqli_query($db, "insert into book_library (book_id, library_id) values ((select id from book where isbn = $book_isbn), '$library_id')");
    $_SESSION['message'] = "Library book added to library!";
    header('location: library-store.php?library_id='.$library_id);
}

if (isset($_GET['deleteBook'])) {
    $book_id = $_GET['book_id'];
    $library_id = $_GET['library_id'];
    mysqli_query($db, "DELETE from book_library where book_id=$book_id");
    $_SESSION['message'] = "Library book deleted from library!";
    header('location: library-store.php?library_id='.$library_id);
}

if (isset($_GET['lendBook'])) {
    $user_id = $_GET['lendBook'];
    $library_id = $_GET['library_id'];
    $book_id = $_GET['book_id'];
    mysqli_query($db, "insert into book_user (book_id, user_id) values ('$book_id','$user_id')");
    $_SESSION['message'] = "Library book lent to user!";
    header('location: library-store.php?library_id='.$library_id);
}

if (isset($_GET['returnBook'])) {
    $user_id = $_GET['returnBook'];
    $library_id = $_GET['library_id'];
    $book_id = $_GET['book_id'];
    mysqli_query($db, "delete from book_user where user_id = $user_id");
    $_SESSION['message'] = "Library book lent to user!";
    header('location: library-store.php?library_id='.$library_id);
}