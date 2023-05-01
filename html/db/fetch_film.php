<?php
require_once('./db/db.php');

$sql ="SELECT * FROM scheda WHERE id = '$id'";

if($result = $conn->query($sql)){
    if ($result->num_rows == 0){
        exit();
    }
    $row = $result->fetch_array(MYSQLI_ASSOC);
}
?>