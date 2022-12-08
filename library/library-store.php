<?php  include($_SERVER['DOCUMENT_ROOT'] . '/book/book-functions.php'); ?>
<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $sql = "select * from book where id = $id";

    $record = $db->query($sql);
    if (true) {
        $n = mysqli_fetch_array($record);
        $name = $n['name'];
        $isbn = $n['isbn'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>

<?php $library_id = $_GET['library_id']; ?>;
<?php $results = mysqli_query($db, "select * from book where id in (select book_id from book_library where library_id = $library_id)"); ?>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>isbn</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>

    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['isbn']; ?></td>
            <td>
                <a href="library-functions.php?book_id=<?php echo $row['id']; ?>&library_id=<?php echo $library_id?>&deleteBook=true" class="del_btn" >Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<form method="post" action="library-functions.php" >
    <input type="hidden" name="library_id" value=<?php echo $library_id?>>
    <div class="input-group">
        <label>Book isbn</label>
        <input type="text" name="book_isbn" value="">
    </div>
    <div class="input-group">
            <button class="btn" type="submit" name="addBook" >Add book to library</button>
    </div>
</form>
</body>
</html>