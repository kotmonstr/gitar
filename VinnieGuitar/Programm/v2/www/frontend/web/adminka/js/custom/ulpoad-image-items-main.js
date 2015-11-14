$(document).ready(function () {
    $('.send-main-file').change(function () {
        SendFormMain();
    });
});
// отправка фоток на сервер
function SendFormMain() {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    var fd = new FormData(document.getElementById("send-image-main"));
    fd.clicks =
        $.ajax({
            url: '/items/upload-image-main',
            type: "POST",
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function (data) {
                $('#items-main_image').val(data.name);
                //ToDo разбить строку превратить в массив и создать превью
                          $(".photos-main").html('');
                          $(".photos-main").append('<img src="/upload/items_images_main/' + data.name + '" width="490" height="150">');

            }
        });
}

// удаление картинок при клике
function delImageMain(id) {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/items/delete-image-main',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id,
            _csrf: csrf_token
        },
        cache: false,
        async: false,
        success: function (data) {
            $('#img-'+id).hide();
        },
        complete: function(){
            $('#img-'+id).hide();
        }
    });
}

