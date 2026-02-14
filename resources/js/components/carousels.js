// resources/js/components/carousels.js
import Swiper from "swiper";
import { Navigation, Autoplay } from "swiper/modules";

export function initCarousels() {
  document.querySelectorAll(".carousel").forEach((carousel) => {
    if (carousel.swiper) return;

    const wrap = carousel.closest(".carousel-wrap");
    if (!wrap) return;

    const nextEl = wrap.querySelector(".carousel-next");
    const prevEl = wrap.querySelector(".carousel-prev");

    new Swiper(carousel, {
      modules: [Navigation, Autoplay],
      slidesPerView: "auto",
      grabCursor: true,
      loop: true,
      centeredSlides: true,
      initialSlide: 1,
      spaceBetween: 24,
      autoplay: {
        delay: 7000,
        disableOnInteraction: false,
      },
      navigation: { nextEl, prevEl },
    });
  });
}
