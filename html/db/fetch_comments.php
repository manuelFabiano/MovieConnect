<?php 
include_once("./db/db.php");
$id = $review['id'];
$sql = "SELECT * FROM commento WHERE id_recensione = '$id'";

$comments = $conn->query($sql);

?>