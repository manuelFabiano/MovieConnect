<?php 
include_once("./db/db.php");
$id = $_GET['id'];
$username = $_SESSION['username'];

$sql = "SELECT * FROM recensione WHERE id_scheda = '$id' AND username = '$username'";

if($result = $conn->query($sql)){
    if($result->num_rows == 1){
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $id_recensione = $row['id'];
        $sql1 = "SELECT label FROM tag WHERE id_recensione = '$id_recensione'";
        $tags = $conn->query($sql1);
    }
}