<?php  include($_SERVER['DOCUMENT_ROOT'].'/library/library-functions.php'); ?>
<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $sql = "select * from library where id = $id";

    $record = $db->query($sql);

    $n = mysqli_fetch_array($record);
    $name = $n['name'];
    $owner = $n['owner'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>List of libraries</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
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


<?php $results = mysqli_query($db, "SELECT * FROM library"); ?>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>

    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td>
                <a href="library/library-store.php?library_id=<?php echo $row['id']; ?>" class="edit_btn" >See more</a>
            </td>
        </tr>
    <?php } ?>
<tr>
    <td></td>
    <td>
        <a href="library/libraries.php" class="blue_btn" >Edit libraries</a>
    </td>
</tr>
</table>
</body>
</html>
