<?php
//Cancella una recensione
include_once("./db.php");
session_start();
if(isset($_POST['id']) and isset($_POST['username'])){
    $id_scheda = $conn->real_escape_string($_POST['id']);
    $username = $conn->real_escape_string($_POST['username']);

    $sql = "DELETE FROM recensione WHERE id_scheda = '$id_scheda' AND username = '$username'";
    if($conn->query($sql)){
        $conn->close();
        header("location: ../film.php?id=".$id_scheda);
    }else echo "Errore nella query!" . $conn->error;
} 
$conn->close();
?>