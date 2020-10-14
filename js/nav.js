$(function () {

    console.log('123s22dsdd');

    // forward action will reload page
    if (!!window.performance && window.performance.navigation.type === 2) {
        window.location.reload();
    }

    // another tab from the same domain says to quit!
    $(window).on("storage",function(e){ 
        var event = e.originalEvent;
        if (event.key == "quit") {
            window.location.reload();
        } else if (event.key == "login") {
            window.location.reload();
        }
    });
    
    navBarControl();

    $('#logout').submit(function (e) {
        e.preventDefault(); 
        logout();
    });

});

function navBarControl() {
    
    let url = window.location.pathname;
    url = url.split('/');

    let thisPage = $('#' + url[2]);
    thisPage.addClass('active');

    thisPage.click(function (e) {
        e.preventDefault();
    });

    // if (~str.indexOf("Yes")) from stackoverflow.com
    if (~url[2].indexOf('manage')) {
        $('#systemmanage').addClass('active');
        $('#systemmanage').click(function (e) {
            e.preventDefault();
        });
    }
}

function logout() {

    let logout = window.location.origin + '/gameStore/logout/destroyCookie';

    $.ajax({
        type: 'POST',
        url: logout,
        dataType: 'JSON',
        success: function (response) {
            if (response.status === 1) {
                localStorage.quit=$.now();
                location.reload();
                //$(location).attr('href', 'index');
            }
        }, error() {
            console.log('something wrong!');
        }
    });
}