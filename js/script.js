$(".btn-next").click(function() {
  $(".question-list").each(function() {
    $(this).removeClass("active");
    $(this).attr("aria-selected", "false");
  });

  let ref = $(this).attr("href");

  $(".question-list").each(function() {
    if ($(this).attr("href") == ref) {
      $(this).addClass("active");
      $(this).attr("aria-selected", "true");
    }
  });
});

let jsonArray = null;
let arrayArgs = new Array();

$(document).on("click", ".btn-end", function() {
  $(".question-list").each(function() {
    $(this).removeClass("active");
    $(this).attr("aria-selected", "false");
  });

  $(".result-page").toggleClass("invisible visible");
  $(".result-page").addClass("active");
  $(".result-page").attr("aria-selected", "true");

  jsonArray = JSON.stringify(arrayArgs);

  $.post("check-answers.php", "array=" + jsonArray, function(data) {
    console.log(data);
  });
});

$(".variant").on("click", function(event) {
  let arg = {
    question: $(this).attr("parent_id"),
    answer: $(this).attr("answ_id")
  };

  arrayArgs.push(arg);
});
