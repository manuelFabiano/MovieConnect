<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>
             alert('Devi essere loggato!');
             window.location.href = './login.html';    
          </script>";
}
include("./db/check_film.php");
//CODICE DA ESEGUIRE SE $_GET['id'] E' SETTATO
if (isset($_GET['id'])) {
    //fetch_title serve a prelevare il titolo dell'opera con id = $_GET['id']
    include("./db/fetch_title.php");
    ?>

    <head>
        <title>MovieConnect</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
        <div class="bg-white w-4/5 h-4/5 rounded-2xl shadow-2xl p-7">
            <div class="text-3xl font-sans">Scrivi una recensione su <? echo $titolo; ?></div>
            <form action="./db/post_review.php" method="post">
                <input type="hidden" id="id_scheda" name="id_scheda" value="<? echo $id ?>" />
                <div class="flex">
                    <label for="voto" class="font-semibold text-lg mt-4 mr-4 text-gray-600 pb-1 block">Voto</label>
                    <select name="voto" id="voto" class=" mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block ">
                        <option value="10">10</option>
                        <option value="9.5">9.5</option>
                        <option value="9">9</option>
                        <option value="8.5">8.5</option>
                        <option value="8">8</option>
                        <option value="7.5">7.5</option>
                        <option value="7">7</option>
                        <option value="6.5">6.5</option>
                        <option value="6">6</option>
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                    <?if(is_null($row['tipo'])){?>
                    <label for="tipo" class="ml-4 font-semibold text-lg mt-4 mr-4 text-gray-600 pb-1 block">Tipo</label>
                    <select name="tipo" id="tipo" class="mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  ">
                            <option value="0">Film</option>
                            <option value="1">Serie</option>
                    </select>
                    <label for="uscita" class="ml-4 font-semibold text-lg mt-4 mr-4 text-gray-600 pb-1 block">Data di uscita</label>
                    <input type="date" name="uscita" id="uscita" class="mt-3 bg-gray-50 text-sm disabled:bg-gray-200 border rounded-lg " />
                    <label for="inizio" class="ml-4 font-semibold text-lg mt-4 mr-4 text-gray-600 pb-1 block">Uscita prima stagione</label>
                    <input disabled type="number" min="1900" max="2023" step="1" name="inizio" id="inizio" class="mt-3 bg-gray-50 disabled:bg-gray-200 border rounded-lg  text-sm w-20" />

                    <?}?>
                </div>
                <div>
                    <textarea required name="contenuto" id="contenuto" placeholder="Scrivi qui il contenuto della tua recensione..." class="w-full mt-4 h-4/6 p-8 resize-none bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block"></textarea>
                    <textarea required name="tags" id="tags" placeholder="Scrivi qui i tags che vuoi attribuire al film (separati da uno spazio)" class="w-full mt-4 h-10 p-2 resize-none bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block"></textarea>
                </div>
                <div class="flex flex-row-reverse">
                    <button type="submit" class=" bg-blue-600 shadow-lg text-white  p-2 rounded  hover:bg-blue-500 hover:text-gray-100 mt-2">Pubblica</button>
                </div>
            </form>
        </div>
    </body>
    <script>
        var select = document.getElementById("tipo");
            document.getElementById('tipo').onchange = function() {
                if (document.getElementById('inizio').hasAttribute("disabled")) {
                    document.getElementById('inizio').removeAttribute("disabled");
                    document.getElementById('uscita').setAttribute('disabled', '');
                } else {
                    document.getElementById('inizio').setAttribute('disabled', '');
                    document.getElementById('uscita').removeAttribute("disabled");
                }
            };
        </script>
    </script>

<? } elseif ($select_film == true) { ?>

    <head>
        <title>Progetto Basi</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
        <div class="bg-white w-3/5 h-30 rounded-2xl shadow-2xl p-7">
            <div class="text-3xl font-sans">Quale opera vuoi recensire fra queste?</div>
            <div class="flex mt-2 p-2 gap-1">
            <?foreach($result as $card){?>
                <div onclick="location.href='./write_review.php?id=<?echo $card['id']?>'" class="cursor-pointer bg-white border border-grey-500 rounded-lg"><?echo $card['id'].'. '.$card['titolo'].' - '; if($card['tipo'] == 0){echo "Film - ". $card['uscita'];}else{echo "Serie - ". $card['inizio'];}?></div>
          <?  }
            ?>
            <form action="./write_review.php" method="post">
                <button class="cursor-pointer bg-white border border-grey-500 rounded-lg p-1">Non è fra queste, ma ha lo stesso titolo</button>
                <input type="hidden" id="titolo" name="titolo" value="<?echo $titolo;?>"> 
                <input type="hidden" id="new" name="new" value="1">
            </form>
            </div>
        </div>
    </body>

<?
} else { //CODICE DA ESEGUIRE SE $_GET['id'] NON E' SETTATO 
?>

    <head>
        <title>Progetto Basi</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    <style>
        ul {
            margin-top: 0px;
            background: #fff;
            color: #000;
        }

        li {
            padding: 12px;
            cursor: pointer;
            color: black;
        }

        li:hover {
            background: #f0f0f0;
        }
    </style>

    <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
        <div class="bg-white w-3/5 h-30 rounded-2xl shadow-2xl p-7">
            <div class="text-3xl font-sans">Su quale opera vuoi scrivere una recensione?</div>
            <form action="./write_review.php" method="post">
                <div class="flex">
                    <input required autocomplete="off" name="titolo" id="titolo" class="w-full mt-4 h-10 p-2 resize-none bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block"></textarea>
                    <button type="submit" class=" bg-blue-600 shadow-lg text-white  p-2 rounded  hover:bg-blue-500 hover:text-gray-100 mt-2">Pubblica</button>
                </div>
                <ul id="search-result">
                    <div class="text-red-600 text-xs"> ATTENZIONE: Se la scheda dell'opera che vuoi recensire non è ancora stata inserita, potrai comunque scrivere la recensione, ma prima che venga pubblicata dovrai attendere che un moderatore aggiunga la scheda.</div>
            </form>
        </div>
    </body>
    <!-- SCRIPT PER AUTOCOMPLETE -->
    <script src="./js/autocomplete_film.js"></script>

<? } ?>