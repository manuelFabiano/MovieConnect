<?php
session_start();
require_once('./db.php');

$id_scheda = $conn->real_escape_string($_POST['id_scheda']);
$username = $conn->real_escape_string($_SESSION['username']);
$voto = $conn->real_escape_string($_POST['voto']);
$contenuto = $conn->real_escape_string($_POST['contenuto']);

$tags = explode(" ", $conn->real_escape_string($_POST['tags']));


if($_SERVER["REQUEST_METHOD"] === "POST"){
    $sql="INSERT INTO recensione (id_scheda, username, voto, contenuto, data, ora) VALUES ('$id_scheda', '$username', '$voto', '$contenuto', now(), now())";
    if($result = $conn->query($sql)){
        $id_recensione = $conn->insert_id;
        
        //inserisco i tag
        $sql1=$conn->prepare("INSERT INTO tag (label, id_scheda, id_recensione) VALUES (?, ?, ?)");
        $sql1->bind_param("sss", $tag, $id_scheda, $id_recensione );
        
        foreach($tags as $tag){
            if($tag !== '');
                $sql1->execute();
        }
        
        
        
        include("./calc_average.php");
        echo "<script>alert('Recensione pubblicata!!');
                      window.location.href = '../film.php?id=".$id_scheda."';
              </script>";
    }else{
        echo "ERRORE: ".$conn->error;
    }
}

?>