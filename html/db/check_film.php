<?
include_once("./db/db.php");
if (isset($_POST['titolo'])) {
    $titolo = $conn->real_escape_string($_POST['titolo']);
    $sql = "SELECT id , titolo, tipo, uscita, inizio FROM scheda WHERE titolo = '$titolo'";
    if ($result = $conn->query($sql)) {
        //CASO DEI FILM CON LO STESSO TITOLO
        if($result->num_rows > 0 and $result->num_rows < 4 and $_POST['new'] == 1){
            //aggiungo la scheda e la richiesta
            $sql1 = "INSERT INTO scheda (titolo) VALUES ('$titolo')";
            if ($result = $conn->query($sql1)) {
                $id_scheda = $conn->insert_id;
                $username = $_SESSION['username'];
                $sql2 = "INSERT INTO richiesta_inserimento (username, id_scheda, data_ora) VALUES ('$username','$id_scheda',now())";
                if ($result = $conn->query($sql2)) {
                    echo "<script>
                            window.location.href = '../write_review.php?id=" . $id_scheda . "';
                        </script>";
                }
            }

        }
        elseif ($result->num_rows > 0) {
              $select_film = true;
        } elseif ($result->num_rows == 0) {
            //aggiungo la scheda e la richiesta
            $sql1 = "INSERT INTO scheda (titolo) VALUES ('$titolo')";
            if ($result = $conn->query($sql1)) {
                $id_scheda = $conn->insert_id;
                $username = $_SESSION['username'];
                $sql2 = "INSERT INTO richiesta_inserimento (username, id_scheda, data_ora) VALUES ('$username','$id_scheda',now())";
                if ($result = $conn->query($sql2)) {
                    echo "<script>
                            window.location.href = '../write_review.php?id=" . $id_scheda . "';
                        </script>";
                }
            }
        }
    }
}
?>
