function getItemsByCat(id){
    //alert(id);
    var csrf_token = $("meta[name=csrf-token]").attr("content");
    $.ajax({
        url: '/items/get-items-by-cat-id',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id,
            _csrf: csrf_token
        },
        cache: false,
        async: false,
        success: function (data) {
            $('.guitar-main-page-block').html(data);
        },
        complete: function(){
            $('.guitar-main-page-block').html(data);
        }
    });
}
