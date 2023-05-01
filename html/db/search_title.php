<?php
//Viene incluso nelle ajax per l'autocomplete, 
session_start();
require_once "./db.php";
if (isset($_POST['term'])) {
    $term = $conn->real_escape_string($_POST['term']);
    if (substr($term, 0, 1) === "#") {
        $term = substr($term, 1);
        $query = "SELECT DISTINCT label FROM tag WHERE label LIKE '%$term%' LIMIT 10";
        if ($result = $conn->query($query)) {
            if ($result->num_rows > 0) {
                while ($autocomplete = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo '<li>#' . $autocomplete['label'] . '</li>';
                }
            }
        }
    } else {
        $query = "SELECT titolo FROM scheda WHERE titolo LIKE '%$term%' UNION SELECT nome FROM persona WHERE nome LIKE '%$term%' LIMIT 10";
        if ($result = $conn->query($query)) {
            if ($result->num_rows > 0) {
                while ($autocomplete = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo '<li>' . $autocomplete['titolo'] . '</li>';
                }
            }
        }
    }
} elseif (isset($_POST['searchfilm'])) {
    $searchfilm = $conn->real_escape_string($_POST['searchfilm']);
    $query = "SELECT titolo FROM scheda WHERE titolo LIKE '%$searchfilm%' LIMIT 10";
    if ($result = $conn->query($query)) {
        if ($result->num_rows > 0) {
            while ($autocomplete = $result->fetch_array(MYSQLI_ASSOC)) {
                echo '<li>' . $autocomplete['titolo'] . '</li>';
            }
        }
    }
} elseif (isset($_POST['titolo'])) {
    $titolo = $conn->real_escape_string($_POST['titolo']);
    $sql = "SELECT id FROM scheda WHERE titolo = '$titolo'";
    if ($result = $conn->query($sql)) {
        //BISOGNA AGGIUNGERE IL CASO DEI FILM CON LO STESSO TITOLO
        if ($result->num_rows == 1) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            echo "<script>
                      window.location.href = '../write_review.php?id=" . $row['id'] . "';
              </script>";
        } elseif ($result->num_rows == 0) {
            //aggiungo la scheda e la richiesta
            $sql1 = "INSERT INTO scheda (titolo) VALUES ('$titolo')";
            if ($result = $conn->query($sql1)) {
                $id_scheda = $conn->insert_id;
                $username = $_SESSION['username'];
                $sql2 = "INSERT INTO richiesta_inserimento (username, id_scheda, data, ora) VALUES ('$username','$id_scheda',now(), now())";
                if ($result = $conn->query($sql2)) {
                    echo "<script>
                            window.location.href = '../write_review.php?id=" . $id_scheda . "';
                        </script>";
                }
            }
        }
    }
}
