$(document).ready(function() {
    $("#success").hide();
    $("#failure").hide();
    $("#checkForm").validate({
        rules: {
            user_pass: {required: true, minlength: 4},
            user_passRepeat: {required: true, equalTo: user_pass},
            user_nom: {required: true, minlength: 3, maxlength: 15},
            user_cognom: {required: true, minlength: 3, maxlength: 20},
            user_adreca: {required: true, minlength: 3, maxlength: 30},
            user_telefon: {required: true, minlength: 9, maxlength: 11, number: true},
            user_email: {required: true, email: true},
            user_presentacio: {required: true, minlength: 1, maxlength: 100}
        },
        messages: {
            user_pass: {
                required: "El password no pot estar en blanc",
                minlength: "El password ha de ser minim de 4 caracters"
            },
            user_passRepeat: {
                required: "Has de confirmar el password",
                equalTo: "Els passwords no coincideixen"
            },
            user_nom: {
                required: "El nom no pot estar en blanc",
                minlength: "El nom ha de tenir un minim de 3 caracters",
                maxlength: "El nom ha de tenir un màxim de 15 caracters"
            },
            user_cognom: {
                required: "El cognom no pot estar en blanc",
                minlength: "El cognom ha de tenir un minim de 3 caracters",
                maxlength: "El cognom ha de tenir un màxim de 20 caracters"
            },
            user_adreca: {
                required: "L'adreça no pot estar en blanc",
                minlength: "L'adreça ha de tenir un minim de 3 caracters",
                maxlength: "L'adreça ha de tenir un màxim de 50 caracters"
            },
            user_telefon: {
                required: "El telefon no pot estar en blanc",
                minlength: "El telefon ha de tenir un minim de 9 caracters",
                maxlength: "El telefon ha de tenir un màxim de 11 caracters",
                number: "El telefon ha de ser numeric"
            },
            user_email: "Ha de ser un email vàlid",
            user_presentacio: {
                minlength: "Estaria bé tenir una presentació",
                maxlenght: "La teva presentació es masa llarga"
            }
        },
        submitHandler: function(form) {
            var urlString = $('#urlString').val();
            var dataString = '&password=' + $('#user_pass').val() + '&nom=' + $('#user_nom').val() + '&cognom=' + $('#user_cognom').val() + '&adreca=' + $('#user_adreca').val() + '&telefon=' + $('#user_telefon').val() + '&email=' + $('#user_email').val() + '&presentacio=' + $('#user_presentacio').val();
            $.ajax({
                type: "POST",
                url: urlString,
                data: dataString,
                success: function(data) {
                    if (data === '{"responseCode":200}') {
                        $("#success").html("S'ha modificat amb exit").show().fadeOut(6000);
                        location.reload();
                    } else {
                        $("#failure").html("Error al modificar el perfil").show().fadeOut(6000);
                    }
                }
            });
        }
    });
});