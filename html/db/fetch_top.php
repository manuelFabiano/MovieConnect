<?php
require_once('./db/db.php');


$sql ="SELECT scheda.*, locandina.percorso_immagine FROM scheda,locandina WHERE locandina.id_scheda = scheda.id GROUP BY scheda.id ORDER BY media DESC LIMIT 10";

$top10 = $conn->query($sql)
?>