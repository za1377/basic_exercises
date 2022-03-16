$(document).ready(function(){

    $('#compact').click(function(e){
        $("#div_show").css('display','block');
        e.stopPropagation();
    });
    
    $("#div_show").click(function(e){
        e.stopPropagation();
    });
    
    $(document).click(function(){
        $("#div_show").css('display','none');
    });
  
  });