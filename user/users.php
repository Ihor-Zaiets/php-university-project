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


<?php $results = mysqli_query($db, "SELECT * FROM user"); ?>

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
                <a href="users.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a href="user-functions.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<form method="post" action="user-functions.php" >
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
    </div>
    <div class="input-group">
        <label>Surname</label>
        <input type="text" name="surname" value="<?php echo $surname; ?>">
    </div>
    <div class="input-group">
        <label>Age</label>
        <input type="text" name="age" value="<?php echo $age; ?>">
    </div>
    <div class="input-group">
        <label>Pesel</label>
        <input type="text" name="pesel" value="<?php echo $pesel; ?>">
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