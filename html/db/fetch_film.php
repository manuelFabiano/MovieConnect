<?php
//Viene incluso in add_film.php
//preleva tutti i dati presenti nel db sul film con id $id

require_once('./db/db.php');

$sql ="SELECT * FROM scheda WHERE id = '$id'";

if($result = $conn->query($sql)){
    if ($result->num_rows > 0){
        $row = $result->fetch_array(MYSQLI_ASSOC);
    }
}
?>