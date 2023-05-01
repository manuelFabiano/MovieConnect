<?php
require_once('./db/db.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $username = $_SESSION['username'];

    $sql ="SELECT * FROM scheda WHERE id = '$id'";

    if($result = $conn->query($sql)){
        $row = $result->fetch_array(MYSQLI_ASSOC);

        if ($result->num_rows > 0){    
            $sql1 = "SELECT * FROM locandina WHERE id_scheda = '$id'";
            $posters = $conn->query($sql1); 
                
            $sql2 = "SELECT ruolo.* , persona.* FROM persona, ruolo WHERE ruolo.persona = persona.nome AND ruolo.id_scheda = '$id' ORDER BY ruolo.ordine ASC";
            $cast = $conn->query($sql2);

            //$sql3 = "SELECT * FROM recensione WHERE id_scheda = '$id' ORDER BY voto DESC";
            $sql3 = "SELECT recensione.*, COUNT(mi_piace.id_recensione) as count FROM recensione LEFT JOIN mi_piace on mi_piace.id_recensione = recensione.id WHERE id_scheda = '$id' GROUP BY id";
            $reviews = $conn->query($sql3);

            $sql4 = "SELECT * FROM trailer WHERE id_scheda = '$id'";
            $trailers = $conn->query($sql4);
            $trailers = $trailers->fetch_array(MYSQLI_ASSOC);

            $sql5 = "SELECT DISTINCT label FROM tag WHERE id_scheda = '$id'";
            $tags = $conn->query($sql5);

            //Cerco le recensioni a cui l'utente ha messo mi piace
            $sql6 = "SELECT id_recensione FROM mi_piace WHERE username = '$username'";
            $res = $conn->query($sql6);
            $likes = array();
            foreach($res as $like){
                array_push($likes, $like['id_recensione']);
            }

            //Controllo se l'utente ha già aggiunto l'opera alla watchlist
            $sql7 = "SELECT visto FROM da_vedere WHERE id_scheda = '$id' AND username = '$username'";
            $result = $conn->query($sql7);
            if($result->num_rows == 1){
                $watchlist = $result->fetch_array(MYSQLI_ASSOC);
                $seen = $watchlist['visto']; //seen = 0 non ancora visto, seen = 1 visto.
            }else $seen = 2; //film non in watchlist
        
            
            //$sql7 = "SELECT id_recensione,COUNT(*) as count FROM mi_piace GROUP BY id_recensione";
            //$all_likes = $conn->query($sql7);
            
        }else $conn->close();
    }else{ 
        echo "Errore nella query!" . $conn->error;
        $conn->close();    
        exit();
    }
}else{
    $conn->close();
    exit();
}
