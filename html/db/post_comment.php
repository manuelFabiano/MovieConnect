<?php
session_start();
require_once('./db.php');

$id_recensione = $conn->real_escape_string($_POST['id_recensione']);
$username = $conn->real_escape_string($_SESSION['username']);
$contenuto = $conn->real_escape_string($_POST['contenuto']);
$redirect = $conn->real_escape_string($_POST['redirect']);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $sql="INSERT INTO commento (username, id_recensione, data_ora, contenuto) VALUES ('$username', '$id_recensione', now(), '$contenuto')";
    if($result = $conn->query($sql)){
       if($redirect == 'profile'){
           $conn->close();
           header("location: ../profile.php?usr=".$_POST['username']);
       }
        $conn->close();
        echo "<script>alert('Commento pubblicato!!');
                      window.location.href = '../film.php?id=".$_POST['id_scheda']."';
              </script>";
    }else{
        echo "Errore nella query! ".$conn->error;
    }
}
$conn->close();
?>