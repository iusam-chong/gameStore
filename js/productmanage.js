$(function () {

    console.log("productManage.js is running! working fine:1253");

    $('#productImg').click(function() {
        $('#productImgSrc').attr('src', null);
    });

    $("#productImg").change(function() {
        //$("#productImgSrc").show();
        readURL(this);
    });
    
    $('#newProduct form').submit(function(e) {

        e.preventDefault();
        console.log('submit click');

        let url = window.location.origin+window.location.pathname+'/newProduct';
        //let formData = $(this).serialize();

        $.ajax({
            type:'POST',
            url: url,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            dataType: 'JSON',
            success:function(response) {
                if (response.status === 1) {
                    console.log('everything fine');
                    // console.log(response.name);
                    // console.log(response.price);
                    // console.log(response.quantity);
                    // console.log(response.description);

                    //console.log(response.img);
                    //location.reload();
                } 
                else if (response.status === 2) {
                    console.log(response.img);
                }
            }, error(){
                console.log('something wrong!');
            }
        });
    });
});

function readURL(input) {

    if (input.files && input.files[0]) {

        let reader = new FileReader();

        reader.onload = function (e) {
            $("#productImgSrc").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}