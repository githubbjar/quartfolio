import './bootstrap'

import { allImages } from "./include-images";

// prevent tree-shaking + give you a debug count
window.__allImagesCount = Object.keys(allImages).length;




// ALPINE JS / AOS / SWIPER



// ALPINE
import Alpine from "alpinejs";
window.Alpine = Alpine;



// AOS 
import AOS from "aos";
import "aos/dist/aos.css";



// Swiper
import Swiper from "swiper";
import { Navigation, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";

document.addEventListener("alpine:init", () => {
  // ✅ Your Alpine carousel component (ported from main.js)
  Alpine.data("carousel", () => ({
    active: 0,
    autorotate: false,
    autorotateTiming: 7000,
    items: [
      {
        quote:
          "“Iʼve worked with Jerry for years. My go-to-description for him is ‘brilliant.ʼ He has a knack for capturing the gist of an article, or even an entire issue, and illustrating everything in a way that is eye-catching, thought-provoking, and occasionally accented with a just-right touch of laugh-out-loud humor. Heʼs also great to work with. Highly recommended.”",
        name: "Terrell Clemmons",
        role: "Editor at",
        team: "Salvo",
        link: "#0",
      },
      {
        quote:
          "“An experienced designer in print and web formats, Jerry easily adapts his superb creativity to the wide range of graphic projects we give him. And he always gets the technical requirements right. Jerry is not just talented but also a pleasure to work with.”",
        name: "Richard Vaughan",
        role: "President at",
        team: "Publishing Management Associates",
        link: "#0",
      },
    ],
    init() {
      if (this.autorotate) {
        this.autorotateInterval = setInterval(() => {
          this.active = this.active + 1 === this.items.length ? 0 : this.active + 1;
        }, this.autorotateTiming);
      }

      this.$watch("active", () => this.heightFix());

      // In case AOS is used inside the testimonials area
      if (window.refreshAOS) window.refreshAOS();
    },
    stopAutorotate() {
      clearInterval(this.autorotateInterval);
      this.autorotateInterval = null;
    },
    heightFix() {
      this.$nextTick(() => {
        // keep your original indexing logic
        const target = this.$refs.testimonials?.children?.[this.active + 1];
        if (!target) return;
        this.$refs.testimonials.style.height = target.offsetHeight + "px";
      });
    },
  }));
});



// Start Alpine AFTER registering components
Alpine.start();



// Init AOS + Swiper after DOM is ready
document.addEventListener("DOMContentLoaded", () => {
  // AOS init (optional)
  AOS.init({ once: true, duration: 700, offset: 120, easing: "ease-out" });

  // ✅ Swiper init (ported from main.js)
  const carouselEls = document.querySelectorAll(".carousel");
  if (carouselEls.length > 0) {
    // If you have multiple .carousel sliders on one page, init each safely:
    carouselEls.forEach((el) => {
      new Swiper(el, {
        modules: [Navigation, Autoplay],
        slidesPerView: "auto",
        grabCursor: true,
        loop: true,
        centeredSlides: true,
        initialSlide: 1,
        spaceBetween: 24,
        autoplay: { delay: 7000 },
        navigation: {
          // Scope to this carousel first; fallback to global selectors
          nextEl: el.querySelector(".carousel-next") || ".carousel-next",
          prevEl: el.querySelector(".carousel-prev") || ".carousel-prev",
        },
      });
    });
  }
});












const carouselEl = document.querySelectorAll('.carousel');
if (carouselEl.length > 0) {
  const carousel = new Swiper('.carousel', {
    slidesPerView: 'auto',
    grabCursor: true,
    loop: true,
    centeredSlides: true,
    initialSlide: 1,
    spaceBetween: 24,
    autoplay: {
      delay: 7000,
    },
    navigation: {
      nextEl: '.carousel-next',
      prevEl: '.carousel-prev',
    },
  });
}


// Carousel data and functionality: https://github.com/alpinejs/alpine
document.addEventListener('alpine:init', () => {
    Alpine.data('carousel', () => ({
        active: 0,
        autorotate: false,
        autorotateTiming: 7000,
        items: [
            {
                quote: '“ I\'ve worked with Jerry for years. My go-to-description for him is \'brilliant.\' He has a knack for capturing the gist of an article, or even an entire issue, and illustrating everything in a way that is eye-catching, thought-provoking, and occasionally accented with a just-right touch of laugh-out-loud humor. He\'s also great to work with. Highly recommended. “',
                name: 'Terrell Clemmons',
                role: 'Editor at',
                team: 'Salvo',
                link: '#0'
            },
            {
                quote: '“ An experienced designer in print and web formats, Jerry easily adapts his superb creativity to the wide range of graphic projects we give him. And he always gets the technical requirements right. Jerry is not just talented but also a pleasure to work with. “',
                name: 'Richard Vaughan',
                role: 'President at',
                team: 'Publishing Management Associates',
                link: '#0'
            }
        ],
        init() {
            if (this.autorotate) {
                this.autorotateInterval = setInterval(() => {
                    this.active = this.active + 1 === this.items.length ? 0 : this.active + 1
                }, this.autorotateTiming)
            }
            this.$watch('active', callback => this.heightFix())
        },
        stopAutorotate() {
            clearInterval(this.autorotateInterval)
            this.autorotateInterval = null
        },
        heightFix() {
            this.$nextTick(() => {
                this.$refs.testimonials.style.height = this.$refs.testimonials.children[this.active + 1].offsetHeight + 'px'
            })
        }
    }))
})
// END Carousel data and functionality
                



/*import './main'
import './vendors/aos'

import Alpine from 'alpinejs'
window.Alpine = Alpine

// ✅ Register Alpine components BEFORE Alpine.start()
document.addEventListener('alpine:init', () => {
  Alpine.data('carousel', () => ({
    active: 0,
    items: [
      // TODO: replace with your real testimonials
      { quote: 'Test quote', name: 'Name', role: 'Role', team: 'Team', link: '#' },
    ],
    stopAutorotate() {},
  }))
})

Alpine.start()

// ✅ AOS (module import — no globals)
import AOS from 'aos'
import 'aos/dist/aos.css'

document.addEventListener('DOMContentLoaded', () => {
  AOS.init()
})

// ✅ Swiper (module import)
import Swiper from 'swiper'
import { Navigation, Pagination, Autoplay } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

document.addEventListener('DOMContentLoaded', () => {
  new Swiper('.swiper', {
    modules: [Navigation, Pagination, Autoplay], // Swiper v9/10+ friendly
    loop: true,
    slidesPerView: 1,
    spaceBetween: 20,
    pagination: { el: '.swiper-pagination', clickable: true },
    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    autoplay: { delay: 5000, disableOnInteraction: false },
  })
})
*/



