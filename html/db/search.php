<?php
//Viene incluso in search_result.php

require_once('./db/db.php');


if(isset($_GET['search']) and (substr( $_GET['search'], 0, 1 ) != "#")){
    $search = $conn->real_escape_string($_GET['search']);

    //$sql="SELECT id, titolo FROM scheda WHERE titolo LIKE '%$search%'AND tipo = '0'";
    $sql="SELECT scheda.id, scheda.titolo, scheda.uscita, locandina.percorso_immagine FROM scheda, locandina WHERE locandina.id_scheda = scheda.id AND scheda.tipo = 0 AND scheda.titolo LIKE '%$search%' GROUP BY scheda.id";

    if($filmresults = $conn->query($sql)){
        if ($filmresults->num_rows > 0){
            $film_num_results = $filmresults->num_rows;
        }else $film_num_results = 0;
    }

    $sql="SELECT scheda.id, scheda.titolo, scheda.inizio, scheda.fine, locandina.percorso_immagine FROM scheda, locandina WHERE locandina.id_scheda = scheda.id AND scheda.tipo = 1 AND scheda.titolo LIKE '%$search%' GROUP BY scheda.id";

    if($seriesresults = $conn->query($sql)){
        if ($seriesresults->num_rows > 0){
            $series_num_results = $seriesresults->num_rows;
        }else $series_num_results = 0;
    }

    $sql="SELECT * FROM persona WHERE persona.nome LIKE '%$search%'";

    if($peopleresults = $conn->query($sql)){
        if ($peopleresults->num_rows > 0){
            $people_num_results = $peopleresults->num_rows;
        }else $people_num_results = 0;
    }
}elseif(isset($_GET['search_tag']) or (substr( $_GET['search'], 0, 1 ) === "#")){
    if(substr( $_GET['search'], 0, 1 ) === "#"){
        $search_tag = $conn->real_escape_string($_GET['search']);
        $search_tag = substr($search_tag, 1);
    }else{
    $search_tag = $conn->real_escape_string($_GET['search_tag']);
    }
    //$sql = "SELECT DISTINCT scheda.id, scheda.titolo, scheda.uscita, tag.label, locandina.percorso_immagine FROM scheda RIGHT JOIN tag ON tag.id_scheda = scheda.id RIGHT JOIN locandina ON locandina.id_scheda = scheda.id WHERE tag.label = '$search_tag'";
    $sql="SELECT scheda.id, scheda.titolo, scheda.uscita, locandina.percorso_immagine, tag.label FROM scheda, locandina, tag WHERE locandina.id_scheda = scheda.id AND tag.id_scheda = scheda.id AND scheda.tipo = 0 AND tag.label = '$search_tag' GROUP BY scheda.id";

    if($filmresults = $conn->query($sql)){
        if ($filmresults->num_rows > 0){
            $film_num_results = $filmresults->num_rows;
        }else $film_num_results = 0;
    }

    $sql="SELECT scheda.id, scheda.titolo, scheda.inizio, scheda.fine, locandina.percorso_immagine, tag.label FROM scheda, locandina, tag WHERE locandina.id_scheda = scheda.id AND tag.id_scheda = scheda.id AND scheda.tipo = 1 AND tag.label = '$search_tag' GROUP BY scheda.id";

    if($seriesresults = $conn->query($sql)){
        if ($seriesresults->num_rows > 0){
            $series_num_results = $seriesresults->num_rows;
        }else $series_num_results = 0;
    }

    $people_num_results = 0;
}elseif(isset($_GET['search_people'])){
    $search_people = $conn->real_escape_string($_GET['search_people']);
    //$sql = "SELECT DISTINCT scheda.id, scheda.titolo, scheda.uscita, tag.label, locandina.percorso_immagine FROM scheda RIGHT JOIN tag ON tag.id_scheda = scheda.id RIGHT JOIN locandina ON locandina.id_scheda = scheda.id WHERE tag.label = '$search_tag'";
    $sql="SELECT scheda.id, scheda.titolo, scheda.uscita, locandina.percorso_immagine, ruolo.persona FROM scheda, locandina, ruolo WHERE locandina.id_scheda = scheda.id AND ruolo.id_scheda = scheda.id AND scheda.tipo = 0 AND ruolo.persona = '$search_people' GROUP BY scheda.id";

    if($filmresults = $conn->query($sql)){
        if ($filmresults->num_rows > 0){
            $film_num_results = $filmresults->num_rows;
        }else $film_num_results = 0;
    }

    $sql="SELECT scheda.id, scheda.titolo, scheda.inizio, scheda.fine, locandina.percorso_immagine, ruolo.persona FROM scheda, locandina, ruolo WHERE locandina.id_scheda = scheda.id AND ruolo.id_scheda = scheda.id AND scheda.tipo = 1 AND ruolo.persona = '$search_people' GROUP BY scheda.id";

    if($seriesresults = $conn->query($sql)){
        if ($seriesresults->num_rows > 0){
            $series_num_results = $seriesresults->num_rows;
        }else $series_num_results = 0;
    }

    $people_num_results = 0;

}
?>