<?php
   session_start();
   //Se l'utente è loggato lo reindirizza direttamente alla dashboard
   if(isset($_SESSION['username'])){
    header("location: ./dashboard.php");
}
?>
<head>
    <title>MovieConnect</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background: #edf2f7;">
   <!-- NAVBAR --> 
   <header>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
       <div class=" overscroll-none fixed top-0 w-screen flex flex-row items-center p-1 justify-between bg-white shadow-xl">
          <div class="ml-8 text-lg text-gray-700 hidden md:flex">MovieConnect</div>
             
             <div class="flex flex-row-reverse mr-4 ml-4 md:hidden">
                <i class="fas fa-bars"></i>
             </div >
             <div class="flex mr-8 md:flex">
                <button type="button" onclick="location.href='./login.html'" class="bg-transparent text-gray-800  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">Accedi</button>
             </div>
       </div>
  </header>
   <!-- NAVBAR --> 
    <section>
        <div class="max-w-screen-xl mt-40 px-4 pt-16 mx-auto">
            <div class="text-center">
                <h1 class="text-black mb-4 text-6xl font-extrabold leading-none  ">MovieConnect </h1>
                <p class="font-light text-lg text-gray-600">Scopri il mondo del cinema e delle serie TV con noi.</p>
                <p class="mb-6 text-lg font-light text-gray-500">Connettiti con altri appassionati e condividi le tue opinioni sui tuoi film e programmi preferiti!</p>
                <a href="./register.html" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 ">
                    Registrati
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>              
        </div>
    </section>

    
<div class="mt-60 text-center text-gray-400">Realizzato da manuelFabiano</div>


</body>
