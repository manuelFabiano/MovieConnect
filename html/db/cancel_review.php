<?php
include_once("./db.php");
session_start();
if(isset($_POST['id']) and isset($_SESSION['username'])){
    $id_scheda = $conn->real_escape_string($_POST['id']);
    $username = $conn->real_escape_string($_POST['username']);

    $sql = "DELETE FROM recensione WHERE id_scheda = '$id_scheda' AND username = '$username'";
    if($conn->query($sql)){
        header("location: ../film.php?id=".$id_scheda);
    }else echo "Qualcosa è andato storto!";
}
?>