<?php
session_start();
if ($_SESSION['tipo'] == 2) {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        include("./db/fetch_film.php");
?>

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

        <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
            <div class="bg-white w-4/5 h-4/5 rounded-2xl shadow-2xl p-7">
                <form action="./db/update_film.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id_scheda" name="id_scheda" value="<? echo $id ?>" />
                    <div class="flex">
                        <div class="text-3xl font-sans">Scheda di </div>
                        <input name="titolo" id="titolo" value="<? echo $row['titolo'] ?>" type="text" class="w-2/5 h-8 mb-5 ml-3 px-2  text-base text-gray-900 border border-gray-300 rounded-lg cursor-text bg-gray-50  focus:outline-blue-500">
                        <div class="text-2xl font-sans">Tipo</div>
                        <select name="tipo" id="tipo" class="h-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block ">
                            <option value="0" <? if ($row['tipo'] == 0) echo "selected" ?>>Film</option>
                            <option value="1" <? if ($row['tipo'] == 1) echo "selected" ?>>Serie</option>
                        </select>
                        <div class="text-2xl font-sans">Colore</div>
                        <select name="colore" id="colore" class="bg- h-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block ">
                            <option <? if ($row['colore'] == 'red') echo "selected" ?> value="red">Rosso</option>
                            <option <? if ($row['colore'] == 'orange') echo "selected" ?> value="orange">Arancione</option>
                            <option <? if ($row['colore'] == 'yellow') echo "selected" ?> value="yellow">Giallo</option>
                            <option <? if ($row['colore'] == 'green') echo "selected" ?> value="green">Verde</option>
                            <option <? if ($row['colore'] == 'blue') echo "selected" ?> value="blue">Blu</option>
                            <option <? if ($row['colore'] == 'purple') echo "selected" ?> value="purple">Viola</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="locandine">Locandine:</label>
                            <input class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none" name="locandine[]" type="file" multiple="multiple">
                        </div>
                        <div>
                            <label class="mb-2 text-sm font-medium text-gray-900" for="sinossi">Sinossi:</label>
                            <textarea name="sinossi" id="sinossi" value="<? echo $row['sinossi'] ?>" class="h-1/3 w-full px-2  text-base text-gray-900 border border-gray-300 rounded-lg cursor-text bg-gray-50  focus:outline-blue-500"><? echo $row['sinossi'] ?></textarea>
                        </div>
                        <div class="flex gap-3">
                            <div>
                                <label for="uscita" class="font-semibold text-sm text-gray-600 pb-1 block">Data di uscita</label>
                                <input value="<? echo $row['uscita'] ?>" type="date" name="uscita" id="uscita" class="bg-gray-50 disabled:bg-gray-200 border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                            </div>
                            <div>
                                <label for="stagioni" class="font-semibold text-sm text-gray-600 pb-1 block">Stagioni</label>
                                <input disabled value="<? echo $row['n_stagioni'] ?>" type="number" name="stagioni" id="stagioni" class="bg-gray-50 disabled:bg-gray-200 border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                            </div>
                            <div>
                                <label for="inizio" class="font-semibold text-sm text-gray-600 pb-1 block">Uscita prima stagione</label>
                                <input disabled value="<? echo $row['inizio'] ?>" type="number" min="1900" max="2023" step="1" name="inizio" id="inizio" class="bg-gray-50 disabled:bg-gray-200 border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                            </div>
                            <div>
                                <label for="fine" class="font-semibold text-sm text-gray-600 pb-1 block">Uscita ultima stagione</label>
                                <input disabled value="<? echo $row['fine'] ?>" type="number" min="0000" max="2023" step="1" name="fine" id="fine" class="bg-gray-50 disabled:bg-gray-200 border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                            </div>
                        </div>
                        <div>
                            <label class="mb-2 text-sm font-medium text-gray-900" for="sinossi">Trailer:</label>
                            <textarea placeholder="es. Trailer 1:AL9zLctDJaU,Trailer 2:cbhVaQv-aNU " class="h-1/3 w-full px-2  text-base text-gray-900 border border-gray-300 rounded-lg cursor-text bg-gray-50  focus:outline-blue-500" id="trailers" name="trailers"></textarea>
                        </div>
                        <button type="submit" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Aggiorna scheda</button>
                    </div>
                </form>
                <form id="inserisciruolo" action="./db/insert_role.php">
                    <input type="hidden" id="id_scheda" name="id_scheda" value="<? echo $id ?>" />
                    <div class="text-xl font-sans">Cast e Produzione </div>
                    <div class="flex flex-wrap gap-2">
                        <div>
                            <label for="tipo_ruolo" class="font-semibold text-sm text-gray-600 pb-1 block">Tipo</label>
                            <select name="tipo_ruolo" id="tipo_ruolo" class="h-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block ">
                                <option value="0">Attore</option>
                                <option value="1">Produzione</option>
                            </select>
                        </div>
                        <div>
                            <label for="nome" class="font-semibold text-sm text-gray-600 pb-1 block">Nome</label>
                            <input autocomplete="off" name="nome" id="nome" class="bg-gray-50 border rounded-lg px-3 py-2 mt-1 text-sm w-full" />
                            <ul id="search-result" class="hidden rounded-b-md">
                        </div>
                        <div>
                            <label for="personaggio" class="font-semibold text-sm text-gray-600 pb-1 block">Nome personaggio</label>
                            <input autocomplete="off" name="personaggio" id="personaggio" class="disabled:bg-gray-200 bg-gray-50 border rounded-lg px-3 py-2 mt-1 text-sm w-full" />
                        </div>
                        <div>
                            <label for="ruolo" class="font-semibold text-sm text-gray-600 pb-1 block">Ruolo</label>
                            <input type="text" name="ruolo" id="ruolo" class="bg-gray-50 border rounded-lg px-3 py-2 mt-1 text-sm w-full" />
                        </div>
                        <div>
                            <label for="ordine" class="font-semibold text-sm text-gray-600 pb-1 block">Ordine</label>
                            <input type="number" name="ordine" id="ordine" class="bg-gray-50 border rounded-lg px-3 py-2 mt-1 text-sm w-1/2" />
                        </div>
                        <button type="submit" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Aggiungi</button>

                    </div>
                </form>

            </div>
        </body>

        <script>
            var select = document.getElementById("tipo");
            var selectedValue = select.options[select.selectedIndex].value;
            console.log(selectedValue)
            if (selectedValue == 0) {
                document.getElementById('stagioni').setAttribute('disabled', '')
                document.getElementById('inizio').setAttribute('disabled', '')
                document.getElementById('fine').setAttribute('disabled', '')
                document.getElementById('uscita').removeAttribute("disabled");
            } else {
                document.getElementById('stagioni').removeAttribute("disabled");
                document.getElementById('inizio').removeAttribute("disabled");
                document.getElementById('fine').removeAttribute("disabled");
                document.getElementById('uscita').setAttribute('disabled', '');
            }




            document.getElementById('tipo_ruolo').onchange = function() {
                if (document.getElementById('personaggio').hasAttribute("disabled")) {
                    document.getElementById('personaggio').removeAttribute("disabled");
                } else {
                    document.getElementById('personaggio').setAttribute('disabled', '')
                }
            };

            document.getElementById('tipo').onchange = function() {
                if (document.getElementById('stagioni').hasAttribute("disabled")) {
                    document.getElementById('stagioni').removeAttribute("disabled");
                    document.getElementById('inizio').removeAttribute("disabled");
                    document.getElementById('fine').removeAttribute("disabled");
                    document.getElementById('uscita').setAttribute('disabled', '');
                } else {
                    document.getElementById('stagioni').setAttribute('disabled', '')
                    document.getElementById('inizio').setAttribute('disabled', '')
                    document.getElementById('fine').setAttribute('disabled', '')
                    document.getElementById('uscita').removeAttribute("disabled");
                }
            };

            //AUTOCOMPLETE CAST E STAFF
            $(document).ready(function() {
                $("#nome").on("keyup", function() {
                    var search = $(this).val();
                    if (search !== "") {
                        $.ajax({
                            url: "./db/search_actor.php",
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
                    $('#nome').val($(this).text());
                    $('#search-result').fadeOut("fast");
                });
            });


            //AJAX PER SUBMITTARE IL FORM DEI RUOLI
            $(document).ready(function() {
                $('#inserisciruolo').submit(function(event) {
                    event.preventDefault(); // previene l'invio del form

                    // recupera i dati dal form
                    var formData = new FormData(this);

                    // invia i dati tramite ajax
                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: formData,
                        processData: false,
                        contentType: false,

                        success: function(response) {
                            console.log(response);
                            if (response === "inserirepersona") {
                                // aggiungi un nuovo campo al form
                                $('#inserisciruolo').append('<div id="foto"><label for="foto">Foto persona:</label><input type="file" name="foto"></div>');
                            } else {
                                // rimuovi il nuovo campo dal form (se presente)
                                $('#inserisciruolo').find('div#foto').remove();
                                // svuota tutti gli input del form
                                $('#inserisciruolo').find('input').val('');
                                $('#inserisciruolo').find('input#id_scheda').val('<? echo $id ?>');

                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });
            });
        </script>





<? }
} ?>