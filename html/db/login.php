<?php
//Connessione al db
require_once('./db.php');

//Prendo i dati dal form 
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);
$email = $username;

//Se l'utente ha inserito nel form una email faccio il login con l'email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $sql = "SELECT * FROM account WHERE email = '$email'";
        //Se la query va a buon fine
        if ($result = $conn->query($sql)) {
            if ($result->num_rows === 1) {
                //Inserisco i dati dell'utente in $row
                $row = $result->fetch_array(MYSQLI_ASSOC);
                //Verifico che le password corrispondano
                if (password_verify($password, $row['password'])) {
                    //Se l'utente è bannato non può loggare
                    if ($row['ban'] == 0) {
                        //starto la sessione e salvo l'username e il tipo di utente 
                        session_start();
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['tipo'] = $row['tipo'];
                        header("location: ../dashboard.php");
                    } else echo "Sei stato bannato!";
                } else echo "Password errata!";
            } else echo "L'email da te inserita non esiste!";
        } else echo "Errore nella query! ". $conn->error;
    }
} else {
    //Se l'utente non ha inserito una email, allora faccio il login con l'username
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $sql = "SELECT * FROM account WHERE username = '$username'";

        if ($result = $conn->query($sql)) {
            if ($result->num_rows === 1) {
                $row = $result->fetch_array(MYSQLI_ASSOC);
                if (password_verify($password, $row['password'])) {
                    if ($row['ban'] == 0) {
                        session_start();
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['tipo'] = $row['tipo'];
                        header("location: ../dashboard.php");
                    } else echo "Sei stato bannato!";
                } else echo "Password errata!";
            } else echo "L'username da te inserito non esiste!";
            
        } else echo "Errore nella query! " . $conn->error;
        
    }
}
