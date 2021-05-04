$(document).ready(function(){
    $("#login_form").submit(function( event ){
        $("#msg1").empty();
        event.preventDefault();
        var formdata = $("#login_form").serialize();
        $.ajax({
            url: 'auth-login.php',
            type: 'POST',
            data: formdata,
            success: function(msg){
                var msg = $.trim(msg);
                if(msg != 'OK'){
                    $("#msg").html(msg);
                    $("#login_form").find("input[type=password], input[type=email]").val("");
                }else{
                    location.href = 'index.php';
                }  
            }
        });
    });    
});