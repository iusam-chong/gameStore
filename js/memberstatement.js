$(function () {

    $('#systemmanage').addClass('active'); 
    $('#membermanage').addClass('active');

    $('#systemmanage').click(function (e) {
        e.preventDefault();
    });
    
    calculateOrder();
    
    $('.pagination .active').click(function(e) {
        e.preventDefault(e);
    });
})

function calculateOrder() {
    $('.order').each(function() {
        let total = 0

        let orderDetails = $(this).find('.orderDetails');
        orderDetails.find('.statement').each(function() {

            let quantity = $(this).find('.quantity').html();
            let price = $(this).find('.price').html();
            let subtotal = quantity*price;

            $(this).find('.subtotal').html(subtotal);
            total += subtotal;
        });

        orderDetails.find('.total').html(total);
    });
}