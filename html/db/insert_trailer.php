<?php
if (isset($_POST['trailerlabel']) and isset($_POST['link'])){
    include_once('./db.php');

    $label = $conn->real_escape_string($_POST['trailerlabel']);
    $link = $conn->real_escape_string($_POST['link']);
    $id_scheda = $conn->real_escape_string($_POST['id_scheda']);

    $sql = "INSERT INTO trailer (label, id_scheda, link) VALUES ('$label','$id_scheda','$link')";
    if(!$conn->query($sql)){
        echo $conn->error;
    }
    $conn->close();


}
?>

