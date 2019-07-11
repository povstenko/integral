$('.btn-next').click(function() {
    let opa = $('nav-pills');

    $('.question-list').each(function() {
        $(this).removeClass('active');
        $(this).attr("aria-selected", 'false');
    });

    let ref = $(this).attr('href');

    $('.question-list').each(function() {
        if ($(this).attr('href') == ref) {
            $(this).addClass('active');
            $(this).attr("aria-selected", 'true')
        }
    });
});