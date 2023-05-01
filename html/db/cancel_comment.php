<?php
//Cancella una commento
include_once("./db.php");
session_start();
if(isset($_POST['id'])){
    $id = $conn->real_escape_string($_POST['id']);

    $sql = "DELETE FROM commento WHERE id = '$id'";
    if($conn->query($sql)){
        $conn->close();
        header("location: ../film.php?id=".$_POST['id_scheda']);
    }else echo "Errore nella query!" . $conn->error;
} 
$conn->close();
?>