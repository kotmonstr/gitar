$(document).ready(function () {
    $('.send-file').change(function () {
        SendForm();
    });
});
// отправка фоток на сервер
function SendForm() {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    var fd = new FormData(document.getElementById("send-image"));
    fd.clicks =
        $.ajax({
            url: '/items/upload-images',
            type: "POST",
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function (data) {
                $('#items-files').val(data);
                //ToDo разбить строку превратить в массив и создать превью
                var result = data.split(',');

                for (var k = 0; k < result.length; k++) {
                    $(".photos").append('<img src="/upload/items_images/' + result[k] + '" width="100" height="100">');
                }
            }
        });
}

// удаление картинок при клике
function delImage(id) {
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/items/delete-image',
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

