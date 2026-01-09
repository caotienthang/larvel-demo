// resources/js/service-detail.js

(function () {
  // ======================
  // Simple carousel
  // ======================
  const root = document.querySelector('[data-carousel]');
  if (!root) return;

  const slides = Array.from(root.querySelectorAll('[data-slide]'));
  const dots = Array.from(root.querySelectorAll('[data-dot]'));
  const prev = root.querySelector('[data-prev]');
  const next = root.querySelector('[data-next]');

  let idx = 0;
  let timer = null;

  function render(i) {
    idx = (i + slides.length) % slides.length;

    slides.forEach((s, k) =>
      s.classList.toggle('is-active', k === idx)
    );
    dots.forEach((d, k) =>
      d.classList.toggle('is-active', k === idx)
    );
  }

  dots.forEach((d, i) =>
    d.addEventListener('click', () => render(i))
  );

  prev?.addEventListener('click', () => render(idx - 1));
  next?.addEventListener('click', () => render(idx + 1));

  // Auto rotate
  function startAuto() {
    timer = setInterval(() => render(idx + 1), 6000);
  }

  function stopAuto() {
    if (timer) clearInterval(timer);
  }

  startAuto();
  root.addEventListener('mouseenter', stopAuto);
  root.addEventListener('mouseleave', startAuto);
})();
