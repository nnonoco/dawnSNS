$(document).ready(function () {
  $(".menu").on("click", function () {
    $(".g-nav").slideToggle();
  });
});

$(".menu-trigger").click(function () {
  $(this).toggleClass('active');
});
