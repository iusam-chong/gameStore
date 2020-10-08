$(function () {

    // forward action will reload page
    // console.log('nav is run233');
    if (!!window.performance && window.performance.navigation.type === 2) {
        window.location.reload();
    }

    navBarControl();

    $('#logout').submit(function (e) {
        e.preventDefault(); 
        logout();
    });

    //loginStatus();
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
                $(location).attr('href', 'index');
            }
        }, error() {
            console.log('something wrong!');
        }
    });
}

function loginStatus() {
    // check user logged in ornot
    let url = window.location.origin + '/gameStore/logout/loginStatus';

    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'JSON',
        success: function (response) {
            if (response.status === 1) {
                //console.log('user logged in');
                checkLogout();
            }
            if (response.status === 2) {
                //console.log('login status:user not logged in');
                checkLogin();
            }
        }, error() {
            console.log('something wrong!');
        }
    });
}

function checkLogout() {

    setTimeout(function () {

        let url = window.location.origin + '/gameStore/logout/checkLogout';

        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'JSON',
            success: function (response) {
                if (response.status === 1) {
                    location.reload();
                    //$(location).attr('href', 'index');
                }
                if (response.status === 2) {
                    //console.log("check logout: logged in");
                }
            }, error() {
                console.log('something wrong!');
            },
            complete: checkLogout
        });
    }, 1000);
}

function checkLogin() {

    setTimeout(function () {

        let url = window.location.origin + '/gameStore/logout/loginStatus';

        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'JSON',
            success: function (response) {
                if (response.status === 1) {
                    location.reload();
                    //$(location).attr('href', 'index');
                }
                if (response.status === 2) {
                    //console.log("checkLogin: not logged in");
                }
            }, error() {
                console.log('something wrong!');
            },
            complete: checkLogin
        });
    }, 1500);
}