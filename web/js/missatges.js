$(document).ready(function() {
    $("#output").css("display", "none");
   //listen for the form beeing submitted
  
      //get the url for the form
      var url=$("#miss_btn").attr("href");
      //start send the post request
       $.post(url,{
           formName:$("#sol_id").html(),
           other:"attributes"
       },function(data){
           //the response is in the data variable   
           var output = "<table><tr>";

            if(data.responseCode==200 ){    
                var mida = data.greeting.length;
                for(var i=0; i<mida; i++){
                    for(var p in data.greeting[i]){
                        if(p == "data"){
                            output += "<tr><td>"+p+"</td><td>"+data.greeting[i][p]['date']+"</td></tr>";
                        }else{
                            output += "<tr><td>"+p+"</td><td>"+data.greeting[i][p]+"</td></tr>";
                        }

                    }
                }
                $('#output').html(output);
                $('#output').css("color","red");
            }
           else if(data.responseCode==400){//bad request
               $('#output').css("color","red");
           }
           else{
              //if we got to this point we know that the controller
              //did not return a json_encoded array. We can assume that           
              //an unexpected PHP error occured
              alert("An unexpeded error occured.");

              //if you want to print the error:
              $('#output').html(data);
           }
       });//It is silly. But you should not write 'json' or any thing as the fourth parameter. It should be undefined. I'll explain it futher down

      //we dont what the browser to submit the form
      
        
      $(".miss_btn").click(function(e){
          e.preventDefault();
          $("#output").toggle();
          
      });
});
