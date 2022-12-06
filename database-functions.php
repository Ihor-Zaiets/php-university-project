<?php
include "database-configuration.php";

function create() {
    global $connection;
    $sql = ("INSERT INTO user (`name`, `last_name`, `pos`) VALUES(?,?,?)");
    $query = $connection->prepare($sql);
    $query->execute([$name, $last_name, $pos]);
}

function read() {

}

function update() {

}

function delete() {

}

