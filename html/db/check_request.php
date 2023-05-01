<?php
//Verifica che la richiesta di inserimento di quest'opera sia stata accettata
include_once('./db/db.php');
$id = $_GET['id'];
$sql="SELECT risposta FROM richiesta_inserimento WHERE id_scheda = $id";

$res = $conn->query($sql);
if($res->num_rows == 1){
    $res = $res->fetch_array(MYSQLI_ASSOC);
    if($res['risposta'] == 1){
        $access = 1;
    }elseif($res['risposta'] == 0){
        $access = 0;
    }else $access = 0;
}else $access = 1;
?>