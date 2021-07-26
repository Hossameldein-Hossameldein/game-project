$(document).ready(function() {
    var showforget = false;
    $('#showforget').click(function(){

        if(showforget){
            $('.forget-form').fadeOut(500);
        }
        else{
            $('.forget-form').fadeIn(500);
        }
        showforget = !showforget;
    })
    $('#forget').on('click', function() {
        var oldpass = $('#oldpass').val();
        var newpass = $('#newpass').val();
        var confirmpass = $('#confirmpass').val();
        if(oldpass == '' || newpass== '' || confirmpass==''){
            $('.card-body').prepend("<div id='error' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Curse Conquer!</strong> Please fill in all fields.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
        }
        else{
            $.ajax({
                url: 'page/ajax_php/forget.php',
                type: 'post',
                data: {
                    type: 'forget',
                    oldpass: oldpass,
                    newpass: newpass,
                    confirmpass : confirmpass
                },
                cache: false,
                success: function(data){
                    var dataresult = jQuery.parseJSON(data);
                   if(dataresult.done){
                    $('.forget-form .card-body').prepend("<div id='error' class='alert alert-success alert-dismissible fade show' role='alert'><strong>Curse Conquer!</strong> " + dataresult.message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                   }
                   else if(dataresult.message){
                    $.each(dataresult.message , function(i){
                        $('.forget-form .card-body').prepend("<div id='error' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Curse Conquer!</strong> " + dataresult.message[i] + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                       })
                   }
                }
            })
        }
        
    })
})
