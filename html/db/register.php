<?php

require_once('./db.php');

$nome = $conn->real_escape_string($_POST['nome']);
$cognome = $conn->real_escape_string($_POST['cognome']);
$email = $conn->real_escape_string($_POST['email']);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "L'email inserita non è valida!";
  return;
}
$data = $conn->real_escape_string($_POST['data']);
$residenza = $conn->real_escape_string($_POST['residenza']);
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $sql ="INSERT INTO account (username, email, password, nome, cognome, data_nascita, residenza) VALUES ('$username', '$email', '$hashed_password', '$nome', '$cognome', '$data', '$residenza')";

    if($conn->query($sql) === true){
        echo "<script>alert('Registrazione terminata con successo!');
                      window.location.href = '../login.html';
              </script>";
    }else{
        echo "ERRORE: ".$conn->error;
    }
}

?>