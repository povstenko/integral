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

let jsonArray = null;
let arrayArgs = new Array();


$(document).on('click', '.btn-end', function() {
    $('.question-list').each(function() {
        $(this).removeClass('active');
        $(this).attr("aria-selected", 'false');
    });

    $('.result-page').toggleClass('invisible visible');
    $('.result-page').addClass('active');
    $('.result-page').attr("aria-selected", 'true');

    jsonArray = JSON.parse(JSON.stringify(arrayArgs));
    console.log(jsonArray);
    $.ajax({
        type: "POST",
        url: "test.php",
        data: { answers_json: jsonArray },
        success: onAjaxSuccess
    });
});

function onAjaxSuccess(data) {
    // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
    alert(data);
}


$('.variant').on('click', function(event) {
    let arg = new Object();
    arg.question = $(this).attr('parent_id');
    arg.answer = $(this).attr('answ_id');

    arrayArgs.push(arg);
});