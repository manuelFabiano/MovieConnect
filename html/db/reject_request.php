<?php 
include_once("./db.php");
session_start();
if(isset($_POST['id_scheda']) and $_SESSION['tipo'] > 0){
    $id = $_POST['id_scheda'];
    $mod = $_SESSION['username'];
    $sql = "UPDATE richiesta_inserimento SET risposta = '0', moderatore = '$mod' WHERE id_scheda = '$id'";

    if($res = $conn->query($sql)){
        $conn->close();
        header("location: ../requests.php");
    }else echo $conn->error;
    $conn->close();
}else $conn->close();
?>