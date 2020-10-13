$(function () {

    console.log('cart is run:2533');

    $('.deleteFromCart').submit(function(e) {
        e.preventDefault(e);
        deleteFromCart(this);
    });

    $('#bill form').submit(function(e) {
        e.preventDefault(e);
        bill();
    });
    
    $('select').change(function(e) {
        e.preventDefault(e);
        $(this).closest('form').submit();  
    });

    $('.productQuantity form').submit(function(e) {
        e.preventDefault(e);
        editCartQuantity(this);
    });
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

function editCartQuantity(event) {

    let url =  window.location.origin + '/gameStore/cart/editQuantity';

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
                console.log(response.message);
                console.log(response.result);

                showNewVar(event);
            } 
            else {
                console.log(response.status + ' : ' + response.message);
            }
        }, error(){
            console.log('server error. . .');
        }
    });
}

function showNewVar(event)
{
    let price = $(event).closest('tr').find('.price').html();
    let quantity = $(event).closest('tr').find('select').val();
    let subtotal = $(event).closest('tr').find('.subtotal');
    subtotal.html(price*quantity);

    let total = 0;
    $('.subtotal').each(function() {
        total += Number($(this).html());
    });

    $('#total').html(total);
}