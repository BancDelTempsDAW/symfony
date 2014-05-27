$(document).ready(function() {
    
    $("#bonavall_bancdeltempsbundle_usuari_password").hide();
    $("#bonavall_bancdeltempsbundle_usuari_submit").hide();
    $("#labelConfirm").hide();
    $("#equalError").hide();
    
    $("#user_pass").keypress(function(){
        $("#labelConfirm").show();
        $("#bonavall_bancdeltempsbundle_usuari_password").show();
    });
    
    $("#bonavall_bancdeltempsbundle_usuari_password").blur(function(){
        
        var pass1 = $("#user_pass").val();;
        var pass2 = $("#bonavall_bancdeltempsbundle_usuari_password").val();;

        if(pass1 != pass2){
            $("#bonavall_bancdeltempsbundle_usuari_submit").hide();
            $("#equalError").show();
            return false;
        }else{
            $("#equalError").hide();
            $("#bonavall_bancdeltempsbundle_usuari_submit").show();
            return true;
        }
    });
        

});