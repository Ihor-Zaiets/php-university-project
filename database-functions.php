<?php
include "database-configuration.php";

function create() {
    global $connection;
    $sql = ("INSERT INTO user (`name`, `last_name`, `pos`) VALUES(?,?,?)");
    $query = $connection->prepare($sql);
    $query->execute([$name, $last_name, $pos]);
}

function read() {
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

function update() {

}

function delete() {

}

