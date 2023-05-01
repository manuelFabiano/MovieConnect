<?php
require_once('./db/db.php');

$sql ="SELECT richiesta_inserimento.* , scheda.titolo, scheda.tipo FROM richiesta_inserimento LEFT JOIN scheda on scheda.id = richiesta_inserimento.id_scheda ORDER BY data ASC";

$requests = $conn->query($sql);
    
?>