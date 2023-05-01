<?php
session_start();
require_once('./db.php');

$moderatore = $conn->real_escape_string($_SESSION['username']);
$id_scheda = $conn->real_escape_string($_POST['id_scheda']);
$tipo_ruolo = $conn->real_escape_string($_POST['tipo_ruolo']);
$nome = $conn->real_escape_string($_POST['nome']);
$personaggio = $conn->real_escape_string($_POST['personaggio']);
$ruolo = $conn->real_escape_string($_POST['ruolo']);
$ordine = $conn->real_escape_string($_POST['ordine']);
$directory = "../photos/"; // la cartella di destinazione dell'upload

if(isset($_POST['personaggio']) && $_POST['personaggio'] != ""){
    $sql2 = "INSERT INTO ruolo (persona,id_scheda, tipo, nome_ruolo, nome_personaggio, ordine) VALUES ('$nome','$id_scheda','$tipo_ruolo','$ruolo','$personaggio','$ordine')";
}else{
    $sql2 = "INSERT INTO ruolo (persona,id_scheda, tipo, nome_ruolo, nome_personaggio, ordine) VALUES ('$nome','$id_scheda','$tipo_ruolo','$ruolo',NULL,'$ordine')";
}

//$sql3 = "UPDATE richiesta_inserimento SET risposta = '1', moderatore = '$moderatore' WHERE id_scheda = '$id_scheda'";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    //Verifico che la persona sia nel DB
    $sql = "SELECT nome FROM persona WHERE nome = '$nome'";
    if($res = $conn->query($sql)){
        if($res->num_rows == 0){
            if(is_uploaded_file($_FILES['foto']['tmp_name'])){
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $directory . str_replace(' ', '', $nome) . ".jpeg") != false) {
                    $percorso = str_replace(' ', '', $nome).".jpeg";
                    $sql1 = "INSERT INTO persona (nome, percorso_foto) VALUES ('$nome','$percorso')";
                    if($conn->query($sql1)){
                        if(!$conn->query($sql2))
                            echo $conn->error;
                    }else{echo "errore";}
                } else {
                    echo "Si è verificato un errore durante il caricamento del file.";
                }
            }else{echo "inserirepersona";}
        }else{
            if(!$conn->query($sql2))
                echo $conn->error;
        }
    }
}
