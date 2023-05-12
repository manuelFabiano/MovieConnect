<?
session_start();
if(isset($_POST['oldpassword']) and isset($_POST['password']) and isset($_SESSION['username'])){
    include_once("./db.php");
    $username = $conn->real_escape_string($_SESSION['username']);
    $oldpassword = $conn->real_escape_string($_POST['oldpassword']);
    $password = $conn->real_escape_string($_POST['password']);

    //Seleziono dal db la vecchia password
    $sql = "SELECT password FROM account WHERE username = '$username'";
    if($result = $conn->query($sql)){
        $realoldpassword = $result->fetch_array(MYSQLI_ASSOC)['password'];
        //Controllo che la vecchia password inserita dall'utente sia giusta
        if(password_verify($oldpassword, $realoldpassword)){
            //La password è giusta, calcolo l'hash della pswd nuova
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            //Faccio l'update nel db
            $sql1 = "UPDATE account SET password = '$hashed_password' WHERE username = '$username'";
            if($conn->query($sql1)){
                //Password modificata con successo!
                echo "<script>alert('La password è stata modificata con successo!');
                window.location.href = '../profile.php?usr=".$username."';
            </script>";
            }else echo "Errore nella query!" . $conn->error;

        }else {
            //Password sbagliata
            echo "<script>alert('La vecchia password inserita da te non è corretta!');
                window.location.href = '../change_password.php';
            </script>";
        }
    }else echo "Errore nella query! " . $conn->error;
}?>