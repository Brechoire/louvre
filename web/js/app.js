/**
 * Created by Jeranders on 03/11/2016.
 */


$(document).ready(function(){

    /**
     * Gestion de la date
     * @type {Date}
     */
    var now = new Date();
    var annee   = now.getFullYear();
    var mois    = now.getMonth() + 1;
    var jour    = now.getDate();
    var heure   = now.getHours();
    var minute  = now.getMinutes();

    if(jour < 10){
        jour = '0' + jour;
        var dateText = (jour + '/' + mois + '/' + annee);
    }else{
        var dateText = (jour + '/' + mois + '/' + annee);
    }
    var dateJour = String(dateText);

    /**
     * Gestion de la boucle
     * @type {number}
     */
    var tour = 1;

    /**
     * Bouton pour valider le formulaire
     */
    $('#bookingNext').click(function () {

        // Résultat du nombre de ticket validé par le client
        var numberTicket = $('#numberTicket').val();

        // Résultat de la date de réservation
        var dateBooking = String($('#dateBooking').val());

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

            if(dateJour == dateBooking)
            {

                if(radio == "journee")
                {
                    if (heure < 14)
                    {
                        $('#recap').prepend('<div class="alert alert-info" role="alert"> <strong>Informations commande : </strong> Nombre de ticket : ' + numberTicket + '. > Date de la visite le : ' + dateBooking + ' . > Durée : journée (9h00 à 18h00)</div>');
                        console.log('success');
                        while (tour <= numberTicket)
                        {
                            $('#bookingNext').remove();

                            $('#info-visitor').append('<h4>Informations sur le visiteur ' + tour + '</h4><div class="form-group"><label for="lastname">Nom</label><input type="text" class="form-control" id="lastname"></div><div class="form-group"><label for="firstname">Prénom</label><input type="text" class="form-control" id="firstname"></div><div class="form-group"><label for="firstname">Votre pays</label><select id="" name="" class="form-control"><option value="FR" selected>France</option><option value="ZA">Belgique</option><option value="ZA">Suisse</option></select> </div> <div class="form-group"><label for="champ">Votre date de naissance</label> <input type="text" id="champ" class="form-control date-anniversaire" name="date"></div> <div class="checkbox"><label><input type="checkbox"> Tarif réduit</label></div></div> <hr class="louvre">');

                            tour++;
                        }
                    }else
                    {
                        $('<span id="error"></span>').prependTo($('#nextBooking'));
                        $('#error').prepend('<div class="alert alert-danger text-center" role="alert">Commande Impossible pour la journée merci de choisir la demi-journée</div>');
                        console.log('erreur commande');
                    }

                }else{
                    $('#recap').prepend('<div class="alert alert-info" role="alert"> <strong>Informations commande : </strong> Nombre de ticket : ' + numberTicket + '. > Date de la visite le : ' + dateBooking + ' . > Durée : demi-journée (9h00 à 18h00)</div>');

                    console.log('demi journée');
                    while (tour <= numberTicket)
                    {
                        $('#bookingNext').remove();

                        $('#info-visitor').append('<h4>Informations sur le visiteur ' + tour + '</h4><div class="form-group"><label for="lastname">Nom</label><input type="text" class="form-control" id="lastname"></div><div class="form-group"><label for="firstname">Prénom</label><input type="text" class="form-control" id="firstname"></div><div class="form-group"><label for="firstname">Votre pays</label><select id="" name="" class="form-control"><option value="FR" selected>France</option><option value="ZA">Belgique</option><option value="ZA">Suisse</option></select> </div> <div class="form-group"><label for="champ">Votre date de naissance</label> <input type="text" id="champ" class="form-control date-anniversaire" name="date"></div> <div class="checkbox"><label><input type="checkbox"> Tarif réduit</label></div></div> <hr class="louvre">');

                        tour++;
                    }
                }



            }

            // suppression message d'erreur
            $('#error').remove();

            // suppression du formulaire des dates & co
            $('#info-booking').remove();

        }

    });

});