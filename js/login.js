$(function () {
    console.log("login.js is running! working fine:1240");

    $('form').submit(function (e) {
        e.preventDefault();
        console.log("is clicking btn");

        var formData = $(this).serialize();
        $.ajax({
            type:'POST',
            url:'login/signIn',
            data: formData,
            dataType: 'JSON',
            success:function(response) {
                if (response.status === 1) {
                    console.log('login success');
                    console.log(response.message);
                }
            }, error(){
                console.log('something wrong!');
            }
        });
    });
});