
    $(document).ready(function() {
        //$("#ok").show();
       /* $("#checkForm").validate({
            rules: {
                user_nom: {required: true},
                user_cognom: {required: true},
                user_adreca: {required: true},
                user_telefon: {required: true},
                user_email: {required: true, email: true},
                user_presentacio: {required: true}
            },
            messages: {
                user_nom: "Falta el nom.",
                user_cognom: "Falta el cognom.",
                user_adreca: "Debe introducir un email válido.",
                user_telefon: "Falta el telefon.",
                user_email: "Es necessari un email valid.",
                user_presentacio: "El campo Mensaje es obligatorio."
            },*/
            //submitHandler: function(form) {
            $("#botoModificarPerfil").click(function(){
                var nom = $('#user_nom').val();
                var url = $("#botoModificarPerfil").attr("href");
                $.post(url, {nomUsuari: nom}, function(data){
                    /*$("#ok").html(data);
                     $("#formid").hide();*/
                    if (data.responseCode == 200) {

                        alert("TOt ok");
                    }
                    else if (data.responseCode == 400) {//bad request
                        alert("TOt malament");
                    }
                    else {
                        //if we got to this point we know that the controller
                        //did not return a json_encoded array. We can assume that           
                        //an unexpected PHP error occured
                        alert("An unexpeded error occured.  "+data.response);

                        //if you want to print the error:
                        //$('#output_' + id).html(data);

                    }

                });

            });
            
            $("#botoModificarPerfil").click(function(e){
          e.preventDefault();
          
          
      });
        });
    //});

