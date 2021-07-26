$(document).ready(function() {
    $('#buy').on('click', function() {
        var points = $('#points').val();

        if(points == '' || points== 0){
            $('.card-body').prepend("<div id='error' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Curse Conquer!</strong> Please fill in all fields.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
        }
        else{
            $.ajax({
                url: 'page/ajax_php/checkout.php',
                type: 'post',
                data: {
                    type: 'checkout',
                    points: points,
                },
                cache: false,
                success: function(data){
					//alert(data);
                    var dataresult = jQuery.parseJSON(data);
                   if(dataresult.done){
                    $('.card-body').prepend("<div id='error' class='alert alert-success alert-dismissible fade show' role='alert'><strong>Curse Conquer!</strong> " + dataresult.message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    document.location.href = 'paynow';
                   }
                   else if(dataresult.error){
                    $('.card-body').prepend("<div id='error' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Curse Conquer!</strong> " + dataresult.message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
                   }
                }
            })
        }
        
    })
})
