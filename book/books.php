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
    <title>CRUD: Create, Update, Delete PHP MySQL</title>
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


<?php $results = mysqli_query($db, "SELECT * FROM book"); ?>

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
                <a href="books.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a href="book-functions.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<form method="post" action="book-functions.php" >
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
    </div>
    <div class="input-group">
        <label>isbn</label>
        <input type="text" name="isbn" value="<?php echo $isbn; ?>">
    </div>
    <div class="input-group">
        <?php if ($update == true): ?>
            <button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
        <?php else: ?>
            <button class="btn" type="submit" name="save" >Save</button>
        <?php endif ?>
    </div>
</form>
</body>
</html>