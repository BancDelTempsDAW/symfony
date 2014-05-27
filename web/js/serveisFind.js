$(document).ready(function() {
   // $('#triaCp').select2({ allowClear: false});
    $('#triaCp').change(function() {
        var id = $('#triaCp').val();
        $('#triaCat').get(0).selectedIndex = 0;
        $('#triaPob').get(0).selectedIndex = 0;
        $('#triaProv').get(0).selectedIndex = 0;
        if (id == "reset") {
            location.reload();
        } else {
            var url = $('#triaCp').attr("action");
            $.post(url, {
                idCp: id
            }, function(data) {
                //alert(data);
                $("#sortida").empty();
                $("#sortida").append(data);
            }
            );
        }



    });

    $('#triaPob').change(function() {
        var id = $('#triaPob').val();
        $('#triaCat').get(0).selectedIndex = 0;
        $('#triaCp').get(0).selectedIndex = 0;
        $('#triaProv').get(0).selectedIndex = 0;
        if (id == "reset") {
            location.reload();
        } else {
            var url = $('#triaPob').attr("action");
            $.post(url, {
            idCp: id
        }, function(data) {
            //alert(data);
            $("#sortida").empty();
            $("#sortida").append(data);
        }
        );
        }

        

    });

    $('#triaProv').change(function() {
        var id = $('#triaProv').val();
        $('#triaCat').get(0).selectedIndex = 0;
        $('#triaCp').get(0).selectedIndex = 0;
        $('#triaPob').get(0).selectedIndex = 0;        
        if (id == "reset") {
            location.reload();
        } else {
            var url = $('#triaProv').attr("action");
            $.post(url, {
            idCp: id
        }, function(data) {
            //alert(data);
            $("#sortida").empty();
            $("#sortida").append(data);
        }
        );
        }

        

    });
    
    $('#triaCat').change(function() {
        var id = $('#triaCat').val();       
        $('#triaCp').get(0).selectedIndex = 0;
        $('#triaPob').get(0).selectedIndex = 0;
        $('#triaProv').get(0).selectedIndex = 0;
        if (id == "reset") {
            location.reload();
        } else {
            var url = $('#triaCat').attr("action");
            $.post(url, {
            idCp: id
        }, function(data) {
            //alert(data);
            $("#sortida").empty();
            $("#sortida").append(data);
        }
        );
        }

        

    });
    
    $('#btnReset').click(function() {
        location.reload();
        $('#triaCat').get(0).selectedIndex = 0;
        $('#triaCp').get(0).selectedIndex = 0;
        $('#triaPob').get(0).selectedIndex = 0;
        $('#triaProv').get(0).selectedIndex = 0;
    });

});