<?php
//In questa pagina, accessibile solo agli admin e i moderatori, vengono visualizzate tutte le richieste di
//inserimento submittate dagli utenti.
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>
             alert('Devi essere loggato!');
             window.location.href = './login.html';    
          </script>";
 }
if ($_SESSION['tipo'] > 0) {
    //fetch_requests preleva dal db tutte le richieste submittate dagli utenti.
    include("./db/fetch_requests.php");
?>

    <head>
        <title>MovieConnect</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="h-screen overflow-hidden flex flex-col items-center justify-center" style="background: #edf2f7;">
        <button type="button" onclick="location.href='./dashboard.php'" class="self-start transition duration-200 ml-36 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-gray-500 hover:bg-gray-200 ring-inset">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block align-text-top">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span class="inline-block ml-1">Torna alla homepage</span>
        </button>
        <div class="bg-white w-4/5 h-4/5 overflow-y-scroll rounded-2xl shadow-2xl p-7">
            <!--FILTRI-->
            <div class="w-full flex ">
                <button id="bottoneattesa" class="rounded-t-xl w-full border-gray-300 p-4 shadow-2xl hover:bg-gray-200 ">In attesa</button>
                <button id="bottoneaccettate" class="rounded-t-xl w-full border-gray-300 p-4 shadow-2xl hover:bg-gray-200 ">Accettate</button>
                <button id="bottonerifiutate" class="rounded-t-xl w-full border-gray-300 p-4 shadow-2xl hover:bg-gray-200 ">Rifiutate</button>
            </div>
            <!--FILTRI-->

            <div class="relative overflow-y-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Titolo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Utente
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Data e Ora
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stato
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">rifiuta</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($requests as $request) {
                            $request['data_ora'] = explode(" ",$request['data_ora']);
                            $request['data'] = date("d/m/Y", strtotime($request['data_ora'][0]));
                            $request['ora'] = $request['data_ora'][1];
                        ?>
                            <tr class="bg-white border-b hover:bg-gray-50 <? if (is_null($request['risposta'])) {
                                                                                echo "attesa";
                                                                            } elseif ($request['risposta'] == 1) {
                                                                                echo "accettata";
                                                                            } else {
                                                                                echo "rifiutata";
                                                                            } ?>">
                                <th scope="row" class="px-6 py-4  ">
                                    <? echo $request['id_scheda'] ?>
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <? echo $request['titolo'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <? if (!is_null($request['tipo'])) {
                                        if ($request['tipo'] == 1)
                                            echo "Serie TV";
                                        else echo "Film";
                                    } else {
                                        echo "Da definire";
                                    } ?>
                                </td>
                                <td class="px-6 py-4">
                                    <? echo $request['username'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <? echo $request['data'] . ", " . $request['ora'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <? if (is_null($request['risposta'])) {
                                        echo "In attesa";
                                    } elseif ($request['risposta'] == 1) {
                                        echo "<div class='text-green-600'>Accettata da " . $request['moderatore'] . "</div>";
                                    } else {
                                        echo "<div class='text-red-600'>Rifiutata da " . $request['moderatore'] . "</div>";
                                    } ?>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form action="./add_film.php" method="post">
                                        <input type="hidden" id="id" name="id" value="<? echo $request['id_scheda'] ?>" />
                                        <a onclick="javascript:this.parentNode.submit();" class="font-medium text-blue-600 cursor-pointer hover:underline">Edit</a>
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    <button onclick="rejectRequest('<? echo $request['id_scheda'] ?>')" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                                        Rifiuta
                                    </button>
                                </td>
                            </tr>
                        <? }
                        ?>
                    </tbody>

                </table>
            </div>


        </div>
        <!--MODAL RIFUTA RICHIESTA, Questa parte viene visualizzata quando si preme sul pulsante "Rifiuta"-->
        <div id="rifiuta-richiesta-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="relative bg-white w-full max-w-md mx-auto rounded-xl shadow-2xl">
                    <div class="px-6 py-4">
                        <div class="flex items-start">
                            <div class="ml-3">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Sei sicuro di voler rifiutare questa richiesta?</h3>
                            </div>
                        </div>
                    </div>
                    <form id="rifiuta-richiesta-form" action="./db/reject_request.php" method="post">
                        <div class="px-6 py-4 flex justify-end">
                            <button type="submit" id="rifiuta-richiesta-modal-confirm" class="bg-red-500 text-white py-2 px-4 rounded mr-2">Conferma</button>
                            <button type="button" id="rifiuta-richiesta-modal-cancel" class="bg-gray-500 text-white py-2 px-4 rounded">Annulla</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--MODAL RIFUTA RICHIESTA-->
    </body>
    <script src="./js/requests.js"></script>

<?php
}
?>