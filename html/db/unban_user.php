<?php 
include_once("./db.php");
session_start();
if(isset($_POST['username']) and $_SESSION['tipo'] == 2){
    $usr = $_POST['username'];
    $sql = "UPDATE account SET ban = '0' WHERE username = '$usr'";

    if($res = $conn->query($sql)){
        echo "<script>
                      window.location.href = '../users.php';
              </script>";
    }else echo $conn->error;
}
?>