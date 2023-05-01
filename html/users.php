<?php
session_start();
if ($_SESSION['tipo'] == 2) {
    include("./db/fetch_users.php");
?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Progetto Basi</title>
        <link href="./output.css" rel="stylesheet">
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
            <div class="relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Username
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nome e Cognome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ruolo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Cambia ruolo</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Banna</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users as $user) { ?>
                            <tr class="bg-white border-b hover:bg-gray-50 <? if ($user['tipo'] == 0) {
                                                                                echo "utente";
                                                                            } elseif ($user['tipo'] == 1) {
                                                                                echo "moderatore";
                                                                            } else {
                                                                                echo "admin";
                                                                            } ?>">
                                <th onclick="location.href='./profile.php?usr=<?echo $user['username'];?>';" scope="row" class="cursor-pointer px-6 py-4 text-gray-900 ">
                                    <? echo $user['username'] ?>
                                </th>
                                <td class="px-6 py-4 font-medium  whitespace-nowrap">
                                    <? echo $user['email'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <? echo $user['nome'] . " " . $user['cognome']; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?if($user['ban'] == 1){
                                        echo "Bannato"; 
                                    }elseif ($user['tipo'] == 0) {
                                        echo "Utente";
                                    } elseif ($user['tipo'] == 1) {
                                        echo "Moderatore";
                                    } elseif ($user['tipo'] == 2) {
                                        echo "Admin";
                                    } ?>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form action="" method="post">
                                        <input type="hidden" id="id" name="id" value="<? echo $request['id_scheda'] ?>" />
                                        <a onclick="changeRole('<?echo $user['username']?>')" class="font-medium text-blue-600 cursor-pointer hover:underline">Cambia ruolo</a>
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    <?if($user['ban'] == 0){?>
                                    <button onclick="banUser('<?echo $user['username']?>')" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                                        Banna
                                    </button>
                                    <?}else{?>
                                        <form action="./db/unban_user.php" method="post">
                                        <input type="hidden" id="username" name="username" value="<?echo $user['username']?>" />
                                        <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center" type="sumbit">
                                        Sbanna
                                    </button>
                                    </form>
                                    <?}?>
                                </td>
                            </tr>
                        <? }
                        ?>
                    </tbody>

                </table>
            </div>


        </div>
        <!--MODAL BANNA UTENTE-->
        <div id="banna-utente-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="relative bg-white w-full max-w-md mx-auto rounded-xl shadow-2xl">
                    <div class="px-6 py-4">
                        <div class="flex items-start">
                            <div class="ml-3">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Sei sicuro di voler bannare questo utente?</h3>
                            </div>
                        </div>
                    </div>
                    <form id="banna-utente-form" action="./db/ban_user.php" method="post">
                        <div class="px-6 py-4 flex justify-end">
                            <button type="submit" id="banna-utente-modal-confirm" class="bg-red-500 text-white py-2 px-4 rounded mr-2">Conferma</button>
                            <button type="button" id="banna-utente-modal-cancel" class="bg-gray-500 text-white py-2 px-4 rounded">Annulla</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--MODAL CAMBIA RUOLO-->
        <div id="cambia-ruolo-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="relative bg-white w-full max-w-md mx-auto rounded-xl shadow-2xl">
                    <div class="px-6 py-4">
                        <div class="flex items-start">
                            <div class="ml-3">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Che ruolo vuoi assegnare?</h3>
                            </div>
                        </div>
                    </div>
                    <form id="cambia-ruolo-form" action="./db/change_role.php" method="post">
                        <div class="px-6 py-4 flex justify-end">
                            <button type="submit" name="ruolo" id="ruolo" value="admin" class="bg-red-500 text-white py-2 px-4 rounded mr-2">Admin</button>
                            <button type="submit" name="ruolo" id="ruolo" value="moderator" class="bg-red-500 text-white py-2 px-4 rounded mr-2">Moderatore</button>
                            <button type="submit" name="ruolo" id="ruolo" value="user" class="bg-red-500 text-white py-2 px-4 rounded mr-2">Utente</button>
                            <button id="cambia-ruolo-modal-cancel" class="bg-gray-500 text-white py-2 px-4 rounded">Annulla</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        function banUser(username) {
            // Mostra il modale
            const banUserModal = document.getElementById('banna-utente-modal');
            banUserModal.classList.remove('hidden');

            const banUserForm = document.getElementById('banna-utente-form');
            // Crea un nuovo elemento input di tipo "hidden"
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'username');
            hiddenInput.setAttribute('value', username);

            banUserForm.appendChild(hiddenInput);

            const cancelButton = document.getElementById('banna-utente-modal-cancel');
            cancelButton.addEventListener('click', cancelBan);
        };
        //funzione per disattivare il modale se si preme annulla
        function cancelBan() {
            const banUserModal = document.getElementById('banna-utente-modal');
            banUserModal.classList.add('hidden');
        }

        function changeRole(username) {
            // Mostra il modale
            const changeRoleModal = document.getElementById('cambia-ruolo-modal');
            changeRoleModal.classList.remove('hidden');

            const changeRoleForm = document.getElementById('cambia-ruolo-form');
            // Crea un nuovo elemento input di tipo "hidden"
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'username');
            hiddenInput.setAttribute('value', username);

            changeRoleForm.appendChild(hiddenInput);

            const cancelButton = document.getElementById('cambia-ruolo-modal-cancel');
            cancelButton.addEventListener('click', cancelChangeRole);
        };
        //funzione per disattivare il modale se si preme annulla
        function cancelChangeRole() {
            const changeRoleModal = document.getElementById('cambia-ruolo-modal');
            changeRoleModal.classList.add('hidden');
        }
    </script>

<? } ?>