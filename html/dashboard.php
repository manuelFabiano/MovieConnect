<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: ./index.php");
}
include("./navbar.php");
include("./db/fetch_top.php");
?>
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
<html>

<div class="flex flex-col items-center">
    <div class="overflow-visible flex flex-col bg-gradient-to-r from-blue-700 to-blue-400 pb-6 pt-12 w-11/12 h-64 mt-16 px-10 rounded-2xl">
        <div class="text-white font-bold text-5xl pb-1"><?php echo "Ciao " . $_SESSION['username'] . "!" ?></div>
        <div class="text-white text-3xl pb-10">Il mondo del cinema e delle serie TV nelle tue mani. </div>
        <form action="./search_result.php" method="get">
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Cerca</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input autocomplete="off" type="text" id="search" name="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Cerca film, serie tv, attori..." required>
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2 ">Cerca</button>
            </div>
            <ul id="search-result" class="hidden rounded-b-md">
        </form>
    </div>
    <div class="overflow-visible overflow-x-scroll flex gap-2 bg-gradient-to-r from-blue-700 to-blue-400 pb-1 pt-2 w-11/12 h-fit mt-2 px-10 rounded-t-2xl">
    <div class="text-white font-bold text-4xl">Top 10</div>
    </div>
    <div class="overflow-visible overflow-x-scroll flex gap-2 bg-gradient-to-r from-blue-700 to-blue-400 pb-2 pt-3 w-11/12 h-1/2 px-10 rounded-b-2xl">
        <!--<div class="text-white font-bold text-4xl">Più votati</div>-->
        <!--<div class="flex gap-2  overflow-y-visible">-->
        <?php foreach($top10 as $card){
        if($card['tipo'] == 0){
        echo '<form action="./film.php" method="get" class="overflow-visible transform transition hover:scale-105 duration-300 ease-in-out">
                <input type="hidden" id="id" name="id" value="'.$card['id'].'">
                <div onclick="javascript:this.parentNode.submit();" class="cursor-pointer max-w-full w-48 bg-white rounded-2xl shadow-sm hover:shadow-2xl ">
                    <div class="sticky">
                    <div class="z-10 absolute bg-white rounded-full p-1">'.$card['media'].'</div>
                    <img src="./poster/'.$card['percorso_immagine'].'" class="rounded-t-lg" />
                    </div>
                    <div class="p-2">
                        <div>'.$card['titolo'].'</div>
                        <div>Film - '.$card['uscita'].'</div>

                    </div>
                </div>
            </form>';
        }else{
            echo '<form action="./film.php" method="get" class="overflow-visible transform transition hover:scale-105 duration-300 ease-in-out">
            <input type="hidden" id="id" name="id" value="'.$card['id'].'">
            <div onclick="javascript:this.parentNode.submit();" class="cursor-pointer max-w-full w-48 bg-white rounded-2xl shadow-sm hover:shadow-2xl transition-shadow duration-300 ease-in-out">
            <div class="sticky">
            <div class="z-10 absolute bg-white rounded-full p-1">'.$card['media'].'</div>
            <img src="./poster/'.$card['percorso_immagine'].'" class="rounded-t-lg" />
            </div>
                <div class="p-2">
                    <div>'.$card['titolo'].'</div>
                    <div>Serie TV - '.$card['inizio'].'/'.$card['fine'].'</div>

                </div>
            </div>
        </form>';

        }
        }
        ?>
    </div>
</div>






<!-- SCRIPT PER AUTOCOMPLETE -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#search").on("keyup", function() {
            var search = $(this).val();
            if (search !== "") {
                $.ajax({
                    url: "./db/search_title.php",
                    type: "POST",
                    cache: false,
                    data: {
                        term: search
                    },
                    success: function(data) {
                        $("#search-result").html(data);
                        $("#search-result").removeClass('hidden');
                        $("#search-result").fadeIn();
                    }
                });
            } else {
                $("#search-result").html("");
                $("#search-result").addClass('hidden');
                $("#search-result").fadeOut();
            }
        });
        // click one particular search name it's fill in textbox
        $(document).on("click", "li", function() {
            $('#search').val($(this).text());
            $('#search-result').fadeOut("fast");
        });
    });
</script>

</html>