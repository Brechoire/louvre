/**
 * Created by Jeranders on 03/11/2016.
 */

$(document).ready(function(){
    $('#bookingNext').click(function () {

        var numberTicket = $('#numberTicket').val();
        console.log(numberTicket);
        $('#info-visitor').after('Mon texte ' + ' ' + numberTicket);

    });
});