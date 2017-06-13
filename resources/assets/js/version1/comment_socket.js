$(document).ready(function(){
    var host = $('.hide-comment').data('host');
    var port = $('.hide-comment').data('port');
    var link = (port == '') ? host : host + ":" + port;
    var socket = io.connect(link);

    socket.on('comment', function (data) {
        var data = $.parseJSON(data);
        campaignId = $('.hide-comment').data('campaignId');

        if (data.success && data.campaign_id == campaignId) {
            $('#text').val('');
            $('#comments-list').prepend(data.html);
            $('#count_comment').html(data.count);
        }
    });
});
