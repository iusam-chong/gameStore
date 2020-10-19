$(function () {

    $('form').submit(function (e) {
        e.preventDefault();
        let url = window.location.origin+window.location.pathname+'/signIn';
        requestPhp(this, url, loginSuccess, loginFail);    
    });

    $('input').keyup(function () {
          setBtn();
    });
});

function requestPhp(event, url, success, fail) {
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
                success();
            } 
            else {
                fail(response.message);
            }
        }, error(){
            alert('SERVER ERROR');
            location.reload();
        }
    });
}

function setBtn() {
    if ($('#userName').val().length > 0 && $('#password').val().length > 0) {
        $('#loginBtn').removeAttr('disabled');
    } else {
        $('#loginBtn').attr('disabled', true);
    }
}

function loginSuccess() {
    $(location).attr('href', 'index');
}

function loginFail(errMessage) {
    $('#errContent').removeClass("hidden");
    $('#errMessage').html(errMessage);
}