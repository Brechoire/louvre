/**
 * Created by Jeranders on 03/11/2016.
 */

$(document).ready(function(){
    $('#bookingNext').click(function () {

        // Résultat du nombre de ticket validé par le client
        var numberTicket = $('#numberTicket').val();

        var tour = 1;

        if (numberTicket == 0)
        {
            $('#error').prepend('Aucun billet');
           // $('#error').remove().hide(5000);
        }else
        {
            while (tour <= numberTicket) {

                $('#bookingNext').remove();

                $('#info-visitor').before('<p>Informations sur le visiteur ' + tour + '</p><div class="form-group"><label for="lastname">Nom</label><input type="text" class="form-control" id="lastname"></div><div class="form-group"><label for="firstname">Prénom</label><input type="text" class="form-control" id="firstname"></div><div class="form-group"><select id="" name="" class="form-control"><option value="FR" selected>France</option><option value="ZA">Belgique</option><option value="ZA">Suisse</option></select> <div class="checkbox"><label><input type="checkbox"> Tarif réduit</label></div></div>');




                tour++;
            }
        }




    });
});