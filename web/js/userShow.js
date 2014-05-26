$(document).ready(function() {
    $('#usrServ').click(function(e) {
        e.preventDefault();
        var id = $('#usrServ').attr("user");
        var url = $('#usrServ').attr("href");
        $.post(url, {
            id: id
        }, function(data) {
            $("#sortidaUsr").empty();
            $("#sortidaUsr").append(data);
        }
        );
            
    });
    
    $('#usrVal').click(function(e) {
        e.preventDefault();
        var id = $('#usrVal').attr("user");
        var url = $('#usrVal').attr("href");
        $.post(url, {
            id: id
        }, function(data) {
            $("#sortidaUsr").empty();
            $("#sortidaUsr").append(data);
        }
        );
            
    });
    
    $('#usrHist').click(function(e) {
        e.preventDefault();
        var id = $('#usrHist').attr("user");
        var url = $('#usrHist').attr("href");
        $.post(url, {
            id: id
        }, function(data) {
            $("#sortidaUsr").empty();
            $("#sortidaUsr").append(data);
        }
        );
            
    });
    
});




