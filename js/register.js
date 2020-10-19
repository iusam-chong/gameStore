$(function () {

    $('form').submit(function (e) {
        e.preventDefault();
        let url = window.location.origin + window.location.pathname + '/signUp';
        requestPhp(this, url, signUpSuccess, signUpFail);
    });

    $('input').keyup(function () {
        setBtn();
    });
});

function requestPhp(event, url, success, fail) {
    $.ajax({
        type: 'POST',
        url: url,
        data: new FormData(event),
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'JSON',
        success: function (response) {
            if (response.status === true) {
                success();
            }
            else {
                console.log(response.message);
                fail(response.message);
            }
        }, error() {
            alert('SERVER ERROR');
            location.reload();
        }
    });
}

function setBtn() {
    let userName = $('#userName').val().length;
    let password = $('#password').val().length;
    let passwordConfrim = $('#password').val().length;

    if (userName > 0 && password > 0 && passwordConfrim > 0) {
        $('#SignUpBtn').removeAttr('disabled');
    } else {
        $('#SignUpBtn').attr('disabled', true);
    }
}

function signUpSuccess() {
    $(location).attr('href', 'login');
}

function signUpFail(errMessage) {
    $('#errContent').removeClass("hidden");
    $('#errMessage').html(errMessage);
}