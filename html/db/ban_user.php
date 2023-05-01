<?php
//Banna un utente
include_once("./db.php");
session_start();
if(isset($_POST['username']) and $_SESSION['tipo'] == 2){
    $usr = $conn->real_escape_string($_POST['username']);
    $sql = "UPDATE account SET ban = '1' WHERE username = '$usr'";

    if($res = $conn->query($sql)){
        $conn->close();
        header('location: ../users.php');
    }else echo $conn->error;
    $conn->close();
}
$conn->close();
?>