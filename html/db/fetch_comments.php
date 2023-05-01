<?php 
//Viene incluso in profile.php e film.php
//Preleva tutti i commenti che sono stati inseriti sulla recensione di id = $review['id']
include_once("./db/db.php");
$id = $review['id'];
$sql = "SELECT * FROM commento WHERE id_recensione = '$id'";

$comments = $conn->query($sql);

?>