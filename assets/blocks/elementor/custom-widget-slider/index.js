import $ from 'jquery';
import 'slick-carousel';
if ($('.js-slick-init')) {
  $('.js-slick-init').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    arrows: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1024,
        settings: { slidesToShow: 2 },
      },
      {
        breakpoint: 768,
        settings: { slidesToShow: 1 },
      },
    ],
  });
}
