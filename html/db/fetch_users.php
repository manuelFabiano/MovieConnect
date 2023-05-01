<?php
require_once('./db/db.php');

$sql ="SELECT * FROM account ORDER BY username ASC";

$users = $conn->query($sql);
    
?>