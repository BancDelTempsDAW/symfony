$(document).ready(function() {
    
    $("#confirmError").hide();
    $("#equalError").hide();
    
    $("#bonavall_bancdeltempsbundle_usuari_submit").click(function(){
        
       var pass1 = $("#user_pass").val();
       var pass2 = $("#bonavall_bancdeltempsbundle_usuari_password").val();
        
       if(pass1 != pass2){
            $("#confirmError").show();
        }else{
            $("#confirmError").hide();
            $("#equalError").hide();
        }
    });
    
    $("#bonavall_bancdeltempsbundle_usuari_password").keyup(function(){
        
        var pass1 = $("#user_pass").val();
        var pass2 = $("#bonavall_bancdeltempsbundle_usuari_password").val();
        
        if(pass1 != pass2){
            $("#equalError").show();
            return false;
        }else{
            $("#equalError").hide();
            $("#confirmError").hide();
            return true;
        }
    });
});