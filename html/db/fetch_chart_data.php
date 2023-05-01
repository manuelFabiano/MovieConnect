<?php
include_once("./db/db.php");

$sql = "SELECT voto, data FROM recensione WHERE id_scheda = '$id' ORDER BY data ASC";

$results = $conn->query($sql);

$data = [];
$voti = [];

foreach ($results as $result) {
  $data[] = $result['data'];
  $voti[] = $result['voto'];
}

$data_js = json_encode($data);
$voti_js = json_encode($voti);
?>