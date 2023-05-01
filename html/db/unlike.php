<?php
include_once('./db.php');

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id_recensione = $conn->real_escape_string($_POST['id']);
    $username = $conn->real_escape_string($_POST['username']);

    $sql = "DELETE FROM mi_piace WHERE username = '$username' AND id_recensione = '$id_recensione'";
    if($result = $conn->query($sql))
        echo "Fatto!";
    $conn->close();
}else 
    $conn->close();;

?>