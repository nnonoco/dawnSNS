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
  var open = $('.update-icon'),
    container = $('.modal-container'),
    post = JSON.parse('<?php echo $post_json; ?>');

  open.on('click', function () {
    var PostId = document.querySelector('input[name="id"]');
    PostId.value = post['id'];
    var PostPosts = document.querySelector('input[name="posts"]');
    PostPosts.value = post['posts'];
    var PostUp = document.querySelector('input[name="updated_at"]');
    PostUp.value = post['updated_at'];
    console.log(PostId);
    container.addClass('active');
    return false;
  });

  $(document).on('click', function (e) {
    if (!$(e.target).closest('.modal-body').length) {
      container.removeClass('active');
    }
  });
});
