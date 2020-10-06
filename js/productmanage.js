$(function () {

    console.log('productManage.js is running! working fine:1259');

    $('.productImg').click(function() {
        //console.log('click');
        //$('#productImgSrc').attr('src', null);
        $(this).closest('.productImgContr').find('.productImgSrc').attr('src', null);
    });

    $('.productImg').change(function() {
        readURL(this);
    });
    
    $('#newProduct form').submit(function(e) {
        e.preventDefault();
        //console.log('new porduct click');
        newProduct(this);
    });

    $('.editProduct form').submit(function(e) {
        e.preventDefault();
        //console.log('edit product click');
        editProduct(this);
    });

    $('.deleteProduct form').submit(function(e) {
        e.preventDefault();
        deleteProduct(this);
    });
});

function readURL(input) {

    if (input.files && input.files[0]) {

        let reader = new FileReader();

        reader.onload = function (e) {
            $(input).closest('.productImgContr').find('.productImgSrc').attr('src', e.target.result);
            //$("#productImgSrc").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function newProduct(data) {

    let url = window.location.origin+window.location.pathname+'/newProduct';

    $.ajax({
        type:'POST',
        url: url,
        data: new FormData(data),
        contentType: false,
        cache: false,
        processData:false,
        dataType: 'JSON',
        success:function(response) {
            if (response.status === 1) {
                console.log('everything fine');
                
                location.reload();
            } 
            else if (response.status === 2) {
                console.log(response.img);
            }
        }, error(){
            console.log('something wrong!');
        }
    });
}

function editProduct(data) {
    
    let url = window.location.origin+window.location.pathname+'/editProduct';

    $.ajax({
        type:'POST',
        url: url,
        data: new FormData(data),
        contentType: false,
        cache: false,
        processData:false,
        //dataType: 'JSON',
        success:function(response) {
            console.log(response);
            location.reload();
            // if (response.status === 1) {
            //     console.log('everything fine');
                
            //     location.reload();
            // } 
            // else if (response.status === 2) {
            //     console.log(response.img);
            // }
        }, error(){
            console.log('something wrong!');
        }
    });
}

function deleteProduct(data) {
    
    let url = window.location.origin+window.location.pathname+'/deleteProduct';

    $.ajax({
        type:'POST',
        url: url,
        data: new FormData(data),
        contentType: false,
        cache: false,
        processData:false,
        //dataType: 'JSON',
        success:function(response) {
            console.log(response);
            location.reload();
            // if (response.status === 1) {
            //     console.log('everything fine');
                
            //     location.reload();
            // } 
            // else if (response.status === 2) {
            //     console.log(response.img);
            // }
        }, error(){
            console.log('something wrong!');
        }
    });
}