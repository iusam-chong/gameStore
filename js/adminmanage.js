$(function () {

    console.log('check js running : 1017');

    $('#newAccount form').submit(function(e) {
        e.preventDefault(e);
        newAccount(this);
    });

    $('.enabledContr form').submit(function(e) {
        e.preventDefault(e);
        modifyEnabledStatus(this);
    });

    $('.productContr form').submit(function(e) {
        e.preventDefault(e);
        modifyProductStatus(this);
    });

    $('.memberContr form').submit(function(e) {
        e.preventDefault(e);
        modifyMemberStatus(this);
    });

    $('.employeeContr form').submit(function(e) {
        e.preventDefault(e);
        modifyEmployeeStatus(this);
    })
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

    let url =  window.location.origin + '/gameStore/adminmanage/editEnabledStatus';

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
                //location.reload();
                console.log(response.message);
                if (response.result === true) {
                    setBtnEnabled(event, true);
                    
                } else {
                    setBtnEnabled(event, false);
                    setBtnProduct(event, false);
                    setBtnMember(event, false);
                    setBtnEmployee(event, false);
                }
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

function modifyProductStatus(event) {

    let url =  window.location.origin + '/gameStore/adminmanage/editProductStatus';

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
                //location.reload();
                console.log(response.message);
                if (response.result === true) {
                    setBtnEnabled(event, true);
                    setBtnProduct(event, true);

                } else {
                    setBtnProduct(event, false);
                }
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

function modifyMemberStatus(event) {

    let url =  window.location.origin + '/gameStore/adminmanage/editMemberStatus';

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
                //location.reload();
                console.log(response.message);
                if (response.result === true) {
                    setBtnEnabled(event, true);
                    setBtnMember(event, true);

                } else {
                    setBtnMember(event, false);
                }
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

function modifyEmployeeStatus(event) {

    let url =  window.location.origin + '/gameStore/adminmanage/editEmployeeStatus';

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
                if (response.result === true) {
                    setBtnEnabled(event, true);
                    setBtnEmployee(event, true);

                } else {
                    setBtnEmployee(event, false);
                }
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

function setBtnEnabled(event, status) {
    let btn = $(event).closest('tr').find('.enabledContr').find('button');
    let input = $(event).closest('tr').find('.enabledContr').find('.status');

    if (status === true) {
        btn.removeClass('btn-danger').addClass('btn-success');
        btn.empty().append('啟用中');
        input.val(1);
    } else {
        btn.removeClass('btn-success').addClass('btn-danger');
        btn.empty().append('停用中');
        input.val(0);
    }  
}

function setBtnProduct(event, status) {
    let btn = $(event).closest('tr').find('.productContr').find('button');
    let input = $(event).closest('tr').find('.productContr').find('.status');

    setBtnStatus(btn, input, status);
}

function setBtnMember(event, status) {
    let btn = $(event).closest('tr').find('.memberContr').find('button');
    let input = $(event).closest('tr').find('.memberContr').find('.status');

    setBtnStatus(btn, input, status);
}

function setBtnEmployee(event, status) {
    let btn = $(event).closest('tr').find('.employeeContr').find('button');
    let input = $(event).closest('tr').find('.employeeContr').find('.status');

    setBtnStatus(btn, input, status);
}

function setBtnStatus(btn, input, status) {
    if (status === true) {
        btn.removeClass('btn-danger').addClass('btn-success');
        btn.empty().append('已授權');
        input.val(1);
    } else {
        btn.removeClass('btn-success').addClass('btn-danger');
        btn.empty().append('未授權');
        input.val(0);
    }
}



