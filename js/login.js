$(function () {

    //console.log("login.js is running! working fine:1243");
    
    $('form').submit(function (e) {
        e.preventDefault();
        //console.log("is clicking btn");

        let url = window.location.origin+window.location.pathname+'/signIn';
        let formData = $(this).serialize();

        $.ajax({
            type:'POST',
            url: url,
            data: formData,
            dataType: 'JSON',
            success:function(response) {
                if (response.status === 1) {
                    //console.log(response.message);
                    location.reload();
                }
            }, error(){
                console.log('something wrong!');
            }
        });
    });
});