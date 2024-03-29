<?php
session_start();
require_once('./db.php');

$id_scheda = $conn->real_escape_string($_POST['id_scheda']);
$username = $conn->real_escape_string($_SESSION['username']);
$voto = $conn->real_escape_string($_POST['voto']);
$contenuto = $conn->real_escape_string($_POST['contenuto']);
$tipo = $conn->real_escape_string($_POST['tipo']);
$uscita = $conn->real_escape_string($_POST['uscita']);
$inizio = $conn->real_escape_string($_POST['inizio']);

$tags = explode(" ", $conn->real_escape_string($_POST['tags']));


if($_SERVER["REQUEST_METHOD"] === "POST"){
    $sql="INSERT INTO recensione (id_scheda, username, voto, contenuto, data_ora) VALUES ('$id_scheda', '$username', '$voto', '$contenuto', now())";
    if($result = $conn->query($sql)){
        $id_recensione = $conn->insert_id;
        if($tipo == 0){
        $sql2 = "UPDATE scheda SET tipo = '$tipo', uscita = '$uscita' WHERE id = '$id_scheda'";
        }else {
            $sql2 = "UPDATE scheda SET tipo = '$tipo', inizio = '$inizio' WHERE id = '$id_scheda'";
        }
        $conn->query($sql2);
        
        //inserisco i tag
        $sql1=$conn->prepare("INSERT INTO tag (label, id_scheda, id_recensione) VALUES (?, ?, ?)");
        $sql1->bind_param("sss", $tag, $id_scheda, $id_recensione );
        
        foreach($tags as $tag){
            if($tag !== '');
                $sql1->execute();
        }
        include("./calc_average.php");
        $conn->close();
        echo "<script>alert('Recensione pubblicata!!');
                      window.location.href = '../film.php?id=".$id_scheda."';
              </script>";
    }else{
        echo "Errore nella query! ".$conn->error;
    }
}
$conn->close();
?>