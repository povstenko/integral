$('.btn-next').click(function() {
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

$(document).on('click', '.btn-end', function() {
    $('.question-list').each(function() {
        $(this).removeClass('active');
        $(this).attr("aria-selected", 'false');
    });

    $('.result-page').toggleClass('invisible visible');
    $('.result-page').addClass('active');
    $('.result-page').attr("aria-selected", 'true');
});

$('.variant').on('click', function(event) {
    console.log($(this).val());
    var val = $(this).val();
    //$('#output').html(val);
});