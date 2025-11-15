document.addEventListener("DOMContentLoaded", function () {
  // === Swiper Init ===
  document.querySelectorAll(".swiper").forEach(function (swiperEl) {
    const configEl = swiperEl.nextElementSibling?.matches(".swiper-config")
      ? swiperEl.nextElementSibling
      : null;

    let config = {};
    if (configEl) {
      try {
        config = JSON.parse(configEl.textContent);
      } catch (e) {
        console.error("Invalid Swiper config JSON", e);
      }
    }

    new Swiper(swiperEl, config);
  });

  const cards = document.querySelectorAll(".promo-card");

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.classList.add("show");
        }, index * 200); // เลื่อนทีละการ์ด หน่วง 200ms
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });

  cards.forEach(card => observer.observe(card));
});
