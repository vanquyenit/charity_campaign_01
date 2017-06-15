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

        $(".follow").click(function(e) {
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
                        $(thisButton).text(_self.btnUnFollow);
                        $(thisButton).attr('class', 'EdgeButton EdgeButton--danger EdgeButton--'+size+' button-text unfollow-text follow');
                    } else {
                        $(thisButton).text(_self.btnFollow).prepend(icon);
                        $(thisButton).attr('class', 'EdgeButton EdgeButton--secondary EdgeButton--'+size+' follow-text follow');
                    }
                }
            });
        });
    }
};
