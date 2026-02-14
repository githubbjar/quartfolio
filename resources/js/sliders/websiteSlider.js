import Swiper from 'swiper'
import { Navigation } from 'swiper/modules'

Swiper.use([Navigation])

export function initWebsiteSlider() {

    const slider = document.querySelector('.website-slider')
    if (!slider) return

    const swiperEl = slider.querySelector('.website-swiper')
    if (!swiperEl || swiperEl.swiper) return

    const next = slider.querySelector('.website-next')
    const prev = slider.querySelector('.website-prev')

    new Swiper(swiperEl, {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,

        navigation: {
            nextEl: next,
            prevEl: prev,
        },

        breakpoints: {
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    })
}
