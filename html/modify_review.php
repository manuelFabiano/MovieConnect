<?php
//Questa pagina è molto simile a write_review, fetch_review.php preleva i dati precedentemente pubblicati 
//dall'utente per permettergli di modificarli
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>
             alert('Devi essere loggato!');
             window.location.href = './login.html';    
          </script>";
 }
if (isset($_GET['id'])) {
    //fetch_title serve a prelevare il titolo dell'opera con id = $_GET['id']
    include("./db/fetch_title.php");
    include("./db/fetch_review.php"); 
    ?>

    <head>
        <title>Progetto Basi</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
        <div class="bg-white w-4/5 h-4/5 rounded-2xl shadow-2xl p-7">
            <div class="text-3xl font-sans">Modifica la tua recensione su <? echo $titolo; ?></div>
            <form action="./db/update_review.php" method="post">
                <input type="hidden" id="id_recensione" name="id_recensione" value="<? echo $row['id'] ?>" />
                <input type="hidden" id="id_scheda" name="id_scheda" value="<? echo $_GET['id']; ?>" />
                <div class="flex">
                    <label for="voto" class="font-semibold text-lg mt-4 mr-4 text-gray-600 pb-1 block">Voto</label>
                    <select name="voto" id="voto" class=" mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block ">
                        <option selected value="<?echo $row['voto'];?>"><?echo $row['voto'];?></option>
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
                </div>
                <div>
                    <textarea required name="contenuto" id="contenuto" placeholder="Scrivi qui il contenuto della tua recensione..." class="w-full mt-4 h-4/6 p-8 resize-none bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block"><?echo $row['contenuto'];?></textarea>
                    <textarea required name="tags" id="tags" placeholder="Scrivi qui i tags che vuoi attribuire al film (separati da uno spazio)" class="w-full mt-4 h-10 p-2 resize-none bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block"><?php
                        $tags_string = "";
                        foreach($tags as $tag){
                            $tags_string .= $tag['label'];
                            $tags_string .= " ";
                        }
                        echo rtrim($tags_string); //rimuove gli spazi dalla fine della stringa
                        ?>
                    </textarea>
                </div>
                <div class="flex flex-row-reverse">
                    <button type="submit" class=" bg-blue-600 shadow-lg text-white  p-2 rounded  hover:bg-blue-500 hover:text-gray-100 mt-2">Pubblica</button>
                </div>
            </form>
        </div>
    </body>

<? } ?>