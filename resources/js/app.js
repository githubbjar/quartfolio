import './bootstrap'

//Alpine.js - JavaScript framework for interactivity
import Alpine from "alpinejs";
window.Alpine = Alpine;

//AOS - Animate On Scroll Library
import AOS from "aos";
import "aos/dist/aos.css";

//Swiper - Carousel Library
import "swiper/css";
import "swiper/css/navigation";


//swiper init for website slider
import { initWebsiteSlider } from './sliders/websiteSlider'
document.addEventListener('DOMContentLoaded', () => {
    initWebsiteSlider()
})


// Slider components (self-initializing or DOM-ready safe)
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


// resources/js/app.js
import { initCarousels } from "./components/carousels";

document.addEventListener("DOMContentLoaded", initCarousels);

// Start Alpine AFTER registering components
Alpine.start();
