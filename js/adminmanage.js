$(function () {

    console.log('check js running : 305');

    $('#newAccount form').submit(function(e) {
        e.preventDefault(e);
        newAccount(this);
    });

    $('.enabledContr form').submit(function(e) {
        e.preventDefault(e);
    });
})

function newAccount(event) {

    let url =  window.location.origin + '/gameStore/adminmanage/newAdmin';

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
                location.reload();
            } 
            else {
                console.log(response.status + ' : ' + response.message);
            }
        }, error(){
            console.log('server error. . .');
        }
    });
}

function modifyEnabledStatus(event) {

    let url =  window.location.origin + '/gameStore/membermanage/modifyStatus';

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
                btnModify(event, response.result);
            } 
            else {
                console.log(response.status + ' : ' + response.message);
            }
        }, error(){
            console.log('server error. . .');
        }
    });
}