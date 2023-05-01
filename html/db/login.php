<?php

require_once('./db.php');

$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);
$email = $username;
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $sql = "SELECT * FROM account WHERE email = '$email'";

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
            } else echo "L'email da te inserita non esiste!";
        } else echo "Errore!";
    }
}



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
        } else {
            echo "L'username da te inserito non esiste!";
        }
    } else {
        echo "Errore";
    }
}
$conn->close();
