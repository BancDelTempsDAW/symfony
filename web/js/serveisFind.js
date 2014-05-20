$(document).ready(function() {
    $('#triaCp').change(function(){
        var id = $('#triaCp').val();
        
        if(id == "reset"){
            location.reload();
        }else{
            var url = $('#triaCp').attr("action");               
        } 
        
        $.post(url,{
           idCp:id
       },function(data){
           //alert(data);
           $("#sortida").empty();
           $("#sortida").append(data);
       }
      );
        
    });
    
    $('#triaPob').change(function(){
        var id = $('#triaPob').val();
        
        if(id == "reset"){
            location.reload();
        }else{
            var url = $('#triaPob').attr("action");               
        } 
        
        $.post(url,{
           idCp:id
       },function(data){
           //alert(data);
           $("#sortida").empty();
           $("#sortida").append(data);
       }
      );
        
    });
    
    $('#triaProv').change(function(){
        var id = $('#triaProv').val();
        
        if(id == "reset"){
            location.reload();
        }else{
            var url = $('#triaProv').attr("action");               
        } 
        
        $.post(url,{
           idCp:id
       },function(data){
           //alert(data);
           $("#sortida").empty();
           $("#sortida").append(data);
       }
      );
        
    });

});