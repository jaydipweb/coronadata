(function ($) {
    'use strict';
    /*==================================================================
        [ Daterangepicker ]*/
    try {
        $('.js-datepicker').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "autoUpdateInput": false,
            locale: {
                format: 'DD/MM/YYYY'
            },
        });
    
        var myCalendar = $('.js-datepicker');
        var isClick = 0;
    
        $(window).on('click',function(){
            isClick = 0;
        });
    
        $(myCalendar).on('apply.daterangepicker',function(ev, picker){
            isClick = 0;
            $(this).val(picker.startDate.format('DD/MM/YYYY'));
    
        });
    
        $('.js-btn-calendar').on('click',function(e){
            e.stopPropagation();
    
            if(isClick === 1) isClick = 0;
            else if(isClick === 0) isClick = 1;
    
            if (isClick === 1) {
                myCalendar.focus();
            }
        });
    
        $(myCalendar).on('click',function(e){
            e.stopPropagation();
            isClick = 1;
        });
    
        $('.daterangepicker').on('click',function(e){
            e.stopPropagation();
        });
    
    
    } catch(er) {console.log(er);}
    /*[ Select 2 Config ]
        ===========================================================*/
    
    try {
        var selectSimple = $('.js-select-simple');
    
        selectSimple.each(function () {
            var that = $(this);
            var selectBox = that.find('select');
            var selectDropdown = that.find('.select-dropdown');
            selectBox.select2({
                dropdownParent: selectDropdown
            });
        });
    
    } catch (err) {
        console.log(err);
    }
    

})(jQuery);

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
$(document).ready(function(){
    $("#registration_form").submit(function( event ){
        event.preventDefault();
        var password = $("#password").val();
        var confirmpassword = $("#confirmpassword").val();
        if(password != confirmpassword){
            $('#passmsg').html("<span style='color:red;'>Your password is not match.</span>");
        }else{
            var formdata = $("#registration_form").serialize();
            $.ajax({
                url: 'add-registration.php',
                type: 'POST',
                data: formdata,
                success: function(msg){
                    $("#passmsg").empty();
                    $("#msg").html(msg);
                    $("#registration_form").find("input[type=text], input[type=password], input[type=email]").val("");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                }
            });
        }
    });    
});