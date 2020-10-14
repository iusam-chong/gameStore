$(function () {

    $('form').submit(function(e) {
        e.preventDefault(e);
        let url =  window.location.origin + '/gameStore/cart/addCart';

        requestPhp(this, url, addCartSuccess);
    });

    $('.pagination .active').click(function(e) {
        e.preventDefault(e);
    });
})

function requestPhp(event, url, method) {

    $.ajax({
        type:'POST',
        url: url,
        data: new FormData(event),
        contentType: false,
        cache: false,
        processData:false,
        dataType: 'JSON',
        success:function(response) {
            if (response.status === true) {
                console.log(response);
                method(event);
            } 
            else {
                console.log(response.message);
                $(location).attr('href', window.location.origin + '/gameStore/login');
            }
        }, error(){
            alert('SERVER ERROR');
            location.reload();
        }
    });
}

function addCartSuccess(event) {
    $(event).find('button').attr('disabled', true);
    $(event).find('button').empty().append('已加入購物車');
}
