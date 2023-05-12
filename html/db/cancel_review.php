<?php
//Cancella una recensione
session_start();
if(isset($_POST['id'])){
    include_once("./db.php");
    $id= $conn->real_escape_string($_POST['id']);
    $sql = "DELETE FROM recensione WHERE id = '$id'";
    if($conn->query($sql)){
        $conn->close();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else echo "Errore nella query!" . $conn->error;
    $conn->close();
} 

?>