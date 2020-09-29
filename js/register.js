$(function () {
    console.log("register.js is running! working fine:1237");

    $('form').submit(function (e) {
        e.preventDefault();
        console.log("is clicking btn");

        var formData = $(this).serialize();
        $.ajax({
            type:'POST',
            url:'register/signUp',
            data: formData,
            dataType: 'JSON',
            success:function(response) {
                if (response.status === 1) {
                    console.log('register success, redicrect');
                    $(location).attr('href', 'login');
                }
            }, error(){
                console.log('something wrong!');
            }
        });
    });
});