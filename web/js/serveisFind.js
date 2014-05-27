$(document).ready(function() {
    
    $('#triaCp').select2({ allowClear: true });
    $('#triaPob').select2({ allowClear: true });
    $('#triaProv').select2({ allowClear: true });
    $('#triaCat').select2({ allowClear: true });
    $('#triaCp').change(function() {
        var id = $('#triaCp').val();
        $('#triaCat').select2('data', null);
        $('#triaPob').select2('data',null);
        $('#triaProv').select2('data',null);
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
        $('#triaCat').select2('data', null);
        $('#triaCp').select2('data', null);
        $('#triaProv').select2('data', null);
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
        $('#triaCat').select2('data', null);
        $('#triaCp').select2('data', null);
        $('#triaPob').select2('data', null);
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
        $('#triaCp').select2('data', null);
        $('#triaPob').select2('data', null);
        $('#triaProv').select2('data', null);
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
        $('#triaCat').select2('data', null);
        $('#triaCp').select2('data', null);
        $('#triaPob').select2('data', null);
        $('#triaProv').select2('data', null);
    });

});