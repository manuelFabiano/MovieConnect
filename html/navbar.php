<head>
   <title>MovieConnect</title>
   <script src="https://cdn.tailwindcss.com"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<?php 
//Codice da eseguire se l'utente è loggato
if(isset($_SESSION['username'])){ ?>
   <header id="navbar">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
         <div class=" z-40 overscroll-none fixed top-0 w-screen flex flex-row items-center p-1 justify-between bg-white shadow-xl">
            <div class="hover:animate-pulse cursor-pointer ml-8 text-lg text-gray-700 hidden md:flex" onclick="location.href='./dashboard.php'">MovieConnect</div>
               <div class="flex flex-row-reverse mr-4 ml-4 md:hidden">
                  <i class="fas fa-bars"></i>
               </div >
               <div class="flex mr-8 md:flex">
                  <?if($_SESSION['tipo'] > 0){//Se l'utente è un admin può accedere al pannello dello staff?>
                     <button type="button" onclick="location.href='./staff.php'" class="bg-red-600 text-white mr-2 p-2 rounded  hover:bg-red-500 hover:text-gray-100">Pannello staff</button><?}?>
                  <button type="button" onclick="location.href='./write_review.php'" class="bg-blue-600 text-white  p-2 rounded  hover:bg-blue-500 hover:text-gray-100">Scrivi recensione</button>
                  <button type="button" onclick="location.href='./watchlist.php'" class="bg-blue-600 text-white  p-2 rounded ml-2 hover:bg-blue-500 hover:text-gray-100">Watchlist</button>
                  <button type="button" onclick="location.href='./profile.php?usr=<?echo $_SESSION['username']?>'" class="bg-blue-600 text-white mx-2 p-2 rounded  hover:bg-blue-500 hover:text-gray-100">Profilo</button>
                  <button type="button" onclick="location.href='./db/logout.php'" class="bg-white text-black  p-2 ml-5 rounded  hover:bg-gray-500 hover:text-gray-100">Esci</button>
               </div>
         </div>
   </header>


<?php
}
?>