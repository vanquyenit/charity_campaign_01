var Approve = function (
    url, btnApprove, btnRemove, urlConfirmContribution, btnConfirm, messageConfirm,
    joined, waiting, contributeConfirmed, contributeWaiting
    ) {
    this.url = url;
    this.btnApprove = btnApprove;
    this.btnRemove = btnRemove;
    this.urlConfirmContribution = urlConfirmContribution;
    this.btnConfirm = btnConfirm;
    this.messageConfirm = messageConfirm;
    this.joined = joined;
    this.waiting = waiting;
    this.contributeConfirmed = contributeConfirmed;
    this.contributeWaiting = contributeWaiting;
};

Approve.prototype = {
    init: function () {
        var _self = this;
        _self.approveOrRemove();
        _self.confirmContribution();
    },

    approveOrRemove: function () {
        var _self = this;
        $(document).on('click', '.approve', function(e) {
            e.preventDefault();
            var thisButton = this;
            var thisStatus = $(this).closest('tr').find('.badge');
            var divChangeAmount = $(this).parent();
            var userId = divChangeAmount.data('userId');
            var campaignId = divChangeAmount.data('campaignId');
            var token = $('.hide').data('token');
            var icon = '<i class="fa fa-user-plus"></i> ';

            BootstrapDialog.confirm(_self.messageConfirm, function (result) {
                if (result) {
                    $.ajax({
                        type: "POST",
                        url: _self.url,
                        data: {
                            'user_id': userId,
                            'campaign_id': campaignId,
                            '_token': token
                        },
                        success: function (data) {
                            if (data.status) {
                                var html = ''
                                html += '<button type="button" class="EdgeButton EdgeButton--primary EdgeButton--small button-text following-text approve">' + _self.joined +  '</button>'
                                html += '<button type="button" class="EdgeButton EdgeButton--danger EdgeButton--small button-text unfollow-text approve">' + _self.btnRemove + '</button>'
                                $(thisButton).parent().html(html);
                                $(thisButton).hide();
                            } else {
                                $(thisButton).text(_self.btnApprove).prepend(icon);
                                $(thisButton).parent().find('.following-text').hide()
                                $(thisButton).attr('class', 'EdgeButton EdgeButton--secondary EdgeButton--small follow-text approve');
                            }
                        }
                    });
                }
            });
        })
    },

    confirmContribution: function () {
        var _self = this;
        $(document).on('click', '.confirm', function(e) {
            e.preventDefault();
            var thisButton = this;
            var thisStatus = $(this).closest('tr').find('.badge');
            var divChangeAmount = $(this).parent();
            var contributionId = divChangeAmount.data('contributionId');
            var token = $('.hide').data('token');
            var icon = '<i class="fa fa-user-plus"></i> ';

            BootstrapDialog.confirm(_self.messageConfirm, function (result) {
                if (result) {
                    $.ajax({
                        type: "POST",
                        url: _self.urlConfirmContribution,
                        data: {
                            'contribution_id': contributionId,
                            '_token': token
                        },
                        success: function(data)
                        {
                            if (data.status) {
                                var html = ''
                                html += '<button type="button" class="EdgeButton EdgeButton--primary EdgeButton--small button-text following-text confirm">' + _self.joined +  '</button>'
                                html += '<button type="button" class="EdgeButton EdgeButton--danger EdgeButton--small button-text unfollow-text confirm">' + _self.btnRemove + '</button>'
                                $(thisButton).parent().html(html);
                                $(thisButton).hide();
                            } else {
                                $(thisButton).text(_self.btnApprove).prepend(icon);
                                $(thisButton).parent().find('.following-text').hide()
                                $(thisButton).attr('class', 'EdgeButton EdgeButton--secondary EdgeButton--small follow-text confirm');
                            }
                        }
                    });
                }
            });
        })
    }
};
