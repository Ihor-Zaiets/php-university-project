<?php
if (isset($_GET['bookRead'])){
    require_once $_SERVER['DOCUMENT_ROOT']."\database-configuration.php";
    global $connection;
    $sql = "select * from book";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}

