//プルダウン
$(document).ready(function () {
  $(".menu").on("click", function () {
    $(".g-nav").slideToggle();
  });
});

$(".menu-trigger").click(function () {
  $(this).toggleClass('active');
});

//モーダル
$(function () {
  $('.update-icon').on('click', function () {
    var $this = $(this);
    var getId = $this.children().data("id");
    var getPost = $this.children().data("post");

    PostId = document.getElementById("id");
    PostId.value = getId;
    PostPost = document.getElementById("posts");
    PostPost.value = getPost;

    $('.modal-container').addClass('active');
    return false;
  });

  $(document).on('click', function (e) {
    if (!$(e.target).closest('.modal-body').length) {
      $('.modal-container').removeClass('active');
    }
  });
});
