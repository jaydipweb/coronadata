
$(document).on("submit", "#forget_password", function( event ){
    event.preventDefault();
    $("#send").prop('disabled', true).css('background-color','darkgrey');
    var formdata = $("#forget_password").serialize();
    $.ajax({
        url: 'auth-forget.php',
        type: 'POST',
        data: formdata,
        success: function(msg){
            var msg = $.trim(msg);
            $("#msg").html(msg);
            $("#forget_password").find("input[type=email]").val("");
            $("#send").prop('disabled', false).css('background-color','');
        }
    });
});   

$(document).on("keyup", "#password", function(){
    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
    if ($(this).val().length < 6) {
        $('#passmsg').html("<span style='color:red;'>Your password is Weak (should be atleast 6 characters).</span>");
    } else {
        if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
            $('#passmsg').html("<span style='color:green;'>Your password is Strong.</span>");
        } else {
            $('#passmsg').html("<span style='color:orange;'>Your password is Medium (should include alphabets, numbers and special characters.</span>");
        }
    }
});
$(document).on("focusin", "#confirmpassword", function(){
    $("#passmsg").empty();
});
// $(document).on("focusout", "#confirmpassword", function(){
//     var password = $("#password").val();
//     var confirmpassword = $("#confirmpassword").val();
//     if(password.length != 0){
//         if(password != confirmpassword){
//             $('#passmsg').html("<span style='color:red;'>Your password is not match.</span>");
//         }else{
//             $('#passmsg').html("<span style='color:green;'>Your password is match.</span>");
//         }
//     }
// });
$(document).on("submit", "#reset_form", function( event ){
    event.preventDefault();
    var password = $("#password").val();
    var confirmpassword = $("#confirmpassword").val();
    if(password != confirmpassword){
        $('#passmsg').html("<span style='color:red;'>Your password is not match.</span>");
    }else{
        var formdata = $("#reset_form").serialize();
        $.ajax({
            url: 'auth-forget.php',
            type: 'POST',
            data: formdata,
            success: function(msg){
                var msg = $.trim(msg);
                if(msg != 'error'){
                    window.location = 'login.php?msg='+msg;
                }else{
                    $('#msg').html("<span style='color:red;'>something went to wrong please try later...</span>");
                }
            }
        });
    }
});    

