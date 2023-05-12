<?php
session_start();
require_once('./db.php');

$moderatore = $conn->real_escape_string($_SESSION['username']);
$id_scheda = $conn->real_escape_string($_POST['id_scheda']);
$titolo = $conn->real_escape_string($_POST['titolo']);
$tipo = $conn->real_escape_string($_POST['tipo']);
$colore = $conn->real_escape_string($_POST['colore']);
$sinossi = $conn->real_escape_string($_POST['sinossi']);
$uscita = $conn->real_escape_string($_POST['uscita']);
$durata = $conn->real_escape_string($_POST['durata']);
$stagioni = $conn->real_escape_string($_POST['stagioni']);
$inizio = $conn->real_escape_string($_POST['inizio']);
$fine = $conn->real_escape_string($_POST['fine']);

$files = array_filter($_FILES['locandine']['name']);
//Salvo le locandine
$total_count = count($_FILES['locandine']['name']);
// Loop attraverso tutti i file
for ($i = 0; $i < $total_count; $i++) {
    //Salvo il path temporaneo
    $tmpFilePath = $_FILES['locandine']['tmp_name'][$i];
    if ($tmpFilePath != "") {
        //Nuovo path
        $newFilePath = "../poster/" . $conn->real_escape_string($_FILES['locandine']['name'][$i]);
        $nomefile = $conn->real_escape_string($_FILES['locandine']['name'][$i]);
        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
            $sql1 = "INSERT INTO locandina (label, id_scheda, percorso_immagine) VALUES ('$nomefile','$id_scheda','$nomefile')";
            if($conn->query($sql1)){
                echo "";
            }else{
                echo $conn->error;
            }
        }
    }
}
/*
//Salvo i trailer
$trailers = $conn->real_escape_string($_POST['trailers']);
//Controllo se sono stati inseriti dei trailer
if ((!isset($trailers) || trim($trailers) == '')) {
    echo "";
} else {
    $trailers = explode(",", $trailers);
    //Preparo la query
    $sql4 = $conn->prepare("INSERT INTO trailer (label, id_scheda, link) VALUES (?,?,?)");
    $sql4->bind_param("sss", $label, $id_scheda, $link);
    foreach ($trailers as $trailer) {
        $label = explode(":", $trailer)[0];
        $link = explode(":", $trailer)[1];
        if ($sql4->execute()) {
        } else echo $conn->error;
    }
}
*/

if ($tipo == 0) {
    $sql2 = "UPDATE scheda SET titolo = '$titolo', sinossi = '$sinossi', tipo = '0', uscita = '$uscita', durata = '$durata' ,colore = '$colore' WHERE id = '$id_scheda' ";
} else {
    $sql2 = "UPDATE scheda SET titolo = '$titolo', sinossi = '$sinossi', tipo = '1', n_stagioni = '$stagioni', inizio = '$inizio', fine = '$fine', colore = '$colore' WHERE id = '$id_scheda' ";
}

if ($conn->query($sql2)) {
    $sql3 = "UPDATE richiesta_inserimento SET risposta = '1', moderatore = '$moderatore' WHERE id_scheda = '$id_scheda'";
    $conn->query($sql3);
    $conn->close();
    header('location: ../film.php?id='.$id_scheda);
}else{
    echo $conn->error;
    $conn->close();
}
