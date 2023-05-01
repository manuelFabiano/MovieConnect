<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: ./index.php");
}
include("./navbar.php");
//search.php fornisce i risultati relativi alla ricerca
include("./db/search.php");
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
    <div class="flex bg-gradient-to-r from-gray-200 pb-6 pt-12 w-11/12 mt-16 px-10 rounded-2xl">

        <div class="w-52 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
            <button id="allbutton" type="button" class="w-full px-4 py-2 font-medium text-left border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:bg-blue-700 focus:text-white">
                Tutto
            </button>
            <button id="filmbutton" type="button" class="w-full px-4 py-2 font-medium text-left border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none  focus:bg-blue-700 focus:text-white">
                Film
            </button>
            <button id="seriesbutton" type="button" class="w-full px-4 py-2 font-medium text-left border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none  focus:bg-blue-700 focus:text-white">
                Serie TV
            </button>
            <button id="peoplebutton" type="button" class="w-full px-4 py-2 font-medium text-left border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:bg-blue-700 focus:text-white">
                Persone
            </button>
        </div>
        <div class="ml-3 w-full">
        <form action="./search_result.php" method="get">
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Cerca</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input autocomplete="off" type="text" id="search" name="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Cerca film, serie tv, attori..." required <?if(isset($_GET['search'])){echo "value='".$_GET['search']."'";}elseif(isset($_GET['search_tag'])){echo "value='".$_GET['search_tag']."'";}?>>
                    <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2 ">Cerca</button>
                    <ul id="search-result" class="hidden rounded-b-md">
                </div>
                
            </form>

            <?if($film_num_results == 0 and $series_num_results == 0){
                echo "Siamo spiacenti! la ricerca non ha prodotto risultati!";
            }?>
            <!-- RISULTATI FILM-->
            <?if($film_num_results > 0){?>
            <div id="film">
                <div class="text-3xl">Film<?if(isset($_GET['search_people']))echo " con ".$_GET['search_people'];?></div>
                <div class="text-lg mb-2 ">La ricerca ha prodotto <? echo $film_num_results ?> risultati!</div>
                
                <div class="grid grid-cols-5 gap-4">
                    <?php foreach ($filmresults as $card) {
                        $card['uscita'] = date("d/m/Y", strtotime($card['uscita']));
                        echo  '<form action="./film.php" method="get">
                    <input type="hidden" id="id" name="id" value="' . $card['id'] . '">
                    <div onclick="javascript:this.parentNode.submit();" class="cursor-pointer max-w-full h-96 bg-white rounded-2xl shadow-sm hover:shadow-2xl transition-shadow duration-300 ease-in-out">
                        <img src="./poster/' . $card['percorso_immagine'] . '" class="rounded-t-lg"/>
                        <div class="p-2">
                            <div>' . $card['titolo'] . '</div>
                            <div>Film - ' . $card['uscita'] . '</div>

                        </div>
                    </div>
                </form>';
                    } ?>
                </div>
            </div> <?}?>
            <!-- RISULTATI FILM -->

            <!-- RISULTATI SERIE -->
            <?if($series_num_results > 0){?>
            <div id="series">
                <div class="text-3xl">Serie<?if(isset($_GET['search_people']))echo " con ".$_GET['search_people'];?></div>
                <div class="text-lg mb-2 ">La ricerca ha prodotto <? echo $series_num_results ?> risultati!</div>
                
                <div class="grid grid-cols-5 gap-4">
                    <?php foreach ($seriesresults as $card) {

                        echo  '<form action="./film.php" method="get">
                    <input type="hidden" id="id" name="id" value="' . $card['id'] . '">
                    <div onclick="javascript:this.parentNode.submit();" class="cursor-pointer max-w-full h-96 bg-white rounded-2xl shadow-sm hover:shadow-2xl transition-shadow duration-300 ease-in-out">
                        <img src="./poster/' . $card['percorso_immagine'] . '" class="rounded-t-lg"/>
                        <div class="p-2">
                            <div>' . $card['titolo'] . '</div>
                            <div>Serie - ' . $card['inizio'] . '/' . $card['fine'] . '</div>

                        </div>
                    </div>
                </form>';
                    } ?>
                </div>
            </div> <?}?>
            <!-- RISULTATI SERIE -->

            <!-- RISULTATI ATTORI-->
            <?if($people_num_results > 0){?>
            <div id="people">
                <div class="text-3xl">Persone</div>
                <div class="text-lg mb-2 ">La ricerca ha prodotto <? echo $people_num_results ?> risultati!</div>
                
                <div class="grid grid-cols-5 gap-4">
                    <?php foreach ($peopleresults as $card) {

                        echo  '<form action="./search_result.php" method="get">
                    <div onclick="javascript:this.parentNode.submit();" class="cursor-pointer max-w-full h-96 bg-white rounded-2xl shadow-sm hover:shadow-2xl transition-shadow duration-300 ease-in-out">
                        <input type="hidden" name="search_people" value="'.$card['nome'].'">
                        <img src="./photos/' . $card['percorso_foto'] . '" class="rounded-t-lg"/>
                        <div class="p-2">
                            <div>' . $card['nome'] . '</div>
                        </div>
                    </div>
                </form>';
                    } ?>
                </div>
            </div> <?}?>
            <!-- RISULTATI ATTORI-->
        </div>

    </div>

</div>

<!--SCRIPT PER I FILTRI-->
<script src="./js/search_result.js"></script>

<!--SCRIPT PER AUTOCOMPLETE-->
<script type="text/javascript" src="./js/autocomplete.js"></script>


</html>