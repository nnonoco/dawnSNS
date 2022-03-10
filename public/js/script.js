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
  $(".update-icon").each(function () {
    $(this).on("click", function () {
      var $this = $(this);
      var getId = $this.children().data("id");
      var getPost = $this.children().data("post");

      document.getElementById("id").removeAttribute("value");
      document.getElementById("posts").removeAttribute("value");

      var element = document.getElementById("id");
      element.defaultValue = getId;
      var elementPost = document.getElementById("posts");
      elementPost.defaultValue = getPost;

      $(".modal-container").addClass('active');
      return false;
    });
  });
  $(document).on('click', function (e) {
    if (!$(e.target).closest('.modal-body').length) {
      $('.modal-container').removeClass('active');
    }
  });
});
