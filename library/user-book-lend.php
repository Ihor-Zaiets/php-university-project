<?php  include($_SERVER['DOCUMENT_ROOT'] . '/user/user-functions.php'); ?>
<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $sql = "select * from user where id = $id";

    $record = $db->query($sql);
    if (true) {
        $n = mysqli_fetch_array($record);
        $name = $n['name'];
        $surname = $n['surname'];
        $age = $n['age'];
        $pesel = $n['pesel'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User editor</title>
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


<?php $results = mysqli_query($db, $_GET['query']); ?>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Age</th>
        <th>Pesel</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>

    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['surname']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['pesel']; ?></td>
            <td>
                <?php if ($_GET['seeLands'] == 'true'): ?>
                    <a href="library-functions.php?
                returnBook=<?php echo $row['id']; ?>
                &book_id=<?php echo $_GET['book_id']?>
                &library_id=<?php echo $_GET['library_id']?>" class="edit_btn" >Return book from user</a>
                <?php else: ?>
                    <a href="library-functions.php?
                lendBook=<?php echo $row['id']; ?>
                &book_id=<?php echo $_GET['book_id']?>
                &library_id=<?php echo $_GET['library_id']?>" class="edit_btn" >Lend book to user</a>
                <?php endif ?>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <a href="../user/users.php" class="blue_btn" >Edit users</a>
        </td>
    </tr>
</table>
</body>
</html>