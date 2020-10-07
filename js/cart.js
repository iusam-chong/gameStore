$(function () {

    console.log('cart is run:251');

    $('.deleteFromCart').submit(function(e) {
        e.preventDefault(e);
        console.log('dltBtn is click');
        deleteFromCart(this);
    });

    $('#bill form').submit(function(e) {
        e.preventDefault(e);
        console.log('bill is click');
        bill();
    });
    //loginStatus();
})

function deleteFromCart(data) {

    let url =  window.location.origin + '/gameStore/cart/deleteFromCart';

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
                console.log('delete from cart success!');
                location.reload();
            } 
            else if (response.status === 2) {
                console.log('this product not found in cart');
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

function bill() {

    let url =  window.location.origin + '/gameStore/cart/bill';

    $.ajax({
        type:'POST',
        url: url,
        contentType: false,
        cache: false,
        processData:false,
        dataType: 'JSON',
        success:function(response) {
            console.log(response);
            if (response.status === 1) {
                console.log('bill success!');
                location.reload();
            } 
            else if (response.status === 2) {
                console.log('product get wrong');
            }
            else if (response.status === 3) {
                console.log('no login, going redirect');
                $(location).attr('href', 'login');
            }
        }, error(){
            console.log('bill something wrong!');
        }
    });
}