$(document).ready(function(){
    //$('.system').hide();
    $('.system').slideDown('slow');


    setTimeout (function(){
        $('.system').slideUp('slow');
    }, 5000);
});