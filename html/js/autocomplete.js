//Script per autocomplete
//Al cambiamento del testo nell'elemento con id="search" viene avviata la funzione
$(document).ready(function() {
    $("#search").on("keyup", function() {
        var search = $(this).val();
        if (search !== "") {
            $.ajax({
                url: "./db/search_title.php",
                type: "POST",
                cache: false,
                data: {
                    term: search
                },
                success: function(data) {
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
    // Al click su uno dei titoli nella lista dei risultati, il nome viene inserito nell'input di ricerca
    $(document).on("click", "li", function() {
        $('#search').val($(this).text());
        $('#search-result').fadeOut("fast");
    });
});