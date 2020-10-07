$(function () {

    console.log('shop is run:248');

    $('form').submit(function(e) {
        e.preventDefault(e);
        addCart(this);
        $(this).find('button').attr('disabled', true);
        $(this).find('button').empty().append('已加入購物車');
    });

    //loginStatus();
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

function loginStatus() {
    // check user logged in ornot
    let url = window.location.origin + '/gameStore/login/loginStatus';

    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'JSON',
        success: function (response) {
            if (response.status === 1) {
                console.log('user logged in');
                //checkLogout();
            }
            if (response.status === 2) {
                console.log('login status:user not logged in');
                //checkLogin();
            }
        }, error() {
            console.log('something wrong!');
        }
    });
}

function getUserProduct()
{
    
}