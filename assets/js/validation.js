$(document).ready(function (){
    
    $(".data-type-number").keypress(function(event){       
        if((event.charCode>=48 && event.charCode<=57) || (event.charCode==46) || (event.charCode==0))
        {
            return true;
        }
        else
            event.preventDefault();
    });
    $(".data-type-phone").keypress(function(event){ 
        console.log(event.charCode);
        if((event.charCode>=48 && event.charCode<=57) || (event.charCode==43) || (event.charCode==45) || (event.charCode==0))
        {
            return true;
        }
        else
            event.preventDefault();
    });
    
    $(".data-type-date").keypress(function(event){
        if((event.charCode>=48 && event.charCode<=57) || (event.charCode==45) || (event.charCode==0))
        {
            return true;
        }
        else
            event.preventDefault();
    });
    
    $(".data-type-datetime").keypress(function(event){
        if((event.charCode>=48 && event.charCode<=57) || (event.charCode==45) || (event.charCode==58) || (event.charCode==0))
        {
            return true;
        }
        else
            event.preventDefault();
    });
    
    $("#btn-manageUser").click(function(event){
        if($("#txtPassword").val()!=$("#txtConfirmPassword").val()){           
            show_formError("txtPassword","passwords dont match");
            show_formError("txtConfirmPassword","passwords dont match");
            event.preventDefault();
           
        }
        
    });
    
    
    
    
    //document ready ends--------------------------------------------------
    
});