<?php
//Viene incluso in film.php
//Preleva tutti i dati necessari per stampare a schermo la scheda di un film


if (isset($_GET['id'])) {
    require_once('./db/db.php');
    $id = $conn->real_escape_string($_GET['id']);
    $username = $conn->real_escape_string($_SESSION['username']);

    //Query per le informazioni di base
    $sql = "SELECT * FROM scheda WHERE id = '$id'";

    if ($result = $conn->query($sql)) {
        $row = $result->fetch_array(MYSQLI_ASSOC);

        if ($result->num_rows > 0) {
            //Query per le locandine
            $sql1 = "SELECT * FROM locandina WHERE id_scheda = '$id'";
            if ($posters = $conn->query($sql1)) {
                //Query per il cast
                $sql2 = "SELECT ruolo.* , persona.* FROM persona, ruolo WHERE ruolo.persona = persona.nome AND ruolo.id_scheda = '$id' ORDER BY ruolo.ordine ASC";
                if ($cast = $conn->query($sql2)) {
                    //Query per le recensioni in base all'ordine scelto
                    if ($_GET['ord'] == 1) {
                        //Like
                        $sql3 = "SELECT recensione.*, COUNT(mi_piace.id_recensione) as count FROM recensione LEFT JOIN mi_piace on mi_piace.id_recensione = recensione.id WHERE id_scheda = '$id' GROUP BY id ORDER BY count DESC";
                    } elseif ($_GET['ord'] == 2) {
                        //Voto
                        $sql3 = "SELECT recensione.*, COUNT(mi_piace.id_recensione) as count FROM recensione LEFT JOIN mi_piace on mi_piace.id_recensione = recensione.id WHERE id_scheda = '$id' GROUP BY id ORDER BY recensione.voto DESC";
                    } else {
                        //data
                        $sql3 = "SELECT recensione.*, COUNT(mi_piace.id_recensione) as count FROM recensione LEFT JOIN mi_piace on mi_piace.id_recensione = recensione.id WHERE id_scheda = '$id' GROUP BY id ORDER BY data_ora DESC";
                    }
                    if ($reviews = $conn->query($sql3)) {
                        //Query per i trailer
                        $sql4 = "SELECT * FROM trailer WHERE id_scheda = '$id'";
                        if ($trailers = $conn->query($sql4)) {
                            //Query per i tags
                            $sql5 = "SELECT DISTINCT label FROM tag WHERE id_scheda = '$id'";
                            if ($tags = $conn->query($sql5)) {
                                //Cerco le recensioni a cui l'utente ha messo mi piace
                                $sql6 = "SELECT id_recensione FROM mi_piace WHERE username = '$username'";
                                if ($res = $conn->query($sql6)) {
                                    $likes = array();
                                    foreach ($res as $like) {
                                        array_push($likes, $like['id_recensione']);
                                    }

                                    //Controllo se l'utente ha già aggiunto l'opera alla watchlist
                                    $sql7 = "SELECT visto FROM da_vedere WHERE id_scheda = '$id' AND username = '$username'";
                                    if ($result = $conn->query($sql7)) {
                                        if ($result->num_rows == 1) {
                                            $watchlist = $result->fetch_array(MYSQLI_ASSOC);
                                            $seen = $watchlist['visto']; //seen = 0 non ancora visto, seen = 1 visto.
                                        } else $seen = 2; //film non in watchlist
                                    }else echo "Errore nella query 7!" . $conn->error;
                                }else echo "Errore nella query 6!" . $conn->error;
                            }else echo "Errore nella query 5!" . $conn->error;
                        }else echo "Errore nella query 4!" . $conn->error;
                    }else echo "Errore nella query 3!" . $conn->error;
                }else echo "Errore nella query 2!" . $conn->error;
            }else echo "Errore nella query 1!" . $conn->error;
        } else {
            echo "Non è stato trovato nessun film con questo id!";
            $conn->close();
            exit();}
    } else {
        echo "Errore nella query!" . $conn->error;
        $conn->close();
        exit();
    }
} else exit();

