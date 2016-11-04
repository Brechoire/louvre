/**
 * Created by Jeranders on 03/11/2016.
 */

$(document).ready(function(){

    $('#bookingNext').click(function () {

        // Résultat du nombre de ticket validé par le client
        var numberTicket = $('#numberTicket').val();

        var tour = 1;

        if ((numberTicket == 0) || (numberTicket == ''))
        {
            $('#error').prepend('Aucun billet');
        }else
        {
            $('#button').prepend('<a id="reset" class="btn btn-danger">Annuler</a>');
            while (tour <= numberTicket) {

                $('#bookingNext').remove();
                $('#error').remove();

                $('#info-visitor').prepend('<h4>Informations sur le visiteur ' + tour + '</h4><div class="form-group"><label for="lastname">Nom</label><input type="text" class="form-control" id="lastname"></div><div class="form-group"><label for="firstname">Prénom</label><input type="text" class="form-control" id="firstname"></div><div class="form-group"><label for="firstname">Votre pays</label><select id="" name="" class="form-control"><option value="FR" selected>France</option><option value="ZA">Belgique</option><option value="ZA">Suisse</option></select> </div> <div class="form-group"><label for="champ">Votre date de naissance</label> <input type="date" id="champ" class="form-control" name="date" placeholder="jj/mm/aaaa"></div> <div class="checkbox"><label><input type="checkbox"> Tarif réduit</label></div></div> <hr class="louvre">');

                tour++;

            }
        }

        $('#reset').click(function () {
            $('#info-visitor').remove();
            $('#reset').remove();
            $('#button').prepend('<a id="bookingNext" class="btn btn-info">Suite</a>');
        });
    });



});