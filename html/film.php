<?php
session_start();
if (!isset($_SESSION['username'])) {
   echo "<script>
            alert('Devi essere loggato!');
            window.location.href = './login.html';    
         </script>";
}
include("./db/check_request.php");
if ($access == 0) {
   echo "<script>
            window.location.href = './dashboard.php';    
         </script>";
}
include("./navbar.php");
include("./db/fetch_data.php");
include("./db/fetch_chart_data.php");
$colore = $row['colore'];
//TO-DO: Creare le funzioni per visualizzare tags, cast e recensioni 
?>
<html>

<head>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   <style>
      .scrollbar-hide::-webkit-scrollbar {
         display: none;
      }

      .w-custom {
         width: 45rem;
      }

      .w-trailer-custom {
         width: 27rem;
      }

      .h-custom {
         height: 30rem;
      }

      .min-w-36 {
         min-width: 9rem;
      }
   </style>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />

</head>

<body style="background: #edf2f7;">
   <!-- The Modal -->
   <div id="modal" class="hidden fixed top-0 left-0 z-50 w-screen h-screen bg-black/70 flex justify-center items-center">

      <!-- The close button -->
      <a class="fixed z-90 top-6 right-8 text-white text-5xl font-bold" href="javascript:void(0)" onclick="closeModal()">&times;</a>

      <!-- A big image will be displayed here -->
      <img id="modal-img" class="max-w-[800px] max-h-[600px] object-cover" />
   </div>
   <div class="py-6 flex flex-col justify-center">
      <div class="py-3 ">
         <div class=" bg-gradient-to-r from-<? echo $colore ?>-900 to-<? echo $colore ?>-500 mt-5 w-full h-custom shadow-lg rounded-lg border-gray-100 border p-8 ">
            <div class="flex space-x-8 w-full">
               <!--POSTERS-->
               <? if ($posters->num_rows > 1) { ?>
                  <div id="" class="h-48 overflow-visible w-1/4">
                     <div id="custom-controls-gallery" class="relative w-full" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                           <? foreach ($posters as $poster) { ?>
                              <div class="hidden duration-200 ease-linear" data-carousel-item>
                                 <img src='./poster/<?php echo $poster['percorso_immagine']; ?>' class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="" onclick="showModal('./poster/<?php echo $poster['percorso_immagine']; ?>')">
                              </div>
                           <? } ?>
                        </div>
                        <div class="flex justify-center items-center pt-4">
                           <button type="button" class="flex justify-center items-center mr-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                              <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                 <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                 </svg>
                                 <span class="sr-only">Previous</span>
                              </span>
                           </button>
                           <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                              <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                 <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                 </svg>
                                 <span class="sr-only">Next</span>
                              </span>
                           </button>
                        </div>
                     </div>

                  </div>
               <? } else { ?>
                  <div id="" class="h-48 overflow-visible w-1/4">
                     <? $posters = $posters->fetch_array(MYSQLI_ASSOC) ?>
                     <img class="rounded-3xl shadow-2xl cursor-pointer" src='./poster/<?php echo $posters['percorso_immagine']; ?>' alt="" onclick="showModal('./poster/<?php echo $posters['percorso_immagine']; ?>')">
                  </div>
               <? } ?>
               <!--POSTERS-->
               <div class="flex flex-col w-full max-w-fit">
                  <div class="flex justify-between items-start">
                     <h2 class="text-4xl font-bold text-white"><?php echo $row['titolo'] ?></h2>
                     <div data-popover-target="chart" data-popover-placement="left" class="bg-green-500 text-white font-bold rounded-full p-4 hover:bg-opacity-0 hover:font-extrabold hover:text-green-500"><? echo $row['media'] + 0; ?></div>
                     <div data-popover id="chart" role="tooltip" class="absolute z-10 invisible inline-block w-max text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
                        <canvas id="myChart"></canvas>
                        <div data-popper-arrow></div>
                     </div>
                  </div>
                  <div class="flex space-x-1 mb-10">
                     <div class="text-white font-medium text-lg"><? if ($row['tipo'] == 0) {
                                                                     echo "Film - ";
                                                                  } else echo "Serie TV - "; ?></div>
                     <div class="text-white font-medium text-lg">
                        <?php
                        if ($row['tipo'] == 0) {
                           $row['uscita'] = date("d/m/Y", strtotime($row['uscita']));
                           echo $row['uscita'];
                        } else {
                           echo $row['n_stagioni'] . " stagioni - " . $row['inizio'] . "/" . $row['fine'];
                        }
                        ?>
                     </div>

                  </div>
                  <div class="flex gap-3">
                     <div class="basis-4/5">
                        <div class="text-white font-bold text-lg leading-tight">Descrizione</div>
                        <div class=" text-white text-justify text-sm overflow-y-scroll"><?php echo $row['sinossi'] ?> </div>
                     </div>
                     <div class="h-20 basis-1/5">
                        <div class="flex">
                           <div class="text-white font-bold text-lg leading-tight">Tags</div>
                           <svg fill="none" stroke="white" stroke-width="1.5" viewBox="0 10 170 2" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"></path>
                              <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z"></path>
                           </svg>
                        </div>
                        <div class="mt-1 flex flex-wrap gap-2">
                           <?php
                           foreach ($tags as $tag) {
                              if($tag['label'] != ""){
                              echo '<div onclick="location.href = \'./search_result.php?search_tag=' . $tag['label'] . '\';" class="bg-white cursor-pointer rounded-lg w-fit p-1">
                              <div class="text-black text-xs">' . $tag['label'] . '</div>
                           </div>';
                              }
                           }
                           ?>
                        </div>
                     </div>
                  </div>
                  <div class="flex gap-3">
                     <div>
                        <?php
                        $i = false;
                        foreach ($reviews as $review) {
                           if ($review['username'] == $_SESSION['username']) {
                              $i = true;
                           }
                        }

                        if ($i == true) {
                           echo '<form action="/modify_review.php" method="get">
                  <button button data-popover-target="popover" data-popover-placement="right" name="id" value="' . $id . '" class=" bg-'.$colore.'-600 shadow-lg text-white  p-2 rounded  hover:bg-'.$colore.'-500 hover:text-gray-100">Modifica la tua recensione </button>
                  <div data-popover id="popover" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
                     <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg">
                        <h3 class="font-semibold text-gray-900">Vuoi cambiare qualcosa?</h3>
                     </div>
                     <div class="px-3 py-2">
                        <p>Se hai notato un errore nella tua recensione o vuoi aggiungere qualcosa, puoi sempre farlo! </p>
                     </div>
                     <div data-popper-arrow></div>
                  </div>
               </form>
               <form action="./db/cancel_review.php" method="post">
               <input type="hidden" id="id" name="id" value="' . $row['id'] . '" />
               <input type="hidden" id="username" name="username" value="' . $_SESSION['username'] . '" />
               <button type="submit" class=" bg-'.$colore.'-600 shadow-lg text-white  p-2 rounded  hover:bg-'.$colore.'-600 hover:text-gray-100">Cancella la tua recensione</button>
               </form>
               ';
                        } else {
                           echo
                           '<form action="/write_review.php" method="get">
                        <button button data-popover-target="popover" data-popover-placement="right" name="id" value="' . $id . '" class=" bg-'.$colore.'-600 shadow-lg text-white  p-2 rounded  hover:bg-'.$colore.'-500 hover:text-gray-100">Scrivi
                           una recensione </button>
                        <div data-popover id="popover" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
                           <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg">
                              <h3 class="font-semibold text-gray-900">Dicci la tua!</h3>
                           </div>
                           <div class="px-3 py-2">
                              <p>Se lo hai già guardato, fai sapere a tutti cosa ne pensi di questo film!</p>
                           </div>
                           <div data-popper-arrow></div>
                        </div>
                     </form>';
                        } ?>
                     </div>
                     <? if ($_SESSION['tipo'] > 0) {
                        echo
                        '<form action="./add_film.php" method="post">
                     <input type="hidden" id="id" name="id" value="' . $row['id'] . '" />
                     <button type="submit" class=" bg-'.$colore.'-600 shadow-lg text-white  p-2 rounded  hover:bg-'.$colore.'-600 hover:text-gray-100">Modifica scheda</button>
                  </form>';
                     }
                     ?>
                     <? if ($seen == 2) {
                        echo
                        '<form action="./db/add_watchlist.php" method="post">
                     <input type="hidden" id="id" name="id" value="' . $row['id'] . '" />
                     <button type="submit" class=" bg-'.$colore.'-600 shadow-lg text-white  p-2 rounded  hover:bg-'.$colore.'-600 hover:text-gray-100">Aggiungi alla watchlist</button>
                  </form>';
                     }elseif($seen == 0){
                        echo
                        '<form action="./db/mark_as_watched.php" method="post">
                     <input type="hidden" id="id" name="id" value="' . $row['id'] . '" />
                     <button type="submit" class=" bg-'.$colore.'-600 shadow-lg text-white  p-2 rounded  hover:bg-'.$colore.'-600 hover:text-gray-100">Segna come visto</button>
                  </form>';
                     }elseif($seen == 1){
                        echo
                        '<form action="./db/mark_as_watched.php" method="post">
                     <button disabled type="submit" class=" bg-'.$colore.'-600 shadow-lg text-white  p-2 rounded  hover:bg-'.$colore.'-600 hover:text-gray-100">Visto!</button>
                  </form>';
                     }

                     ?>

                  </div>
               </div>
            </div>
         </div>
         <!-- CAST E STAFF -->
         <div class="flex">
            <div class=" flex gap-1 overflow-x-scroll scrollbar-hide overflow-y-visible h-72 py-2 px-1 mt-1 w-4/6 bg-gradient-to-r from-<? echo $colore ?>-900 to-<? echo $colore ?>-500 shadow-lg mx-2 rounded-lg border-gray-100 border">
               <?php
               foreach ($cast as $member) {
                  echo '<form action="./search_result.php" method="get">
                     <input type="hidden" name="search_people" value="' . $member['persona'] . '">
                     <div onclick="javascript:this.parentNode.submit();" class="transform transition duration-500 hover:scale-105 h-64 w-36 min-w-36 m-1 bg-white rounded-lg flex flex-col shadow-sm hover:shadow-2xl hover:shadow-slate-400 ease-in-out">
                              <div class="h-44 w-36 overflow-hidden ">
                                 <img class="rounded-lg shadow-2xl" src="./photos/' . $member['percorso_foto'] . '" alt="">
                              </div>
                              <div class="px-2 py-1">
                                 <div class="font-bold text-sm">' . $member['persona'] . '</div>
                                 <div class="text-xs">' . $member['nome_personaggio'] . '</div>
                                 <div class="text-xs text-gray-500">' . $member['nome_ruolo'] . '</div>
                              </div>
                           </div>
                           </form>';
               }
               ?>

            </div>
            <div class="h-72 p-3 ml-1 w-2/6 mr-2 mt-1 overflow-clip flex items-center justify-center bg-gradient-to-r from-<? echo $colore ?>-900 to-<? echo $colore ?>-500 shadow-lg rounded-lg border border-gray-100">
               <iframe class="aspect-video rounded-lg w-trailer-custom" src="https://www.youtube.com/embed/<?php echo $trailers['link']; ?>?autoplay=1&mute=1" allowfullscreen>
               </iframe>
            </div>
         </div>
         <!-- CAST E STAFF -->







         <!-- RECENSIONI -->
         <div class="grid place-items-center">

            <ul class="my-2 space-y-4">
               <?php
               $i = 0;
               foreach ($reviews as $review) {
                  include("./db/fetch_tags.php");
                  include("./db/fetch_comments.php");
                  $i += 1;
                  $likebutton = "button" . $i;
                  $review['voto'] += 0;
                  $review['data'] = date("d/m/Y", strtotime($review['data']));
                  echo  '<li class="bg-white border border-gray-100 w-custom p-4 rounded-lg shadow-sm hover:shadow-2xl transition-shadow duration-300 ease-in-out">
                        <div class="flex justify-between items-start">
                           <div class="flex">
                              <div class="text-gray-600 py-3 text-lg">Recensione di</div>
                              <div onclick="location.href = \'./profile.php?usr=' . $review['username'] . '\';" class="text-blue-500 ml-1 py-3 text-lg hover:underline cursor-pointer">' . $review['username'] . '</div>
                              <div class="text-gray-400 ml-2 pt-4 text-sm">pubblicata il ' . $review['data'] . ', alle ' . $review['ora'] . ' </div>
                  
                           </div>
                           <div class="bg-green-500 text-white font-bold rounded-full p-3 hover:bg-white hover:text-green-500">
                              ' . $review['voto'] . '</div>
                        </div>
                        <div class="overflow-y-auto scroll-smooth max-h-40 text-justify">' . $review['contenuto'] . '
                        </div>
                        <div class="mt-2 flex flex-row-reverse">';
                  if (in_array($review['id'], $likes)) {
                     echo '<button onclick="unlike(this.id, this.value,\'' . $_SESSION['username'] . '\')" id="' . $likebutton . '" value="' . $review['id'] . '" class="h-10 w-40 hidden cursor-pointer rounded-lg border-2 border-red-600 py-1 px-2 font-bold text-red-600">Mi piace: ' . $review['count'] . '</button>
                           <button onclick="unlike(this.id, this.value,\'' . $_SESSION['username'] . '\')" id="' . 'unlike' . $likebutton . '" value="' . $review['id'] . '" class="h-10 w-40 cursor-pointer rounded-lg border-2 bg-red-600 border-white py-1 px-2 font-bold text-white">Mi piace: ' . $review['count'] . '</button>';
                  } else {
                     echo '<button onclick="like(this.id, this.value,\'' . $_SESSION['username'] . '\')" id="' . $likebutton . '" value="' . $review['id'] . '" class="h-10 w-40 cursor-pointer rounded-lg border-2 border-red-600 py-1 px-2 font-bold text-red-600">Mi piace: ' . $review['count'] . '</button>
                        <button onclick="like(this.id, this.value,\'' . $_SESSION['username'] . '\')" id="' . 'unlike' . $likebutton . '" value="' . $review['id'] . '" class="h-10 w-40 hidden cursor-pointer rounded-lg border-2 bg-red-600 border-white py-1 px-2 font-bold text-white">Mi piace: ' . $review['count'] . '</button>';
                  }
                  echo '<form action="./write_comment.php" method="post">
                        <input type="hidden" id="username" name="username" value="' . $review['username'] . '" />
                        <input type="hidden" id="id_recensione" name="id_recensione" value="' . $review['id'] . '" />
                        <input type="hidden" id="id_scheda" name="id_scheda" value="' . $row['id'] . '" />
                        <button type="submit" class="cursor-pointer rounded-lg border-2 bg-blue-600 py-1 px-2 font-bold text-white">Commenta</button>
                        </form>';
                  echo '<div class="w-full flex">';
                  foreach ($review_tags as $tag) {
                     echo '<div onclick="location.href = \'./search_result.php?search_tag=' . $tag['label'] . '\';" class="bg-white cursor-pointer rounded-lg w-fit p-1 shadow-2xl h-8">
                     <div class="text-black text-xs">' . $tag['label'] . '</div>
                  </div>';
                  }
                  echo '</div>
                        </div>';

                  if ($comments->num_rows != 0) {
                     echo '<button value="' . $review['id'] . '" class="cursor-pointer rounded-lg border-2 bg-blue-600 py-1 px-2 font-bold text-white" onclick="showComments(this)">Vedi commenti</button>
                        <div id="comment-section-' . $review['id'] . '" class="hidden">
                        <ul class="">';

                     foreach ($comments as $comment) {
                        $comment['data'] = date("d/m/Y", strtotime($comment['data']));
                        echo '<li class="bg-white border border-gray-100 w-full p-4 rounded-lg shadow-sm hover:shadow-2xl transition-shadow duration-300 ease-in-out">
                           <div class="flex justify-between items-start">
                           <div class="flex">
                              <div class="text-gray-600 py-3 text-lg">Commento di</div>
                              <div class="text-blue-500 ml-1 py-3 text-lg hover:underline cursor-pointer">' . $comment['username'] . '</div>
                              <div class="text-gray-400 ml-2 pt-4 text-sm">pubblicata il ' . $comment['data'] . ', alle ' . $comment['ora'] . ' </div>
                  
                           </div>
                           <div class="bg-green-500 text-white font-bold rounded-full p-3 hover:bg-white hover:text-green-500">
                              ' . 'test' . '</div>
                        </div>
                        <div class="overflow-y-auto scroll-smooth max-h-40 text-justify">' . $comment['contenuto'] . '
                        </div>
                        <div class="mt-2 flex flex-row-reverse">
                     
                     </li>';
                     }
                     echo '</div>';
                  }

                  echo '</li>';
               }
               ?>
            </ul>
         </div>
         <!-- RECENSIONI -->
      </div>
   </div>
   <script>
      //MODAL:
      // Get the modal by id
      var modal = document.getElementById("modal");

      // Get the modal image tag
      var modalImg = document.getElementById("modal-img");

      // this function is called when a small image is clicked
      function showModal(src) {
         modal.classList.remove('hidden');
         modalImg.src = src;
      }

      document.addEventListener('keydown', evt => {
         if (evt.key === 'Escape') {
            closeModal();
         }
      });

      // this function is called when the close button is clicked
      function closeModal() {
         modal.classList.add('hidden');
      }

      //LIKE:
      function like(id, id_review, username) {
         id_unlike = "unlike" + id;
         var formData = new FormData();
         formData.append('id', id_review);
         formData.append('username', username);

         fetch("./db/like.php", {
            method: 'post',
            body: formData
         }).then(function(res) {
            like = document.getElementById(id);
            var unlike = document.getElementById(id_unlike);
            unlike.classList.remove('hidden');
            like.classList.add('hidden');
            window.location.reload();
         });
      }

      //UNLIKE:
      function unlike(id, id_review, username) {
         id_like = id.slice(6);
         var formData = new FormData();
         formData.append('id', id_review);
         formData.append('username', username);

         fetch("./db/unlike.php", {
            method: 'post',
            body: formData
         }).then(function(res) {
            var unlike = document.getElementById(id);
            var like = document.getElementById(id_like);
            unlike.classList.add('hidden');
            like.classList.remove('hidden');
            window.location.reload();
         });
      }

      //VEDI COMMENTI
      function showComments(button) {
         // ottieni l'ID della recensione dalla proprietà "value" del pulsante "Vedi commenti"
         const reviewId = button.getAttribute('value');

         // seleziona la sezione dei commenti corretta utilizzando l'ID della recensione
         const commentSection = document.getElementById(`comment-section-${reviewId}`);

         // mostra la sezione dei commenti
         commentSection.classList.remove('hidden');

         // sostituisci il testo del pulsante "Vedi commenti" con "Nascondi commenti"
         button.innerText = 'Nascondi commenti';

         // aggiungi un nuovo evento click al pulsante "Nascondi commenti"
         button.setAttribute('onclick', 'hideComments(this)');
      }

      //NASCONDI COMMENTI
      function hideComments(button) {
         // ottieni l'ID della recensione dalla proprietà "value" del pulsante "Nascondi commenti"
         const reviewId = button.getAttribute('value');

         // seleziona la sezione dei commenti corretta utilizzando l'ID della recensione
         const commentSection = document.getElementById(`comment-section-${reviewId}`);

         // nascondi la sezione dei commenti
         commentSection.classList.add('hidden');

         // sostituisci il testo del pulsante "Nascondi commenti" con "Vedi commenti"
         button.innerText = 'Vedi commenti';

         // aggiungi un nuovo evento click al pulsante "Vedi commenti"
         button.setAttribute('onclick', 'showComments(this)');
      }


      var ctx = document.getElementById("myChart");

      new Chart(ctx, {
         type: 'line',
         data: {
            labels: <? echo $data_js ?>,
            datasets: [{
               label: 'Voto',
               data: <? echo $voti_js ?>,
               borderWidth: 1
            }]
         },
         options: {
            scales: {
               y: {
                  beginAtZero: true
               },
               x: {
                  display: false

               }
            }
         }
      });
   </script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

</body>