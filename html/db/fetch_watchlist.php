<?php
//Viene incluso in watchlist.php
//Preleva dal db la watchlist dell'utente con username = $_SESSION['username']
include_once("./db/db.php");

$username = $_SESSION['username'];

//QUERY FILM
$sql = "SELECT da_vedere.*, scheda.* , locandina.percorso_immagine FROM da_vedere, scheda, locandina WHERE da_vedere.username = '$username' AND da_vedere.id_scheda = scheda.id AND locandina.id_scheda = da_vedere.id_scheda AND scheda.tipo = '0'  GROUP BY scheda.id";

if($filmresults = $conn->query($sql)){
    if ($filmresults->num_rows > 0){
        $film_num_results = $filmresults->num_rows;
    }else $film_num_results = 0;
}else echo "Errore nella query!" . $conn->error;

//QUERY SERIE
$sql1 = "SELECT da_vedere.*, scheda.* , locandina.percorso_immagine FROM da_vedere, scheda, locandina WHERE da_vedere.username = '$username' AND da_vedere.id_scheda = scheda.id AND locandina.id_scheda = da_vedere.id_scheda AND scheda.tipo = '1'  GROUP BY scheda.id";

if($seriesresults = $conn->query($sql1)){
    if ($seriesresults->num_rows > 0){
        $series_num_results = $seriesresults->num_rows;
    }else $series_num_results = 0;
}echo "Errore nella query!" . $conn->error;

?>