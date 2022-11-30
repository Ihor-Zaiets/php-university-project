<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "libraryapplicatin";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "select * from book";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

