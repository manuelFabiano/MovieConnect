<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>
             alert('Devi essere loggato!');
             window.location.href = './login.html';    
          </script>";
 }
//Solo l'admin o il moderatore possono accedere a questa pagina
if ($_SESSION['tipo'] > 0) {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        //fetch_film.php preleva tutti i dati presenti nel db sul film con id $id
        include("./db/fetch_film.php");
?>

        <head>
            <title>MovieConnect</title>
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
                        <div class="ml-2 text-2xl font-sans">Tipo</div>
                        <select name="tipo" id="tipo" class="h-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block ">
                            <option value="0" <? if ($row['tipo'] == 0) echo "selected" ?>>Film</option>
                            <option value="1" <? if ($row['tipo'] == 1) echo "selected" ?>>Serie</option>
                        </select>
                        <div class="ml-2 text-2xl font-sans">Colore</div>
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
                        <div class="flex w-full">
                            <div class="w-1/2">
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="locandine">Locandine:</label>
                                <input class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none" name="locandine[]" type="file" multiple="multiple">
                            </div>
                            <div class="flex ml-1">
                                <? foreach ($posters as $poster) { ?>
                                    <div class="flex bg-gray-50 border border-gray-300 text-sm rounded-xl p-1 mb-5 mt-6"><? echo $poster['label'] ?>
                                        <svg onclick="remove_poster(this, '<? echo $poster['label'] ?>', '<? echo $id ?>');" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="cursor-pointer w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                        <div>
                            <label class="mb-2 text-sm font-medium text-gray-900" for="sinossi">Sinossi:</label>
                            <textarea name="sinossi" id="sinossi" value="<? echo $row['sinossi'] ?>" class="h-1/3 w-full px-2  text-base text-gray-900 border border-gray-300 rounded-lg cursor-text bg-gray-50  focus:outline-blue-500"><? echo $row['sinossi'] ?></textarea>
                        </div>
                        <div class="flex gap-3 mt-1">
                            <div>
                                <label for="uscita" class="font-semibold text-sm text-gray-600 pb-1 block">Data di uscita</label>
                                <input value="<? echo $row['uscita'] ?>" type="date" name="uscita" id="uscita" class="bg-gray-50 disabled:bg-gray-200 border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                            </div>
                            <div>
                                <label for="durata" class="font-semibold text-sm text-gray-600 pb-1 block">Durata</label>
                                <input value="<? echo $row['durata'] ?>" type="text" name="durata" id="durata" class="bg-gray-50 disabled:bg-gray-200 border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
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
                        <button type="submit" class="py-2.5 px-5 mr-2  text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Aggiorna scheda</button>
                    </div>
                </form>
                <!--TRAILER-->
                <form id="inseriscitrailer" action="./db/insert_trailer.php">
                    <input type="hidden" id="id_scheda_trailer" name="id_scheda" value="<? echo $id; ?>" />
                    <div class="text-xl font-sans">Trailers </div>
                    <div class="flex gap-2">
                        <div>
                            <label for="trailerlabel" class="font-semibold text-sm text-gray-600 pb-1 block">Label</label>
                            <input required autocomplete="off" name="trailerlabel" id="trailerlabel" class="bg-gray-50 border rounded-lg px-3 py-2 mt-1 text-sm w-full" />
                        </div>
                        <div>
                            <label for="link" class="font-semibold text-sm text-gray-600 pb-1 block">Link</label>
                            <input required autocomplete="off" name="link" id="link" class="bg-gray-50 border rounded-lg px-3 py-2 mt-1 text-sm w-56" />
                        </div>
                        <button type="submit" class=" py-1 px-5 mr-2 mt-7 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Aggiungi</button>
                        <div id="listatrailer" class="flex ml-2 w-full">
                            <? foreach ($trailers as $trailer) { ?>
                                <div class="flex bg-gray-50 border border-gray-300 text-sm rounded-xl p-1 mt-8 mb-3 mr-1"><? echo $trailer['label'] ?>
                                    <svg onclick="remove_trailer(this, '<? echo $trailer['label'] ?>', '<? echo $id ?>');" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="cursor-pointer w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                </form>
                <!--TRAILER-->
                <!--RUOLI-->
                <form id="inserisciruolo" action="./db/insert_role.php">
                    <input type="hidden" id="id_scheda_ruolo" name="id_scheda" value="<? echo $id; ?>" />
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
                        <div id="formruolo">

                        </div>
                    </div>
                    <div id="listacast" class="mt-1 flex w-full  overflow-scroll">
                        <? foreach ($roles as $role) { ?>
                            <div class="flex shrink-0 bg-gray-50 border w-fit border-gray-300 text-sm rounded-xl p-1 mb-3 mr-1"><? echo $role['ordine'] . ". " . $role['persona'] ?>
                                <svg onclick="remove_role(this, '<? echo $role['persona'] ?>', '<? echo $id ?>');" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="cursor-pointer w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        <? } ?>

                    </div>
            </div>
            </form>
            <!--RUOLI-->
            </div>
        </body>
        <script type="text/javascript" src="./js/add_film.js"></script>
        <script>
            //AJAX PER SUBMITTARE IL FORM DEI RUOLI
            //Se il ruolo che si vuole aggiungere riguarda una persona non ancora nel db, servirà inserire anche una immagine
            $(document).ready(function() {
                $('#inserisciruolo').submit(function(event) {
                    event.preventDefault(); // previene l'invio del form

                    // recupera i dati dal form
                    var formData = new FormData(this);

                    var ordine = formData.get("ordine");
                    var id = formData.get("id_scheda");
                    var nome = formData.get("nome");

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
                                $('#formruolo').append('<div id="foto"><label for="foto">Foto persona:</label><input type="file" name="foto"></div>');
                            } else {
                                // rimuovi il nuovo campo dal form (se presente)
                                $('#inserisciruolo').find('div#foto').remove();
                                // svuota tutti gli input del form
                                $('#inserisciruolo').find('input').val('');
                                $('#inserisciruolo').find('input#id_scheda_ruolo').val('<? echo $id ?>');
                                // aggiungo il ruolo alla pagina html
                                $('#listacast').append('<div class="flex shrink-0 bg-gray-50 border w-fit border-gray-300 text-sm rounded-xl p-1 mb-3 mr-1">' + ordine + '. ' + nome + ' \
                                <svg onclick="remove_role(this, \'' + nome + '\', \'' + id + '\');" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="cursor-pointer w-5 h-5"> \
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /> \
                                </svg> \
                            </div>');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });
            });

            //AJAX PER SUBMITTARE IL TRAILER
            $(document).ready(function() {
                $('#inseriscitrailer').submit(function(event) {
                    event.preventDefault(); // previene l'invio del form

                    // recupera i dati dal form
                    var formData = new FormData(this);
                    var label = formData.get("trailerlabel");
                    var id = formData.get("id_scheda");

                    // invia i dati tramite ajax
                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: formData,
                        processData: false,
                        contentType: false,

                        success: function(response) {
                            console.log(response);
                            console.log("fatto")
                            // svuota tutti gli input del form
                            $('#inseriscitrailer').find('input').val('');
                            $('#inseriscitrailer').find('input#id_scheda_trailer').val('<? echo $id ?>');
                            //aggiungo il trailer nella pagina html
                            $('#listatrailer').append('<div class="flex bg-gray-50 border border-gray-300 text-sm rounded-xl p-1 mt-8 mb-3 mr-1" > ' + label + '\
                            <svg onclick="remove_trailer(this, \'' + label + '\', \'' + id + '\');" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"> \
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /> \
                            </svg> \
                        </div>');
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });
            });

            //AJAX PER RIMUOVERE UN TRAILER
            function remove_trailer(element, label, id_scheda) {

                // esegui la richiesta AJAX POST
                $.ajax({
                    type: 'POST',
                    url: './db/remove_trailer.php',
                    data: {
                        label: label,
                        id_scheda: id_scheda
                    },
                    success: function(result) {
                        console.log("fatto");
                        $(element).parent().remove();

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            //AJAX PER RIMUOVERE UN POSTER
            function remove_poster(element, label, id_scheda) {

                // esegui la richiesta AJAX POST
                $.ajax({
                    type: 'POST',
                    url: './db/remove_poster.php',
                    data: {
                        label: label,
                        id_scheda: id_scheda
                    },
                    success: function(result) {
                        console.log(label + ' rimosso');
                        $(element).parent().remove();

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }


            //AJAX PER RIMUOVERE UN RUOLO
            function remove_role(element, persona, id_scheda) {

                // esegui la richiesta AJAX POST
                $.ajax({
                    type: 'POST',
                    url: './db/remove_role.php',
                    data: {
                        persona: persona,
                        id_scheda: id_scheda
                    },
                    success: function(result) {
                        console.log(persona + ' rimosso');
                        $(element).parent().remove();

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            //Script per il tipo (Film o Serie)
            //Se film è selezionato, disabilita i form per il numero di stagioni, l'inizio e la fine, mentre se
            //serie è selezionato, disabilita il form per la data di uscita.
            var select = document.getElementById("tipo");
            var selectedValue = select.options[select.selectedIndex].value;
            if (selectedValue == 0) {
                document.getElementById('stagioni').setAttribute('disabled', '')
                document.getElementById('inizio').setAttribute('disabled', '')
                document.getElementById('fine').setAttribute('disabled', '')
                document.getElementById('uscita').removeAttribute("disabled");
                console.log("prova");
                document.getElementById('durata').removeAttribute("disabled");
            } else {
                document.getElementById('stagioni').removeAttribute("disabled");
                document.getElementById('inizio').removeAttribute("disabled");
                document.getElementById('fine').removeAttribute("disabled");
                document.getElementById('uscita').setAttribute('disabled', '');
                document.getElementById('durata').setAttribute('disabled', '');
            }
            document.getElementById('tipo').onchange = function() {
                if (document.getElementById('stagioni').hasAttribute("disabled")) {
                    document.getElementById('stagioni').removeAttribute("disabled");
                    document.getElementById('inizio').removeAttribute("disabled");
                    document.getElementById('fine').removeAttribute("disabled");
                    document.getElementById('uscita').setAttribute('disabled', '');
                    document.getElementById('durata').setAttribute('disabled', '');
                } else {
                    document.getElementById('stagioni').setAttribute('disabled', '');
                    document.getElementById('inizio').setAttribute('disabled', '');
                    document.getElementById('fine').setAttribute('disabled', '');
                    document.getElementById('uscita').removeAttribute("disabled");
                    document.getElementById('durata').removeAttribute("disabled");
                }
            };
        </script>




<? }else{ ?>
    <head>
            <title>MovieConnect</title>
            <script src="https://cdn.tailwindcss.com"></script>
</head>

    <body class="h-screen overflow-hidden flex flex-col items-center justify-center" style="background: #edf2f7;">
    <button type="button" onclick="location.href='./staff.php'" class="self-start transition duration-200 ml-72 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-gray-500 hover:bg-gray-200 ring-inset">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block align-text-top">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span class="inline-block ml-1">Torna all pannello dello staff</span>
            </button>
        <div class="bg-white w-3/5 h-30 rounded-2xl shadow-2xl p-7">
            <div class="text-3xl font-sans">Quale opera vuoi aggiungere?</div>
            <form action="./db/add_film.php" method="post">
                <div class="flex">
                    <input required autocomplete="off" name="titolo" id="titolo" class="w-full mt-4 h-10 p-2 resize-none bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block"></textarea>
                    <button type="submit" class=" bg-blue-600 shadow-lg text-white  p-2 rounded  hover:bg-blue-500 hover:text-gray-100 mt-2">Aggiungi</button>
                </div>
            </form>
        </div>
    </body>
<?} ?>

<?} ?>