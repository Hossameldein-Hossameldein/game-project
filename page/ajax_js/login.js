$(document).ready(function() {
    $('#login').on('click', function() {
        var username = $('#username').val();
        var password = $('#password').val();
        if(username == '' || password== ''){
            $('.card-body').prepend("<div id='error' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Curse Conquer!</strong> Please fill in all fields.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
        }
        else{
            $.ajax({
                url: 'page/ajax_php/login.php',
                type: 'post',
                data: {
                    type: 'login',
                    username: username,
                    password: password,
                },
                cache: false,
                success: function(data){
                    var dataresult = jQuery.parseJSON(data);
                   if(dataresult.done){
                    $('.card-body').prepend("<div id='error' class='alert alert-success alert-dismissible fade show' role='alert'><strong>Curse Conquer!</strong> " + dataresult.message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    document.location.href = 'account';
                   }
                   else if(dataresult.error){
                    $('.card-body').prepend("<div id='error' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Curse Conquer!</strong> " + dataresult.message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                   }
                }
            })
        }
        
    })
})
