var $messages = $('.messages-content'),
    d, h, m,
    i = 0;

$(window).load(function() {
    $(".messages").animate({ scrollTop: $(document).height() }, 800);
});

function updateScrollbar() {
    $(".messages").animate({ scrollTop: $(document).height() }, 5000);
}

function setDate() {
    d = new Date()

    if (m != d.getMinutes()) {
        m = d.getMinutes();
        $('<div class="timestamp">' + d.getHours() + ':' + m + '</div>').appendTo($('.message:last'));
    }
}

function insertMessage() {
    msg = $('.message-input').val();

    if ($.trim(msg) == '') {
        return false;
    }

    $('<div class="message message-personal">' + msg + '</div>').appendTo($('.messages-content')).addClass('new');
    setDate();
    $('.message-input').val(null);
    updateScrollbar();
}

$(window).on('keydown', function(e) {
    if (e.which == 13) {
        $('.message-submit').click();
        return false;
    }
})

$(document).ready(function() {
    $('#show-box-chat').click(function() {
        $('.chat').fadeIn(300);
        $(this).fadeOut();
        updateScrollbar();
    })
    $('#minim_chat_window').on('click', function() {
        $('.messages').slideToggle(500, 'swing');
        $('.message-box').fadeToggle(300, 'swing');
    });
    $('.chat-close').on('click', function(e) {
        e.preventDefault();
        $('.chat').fadeOut(300);
        $('#show-box-chat').fadeIn(300);
    });

    var host = $('.hide-chat').data('host');
    var port = $('.hide-chat').data('port');
    var link = (port == '') ? host : host + ":" + port;
    var socket = io.connect(link);

    socket.on('message', function (data) {
        var data = $.parseJSON(data);
        campaignId = $('.hide-campaign-id').data('campaignId');
        currentUserId = $('.hide-user-id').data('currentUserId');

        if (data.success && data.campaign_id == campaignId) {
            if (data.user_id != currentUserId) {
                $('.chat').fadeIn(300);
                $('.messages-content').append(data.html);
                updateScrollbar();
            }
        }
    });

    $('.message-submit').click(function() {
        campaignId = $('.hide-chat').data('campaignId');
        content = $('.message-input').val();
        routeChat = $('.hide-chat').data('routeChat');

        $.ajax({
            type: 'POST',
            url: routeChat,
            dataType: 'JSON',
            data: {
                'content': content,
                'campaign_id': campaignId,
            },
            success: function(data) {
                if (data.success) {
                    insertMessage();
                }
            }
        });
    });
});
