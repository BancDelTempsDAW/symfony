$(document).ready(function() {
    $(".solicitut").each(function(){
       var id = $(".sol_id", this).html();
       $(".sol_id", this).hide();
       $("#row_missatges_"+id).hide();
       $("#url_nou_msg").hide();

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
                $('#outputButton_'+id).html("<div><a id='nou_miss_{{solicitut.id}}' data-toggle='modal' data-target='#modal_nou_missatge_"+id+"' class='btn btn-default' href='#' ><span class='glyphicon glyphicon-pencil'></span> Nou Missatge</a></div>");
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
      
        //Obrir missatges
      $("#miss_btn_"+id).click(function(e){
          e.preventDefault();
          $("#row_missatges_"+id).slideToggle("Fast");
          
      });
       
       //NOU MISSATGE
       $("#nou_missatge_btn_"+id).click(function(){
           var msg = $("#nou_missatge_txt_"+id).val();
           var url_ajax = $("#url_nou_msg").attr("url");
           alert(url_ajax);
           if($("#nou_missatge_txt_"+id).val()==""){
               var errormsg = "<br><div class='alert alert-danger alert-dismissable' >Has d'escriure un missatge.</div>";
               $("#nou_msg_modal_body_"+id).append(errormsg);
               $("#nou_missatge_txt_"+id).focus();
           }else{
                $.get(url_ajax),{
                        id_sol:id,
                        msg:msg
                },function(data){ 
                    alert(data);
                }
           }
           
       });
       
    });
    
    
  

  

});
