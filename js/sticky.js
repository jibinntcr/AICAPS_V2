$(window).scroll(function () {
  if ($(this).scrollTop() > 1) {
    $(".header-section").addClass("sticky");
  } else {
    $(".header-section").removeClass("sticky");
  }
});
