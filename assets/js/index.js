//registers a new user
$("#registerSubmit").click(function(){ 
    var postUpdate = new FormData($('#register')[0]);
    $.ajax({
        type: "POST",
        url: "../api/register.php",
        data: postUpdate, 
        processData: false,
        contentType: false,
        cache: false,
        success: function(data) {
            if(data == "0") {
                if(!$('.form form').hasClass('fail')) {
                    $('.form form').prepend('<p class=\"error\">Something went wrong. <span class=\"emoji\">😧</span></p>');
                    $('.form form').addClass('fail');
                }
            } else {
                $('.form').html(data);
            };
        }
    });

    return false;

});

//user login
$("#logInSubmit").click(function(){ 
    var postUpdate = new FormData($('#logIn')[0]);
    $.ajax({
        type: "POST",
        url: "../api/login.php",
        data: postUpdate, 
        processData: false,
        contentType: false,
        cache: false,
        success: function(data) {
            if(data == "0") {
                if(!$('.form form').hasClass('fail')) {
                    $('.form form').prepend('<p class=\"error\">Something went wrong. <span class=\"emoji\">😧</span></p>');
                    $('.form form').addClass('fail');
                }
            } else {
                window.location.href = '/';
            };
        }
    });

    return false;

});