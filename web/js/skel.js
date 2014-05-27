$(document).ready(function() {
    $('#disconnect-button').tooltip({placement: 'right'});
    $('#login-button').tooltip({placement: 'left'});
    $('#register-button').tooltip({placement: 'right'});

});


function parse_date(string) {
    var date = new Date();
    var parts = String(string).split(/[- :]/);

    date.setFullYear(parts[0]);
    date.setMonth(parts[1] - 1);
    date.setDate(parts[2]);
    date.setHours(parts[3]);
    date.setMinutes(parts[4]);
    date.setSeconds(parts[5]);
    date.setMilliseconds(0);

    return date.toLocaleString();
}  