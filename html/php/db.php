<?php 

    $servername = "mysql-server";
    $username = "root";
    $password = "secret";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connection_error);
    }
?>