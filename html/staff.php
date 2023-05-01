<?php
session_start();
if($_SESSION['tipo'] == 2){
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
<button type="button" onclick="location.href='./dashboard.php'" class="self-start mb-80 transition duration-200 ml-36 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-gray-500 hover:bg-gray-200 ring-inset">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block align-text-top">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span class="inline-block ml-1">Torna alla homepage</span>
            </button>
        <div class="justify-self-center absolute bg-white w-4/5 h-min rounded-2xl items-center flex flex-col shadow-2xl p-7">
            <div class="text-3xl font-sans mb-2 ">Pannello dell'admin</div>
            <div class="grid w-full">
            <button type="button" onclick="location.href='./users.php'" class=" px-5 py-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Gestisci utenti</button>
            <button type="button" onclick="location.href='./requests.php'" class="py-5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Richieste di inserimento</button>
            </div>  
            
        </div>
    </body>


<?php
}
?>