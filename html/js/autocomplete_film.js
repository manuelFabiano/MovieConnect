//AUTOCOMPLETE SOLO CON I TITOLI DEI FILM E SERIE
$(document).ready(function() {
    $("#titolo").on("keyup", function() {
        var search = $(this).val();
        if (search !== "") {
            $.ajax({
                url: "./db/search_title.php",
                type: "POST",
                cache: false,
                data: {
                    searchfilm: search
                },
                success: function(data) {
                    $("#search-result").html(data);
                    $("#search-result").fadeIn();
                }
            });
        } else {
            $("#search-result").html("");
            $("#search-result").fadeOut();
        }
    });
    // Al click su uno dei titoli nella lista dei risultati, il nome viene inserito nell'input di ricerca
    $(document).on("click", "li", function() {
        $('#titolo').val($(this).text());
        $('#search-result').fadeOut("fast");
    });
});