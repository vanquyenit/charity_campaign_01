$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
equalheight = function(container){
    var currentTallest = 0,
    currentRowStart = 0,
    rowDivs = new Array(),
    $el,
    topPosition = 0;
    $(container).each(function() {
        $el = $(this);
        $($el).height('auto')
        topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0;
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}
$('.left .person').mousedown(function() {

    if ($(this).hasClass('.active')) {
        return false;
    } else {
        var personName = $(this).find('.name').text(),
            chatId = $(this).data('chat'),
            url = $(this).data('url'),
            thread = $(this).data('thread');
        $('.right .top .name').html(personName);
        $('.chat').removeClass('active-chat');
        $('.left .person').removeClass('active');
        $(this).addClass('active');

        $.get(url, function(data, status) {
            $('.chat').html(data);
            $('.chat').addClass('active-chat');
            $('.chat').attr('data-chat-id', chatId);
            updateScrollbar();
        });
    }
});

$(window).on('keydown', function(e) {

    if (e.which == 13) {
        $('.send').click();

        return false;
    }
})
$(document).on('click', '.send', function() {
    var userId = $('ul.people').find('.active').data('user-id'),
        thread = $('ul.people').find('.active').data('thread'),
        chatId = $('.chat').data('chat-id'),
        url = $('.hide').data('url'),
        error = $('.hide').data('error');

    $.ajax({
        type: "POST",
        url: url,
        data: {
            user_id: userId,
            body: $(".text-body").val(),
            thread_id: thread,
            chat_id: chatId,
        },
        success: function(data) {

            if (data.success) {
                $('.active-chat').append(data.html);
                $(".text-body").val('');
                updateScrollbar();
            }
        },
        error: function (errors) {
            alert(error)
        }
    });
})

var host = $('.hide').data('host'),
    port = $('.hide').data('port'),
    currentUserId = $('.hide').data('user-id');
var link = (port == '') ? host : host + ":" + port;
var socket = io.connect(link);

socket.on('chat', function (data) {
    var data = jQuery.parseJSON(data);

    if (data.success) {
        if (data.user_id != currentUserId) {
            var chatId = $('.active-chat').attr('data-chat-id');

            if (chatId == data.chatId) {
                $('.active-chat').append(data.html);
                updateScrollbar();
            } else {
                console.log(data.preview);
                $('.people').find('.'+data.chatId).find('.preview-message').html(data.preview)
            }
        }
    }

});
function updateScrollbar() {
    $(".active-chat").animate({ scrollTop: $(document).height() }, 800);
}
$(window).load(function() {
    equalheight('.wrapper .fix-height');
});
