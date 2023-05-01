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

<?php 
if(isset($_SESSION['username'])){ ?>

   <header id="navbar">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
         <div class=" z-40 overscroll-none fixed top-0 w-screen flex flex-row items-center p-1 justify-between bg-white shadow-xl">
            <div class="cursor-pointer ml-8 text-lg text-gray-700 hidden md:flex" onclick="location.href='./dashboard.php'">MovieConnect</div>
               <div class="flex flex-row-reverse mr-4 ml-4 md:hidden">
                  <i class="fas fa-bars"></i>
               </div >
               <div class="flex mr-8 md:flex">
                  <?if($_SESSION['tipo'] == 2){?>
                     <button type="button" onclick="location.href='./staff.php'" class="bg-red-600 text-white mr-2 p-2 rounded  hover:bg-red-500 hover:text-gray-100">Pannello staff</button><?}?>
                  <button type="button" onclick="location.href='./write_review.php'" class="bg-blue-600 text-white  p-2 rounded  hover:bg-blue-500 hover:text-gray-100">Scrivi recensione</button>
                  <button type="button" onclick="location.href='./watchlist.php'" class="bg-blue-600 text-white  p-2 rounded ml-2 hover:bg-blue-500 hover:text-gray-100">Watchlist</button>
                  <button type="button" onclick="location.href='./profile.php?usr=<?echo $_SESSION['username']?>'" class="bg-blue-600 text-white mx-2 p-2 rounded  hover:bg-blue-500 hover:text-gray-100">Profilo</button>
                  <button type="button" onclick="location.href='./db/logout.php'" class="bg-white text-black  p-2 ml-5 rounded  hover:bg-gray-500 hover:text-gray-100">Esci</button>
               </div>
         </div>
   </header>


<?php
}else{ ?>

<header id="navbar">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
       <div class=" overscroll-none fixed top-0 w-screen flex flex-row items-center p-1 justify-between bg-white shadow-xl">
          <div class="cursor-pointer ml-8 text-lg text-gray-700 hidden md:flex" onclick="location.href='./dashboard.php'">MovieConnect</div>
             <span class="w-screen md:w-1/3 h-10 bg-gray-200 cursor-pointer border border-gray-300 text-sm rounded-full flex">
                <input type="search" name="serch" placeholder="Cerca" class="flex-grow px-4 rounded-l-full rounded-r-full text-sm focus:outline-none">
                <i class="fas fa-search m-3 mr-5 text-lg text-gray-700 w-4 h-4">
                </i>
             </span>
             <div class="flex flex-row-reverse mr-4 ml-4 md:hidden">
                <i class="fas fa-bars"></i>
             </div >
             <div class="flex mr-8 md:flex">
                <button type="button" onclick="location.href='./login.html'" class="bg-transparent text-gray-800  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">Accedi</button>
                <button type="button" onclick="location.href='./register.html'" class="bg-blue-600 text-white  p-2 rounded  hover:bg-blue-500 hover:text-gray-100">Registrati</button>
             
             </div>
       </div>
  </header>

<?php }
?>