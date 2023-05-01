//Funzione che mostra il modal per la conferma del rifiuto della richiesta
function rejectRequest(id) {
    // Mostra il modal
    const rejectRequestModal = document.getElementById('rifiuta-richiesta-modal');
    rejectRequestModal.classList.remove('hidden');

    const rejectRequestForm = document.getElementById('rifiuta-richiesta-form');
    // Crea un nuovo elemento input di tipo "hidden"
    const hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'id_scheda');
    hiddenInput.setAttribute('value', id);

    rejectRequestForm.appendChild(hiddenInput);

    const cancelButton = document.getElementById('rifiuta-richiesta-modal-cancel');
    cancelButton.addEventListener('click', cancel);
};
//funzione per disattivare il modal se si preme annulla
function cancel() {
    const rejectRequestModal = document.getElementById('rifiuta-richiesta-modal');
    rejectRequestModal.classList.add('hidden');
}


//SCRIPT PER I FILTRI
attesa = document.querySelectorAll('.attesa');
accettate = document.querySelectorAll('.accettata');
rifiutate = document.querySelectorAll('.rifiutata');

document.getElementById('bottoneattesa').addEventListener('click', function() {
    attesa.forEach(function(attesa) {
        if (attesa.classList.contains('hidden')) {
            attesa.classList.remove('hidden');
        }
    });

    accettate.forEach(function(accettate) {
        accettate.classList.add('hidden');
    });

    rifiutate.forEach(function(rifiutate) {
        rifiutate.classList.add('hidden');
    });

})

document.getElementById('bottoneaccettate').addEventListener('click', function() {
    accettate.forEach(function(accettate) {
        if (accettate.classList.contains('hidden')) {
            accettate.classList.remove('hidden');
        }
    });

    attesa.forEach(function(attesa) {
        attesa.classList.add('hidden');
    });

    rifiutate.forEach(function(rifiutate) {
        rifiutate.classList.add('hidden');
    });

})

document.getElementById('bottonerifiutate').addEventListener('click', function() {
    rifiutate.forEach(function(rifiutate) {
        if (rifiutate.classList.contains('hidden')) {
            rifiutate.classList.remove('hidden');
        }
    });

    attesa.forEach(function(attesa) {
        attesa.classList.add('hidden');
    });

    accettate.forEach(function(accettate) {
        accettate.classList.add('hidden');
    });

})