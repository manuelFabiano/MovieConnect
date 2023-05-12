<?
//Aggiunge una nuova row alla tabella scheda e fa il redirect al form per compilare la scheda
session_start();
if ($_SESSION['tipo'] > 0) {
    if (isset($_POST['titolo'])) {
        include_once("./db.php");
        $titolo = $conn->real_escape_string($_POST['titolo']);
        $sql = "INSERT INTO scheda (titolo) VALUES ('$titolo')";

        if ($conn->query($sql)) {
            $id = $conn->insert_id; ?>
            <form id="Form" action="../add_film.php" method="post">
                <?php
                echo '<input type="hidden" name="id" value="' . $id . '">';
                $conn->close();
                ?>
            </form>
            
            <script>
                document.getElementById('Form').submit();
            </script>
<?
        }else $conn->close();
    }
}


?>