<?php
session_start();
session_destroy();
echo "<script>alert('Disconnessione eseguita con successo!')
window.location.href = '../index.php';
</script>";
?>