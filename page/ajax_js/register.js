$(document).ready(function() {
    // send code to mail
    $('#sendcode').on('click' , function(){
       
        var email = $('#email').val();
        if(email == ''){
            $('.card-body').prepend("<div id='error' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Curse Conquer!</strong> Please fill in email field.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
        }
        else{
            $.ajax({
                url: 'page/ajax_php/sendcode.php',
                type: 'post',
                data: {
                    type: 'sendcode',
                    email: email,
                },
                cache: false,
                success: function(data){
                    var dataresult = jQuery.parseJSON(data);
                    if(dataresult.done){
                        $('.card-body').prepend("<div id='error' class='alert alert-success alert-dismissible fade show' role='alert'><strong>Curse Conquer!</strong> " + dataresult.message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                    }
                    else if(dataresult.error){
                        $.each(dataresult.message , function(i){
                         $('.card-body').prepend("<div id='error' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Curse Conquer!</strong> " + dataresult.message[i] + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                        })
                    }
                }
            })
        }
    })

    // register
    $('#register').on('click', function() {
        
        var response = grecaptcha.getResponse();
        var username = $('#username').val();
        var password = $('#password').val();
        var rpassword = $('#rpassword').val();
        var email = $('#email').val();
        var confirmcode = $('#confirmcode').val();
        if(username == '' || password== '' || rpassword == '' || email == '' || response == '' || confirmcode ==''){
            $('.card-body').prepend("<div id='error' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Curse Conquer!</strong> Please fill in all fields.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
        }
        else{
            $.ajax({
                url: 'page/ajax_php/register.php',
                type: 'post',
                data: {
                    type: 'register',
                    username: username,
                    password: password,
                    rpassword: rpassword,
                    email:email,
                    captcha:response,
                    confirmcode:confirmcode
                },
                cache: false,
                success: function(data){
                    var dataresult = jQuery.parseJSON(data);
                   if(dataresult.done){
                    $('.card-body').prepend("<div id='error' class='alert alert-success alert-dismissible fade show' role='alert'><strong>Curse Conquer!</strong> " + dataresult.message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                    $("#captchacode").attr('src','page/captcha/captcha.php');
                    $('#username').val('');
                    $('#password').val('');
                    $('#rpassword').val('');
                    $('#email').val('');
                    $('#captcha').val('');
                    $('#confirmcode').val('');
                }
                   else if(dataresult.error){
                       $.each(dataresult.message , function(i){
                        $('.card-body').prepend("<div id='error' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Curse Conquer!</strong> " + dataresult.message[i] + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                       })
                   }
                }
            })
        }
        
    })
})
