<?php 

    $servername = "mysql-server";
    $username = "root";
    $password = "secret";
    $dbname = "database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed: " . $conn->error);
    }
?>