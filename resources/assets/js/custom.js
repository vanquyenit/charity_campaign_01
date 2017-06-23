$('.donate_load_form').click(function(){
    var id = $(this).data('campaign-id');
    var _token = $(this).data('hiden');
    var _url = $(this).data('url');

    $.ajax({
        url: _url,
        method: 'POST',
        data :{id : id, _token: _token},
        success : function(data) {
            $('#donate_result').html(data);
        }
    })
})
$(document).ready(function() {
    var url = window.location.pathname;
    var name = url.substring(url.lastIndexOf('/') + 1);

    if (name == 'follower') {
        $('.ProfileNav-item--followers').addClass('is-active');
    } else if (name == 'following') {
        $('.ProfileNav-item--following').addClass('is-active');
    } else {
        $('.ProfileNav-item--tweets').addClass('is-active');
    }
});
