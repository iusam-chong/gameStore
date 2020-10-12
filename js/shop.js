$(function () {

    console.log('shop is run:250');

    $('form').submit(function(e) {
        e.preventDefault(e);
        addCart(this);
        $(this).find('button').attr('disabled', true);
        $(this).find('button').empty().append('已加入購物車');
    });

    $('.pagination .active').click(function(e) {
        e.preventDefault(e);
    });
})

function addCart(data) {

    let url =  window.location.origin + '/gameStore/cart/addCart';

    $.ajax({
        type:'POST',
        url: url,
        data: new FormData(data),
        contentType: false,
        cache: false,
        processData:false,
        dataType: 'JSON',
        success:function(response) {
            //console.log(response);
            if (response.status === 1) {
                console.log('add to cart success!');
            } 
            else if (response.status === 2) {
                console.log('already add to cart');
            }
            else if (response.status === 3) {
                console.log('no login, going redirect');
                $(location).attr('href', 'login');
            }
        }, error(){
            console.log('something wrong!');
        }
    });
}
