<?php
//Viene usato nello script autocomplete in add_film.php
session_start();
require_once "./db.php";
if (isset($_POST['term'])) {
    $term = $conn->real_escape_string($_POST['term']);
    $query = "SELECT nome FROM persona WHERE nome LIKE '%$term%' LIMIT 10";
    if($result = $conn->query($query)){
        if ($result->num_rows > 0) {
            while ($persona = $result->fetch_array(MYSQLI_ASSOC)){
                echo '<li>'.$persona['nome'].'</li>';
            }
        }
    }else {
        echo "Errore nella query! " . $conn->error;
        $conn->close();
    }
} 
$conn->close();
?>