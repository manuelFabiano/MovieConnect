<?php

require_once('./db.php');

$nome = $conn->real_escape_string($_POST['nome']);
$cognome = $conn->real_escape_string($_POST['cognome']);
$data = $conn->real_escape_string($_POST['data']);
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $sql ="INSERT INTO Utenti (Nome, Cognome, Data, Username, Password) VALUES ('$nome', '$cognome', '$data', '$username', '$hashed_password')";

    if($conn->query($sql) === true){
        echo "Fatto";
    }else{
        echo "ERRORE";
    }
}

?>