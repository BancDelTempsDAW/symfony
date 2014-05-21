$(document).ready(function() {
    $(".solicitut").each(function(){
       var id = $(".sol_id", this).html();
       $(".sol_id", this).hide();
       $("#row_missatges_"+id).hide();

      //get the url for the form
      var url=$("#miss_btn_"+id).attr("href");
      //start send the post request
       $.post(url,{
           formName:id,
           other:"attributes"
       },function(data){
           //the response is in the data variable   
           var output = '<div class="llista-missatges list-group">';





            if(data.responseCode==200 ){    
                var mida = data.greeting.length;
                
                for(var i=0; i<mida; i++){
                    output += "<div class='list-group-item'>"
                    for(var p in data.greeting[i]){
                        if(p == "data"){
                            var data_missatge = "<h4 class='list-group-item-heading'>"+data.greeting[i][p]['date']+"</h4>";
                        }else if(p == "missatge"){
                            var missatge = "<p class='list-group-item-text'>"+data.greeting[i][p]+"</p>";
                        }
                    }
                    output += data_missatge + missatge+"</div>";
                }
                output += "</div>";
                $('#output_'+id).html(output);
                $('#outputButton_'+id).html("<div><a id='nou_miss_{{solicitut.id}}' class='btn btn-success' href='#' ><span class='glyphicon glyphicon-pencil'></span> Nou Missatge</a></div>");
            }
           else if(data.responseCode==400){//bad request
               $('#output_'+id).css("color","red");
           }
           else{
              //if we got to this point we know that the controller
              //did not return a json_encoded array. We can assume that           
              //an unexpected PHP error occured
              alert("An unexpeded error occured.");

              //if you want to print the error:
              $('#output_'+id).html(data);
              
           }
       });//It is silly. But you should not write 'json' or any thing as the fourth parameter. It should be undefined. I'll explain it futher down

      //we dont what the browser to submit the form
      
        
      $("#miss_btn_"+id).click(function(e){
          e.preventDefault();
          $("#row_missatges_"+id).slideToggle("Slow");
          
      });
       
       
    });
    
    
  

});
