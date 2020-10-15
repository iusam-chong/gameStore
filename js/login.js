$(function () {

    $('form').submit(function (e) {
        e.preventDefault();
        let url = window.location.origin+window.location.pathname+'/signIn';

        $.ajax({
            type:'POST',
            url: url,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            dataType: 'JSON',
            success:function(response) {
                if (response.status === true) {
                    console.log(response);
                } 
                else {
                    console.log(response.message);
                    //location.reload();
                }
            }, error(){
                alert('SERVER ERROR');
                location.reload();
            }
        });
    });
});