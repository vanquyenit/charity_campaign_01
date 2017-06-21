$('ul.pagination').hide();

$(document).on('click', '.tab', function() {
    var scroll = $(this).data('scroll');

    $('#'+scroll).jscroll({
        autoTrigger: true,
        loadingHtml: '<img class="center-block" alt="Loading..." />',
        padding: 0,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div#'+scroll,
        callback: function() {
            $('ul.pagination').remove();
        }
    });
});

$(function() {
    $('#upcoming').jscroll({
        autoTrigger: true,
        loadingHtml: '<img class="center-block" alt="Loading..." />',
        padding: 0,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div#upcoming',
        callback: function() {
            $('ul.pagination').remove();
        }
    });
});

$(function() {
    $('.scroll-load').jscroll({
        autoTrigger: true,
        loadingHtml: '<img class="center-block" alt="Loading..." />',
        padding: 0,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'ol.scroll-load',
        callback: function() {
            $('ul.pagination').remove();
        }
    });
});
