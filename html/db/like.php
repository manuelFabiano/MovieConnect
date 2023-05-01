<?php
include_once('./db.php');

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id_recensione = $conn->real_escape_string($_POST['id']);
    $username = $conn->real_escape_string($_POST['username']);

    $sql = "INSERT INTO mi_piace (username, id_recensione, data, ora) VALUES ('$username', '$id_recensione', now(), now())";
    if($result = $conn->query($sql)){
        echo "Success!";
    }else echo $conn->error;
} 
$conn->close();

?>