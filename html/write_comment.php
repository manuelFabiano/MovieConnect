<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>
             alert('Devi essere loggato!');
             window.location.href = './login.html';    
          </script>";
 }
if (isset($_POST['id_recensione'])) { ?>
    <head>
        <title>MovieConnect</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
        <div class="bg-white w-4/5 h-fit rounded-2xl shadow-2xl p-7">
            <div class="text-3xl font-sans">Commenta la recensione di <? echo $_POST['username']; ?></div>
            <form action="./db/post_comment.php" method="post">
                <input type="hidden" id="id_recensione" name="id_recensione" value="<? echo $_POST['id_recensione'] ?>" />
                <input type="hidden" id="id_scheda" name="id_scheda" value="<? echo $_POST['id_scheda'] ?>" />
                <input type="hidden" id="username" name="username" value="<? echo $_POST['username'] ?>" />
                <?if($_POST['redirect'] == 'profile'){echo '<input type="hidden" id="redirect" name="redirect" value="'.$_POST['redirect'].'" />'; }?>
                <textarea required name="contenuto" id="contenuto" placeholder="Scrivi qui il tuo commento..." class="w-full mt-4 h-2/6 p-8 resize-none bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block"></textarea>
                <div class="flex flex-row-reverse">
                    <button type="submit" class=" bg-blue-600 shadow-lg text-white  p-2 rounded  hover:bg-blue-500 hover:text-gray-100 mt-2">Pubblica</button>
                </div>
            </form>
        </div>
    </body>
<?}?>