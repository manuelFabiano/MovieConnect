<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>
             alert('Devi essere loggato!');
             window.location.href = './login.html';    
          </script>";
 }
include("./navbar.php");
//fetch_watchlist.php preleva dal db la watchlist dell'utente con username = $_SESSION['username']
include("./db/fetch_watchlist.php");
?>
<html>

<style>
    ul {
        margin-top: 0px;
        margin-left: 25px;
        margin-right: 25px;
        border-width: 1px;
        background: #fff;
        color: #000;
        position: absolute;
        z-index: 20;

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

<div class="flex flex-col items-center">
    <div class="flex flex-row-reverse bg-gradient-to-r from-gray-200 pb-6 pt-12 w-11/12 mt-16 px-10 rounded-2xl">

        <div class="fixed left-20 w-52 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
            <button autofocus id="allbutton" type="button" class="w-full px-4 py-2 font-medium text-left border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:bg-blue-700 focus:text-white">
                Tutto
            </button>
            <button id="filmbutton" type="button" class="w-full px-4 py-2 font-medium text-left border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none  focus:bg-blue-700 focus:text-white">
                Film
            </button>
            <button id="seriesbutton" type="button" class="w-full px-4 py-2 font-medium text-left border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none  focus:bg-blue-700 focus:text-white">
                Serie TV
            </button>
            <button id="watchedbutton" type="button" class="w-full px-4 py-2 font-medium text-left border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none  focus:bg-blue-700 focus:text-white">
                Visti
            </button>
            <button id="towatchbutton" type="button" class="w-full px-4 py-2 font-medium text-left border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none  focus:bg-blue-700 focus:text-white">
                Da vedere
            </button>
        </div>
        <div class="w-5/6 ml-3">
            <!-- RISULTATI FILM-->
            <? if ($film_num_results > 0) { ?>
                <div id="film">
                    <div class="text-3xl">Film<? if (isset($_GET['search_people'])) echo " con " . $_GET['search_people']; ?></div>
                    <div class="text-lg mb-2 ">Hai in watchlist <? echo $film_num_results ?> film!</div>

                    <div class="flex flex-col gap-4">
                        <?php foreach ($filmresults as $card) {

                            echo '<div  class="';
                            if ($card['visto'] == 0) {
                                echo "davedere";
                            } else {
                                echo "visto";
                            }
                            echo ' flex cursor-pointer w-2/3 h-72 bg-white rounded-2xl shadow-sm hover:shadow-2xl transform transition duration-500 ease-in-out hover:scale-105">
                                    <form action="./film.php" method="get">
                                    <input type="hidden" id="id" name="id" value="' . $card['id'] . '">
                                    <img onclick="javascript:this.parentNode.submit();" src="./poster/' . $card['percorso_immagine'] . '" class="w-64 h-72 rounded-l-2xl"/>
                                    </form>
                                    <div class="p-2 bg-white w-full rounded-r-2xl">
                                        <div class="text-2xl">' . $card['titolo'] . '</div>
                                        <div class="text-xl">Film - ' . $card['uscita'] . '</div>
                                        <div>Media voti : ' . $card['media'] . '</div>';
                                  echo '<div class="h-2/5 overflow-scroll mb-5" >'. $card['sinossi'] .'</div>';
                            if ($card['visto'] == 0) {
                                echo
                                '<form action="./db/mark_as_watched.php" method="post">
                             <input type="hidden" id="id" name="id" value="' . $card['id'] . '" />
                             <input type="hidden" id="redirect" name="redirect" value="1" />
                             <button type="submit" class=" bg-blue-600 shadow-lg text-white  p-2 rounded  hover:bg-blue-500 hover:text-gray-100">Segna come visto</button>
                          </form>';
                            } elseif ($card['visto'] == 1) {
                                echo
                                '<form action="" method="post">
                             <button disabled type="submit" class=" bg-blue-600 shadow-lg text-white  p-2 rounded  hover:bg-blue-500 hover:text-gray-100">Visto il ' . $card['data'] . '</button>
                          </form>';
                            }
                            echo '</div>
                    </div>';
                        } ?>
                    </div>
                </div> <? } ?>
            <!-- RISULTATI FILM -->

            <!-- RISULTATI SERIE -->
            <? if ($series_num_results > 0) { ?>
                <div class="mt-2" id="series">
                    <div class="text-3xl">Serie<? if (isset($_GET['search_people'])) echo " con " . $_GET['search_people']; ?></div>
                    <div class="text-lg mb-2 ">Hai in watchlist <? echo $series_num_results ?> serie TV!</div>

                    <div class="flex flex-col gap-4">
                        <?php foreach ($seriesresults as $card) {

                            echo '<div  class="';
                            if ($card['visto'] == 0) {
                                echo "davedere";
                            } else {
                                echo "visto";
                            }
                            echo ' flex cursor-pointer w-2/3 h-72 bg-white rounded-2xl shadow-sm hover:shadow-2xl transform transition duration-500 ease-in-out hover:scale-105">
                                    <form action="./film.php" method="get">
                                        <input type="hidden" id="id" name="id" value="' . $card['id'] . '">
                                        <img onclick="javascript:this.parentNode.submit();" src="./poster/' . $card['percorso_immagine'] . '" class="w-64 h-72 rounded-l-2xl"/>
                                    </form>
                                    <div class="p-2 bg-white w-full rounded-r-2xl">
                                        <div class="text-2xl">' . $card['titolo'] . '</div>
                                        <div class="text-xl">Serie TV - ' . $card['inizio'] . '/';
                                        if($card['fine'] == 0){
                                            echo "In corso";
                                        }else echo $card['fine'];
                                  echo '</div>
                                        <div>Media voti : ' . $card['media'] . '</div>';
                                  echo '<div class="h-2/5 overflow-scroll mb-5" >'. $card['sinossi'] .'</div>';
                            if ($card['visto'] == 0) {
                                echo
                                '<form action="./db/mark_as_watched.php" method="post">
                                    <input type="hidden" id="id" name="id" value="' . $card['id'] . '" />
                                    <input type="hidden" id="redirect" name="redirect" value="1" />
                                    <button type="submit" class=" bg-blue-600 shadow-lg text-white  p-2 rounded  hover:bg-blue-500 hover:text-gray-100">Segna come visto</button>
                                </form>';
                            } elseif ($card['visto'] == 1) {
                                echo
                                '<form action="./db/mark_as_watched.php" method="post">
                                    <button disabled type="submit" class=" bg-blue-600 shadow-lg text-white  p-2 rounded  hover:bg-blue-500 hover:text-gray-100">Visto il ' . $card['data'] . '</button>
                                </form>';
                            }
                            echo '</div>
                            </div>';
                        } ?>
                    </div>
                </div> <? } ?>
            <!-- RISULTATI SERIE -->
        </div>

    </div>

</div>

<script src="./js/watchlist.js"></script>


</html>