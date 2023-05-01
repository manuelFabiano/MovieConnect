<?php 
include_once("./db.php");
session_start();
if(isset($_POST['id_scheda']) and $_SESSION['tipo'] == 2){
    $id = $_POST['id_scheda'];
    $mod = $_SESSION['username'];
    $sql = "UPDATE richiesta_inserimento SET risposta = '0', moderatore = '$mod' WHERE id_scheda = '$id'";

    if($res = $conn->query($sql)){
        echo "<script>
                      window.location.href = '../requests.php';
              </script>";
    }else echo $conn->error;
}
?>