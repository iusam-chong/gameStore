$(function () {

    console.log('productManage.js is running! working fine : 999099');

    $('.pagination .active').click(function (e) {
        e.preventDefault(e);
    });

    $('.productName').keyup(function (e) {
        checkProdName(this);
        checkFromIsDone(this);
    });

    $('.productPrice').keyup(function () {
        let errMessage = '請輸入正確的價格, 價格不接受數字外的輸入或空值';
        checkPriceAndQuantity(this, errMessage);
        checkFromIsDone(this);
    });

    $('.productQuantity').keyup(function () {
        let errMessage = '請輸入正確的數量, 價格不接受數字外的輸入或空值';
        checkPriceAndQuantity(this, errMessage);
        checkFromIsDone(this);
    });

    $('.productImg').click(function () {
        //$('#productImgSrc').attr('src', null);
        $(this).closest('.productImgContr').find('.productImgSrc').attr('src', null);
    });

    $('.productImg').change(function () {
        $(this).closest('div').find('.spareImg').removeClass('hidden');
        readURL(this);

        let errMessage = '圖片格式只支援JPEG/PNG/GIF, 檔案大小不能超過5mb';
        checkProdImg(this, errMessage);
        checkFromIsDone(this);
    });

    $('#newProduct form').submit(function (e) {
        e.preventDefault();

        if (!checkFromIsDone(this)) {
            return false;
        }

        let url = window.location.origin + window.location.pathname + '/newProduct';
        let method = null; // after success do this method
        requestPhp(this, url, method);
    });

    $('.editProduct form').submit(function (e) {
        e.preventDefault();

        let url = window.location.origin + window.location.pathname + '/editProduct';
        let method = null; // after success do this method
        requestPhp(this, url, method);
    });

    $('.deleteProduct form').submit(function (e) {
        e.preventDefault();

        let url = window.location.origin + window.location.pathname + '/deleteProduct';
        let method = null; // after success do this method
        requestPhp(this, url, method);
    });
});

function checkFromIsDone(event) {
    let name = $(event).closest('form').find('.productName');
    let price = $(event).closest('form').find('.productPrice');
    let quantity = $(event).closest('form').find('.productQuantity');
    let img = $(event).closest('form').find('.productImg');

    let status = true;

    if (!checkProdName(name)) {
        status = false;
    }

    if (!checkPriceAndQuantity(price)) {
        status = false;
    }

    if (!checkPriceAndQuantity(quantity)) {
        status = false;
    }

    if (!checkProdImg(img)) {
         status = false;
    }

    // name = $(event).closest('form').find('.productName').val();
    // price = $(event).closest('form').find('.productPrice').val();
    // quantity = $(event).closest('form').find('.productQuantity').val();

    // console.log(name + " " + price + " " + quantity);

    if (status === true) {
        $(event).closest('form').find('.submitBtn').removeAttr('disabled');
        return true;
    } else {
        $(event).closest('form').find('.submitBtn').attr('disabled', true);
        return false;
    }
}

function checkProdName(event) {
    let str = $(event).val().length;
    let onlySpace = $.trim($(event).val()).length;

    if (str < 1) {
        return false;
    }
    if (onlySpace < 1 && str > 0) {
        $(event).closest('div').find('p').html('商品名稱不能為空或只有空白鍵');
        return false;
    } else {
        $(event).closest('div').find('p').html('');
    }
    return true;
}

function checkPriceAndQuantity(event, errMessage) {
    let number = $(event).val();
    let numLen = $(event).val().length;
    let newNum = number.replace(/\s+/g, '');

    if (numLen < 1) {
        return false;
    }
    if (number.match(/\s+/g)) {
        $(event).val(newNum);
        return false;
    }
    if (!number.match(/^[1-9][0-9]*$/)) {
        $(event).closest('div').find('p').html(errMessage);
        return false
    } else {
        $(event).closest('div').find('p').html('');
    }
    return true;
}

function checkProdImg(event, errMessage) {
    let input = $(event)[0].files[0];
    let allowed = ["jpeg", "png", "gif"];
    let found = false;

    if (input === undefined) {
        let isEditProduct = $(event).closest('.editProduct')[0];
        if (isEditProduct) {
            $(event).closest('div').find('p').html('');
            return true;
        }
        return false;
    }

    allowed.forEach(function (extension) {
        if (input.type.match('image/' + extension)) {
            found = true;
        }
    })

    if (!found || input.size > 1024 * 1024 * 5) {
        $(event).closest('div').find('p').html(errMessage);
        return false;
    } else {
        $(event).closest('div').find('p').html('');
    }
    return true;
}

function readURL(input) {

    if (input.files && input.files[0]) {
        
        let reader = new FileReader();
        reader.onload = function (e) {
            $(input).closest('div').find('.spareImg').addClass('hidden');
            $(input).closest('.productImgContr').find('.productImgSrc').attr('src', e.target.result);
            //$("#productImgSrc").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function requestPhp(event, url, method) {

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
                //console.log(response);
                location.reload();
            }
            else {
                alert(response.message);
                location.reload();
            }
        }, error() {
            alert('SERVER ERROR');
            location.reload();
        }
    });
}