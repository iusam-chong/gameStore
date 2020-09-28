$(function () {
    console.log("js is running! working fine:1238");

    $('form').submit(function (e) {
        e.preventDefault();
        console.log("is clicking btn");
       
        // var formData = $(this).serialize();

        // $.ajax({
        //     type: 'POST',
        //     url: 'http://localhost:8888/MessageBroad/test.php',
        //     data: formData,
        //     dataType: 'JSON',
        //     success:function() {
                
        //         console.log('maybe success');
        //     },error() {
        //         console.log('something wrong!');
        //     }
        // });

        var formData = $(this).serialize();
        $.ajax({
            type:'POST',
            url:'http://localhost:8888/gameStore/login/login',
            data: formData,
            // dataType: 'JSON',
            success:function(response) {
                console.log('success, userName : '+ response);
            }, error(){
                console.log('something wrong!');
            }
        });
    });
});