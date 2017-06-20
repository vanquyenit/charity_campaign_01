 $('.close-user-follow').click(function() {
    $(this).closest('.account-summary').fadeOut(1000);
})
 $('.show_all_follow').click(function(e) {
    e.preventDefault();
    $('.WhoToFollow').css('max-height', 'inherit');
    $(this).parent().fadeOut(300);
})
