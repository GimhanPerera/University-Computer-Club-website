
$(function() {
    $('#scroll_btn').on('click', function(e) {
        e.preventDefault();
        var target = $('#scroll_btn');
        if (target.length) {
            $('html, body').animate({
                scrollTop: $("#nextone").offset().top
            }, 500, 'linear');
        }
    });
});