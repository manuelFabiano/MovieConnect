<?php
//Viene incluso in write_review.php e modify_review.php
//Preleva il titolo dell'opera con id = $_GET['id']
require_once('./db/db.php');

$id = $_GET['id'];

$sql = "SELECT titolo FROM scheda WHERE id = '$id'";

if ($result = $conn->query($sql)) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $titolo = $row['titolo'];
    }
}
