<?php
include_once("./db.php");
session_start();
if(isset($_POST['id']) and isset($_SESSION['username'])){
    $id_scheda = $conn->real_escape_string($_POST['id']);
    $username = $conn->real_escape_string($_SESSION['username']);

    $sql = "INSERT INTO da_vedere (username, id_scheda) VALUES ('$username','$id_scheda')";
    if($conn->query($sql)){
        header("location: ../film.php?id=".$id_scheda);
    }else echo "Qualcosa è andato storto!";
}
?>