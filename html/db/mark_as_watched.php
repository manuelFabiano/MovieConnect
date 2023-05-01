<?php
include_once("./db.php");
session_start();
if(isset($_POST['id']) and isset($_SESSION['username'])){
    $id_scheda = $_POST['id'];
    $username = $_SESSION['username'];

    $sql = "UPDATE da_vedere SET visto = '1' , data = NOW() WHERE username = '$username' AND id_scheda = '$id_scheda'";
    if($conn->query($sql)){
        if($_POST['redirect'] == 1){
            $conn->close();
            header("location: ../watchlist.php");
        }else {
            $conn->close();
            header("location: ../film.php?id=".$id_scheda);
        }
    }else echo "Errore nella query!" . $conn->error;
}
$conn->close();
?>