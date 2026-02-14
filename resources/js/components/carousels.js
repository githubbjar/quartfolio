function initCarousels() {
  document.querySelectorAll(".carousel").forEach((el) => {
    if (el.swiper) return;

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