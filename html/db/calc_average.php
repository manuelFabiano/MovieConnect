<?php
//Viene incluso in post_review.php
//Calcola la nuova media voti di un film ad ogni recensione
$sql="SELECT voto from recensione WHERE id_scheda ='$id_scheda'";
if($result = $conn->query($sql)){
    if($result->num_rows > 0){
        $new_average = 0;
        $rows = $result->num_rows;
        foreach ($result as $review){
            $new_average += $review['voto'];
        }
        $new_average = $new_average/$rows;
        $sql1="UPDATE scheda SET media = '$new_average' WHERE id = '$id_scheda'";
        $conn->query($sql1);
    }
} else echo "Errore nella query!" . $conn->error;

?>
