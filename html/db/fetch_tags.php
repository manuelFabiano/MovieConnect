<?php 
include_once("./db/db.php");
$id = $review['id'];
$sql = "SELECT label FROM tag WHERE id_recensione = '$id'";

$review_tags = $conn->query($sql);

?>