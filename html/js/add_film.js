
//Script per il tipo (Film o Serie)
//Se film è selezionato, disabilita i form per il numero di stagioni, l'inizio e la fine, mentre se
//serie è selezionato, disabilita il form per la data di uscita.
var select = document.getElementById("tipo");
var selectedValue = select.options[select.selectedIndex].value;
if (selectedValue == 0) {
    document.getElementById('stagioni').setAttribute('disabled', '')
    document.getElementById('inizio').setAttribute('disabled', '')
    document.getElementById('fine').setAttribute('disabled', '')
    document.getElementById('uscita').removeAttribute("disabled");
} else {
    document.getElementById('stagioni').removeAttribute("disabled");
    document.getElementById('inizio').removeAttribute("disabled");
    document.getElementById('fine').removeAttribute("disabled");
    document.getElementById('uscita').setAttribute('disabled', '');
}
document.getElementById('tipo').onchange = function () {
    if (document.getElementById('stagioni').hasAttribute("disabled")) {
        document.getElementById('stagioni').removeAttribute("disabled");
        document.getElementById('inizio').removeAttribute("disabled");
        document.getElementById('fine').removeAttribute("disabled");
        document.getElementById('uscita').setAttribute('disabled', '');
    } else {
        document.getElementById('stagioni').setAttribute('disabled', '')
        document.getElementById('inizio').setAttribute('disabled', '')
        document.getElementById('fine').setAttribute('disabled', '')
        document.getElementById('uscita').removeAttribute("disabled");
    }
};

//Script per il tipo di ruolo (Attore o Staff)
//Se viene selezionato Staff disabilita il form per inserire il nome del personaggio nel film
document.getElementById('tipo_ruolo').onchange = function () {
    if (document.getElementById('personaggio').hasAttribute("disabled")) {
        document.getElementById('personaggio').removeAttribute("disabled");
    } else {
        document.getElementById('personaggio').setAttribute('disabled', '')
    }
};


//AUTOCOMPLETE CAST E STAFF
//Faccio una richiesta Ajax con JQuery ogni volta che cambia il testo dentro il form del nome dell'attore
$(document).ready(function () {

    $("#nome").on("keyup", function () {
        var search = $(this).val(); 
        if (search !== "") {
            $.ajax({
                url: "./db/search_actor.php",
                type: "POST",
                cache: false,
                data: {
                    term: search
                },
                success: function (data) {
                    $("#search-result").html(data);
                    $("#search-result").removeClass('hidden');
                    $("#search-result").fadeIn();
                }
            });
        } else {
            $("#search-result").html("");
            $("#search-result").addClass('hidden');
            $("#search-result").fadeOut();
        }
    });
    // Al click su uno dei nomi nella lista dei risultati, il nome viene inserito nell'input di ricerca
    $(document).on("click", "li", function () {
        $('#nome').val($(this).text());
        $('#search-result').fadeOut("fast");
    });
});


