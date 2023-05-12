<?php 
//Cambia il ruolo ad un utente

session_start();
if(isset($_POST['username']) and $_SESSION['tipo'] == 2){
    include_once("./db.php");
    $usr = $conn->real_escape_string($_POST['username']);
    $ruolo = $conn->real_escape_string($_POST['ruolo']);
    if($ruolo == 'admin'){
        $sql = "UPDATE account SET tipo = '2' WHERE username = '$usr'";
    }
    if($ruolo == 'moderator'){
        $sql = "UPDATE account SET tipo = '1' WHERE username = '$usr'";
    }
    if($ruolo == 'user'){
        $sql = "UPDATE account SET tipo = '0' WHERE username = '$usr'";
    }
    if($res = $conn->query($sql)){
        $conn->close();
        header("location: ../users.php");
    }else echo $conn->error;
    $conn->close();
}
?>