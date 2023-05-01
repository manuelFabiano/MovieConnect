<?php
session_start();
if(isset($_SESSION['username']) and isset($_POST['contenuto'])){
    include("./db.php");
    $contenuto =$conn->real_escape_string($_POST['contenuto']);
    $id = $conn->real_escape_string($_POST['id']);
    $id_scheda = $conn->real_escape_string($_POST['id_scheda']);

    $sql = "UPDATE commento SET contenuto = '$contenuto' WHERE id = '$id' ";
    if($conn->query($sql)){
        $conn->close();
        header("location: ../film.php?id=". $id_scheda);
    }
}
$conn->close();
?>