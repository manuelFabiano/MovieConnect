<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: ./index.php");
}
include("./navbar.php");
include("./db/fetch_profile.php");
?>
<html>
 
<body style="background: #edf2f7;">
    <div class="flex items-center gap-5">
        <div class="self-start bg-white shadow-2xl border pb-6 pt-12 w-4/6 mt-16 ml-16 px-10 rounded-2xl">
            <div class="font-bold text-5xl pb-1">Profilo di <? echo $profile['username'] ?></div>
            <div class="flex">
                <div class="flex flex-col">
                    <div class="mt-5 ml-4 flex">
                        <div>Nome:</div>
                        <div class="ml-2 font-bold"><? echo $profile['nome'] ?></div>
                    </div>
                    <div class="mt-5 ml-4 flex">
                        <div>Cognome:</div>
                        <div class="ml-2 font-bold"><? echo $profile['cognome'] ?></div>
                    </div>
                    <div class="mt-5 ml-4 flex">
                        <div>Email: </div>
                        <div class="ml-2 font-bold"><? echo $profile['email'] ?></div>
                    </div>
                    <div class="mt-5 ml-4 flex">
                        <div>Nato il </div>
                        <div class="ml-2 font-bold"><? echo $profile['data_nascita'] ?></div>
                    </div>
                    <div class="mt-5 ml-4 flex">
                        <div>Vive a </div>
                        <div class="ml-2 font-bold"><? echo $profile['residenza'] ?></div>
                    </div>
                    <?  $total_likes = 0;
                        foreach ($reviews as $review) {
                            $total_likes += $review['count'];
                        }
                    ?>
                    <div class="mt-5 ml-4 flex">
                        <div>Mi piace ottenuti: </div>
                        <div class="ml-2 font-bold"><? echo $total_likes; ?></div>
                    </div>

                </div>
            </div>
        </div>
        <?if($film['titolo'] != ""){
            $film['uscita'] = date("d/m/Y", strtotime($film['uscita']));?>
        <div class="flex flex-col w-1/6 mt-16 self-center">
            <div>Film preferito:</div>
            <div class=" transform transition duration-500 hover:scale-105 bg-white h-2/5 rounded-lg">
                <div class="sticky">
                    <div class="z-10 absolute bg-white rounded-full p-1"><? echo $film['voto'] ?></div>
                    <img src="./poster/<? echo $film['percorso_immagine'] ?>" class="rounded-t-lg" />
                </div>
                <div class="p-2 bg-white rounded-b-lg">
                    <div><? echo $film['titolo'] ?></div>
                    <div>Film - <? echo $film['uscita'] ?></div>
                </div>
            </div>
        </div>
        <?}?>
        <?if($serie['titolo'] != ""){?>
        <div class="flex flex-col w-1/6 mt-16 self-start mr-16">
            <div>Serie TV preferita:</div>
            <div class=" transform transition duration-500 hover:scale-105 bg-white h-2/5 rounded-lg">
                <div class="sticky">
                    <div class="z-10 absolute bg-white rounded-full p-1"><? echo $serie['voto'] ?></div>
                    <img src="./poster/<? echo $serie['percorso_immagine'] ?>" class="rounded-t-lg" />
                </div>
                <div class="p-2 bg-white rounded-b-lg">
                    <div><? echo $serie['titolo'] ?></div>
                    <div>Serie TV - <? echo $serie['inizio'] . "/" . $serie['fine'] ?></div>
                </div>
            </div>
        </div>
        <?}?>
    </div>
    <div class="ml-16">
        <div class="flex">
            <div class="text-3xl">Recensioni pubblicate  -  Ordina per </div>
            <button type="button" onclick="location.href='./profile.php?usr=<?echo $profile['username']?>&ord=1'" class="bg-blue-600 text-white  p-2 mx-2 rounded  hover:bg-blue-500 hover:text-gray-100">Mi piace</button>
            <button type="button" onclick="location.href='./profile.php?usr=<?echo $profile['username']?>'" class="bg-blue-600 text-white  p-2 rounded  hover:bg-blue-500 hover:text-gray-100">Voto</button>
        </div>
        <!--RECENSIONI-->
        <ul id="" class="my-2 w-3/5 space-y-4">
            <? $i = 0;
            foreach ($reviews as $review) {
                //controllo se la scheda è stata compilata
                if($review['tipo'] != ""){
                include("./db/fetch_tags.php");
                include("./db/fetch_comments.php");
                $i += 1;
                $likebutton = "button" . $i;
                $review['voto'] += 0;
                $review['data'] = date("d/m/Y", strtotime($review['data']));
                echo  '<li class="bg-white border border-gray-100 w-custom p-4 rounded-lg shadow-sm hover:shadow-2xl transition-shadow duration-300 ease-in-out">
                        <div class="flex justify-between items-start">
                           <div class="flex">
                              <div class="text-gray-600 py-3 text-lg">Recensione su</div>
                              <div onclick="location.href = \'./film.php?id=' . $review['id_scheda'] . '\';" class="text-blue-500 ml-1 py-3 text-lg hover:underline cursor-pointer">' . $review['titolo'] . '</div>
                              <div class="text-gray-400 ml-2 pt-4 text-sm">pubblicata il ' . $review['data'] . ', alle ' . $review['ora'] . ' </div>
                  
                           </div>
                           <div class="bg-green-500 text-white font-bold rounded-full p-3 hover:bg-white hover:text-green-500">
                              ' . $review['voto'] . '</div>
                        </div>
                        <div class="overflow-y-auto scroll-smooth max-h-40 text-justify">' . $review['contenuto'] . '
                        </div>
                        <div class="mt-2 flex flex-row-reverse">';
                if (in_array($review['id'], $likes)) {
                    echo '<button onclick="unlike(this.id, this.value,\'' . $_SESSION['username'] . '\')" id="' . $likebutton . '" value="' . $review['id'] . '" class="h-10 w-40 hidden cursor-pointer rounded-lg border-2 border-red-600 py-1 px-2 font-bold text-red-600">Mi piace: ' . $review['count'] . '</button>
                           <button onclick="unlike(this.id, this.value,\'' . $_SESSION['username'] . '\')" id="' . 'unlike' . $likebutton . '" value="' . $review['id'] . '" class="h-10 w-40 cursor-pointer rounded-lg border-2 bg-red-600 border-white py-1 px-2 font-bold text-white">Mi piace: ' . $review['count'] . '</button>';
                } else {
                    echo '<button onclick="like(this.id, this.value,\'' . $_SESSION['username'] . '\')" id="' . $likebutton . '" value="' . $review['id'] . '" class="h-10 w-40 cursor-pointer rounded-lg border-2 border-red-600 py-1 px-2 font-bold text-red-600">Mi piace: ' . $review['count'] . '</button>
                        <button onclick="like(this.id, this.value,\'' . $_SESSION['username'] . '\')" id="' . 'unlike' . $likebutton . '" value="' . $review['id'] . '" class="h-10 w-40 hidden cursor-pointer rounded-lg border-2 bg-red-600 border-white py-1 px-2 font-bold text-white">Mi piace: ' . $review['count'] . '</button>';
                }
                echo '<form action="./write_comment.php" method="post">
                        <input type="hidden" id="username" name="username" value="' . $review['username'] . '" />
                        <input type="hidden" id="id_recensione" name="id_recensione" value="' . $review['id'] . '" />
                        <input type="hidden" id="id_scheda" name="id_scheda" value="' . $row['id'] . '" />
                        <input type="hidden" id="redirect" name="redirect" value="profile" />
                        <button type="submit" class="cursor-pointer rounded-lg border-2 bg-blue-600 py-1 px-2 font-bold text-white">Commenta</button>
                        </form>';
                echo '<div class="w-full flex">';
                foreach ($review_tags as $tag) {
                    echo '<div onclick="location.href = \'./search_result.php?search_tag=' . $tag['label'] . '\';" class="bg-white cursor-pointer rounded-lg w-fit p-1 shadow-2xl h-8">
                     <div class="text-black text-xs">' . $tag['label'] . '</div>
                  </div>';
                }
                echo '</div>
                        </div>';

                if ($comments->num_rows != 0) {
                    echo '<button value="' . $review['id'] . '" class="cursor-pointer rounded-lg border-2 bg-blue-600 py-1 px-2 font-bold text-white" onclick="showComments(this)">Vedi commenti</button>
                        <div id="comment-section-' . $review['id'] . '" class="hidden">
                        <ul class="">';

                    foreach ($comments as $comment) {
                        $comment['data'] = date("d/m/Y", strtotime($comment['data']));
                        echo '<li class="bg-white border border-gray-100 w-full p-4 rounded-lg shadow-sm hover:shadow-2xl transition-shadow duration-300 ease-in-out">
                           <div class="flex justify-between items-start">
                           <div class="flex">
                              <div class="text-gray-600 py-3 text-lg">Commento di</div>
                              <div class="text-blue-500 ml-1 py-3 text-lg hover:underline cursor-pointer">' . $comment['username'] . '</div>
                              <div class="text-gray-400 ml-2 pt-4 text-sm">pubblicata il ' . $comment['data'] . ', alle ' . $comment['ora'] . ' </div>
                  
                           </div>
                           <div class="bg-green-500 text-white font-bold rounded-full p-3 hover:bg-white hover:text-green-500">
                              ' . 'test' . '</div>
                        </div>
                        <div class="overflow-y-auto scroll-smooth max-h-40 text-justify">' . $comment['contenuto'] . '
                        </div>
                        <div class="mt-2 flex flex-row-reverse">
                     
                     </li>';
                    }
                    echo '</div>';
                }

                echo '</li>';
                }
            }
            ?>
        </ul>
    </div>
