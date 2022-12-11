<?php  include($_SERVER['DOCUMENT_ROOT'] . '/library/library-functions.php'); ?>
<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $sql = "select * from library where id = $id";

    $record = $db->query($sql);

    $n = mysqli_fetch_array($record);
    $userId = $n['owner'];
    $findUser = "select * from user where id = $userId";
    $userRecord = $db->query($findUser);
    $nUser = mysqli_fetch_array($userRecord);

    $name = $n['name'];
    $owner = $nUser['pesel'];

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


<?php $results = mysqli_query($db, "select l.id, l.name, u.pesel from library l inner join user u on l.owner = u.id"); ?>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>owner</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>

    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['pesel']; ?></td>
            <td>
                <a href="libraries.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a href="library-functions.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<form method="post" action="library-functions.php" >
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
    </div>
    <div class="input-group">
        <label>owner</label>
        <input type="text" name="owner" value="<?php echo $owner; ?>">
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