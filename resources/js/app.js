import './bootstrap'

// ALPINE JS / AOS / SWIPER

import Alpine from "alpinejs";
window.Alpine = Alpine;

import AOS from "aos";
import "aos/dist/aos.css";

import Swiper from "swiper";
import { Navigation, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";

//swiper init for website slider
import { initWebsiteSlider } from './sliders/websiteSlider'
document.addEventListener('DOMContentLoaded', () => {
    initWebsiteSlider()
})

import './sliders/testimonialSlider';

document.addEventListener('DOMContentLoaded', () => {
  // AOS MUST stay here
  AOS.init({
    once: true,
    duration: 700,
    offset: 120,
    easing: 'ease-out',
  });

  // Feature initializers only
  initWebsiteSlider();
  // initOtherSwiperSliders(); (as you migrate them)
});






function initCarousels() {
  document.querySelectorAll(".carousel").forEach((el) => {
    if (el.swiper) return; // prevent double init

    const wrap = el.closest(".carousel-wrap");

    new Swiper(el, {
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
      navigation: {
        nextEl: wrap.querySelector(".carousel-next"),
        prevEl: wrap.querySelector(".carousel-prev"),
      },
    });
  });
}

document.addEventListener("DOMContentLoaded", initCarousels);
















// Start Alpine AFTER registering components
Alpine.start();
