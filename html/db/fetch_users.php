<?php
//Viene incluso in users.php
//Preleva tutti gli utenti registrati al sito
require_once('./db/db.php');

$sql ="SELECT * FROM account ORDER BY username ASC";

$users = $conn->query($sql);

if(!$users){
    echo "Errore nella query! " . $conn->error;
    $conn->close();
    exit();
}
$conn->close();
    
?>