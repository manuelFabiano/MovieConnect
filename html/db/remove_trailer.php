<?php
if (isset($_POST['label']) and isset($_POST['id_scheda'])){
    include_once('./db.php');

    $label = $conn->real_escape_string($_POST['label']);
    $id_scheda = $conn->real_escape_string($_POST['id_scheda']);

    $sql = "DELETE FROM trailer WHERE label = '$label' AND id_scheda = '$id_scheda'";
    if(!$conn->query($sql)){
        echo $conn->error;
    }
    $conn->close();


}
?>
