/**
 * Created by Jeranders on 03/11/2016.
 */

$(document).ready(function(){

    var tour = 1;

    $('#bookingNext').click(function () {

        // Résultat du nombre de ticket validé par le client
        var numberTicket = $('#numberTicket').val();

        // Résultat de la date de réservation
        var dateBooking = $('#dateBooking').val();

        // Résultat de durée de la visite
        var radio = $('input[name=optionsRadios]:checked').val();

        var msgError =  $('#error').text();

        // Si les champs sont vides
        if ((numberTicket == 0) || (numberTicket == '') || (dateBooking == ''))
        {
            // Si aucun message d'erreur
            if (msgError == '')
            {
                $('#error').prepend('<div class="alert alert-danger text-center" role="alert">Merci de remplir tous les champs</div>');

            }

        }else{

            $('#error').remove();

            $('#info-visitor').prepend('<h3 class="text-center">Formulaire d\'inscription</h3>');



            console.log(radio);

            while (tour <= numberTicket)
            {
                $('#bookingNext').remove();

                $('#info-visitor').append('<h4>Informations sur le visiteur ' + tour + '</h4><div class="form-group"><label for="lastname">Nom</label><input type="text" class="form-control" id="lastname"></div><div class="form-group"><label for="firstname">Prénom</label><input type="text" class="form-control" id="firstname"></div><div class="form-group"><label for="firstname">Votre pays</label><select id="" name="" class="form-control"><option value="FR" selected>France</option><option value="ZA">Belgique</option><option value="ZA">Suisse</option></select> </div> <div class="form-group"><label for="champ">Votre date de naissance</label> <input type="text" id="champ" class="form-control date-anniversaire" name="date"></div> <div class="checkbox"><label><input type="checkbox"> Tarif réduit</label></div></div> <hr class="louvre">');

                tour++;
            }
        }

        // Si il n'y a aucun ticket (0 ou vide)
        // if ((numberTicket == 0) || (numberTicket == ''))
        // {
        //
        //     $('#error').prepend('Merci de remplir tous les champs');
        //     $('#error').remove();
        //
        // }else
        // {
        //     $('#button').prepend('<a id="reset" class="btn btn-danger">Annuler</a>');
        //     $('#info-booking').remove();
        //     $('#recap').prepend('<p>Date de réservation : ' + dateBooking + '</p>');
        //
        //     while (tour <= numberTicket)
        //     {
        //
        //         $('#bookingNext').remove();
        //         $('#error').remove();
        //
        //         $('#info-visitor').prepend('<h4>Informations sur le visiteur ' + tour + '</h4><div class="form-group"><label for="lastname">Nom</label><input type="text" class="form-control" id="lastname"></div><div class="form-group"><label for="firstname">Prénom</label><input type="text" class="form-control" id="firstname"></div><div class="form-group"><label for="firstname">Votre pays</label><select id="" name="" class="form-control"><option value="FR" selected>France</option><option value="ZA">Belgique</option><option value="ZA">Suisse</option></select> </div> <div class="form-group"><label for="champ">Votre date de naissance</label> <input type="text" id="champ" class="form-control date-anniversaire" name="date"></div> <div class="checkbox"><label><input type="checkbox"> Tarif réduit</label></div></div> <hr class="louvre">');
        //
        //         tour++;
        //     }
        // }

        // $('#reset').click(function () {
        //     $('#info-visitor').remove();
        //     $('#reset').remove();
        //
        //     $('#button').prepend('<a id="bookingNext" class="btn btn-info">Suite</a>');
        // });
    });

});