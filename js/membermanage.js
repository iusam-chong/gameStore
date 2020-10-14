$(function () {

    console.log('check js running : 288');

    $('.elementContr form').submit(function(e) {
        e.preventDefault(e);
        modifyStatus(this);
    });

    $('.pagination .active').click(function(e) {
        e.preventDefault(e);
    });
})

function modifyStatus(event) {

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
                alert(response.message);
                location.reload();
            }
        }, error(){
            console.log('server error. . .');
        }
    });
}

function btnModify(event, result) {

    let btn = $(event).closest('.elementContr').find('button');
    let input = $(event).closest('.elementContr').find('#status');

    if (result) {
        btn.removeClass('btn-danger').addClass('btn-success');
        btn.empty().append('啟用中');
        input.val(result);
    } else {
        btn.removeClass('btn-success').addClass('btn-danger');
        btn.empty().append('停用中');
        input.val(result);
    } 
}