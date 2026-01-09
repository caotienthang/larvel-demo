document.addEventListener('DOMContentLoaded', () => {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        item.addEventListener('click', () => {
            item.classList.toggle('active');
        });
    });
});
export default function initPromoSlider() {
  const track = document.querySelector('[data-slider-track]');
  if (!track) return;

  const slides = Array.from(track.querySelectorAll('[data-slide]'));
  const prevBtn = document.querySelector('[data-slider-prev]');
  const nextBtn = document.querySelector('[data-slider-next]');
  const dotsWrap = document.querySelector('[data-slider-dots]');
  const dots = dotsWrap ? Array.from(dotsWrap.querySelectorAll('[data-dot]')) : [];

  let index = slides.findIndex(s => s.classList.contains('is-active'));
  if (index < 0) index = 0;

  const setActive = (i) => {
    slides.forEach((s, idx) => s.classList.toggle('is-active', idx === i));
    dots.forEach((d, idx) => d.classList.toggle('is-active', idx === i));
    index = i;
  };

  const next = () => setActive((index + 1) % slides.length);
  const prev = () => setActive((index - 1 + slides.length) % slides.length);

  nextBtn?.addEventListener('click', next);
  prevBtn?.addEventListener('click', prev);

  dots.forEach((d, i) => d.addEventListener('click', () => setActive(i)));

  // autoplay
  let timer = setInterval(next, 5000);

  // pause on hover
  const slider = document.querySelector('.promo-slider');
  slider?.addEventListener('mouseenter', () => clearInterval(timer));
  slider?.addEventListener('mouseleave', () => {
    clearInterval(timer);
    timer = setInterval(next, 5000);
  });
}
