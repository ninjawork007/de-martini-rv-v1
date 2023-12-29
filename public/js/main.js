$(document).ready(function () {
    $('#searches').hoverIntent({
        over: function () {
            $(this).find('#advanced-search').slideDown();
        },
        out: function () {
            $(this).find('#advanced-search').slideUp();
        },
        timeout: 1000
    });
    $("#searches select").mouseout(function (e) {
        e.stopPropagation();
    });

    $('#vehicle-specials').bxSlider({
        slideWidth: 160,
        minSlides: 3,
        maxSlides: 3,
        slideMargin: 20
    });

    $('.ui-tabs').tabs();

    $('#sort-by-form select[name="sort_by"]').change(function () {
        var url = window.location.href;
        if (!url.match(/\?/)) {
            if (url.match(/sort_by\=[\w\+]+\&*/))
                url = url.replace(/sort_by\=([\w\+]+)/g, 'sort_by=' + $(this).find('option:selected').val().replace(' ', '+'));
            else
                url = url + '?sort_by=' + $(this).find('option:selected').val().replace(' ', '+');
        } else {
            if (url.match(/sort_by\=[\w\+]+\&*/))
                url = url.replace(/sort_by\=([\w\+]+)/g, 'sort_by=' + $(this).find('option:selected').val().replace(' ', '+'));
            else
                url = url + '&sort_by=' + $(this).find('option:selected').val().replace(' ', '+');
        }
        window.location.href = url;
    });

    $('#is_trade').click(function () {
        $('#is_trade_section').toggle();
    });

    $('#main-nav li a').click(function () {
        $(this).addClass('active');
    });

    var li = $('ul.pure-paginator li');
    li.each(function (i, item) {
        $(item).click(function () {
            var a = $(this).find('a');
            if (a.size()) {
                window.location = a.attr('href');
            }
        });
    });
    li.css({ 'cursor': 'pointer' });
});
