<?php
if (isset($_POST['persona']) and isset($_POST['id_scheda'])){
    include_once('./db.php');

    $persona = $conn->real_escape_string($_POST['persona']);
    $id_scheda = $conn->real_escape_string($_POST['id_scheda']);

    $sql = "DELETE FROM ruolo WHERE persona = '$persona' AND id_scheda = '$id_scheda'";
    if(!$conn->query($sql)){
        echo $conn->error;
    }
    $conn->close();


}
?>
