(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true
        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        if(check){
            const urlGantiPassword = 'https://cors-anywhere.herokuapp.com/https://sinerbiminiproject.000webhostapp.com/api/user/edit_pass';

            var old = document.getElementById("old").value;
            var newPassword = document.getElementById("new").value;
            var newConfirm = document.getElementById("newConfirm").value;
            console.log(old)
            const user = {
                id: '0c536b5c-b1ac-4c19-88b0-03f5cbbccbf3',
                password_lama: old,
                password_baru: newPassword,
                confirm_password_baru: newConfirm
            }

            const fetchData = { 
                method: 'POST', 
                body: JSON.stringify(user),
                headers: {
                    'Content-Type': 'application/json'
                }
            }
            fetch(urlGantiPassword, fetchData)
            .then(res => res.json())
            .then(res => {
                alert(res.message);
            });
        }

        return false
    });



    function validate (input) {
        console.log(input.val)
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).addClass('active');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).removeClass('active');
            showPass = 0;
        }
        
    });


})(jQuery);