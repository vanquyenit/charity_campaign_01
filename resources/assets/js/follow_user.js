var Follow = function (urlFollowUser, btnFollow, btnUnFollow) {
    this.urlFollowUser = urlFollowUser;
    this.btnFollow = btnFollow;
    this.btnUnFollow = btnUnFollow;
};

Follow.prototype = {
    init: function () {
        var _self = this;
        _self.followOrUnFollowUser();
    },

    followOrUnFollowUser: function () {
        var _self = this;
        var icon = '<i class="fa fa-user-plus"></i> ';
        $(document).on('click', '.follow', function(e) {
            e.preventDefault();
            var thisButton = this;
            var divChangeAmount = $(this).parent();
            var userId = divChangeAmount.data('userId');
            var size = divChangeAmount.data('size');
            var token = $('.hide').data('token');

            $.ajax({
                type: "POST",
                url: _self.urlFollowUser,
                data: {
                    target_id: userId,
                    _token: token
                },
                success: function(data)
                {
                    if (data.result.status) {
                        if ($(thisButton).parent().hasClass('user-actions-follow-button')) {
                            $(thisButton).closest('.UserSmallListItem').fadeOut();
                        }
                        var html = ''
                        html += '<button type="button" class="EdgeButton EdgeButton--primary EdgeButton--'+size+' button-text following-text follow">Following</button>'
                        html += '<button type="button" class="EdgeButton EdgeButton--danger EdgeButton--'+size+' button-text unfollow-text follow">Unfollow</button>'

                        $(thisButton).parent().html(html);
                        $(thisButton).hide();
                    } else {
                        $(thisButton).text(_self.btnFollow).prepend(icon);
                        $(thisButton).parent().find('.following-text').hide()
                        $(thisButton).attr('class', 'EdgeButton EdgeButton--secondary EdgeButton--'+size+' follow-text follow');
                    }
                }
            });
        })
    }
};
