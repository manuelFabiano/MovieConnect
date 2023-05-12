<?php
//Viene incluso in add_film.php
//preleva tutti i dati presenti nel db sul film con id $id

require_once('./db/db.php');

$sql ="SELECT * FROM scheda WHERE id = '$id'";

if($result = $conn->query($sql)){
    if ($result->num_rows > 0){
        $row = $result->fetch_array(MYSQLI_ASSOC);

        $sql1 = "SELECT label FROM locandina WHERE id_scheda = '$id'";
        if ($posters = $conn->query($sql1)){
            $sql2 = "SELECT label FROM trailer WHERE id_scheda = '$id'";
            if($trailers = $conn->query($sql2)){
                $sql3 = "SELECT persona, ordine FROM ruolo WHERE id_scheda = '$id' ORDER BY ordine ASC";
                if(!$roles = $conn->query($sql3)){
                    echo "Errore nella query!" . $conn->error; 
                }
            }else echo "Errore nella query!" . $conn->error; 
        }else echo "Errore nella query!" . $conn->error; 
    }
}else echo "Errore nella query!" . $conn->error; 