</body>

<script>
    //LIKE: 
    function like(id, id_review, username) {
        id_unlike = "unlike" + id;
        var formData = new FormData();
        formData.append('id', id_review);
        formData.append('username', username);

        fetch("./db/like.php", {
            method: 'post',
            body: formData
        }).then(function(res) {
            console.log(res)
            like = document.getElementById(id);
            var unlike = document.getElementById(id_unlike);
            unlike.classList.remove('hidden');
            like.classList.add('hidden');
            window.location.reload();
        });
    }

    //UNLIKE:
    function unlike(id, id_review, username) {
        id_like = id.slice(6);
        var formData = new FormData();
        formData.append('id', id_review);
        formData.append('username', username);

        fetch("./db/unlike.php", {
            method: 'post',
            body: formData
        }).then(function(res) {
            var unlike = document.getElementById(id);
            var like = document.getElementById(id_like);
            unlike.classList.add('hidden');
            like.classList.remove('hidden');
            window.location.reload();
        });
    }

    //VEDI COMMENTI
    function showComments(button) {
        // ottieni l'ID della recensione dalla proprietà "value" del pulsante "Vedi commenti"
        const reviewId = button.getAttribute('value');

        // seleziona la sezione dei commenti corretta utilizzando l'ID della recensione
        const commentSection = document.getElementById(`comment-section-${reviewId}`);

        // mostra la sezione dei commenti
        commentSection.classList.remove('hidden');

        // sostituisci il testo del pulsante "Vedi commenti" con "Nascondi commenti"
        button.innerText = 'Nascondi commenti';

        // aggiungi un nuovo evento click al pulsante "Nascondi commenti"
        button.setAttribute('onclick', 'hideComments(this)');
    }

    //NASCONDI COMMENTI
    function hideComments(button) {
        // ottieni l'ID della recensione dalla proprietà "value" del pulsante "Nascondi commenti"
        const reviewId = button.getAttribute('value');

        // seleziona la sezione dei commenti corretta utilizzando l'ID della recensione
        const commentSection = document.getElementById(`comment-section-${reviewId}`);

        // nascondi la sezione dei commenti
        commentSection.classList.add('hidden');

        // sostituisci il testo del pulsante "Nascondi commenti" con "Vedi commenti"
        button.innerText = 'Vedi commenti';

        // aggiungi un nuovo evento click al pulsante "Vedi commenti"
        button.setAttribute('onclick', 'showComments(this)');
    }
</script>


</html>