$(document).ready(function(){
   $('#disconnect-button').tooltip({ placement: 'right'});
   $('#login-button').tooltip({ placement: 'left'});
   $('#register-button').tooltip({ placement: 'right'});
   
   $('#user-span').popover({
           html: true,
           content: "User@user.com<br>Punts: 23",
           trigger: 'hover'
   });

    
});