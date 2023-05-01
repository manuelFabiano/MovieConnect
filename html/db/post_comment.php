<?php
session_start();
require_once('./db.php');

$id_recensione = $conn->real_escape_string($_POST['id_recensione']);
$username = $conn->real_escape_string($_SESSION['username']);
$contenuto = $conn->real_escape_string($_POST['contenuto']);
$redirect = $conn->real_escape_string($_POST['redirect']);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $sql="INSERT INTO commento (username, id_recensione, data, ora, contenuto) VALUES ('$username', '$id_recensione', now(), now(), '$contenuto')";
    if($result = $conn->query($sql)){
       if($redirect == 'profile'){
           header("location: ../profile.php?usr=".$_POST['username']);
       }
        echo "<script>alert('Commento pubblicato!!');
                      window.location.href = '../film.php?id=".$_POST['id_scheda']."';
              </script>";
    }else{
        echo "ERRORE: ".$conn->error;
    }
}

?>