<!DOCTYPE html>
<html lang="en" class="">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Progetto db</title>
   <link href="./output.css" rel="stylesheet">
   <script src="https://cdn.tailwindcss.com"></script>

   <style>
      .w-custom {
         width: 45rem;
      }
   </style>

</head>

<body class="bg-blue-500">
   <!-- NAVBAR -->
   <?php
   include("./navbar.html");
   ?>
   <!-- NAVBAR -->
   <div class="py-6 flex flex-col justify-center">
      <div class="py-3 ">
         <div class="bg-white mt-5 shadow-lg mx-2 rounded-lg border-gray-100 border p-8 flex space-x-8">
            <div class="h-48 overflow-visible w-72">
               <img class="rounded-3xl shadow-2xl"
                  src="https://www.themoviedb.org/t/p/w1280/5VvepiOtW4aJYRnGfPP7IyA58lv.jpg" alt="">
            </div>
            <div class="flex flex-col w-3/4 space-y-4">
               <div class="flex justify-between items-start">
                  <h2 class="text-3xl font-bold">Harry Potter e la pietra filosofale</h2>
                  <div
                     class="bg-green-500 text-white font-bold rounded-xl p-4 hover:bg-white hover:bg-white hover:text-green-500">
                     10</div>
               </div>
               <div class="flex space-x-8">
                  <div>
                     <div class="text-sm text-center text-gray-400"> Film</div>
                     <div class="text-lg text-center text-gray-800">2001</div>
                  </div>
                  <div>
                     <div class="text-sm text-center text-gray-400">Regia</div>
                     <div class="text-lg text-center text-gray-800">Chris Columbus</div>
                  </div>
                  <div class="max-w-md">
                     <div class="text-sm text-center text-gray-400">Cast</div>
                     <div class="text-lg text-center text-gray-800  ">Daniel Radcliffe, Rupert Grint, Emma Watson,
                        Richard Harris, Alan Rickman</div>
                  </div>
                  <div class="max-w-md">
                     <div class="text-sm text-center text-gray-400">Trailer</div>
                     <a class="text-lg text-center text-gray-800" href="https://www.youtube.com/watch?v=rQLfqdLZ49A"
                        target="_blank">Link1</a>
                  </div>
               </div>
               <div>
                  <div class="text-gray-400 text-lg leading-tight">Descrizione:</div>
                  <div class=" text-gray-800 text-justify text-sm overflow-y-hidden">Harry Potter vive con gli zii e il
                     cuginetto sin
                     dalla più tenera età dopo la morte dei suoi genitori. I parenti non lo amano per nulla. Harry sta
                     ormai per compiere undici anni e viene guardato male anche per alcune sue capacità 'magiche'. Che
                     sono effettive perché Harry è figlio di maghi e comincia a ricevere lettere, regolarmente
                     sequestrate, portate da gufi. Dovrà giungere il gigantesco Hagrid a recapitargliene personalmente
                     una perché possa apprendere di essere stato ammesso a frequentare la Scuola di Magia e Stregoneria
                     di Hogwarts. Gli zii a questo punto non possono far più nulla e Harry raggiunge la Scuola dove
                     apprende che il suo nome è già noto e dove scoprirà di avere naturali doti magiche.</div>
               </div>
               <div>
                  <button
                     class=" bg-blue-600 shadow-lg text-white  p-2 rounded  hover:bg-blue-500 hover:text-gray-100">Scrivi
                     una recensione </button>
               </div>


            </div>

         </div>
         <div class="grid place-items-center">

            <ul class="my-2 space-y-4">
               <li class="bg-white border border-gray-100 w-custom p-4 rounded-lg shadow-lg">
                  <div class="flex justify-between items-start">
                     <div class="flex">
                        <div class="text-gray-600 py-3 text-lg">Recensione di</div>
                        <div class="text-blue-500 ml-1 py-3 text-lg">Manuel36</div>
                     </div>
                     <div
                        class="bg-green-500 text-white font-bold rounded-xl p-3 hover:bg-white hover:bg-white hover:text-green-500">
                        10</div>
                  </div>
                  <div class="overflow-y-auto max-h-40 text-justify">Non ho la pretesa di essere un critico
                     cinematografico, ma voglio esprimere tutta la mia approvazione per un film che mi fa tornare
                     bambino,
                     o meglio, che mi fa desiderare di tornare ad essere bambino. Se posso direi un film "innocente",
                     che a
                     mio parere non ha nessuna pretesa di ordine morale. Vuole essere un divertimento e una delizia per
                     gli
                     occhi dei più piccini e non, una bella favola di fantasia, non di tecnologia, come ho visto scritto
                     da
                     qualcuno. Ma è questo che molte persone non capiscono. Harry Potter è una bella fiaba, che ti
                     trasporta in un mondo dove tutto è magico, dove puoi volare con l'immaginazione, e tutto questo
                     senza
                     niente togliere ad altre splendide storie come lo sono quelle di Tim Burton o del Signore degli
                     Anelli. Non penso si possano paragonare film che trattano di storie completamente diverse! Ognuno
                     ha
                     la sua particolarità e bellezza e va rispettato. Non penso poi che questo film riesca ad annoiare
                     bambini, e ancor più i libri. A nessun fanciullo peserà il fatto che si parli di scuola e
                     professori,
                     perchè questa è una scuola magica, una scuola che tutti vorrebbero frequentare, la scuola in cui ti
                     può accadere di tutto e puoi vivere le più mirabolanti avventure, puoi assistere a fatti
                     meravigliosi
                     e a lezioni tutt'altro che tediose! Chi da bambino non avrebbe preferito studiare come preparare
                     strani intrugli o fare incantesimi piuttosto che tabelline e regole di grammatica? Nel complesso il
                     film penso sia ben riuscito, anche se il doppiaggio italiano, c'è da ammetterlo è pessimo.
                     Nonostante
                     non sia un capolavoro comunque onore al merito per chi ha voluto trasportare su pellicola una delle
                     storie di fantasia più belle degli ultimi tempi! Perdonatemi un'ultima cosa. Mi è molto dispiaciuto
                     leggere recensioni contenenti parole di pessimo gusto. Indipendentemente se a favore o contro la
                     buona
                     riuscita del film ritengo siano da condannare in entrambe i casi.</div>
               </li>
               <li class="bg-white border border-gray-100 w-custom p-4 rounded-lg shadow-lg">
                  <div class="flex justify-between items-start">
                     <div class="flex">
                        <div class="text-gray-600 py-3 text-lg">Recensione di</div>
                        <div class="text-blue-500 ml-1 py-3 text-lg">MarioneRossi</div>
                     </div>
                     <div
                        class="bg-red-500 text-white font-bold rounded-xl p-3 hover:bg-white hover:bg-white hover:text-red-500">
                        5</div>
                  </div>
                  <div class="overflow-y-auto max-h-40 text-justify">Non mi è piaciuto per niente questo film.</div>
               </li>
               <li class="bg-white border border-gray-100 w-custom p-4 rounded-lg shadow-lg">
                  <div class="flex justify-between items-start">
                     <div class="flex">
                        <div class="text-gray-600 py-3 text-lg">Recensione di</div>
                        <div class="text-blue-500 ml-1 py-3 text-lg">Ciccio89</div>
                     </div>
                     <div
                        class="bg-green-500 text-white font-bold rounded-xl p-3 hover:bg-white hover:bg-white hover:text-green-500">
                        8</div>
                  </div>
                  <div class="overflow-y-auto max-h-40 text-justify">Bel film, mi è piaciuto soprattutto per gli effetti speciali che per l'epoca non erano veramente male, anzi il film è invecchiato molto bene, però il trailer che è stato inserito fa proprio pena.</div>
               </li>
                        
            </ul>
         </div>
      </div>



   </div>
</body>