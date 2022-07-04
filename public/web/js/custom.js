jQuery(document).ready(function($) {
  var currentYear = new Date().getFullYear();
  $(".copyright .year").text(currentYear);
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
	if (scroll >= 50) {
		$("header").addClass("sticky");
		$(".back-to-top").fadeIn();
	} else {
		$("header").removeClass("sticky");
		$(".back-to-top").fadeOut();
	}
  });
  if ($(".rotating").length > 0) {
    $("#hero .rotating").Morphext({
      animation: "flipInX",
      separator: ",",
      speed: 3000
    });
  }
  if ($(".wow").length > 0) {
    new WOW().init();
  }
  $(".back-to-top").click(function() {
    $("html, body").animate({ scrollTop: 0 }, 10);
  });
  $(".menu-btn").click(function() {
    $("body").toggleClass("menu-open");
    if ($("body").hasClass("menu-open")) {
      $("nav.menu").fadeIn();
      $("nav.menu > ul").animate({ left: 0 }, "fast");
    } else {
      $("nav.menu > ul").animate({ left: "-100%" }, "fast");
      $("nav.menu").fadeOut(function() {
        $(".sub-menu").removeClass("active");
      });
    }
  });
  $(".sub-menu > a").click(function(e) {
    e.preventDefault();
    if ($("body").hasClass("menu-open")) {
      $(this).parent("li").toggleClass("active");
      if ($(".menu-item .title").hasClass("active")) {
        $(".menu-item, .menu-item .title").removeClass("active");
      }
    }
  });
  $(".mega-menu .title").click(function(e) {
    if ($("body").hasClass("menu-open")) {
      e.preventDefault();
      $(this).toggleClass("active");
      var a = $(this).parents(".menu-item").find(".sub-title");
      if ($(this).parents(".menu-item").find(".sub-title").length) {
        $(this).parents(".menu-item").toggleClass("active");
      }

    }
  });
  $(document).on('click', "nav.menu", function(e) {
    var container = $("nav.menu ul");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      $(".menu-btn").trigger("click");
    }
  });
  if ($(window).width() < 992) {
    $(".footer-link .footer-link-title").click(function(e) {
      $(this).toggleClass("active").parents(".col-md-12").toggleClass("active");
      $(this).next("ul").stop().toggle();
    });
    $(".footer-link .footer-mega-link").click(function(e) {
      $(".foot-mega-menu").toggleClass("active");
      $(this).parents(".foot-mega-menu").toggleClass("active");
    });
  }
  if ($(".client-slider").length > 0) {
    $('.client-slider').slick({
      infinite: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }]
    });
  }
});
jQuery(window).on('load', function() {
  $("#preloader").delay(100).fadeOut("slow", function() {
    $(this).remove();
  });
});