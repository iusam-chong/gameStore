$(function () {

    let url = window.location.pathname;
    url = url.split('/');

    let thisPage = $('#'+url[2]) ;
    thisPage.addClass('active');

    thisPage.click(function(e) {
        e.preventDefault();
    });

    let logout = window.location.origin+'/gameStore/logout/destroyCookie';

    $('#logout').click(function(e) {
        $.ajax({
            type:'POST',
            url: logout,
            data: new FormData(data),
            dataType: 'JSON',
            success:function(response) {
                if (response.status === 1) {
                    //console.log(response.message);
                    $(location).attr('href', 'index');
                    //location.reload();
                }
            }, error(){
                console.log('something wrong!');
            }
        });
    });
});