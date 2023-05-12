//Script per il tipo di ruolo (Attore o Staff)
//Se viene selezionato Staff disabilita il form per inserire il nome del personaggio nel film
document.getElementById('tipo_ruolo').onchange = function () {
    if (document.getElementById('personaggio').hasAttribute("disabled")) {
        document.getElementById('personaggio').removeAttribute("disabled");
    } else {
        document.getElementById('personaggio').setAttribute('disabled', '');
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


