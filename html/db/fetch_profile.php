<?php
require_once('./db/db.php');
$user = $_SESSION['username'];
if(isset($_GET['usr'])){
    $username = $_GET['usr'];

    $sql ="SELECT * FROM account WHERE username = '$username'";

    if($result = $conn->query($sql)){
        if ($result->num_rows == 0){
            exit();
        }
        $profile = $result->fetch_array(MYSQLI_ASSOC);

        //questa query seleziona la recensione con il voto più alto che l'utente ha pubblicato (film) e seleziona i dati per comporre la card con un join
        $sql1 = "SELECT recensione.voto , scheda.tipo, scheda.titolo, scheda.uscita, scheda.id, locandina.percorso_immagine 
        FROM recensione LEFT JOIN scheda ON scheda.id = recensione.id_scheda LEFT JOIN locandina ON locandina.id_scheda = recensione.id_scheda 
        WHERE username = '$username' AND scheda.tipo = '0' ORDER BY voto DESC LIMIT 1";
        if($result = $conn->query($sql1)){
            $film = $result->fetch_array(MYSQLI_ASSOC);
        }
        $sql2 = "SELECT recensione.voto , scheda.tipo, scheda.titolo, scheda.inizio, scheda.fine, scheda.id, locandina.percorso_immagine 
        FROM recensione LEFT JOIN scheda ON scheda.id = recensione.id_scheda LEFT JOIN locandina ON locandina.id_scheda = recensione.id_scheda 
        WHERE username = '$username' AND scheda.tipo = '1' ORDER BY voto DESC LIMIT 1";
        if($result = $conn->query($sql2)){
            $serie = $result->fetch_array(MYSQLI_ASSOC); 
        }

        if($_GET['ord'] == 1){
            //query che seleziona tutte le recensioni pubblicate dall'utente e il numero di like (ordine like decrescente)
        $sql3 = "SELECT recensione.*, scheda.titolo, scheda.tipo, COUNT(mi_piace.id_recensione) AS count FROM recensione LEFT JOIN scheda ON scheda.id = recensione.id_scheda LEFT JOIN mi_piace ON mi_piace.id_recensione = recensione.id WHERE recensione.username = '$username' GROUP BY id ORDER BY count DESC";
        $reviews = $conn->query($sql3);         
        }else{
        //query che seleziona tutte le recensioni pubblicate dall'utente e il numero di like (ordine voto decrescente)
        $sql3 = "SELECT recensione.*, scheda.titolo, scheda.tipo, COUNT(mi_piace.id_recensione) AS count FROM recensione LEFT JOIN scheda ON scheda.id = recensione.id_scheda LEFT JOIN mi_piace ON mi_piace.id_recensione = recensione.id WHERE recensione.username = '$username' GROUP BY id ORDER BY recensione.voto DESC";
        $reviews = $conn->query($sql3); 
        }
        //Cerco le recensioni a cui l'utente ha messo mi piace
        $sql4 = "SELECT id_recensione FROM mi_piace WHERE username = '$user'";
        $res = $conn->query($sql4);
        $likes = array();
        foreach($res as $like){
            array_push($likes, $like['id_recensione']);
        }
    }
}
?>