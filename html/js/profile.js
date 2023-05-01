//SCRIPT PER METTERE LIKE: 
function like(id, id_review, username) {
    id_unlike = "unlike" + id;
    var formData = new FormData();
    formData.append('id', id_review);
    formData.append('username', username);

    //Faccio una ajax con fetch a like.php
    fetch("./db/like.php", {
        method: 'post',
        body: formData
    }).then(function(res) {
        console.log(res)
        like = document.getElementById(id);
        var unlike = document.getElementById(id_unlike);
        unlike.classList.remove('hidden');
        like.classList.add('hidden');
        window.location.reload();
    });
}

//SCRIPT PER TOGLIERE IL LIKE:
function unlike(id, id_review, username) {
    id_like = id.slice(6);
    var formData = new FormData();
    formData.append('id', id_review);
    formData.append('username', username);
    //Faccio una ajax con fetch a unlike.php
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
    //ottengo l'ID della recensione dalla proprietà "value" del pulsante "Vedi commenti"
    const reviewId = button.getAttribute('value');

    //seleziono la sezione dei commenti corretta utilizzando l'ID della recensione
    const commentSection = document.getElementById(`comment-section-${reviewId}`);

    //mostro la sezione dei commenti
    commentSection.classList.remove('hidden');

    //sostituisco il testo del pulsante "Vedi commenti" con "Nascondi commenti"
    button.innerText = 'Nascondi commenti';

    //aggiungo un nuovo evento click al pulsante "Nascondi commenti"
    button.setAttribute('onclick', 'hideComments(this)');
}

//NASCONDI COMMENTI
function hideComments(button) {
    //ottieni l'ID della recensione dalla proprietà "value" del pulsante "Nascondi commenti"
    const reviewId = button.getAttribute('value');

    //seleziono la sezione dei commenti corretta utilizzando l'ID della recensione
    const commentSection = document.getElementById(`comment-section-${reviewId}`);

    //nascondo la sezione dei commenti
    commentSection.classList.add('hidden');

    //sostituisco il testo del pulsante "Nascondi commenti" con "Vedi commenti"
    button.innerText = 'Vedi commenti';

    //aggiungo un nuovo evento click al pulsante "Vedi commenti"
    button.setAttribute('onclick', 'showComments(this)');
}