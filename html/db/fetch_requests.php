<?php
//Viene incluso in requests.php
//Preleva dal db tutte le richieste submittate dagli utenti.
require_once('./db/db.php');

$sql ="SELECT richiesta_inserimento.* , scheda.titolo, scheda.tipo FROM richiesta_inserimento LEFT JOIN scheda on scheda.id = richiesta_inserimento.id_scheda ORDER BY data_ora ASC";

$requests = $conn->query($sql);

if(!$requests){
    echo "Errore nella query!" . $conn->error;
    $conn->close();
    exit();
}

$conn->close();
?>