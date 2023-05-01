<?php
//Aggiorna la recensione con i nuovi dati
require_once('./db.php');
$id_recensione = $conn->real_escape_string($_POST['id_recensione']);
$id_scheda = $conn->real_escape_string($_POST['id_scheda']);
$username = $conn->real_escape_string($_SESSION['username']);
$voto = $conn->real_escape_string($_POST['voto']);
$contenuto = $conn->real_escape_string($_POST['contenuto']);
$tags = explode(" ", $conn->real_escape_string($_POST['tags']));


$sql = "UPDATE recensione SET voto = '$voto', contenuto = '$contenuto' WHERE id = '$id_recensione'";

if ($conn->query($sql)) {
    //rimuovo tutti i vecchi tag
    $sql1 = "DELETE FROM tag WHERE id_recensione = '$id_recensione'";
    if($conn->query($sql1)){
        //inserisco i nuovi tag
        $sql2=$conn->prepare("INSERT INTO tag (label, id_scheda, id_recensione) VALUES (?, ?, ?)");
        $sql2->bind_param("sss", $tag, $id_scheda, $id_recensione );
        foreach($tags as $tag)
            $sql2->execute();
        //calcolo la nuova media    
        include("./calc_average.php");
        $conn->close();
        echo "<script>alert('Recensione pubblicata!!');
                window.location.href = '../film.php?id=".$id_scheda."';
            </script>";    
    }
    $conn->close();
  } else {
    echo "Errore nell'aggiornamento della riga: " . $conn->error;
    $conn->close();
  }
