$('.donate_load_form').click(function(){
    var id = $(this).data('campaign-id');
    var _token = $(this).data('hiden');
    var _url = $(this).data('url');

    $.ajax({
        url: _url,
        method: 'POST',
        data :{id : id, _token: _token},
        success : function(data){
            $('#donate_result').html(data);
        }
    })
})
