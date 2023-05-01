<?php
session_start();
if (isset($_GET['id'])) {
    include("./db/fetch_title.php") ?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Progetto Basi</title>
        <link href="./output.css" rel="stylesheet">
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

<? } else { ?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Progetto Basi</title>
        <link href="./output.css" rel="stylesheet">
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
            <form action="./db/search_title.php" method="post">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#titolo").on("keyup", function() {
                var search = $(this).val();
                if (search !== "") {
                    $.ajax({
                        url: "./db/search_title.php",
                        type: "POST",
                        cache: false,
                        data: {
                            searchfilm: search
                        },
                        success: function(data) {
                            $("#search-result").html(data);
                            $("#search-result").fadeIn();
                        }
                    });
                } else {
                    $("#search-result").html("");
                    $("#search-result").fadeOut();
                }
            });
            // click one particular search name it's fill in textbox
            $(document).on("click", "li", function() {
                $('#titolo').val($(this).text());
                $('#search-result').fadeOut("fast");
            });
        });
    </script>

<? } ?>