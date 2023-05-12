<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>
             alert('Devi essere loggato!');
             window.location.href = './login.html';    
          </script>";
 }
if (isset($_GET['id'])) { 
    include("./db/fetch_comment.php");?>
    <head>
        <title>MovieConnect</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
        <div class="bg-white w-4/5 h-fit rounded-2xl shadow-2xl p-7">
            <div class="text-3xl font-sans">Modifica il commento  alla recensione di <? echo $commento['username']; ?></div>
            <form action="./db/update_comment.php" method="post">
                <input type="hidden" id="id" name="id" value="<? echo $_GET['id'] ?>" />
                <input type="hidden" id="id_scheda" name="id_scheda" value="<? echo $commento['id_scheda'] ?>" />
                <textarea required name="contenuto" id="contenuto" placeholder="Scrivi qui il tuo commento..." class="w-full mt-4 h-2/6 p-8 resize-none bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block"><?echo $commento['contenuto'];?></textarea>
                <div class="flex flex-row-reverse">
                    <button type="submit" class=" bg-blue-600 shadow-lg text-white  p-2 rounded  hover:bg-blue-500 hover:text-gray-100 mt-2">Pubblica</button>
                </div>
            </form>
        </div>
    </body>
<?}?>