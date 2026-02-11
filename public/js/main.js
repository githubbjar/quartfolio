AOS.init({
  once: true,
  disable: 'phone',
  duration: 750,
  easing: 'ease-out-quart',
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

// Light switcher
const lightSwitches = document.querySelectorAll('.light-switch');
if (lightSwitches.length > 0) {
  lightSwitches.forEach((lightSwitch, i) => {
    if (localStorage.getItem('dark-mode') === 'true' || !('dark-mode' in localStorage)) {
      // eslint-disable-next-line no-param-reassign
      lightSwitch.checked = true;
    }
    lightSwitch.addEventListener('change', () => {
      const { checked } = lightSwitch;
      lightSwitches.forEach((el, n) => {
        if (n !== i) {
          // eslint-disable-next-line no-param-reassign
          el.checked = checked;
        }
      });
      if (lightSwitch.checked) {
        document.documentElement.classList.add('dark');
        localStorage.setItem('dark-mode', true);
      } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('dark-mode', false);
      }
    });
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