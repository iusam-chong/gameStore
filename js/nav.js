$(function () {

    let url = window.location.pathname;
    url = url.split('/');

    let thisPage = $('#'+url[2]) ;
    thisPage.addClass('active');

    thisPage.click(function(e) {
        e.preventDefault();
    });
});