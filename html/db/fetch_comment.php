<?php
session_start();
include_once("./db/db.php");
$id = $conn->real_escape_string($_GET['id']);
$username = $conn->real_escape_string($_SESSION['username']);

$sql = "SELECT commento.contenuto, commento.username as user, recensione.username, recensione.id_scheda FROM commento, recensione WHERE recensione.id = commento.id_recensione AND commento.id = '$id'  ";
if($commento = $conn->query($sql)){
    $commento = $commento->fetch_array(MYSQLI_ASSOC);
    if($commento['user'] != $_SESSION['username']){
        header("location: ./dashboard.php");
    }
}else echo $conn->error;
$conn->close();
?>