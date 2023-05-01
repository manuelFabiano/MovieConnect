<?php
//Viene incluso in profile.php e film.php
//Preleva tutti i tags che sono stati inseriti nella recensione di id = $review['id']
include_once("./db/db.php");

$id = $review['id'];
$sql = "SELECT label FROM tag WHERE id_recensione = '$id'";

$review_tags = $conn->query($sql);

?>