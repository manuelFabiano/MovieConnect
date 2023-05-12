$(document).ready(function () {
    $('#login').submit(function (event) {
      event.preventDefault(); // previene l'invio del form

      // recupera i dati dal form
      var formData = new FormData(this);

      // invia i dati tramite ajax
      $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        processData: false,
        contentType: false,

        success: function (response) {
          if(response == "Password errata!"){
            $('#passworderror').removeClass('hidden');
            $('#emailerror').addClass('hidden');
            $('#usernameerror').addClass('hidden');
            $('#banerror').addClass('hidden');
          }else if (response == "L'email da te inserita non esiste!"){
            $('#emailerror').removeClass('hidden');
            $('#passworderror').addClass('hidden');
            $('#usernameerror').addClass('hidden');
            $('#banerror').addClass('hidden');
          }else if (response == "L'username da te inserito non esiste!"){
            $('#usernameerror').removeClass('hidden');
            $('#emailerror').addClass('hidden');
            $('#passworderror').addClass('hidden');
            $('#banerror').addClass('hidden');
          }else if(response == "Sei stato bannato!"){
            $('#banerror').removeClass('hidden');
            $('#emailerror').addClass('hidden');
            $('#passworderror').addClass('hidden');
            $('#usernameerror').addClass('hidden');
          }else{
            // Nessun errore corrispondente, invia il form
            $('#login').unbind('submit').submit();
          }
        },
        error: function (xhr, status, error) {
          console.error(error);
        }
      });
    });
  });