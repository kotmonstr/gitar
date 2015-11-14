
$(document).ready(function(){

    $('.miniatute-item img').click(function(){
        $('.miniatute-item img').removeClass('active');
        $(this).addClass('active');
        $('#main-photo').attr('src', $(this).attr('src'));
    });
});
