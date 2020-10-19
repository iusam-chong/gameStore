$(function () {

    $('form.deleteFromCart').submit(function(e) {
        e.preventDefault(e);

        let url =  window.location.origin + '/gameStore/cart/deleteFromCart';
        requestPhp(this, url, deleteSuccess);
    });

    $('#bill form').submit(function(e) {
        e.preventDefault(e);

        let url =  window.location.origin + '/gameStore/cart/bill';
        requestPhp(this, url, paySuccess);
    });
    
    $('select').change(function(e) {
        e.preventDefault(e);
        $(this).closest('form').submit();  
    });

    $('form.productQuantity').submit(function(e) {
        e.preventDefault(e);

        let url =  window.location.origin + '/gameStore/cart/editQuantity';
        requestPhp(this, url, reCalculateSub);
    });

    initCart();
    cartTotal();
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
                method(event);
            } 
            else {
                alert(response.message);
                location.reload();
            }
        }, error(){
            alert('SERVER ERROR');
            location.reload();
        }
    });
}

function reCalculateSub(event) {

    let price = $(event).closest('tr').find('.price').html();
    let quantity = $(event).closest('tr').find('select').val();
    let subtotal = $(event).closest('tr').find('.subtotal');
    subtotal.html(price*quantity);

    cartTotal();
}

function cartTotal() {
    let total = 0;
    $('.subtotal').each(function() {
        total += Number($(this).html());
    });

    $('#total').html(total);
}

function deleteSuccess(event) {
    
    $(event).closest('tr').remove();
    cartTotal();
    
    let countTr = $('tbody tr').length;
    if (countTr <= 1) {
        location.reload();
    }
}

function paySuccess(event) {
    $(location).attr('href', 'statement');
}

function initCart() {
    $('select').each(function() {
        
        let optionVal = $(this).val();
        let data = $(this).val().split(' ');

        if (data[0] === 'edit') {

            $(this).val(data[1]);
            $(this).closest('form').submit();

            $(this).find('option[value="'+optionVal+'"]').remove();

        } else if (data[0] === 'delete') {

            $(this).closest('tr').find('form.deleteFromCart').submit();
        }
    });
}