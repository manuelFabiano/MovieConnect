//MODAL:
      // Seleziona il modal dall'id
      var modal = document.getElementById("modal");

      var modalImg = document.getElementById("modal-img");

      // Funzione chiamata quando viene cliccata l'immagine piccola
      function showModal(src) {
         modal.classList.remove('hidden');
         modalImg.src = src;
      }

      // Funzione chiamata quando viene cliccato il tasto esc
      document.addEventListener('keydown', evt => {
         if (evt.key === 'Escape') {
            closeModal();
         }
      });

      // Funzione chiamata quando viene cliccata la x in alto a destra
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