<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQs | Lunasjaya</title>

  @vite(['resources/js/app.js'])

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif&display=swap" rel="stylesheet">
</head>
<body>
  @include('layouts.navigation')

  <main class="faq-page">
    {{-- HERO --}}
    <section class="faq-hero" aria-label="Frequently Asked Questions">
      <div class="faq-hero-bg"></div>

      <div class="faq-container">
        <p class="faq-eyebrow">HELP CENTER</p>
        <h1 class="faq-title">Frequently Asked Questions</h1>
        <p class="faq-lead">
          Find quick answers about subscriptions, orders, returns, shipping, and support.
        </p>

        <div class="faq-actions">
          <a class="faq-btn primary" href="{{ route('services.all') }}">View Plans</a>
          <a class="faq-btn ghost" href="mailto:support@rabbioz.com">Email Support</a>
        </div>
      </div>
    </section>

    {{-- CONTENT --}}
    <section class="faq-content">
      <div class="faq-container">

        <div class="faq-list" data-faq>
          {{-- 1 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">1</span>
                <span class="faq-q-text">What is Lunasjaya?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                Lunasjaya is an online clothing brand specializing in high-quality T-shirts that are stylish, comfortable,
                and versatile for everyday wear. We offer exclusive designs via a monthly subscription box or single purchases.
              </p>
            </div>
          </article>

          {{-- 2 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">2</span>
                <span class="faq-q-text">How does the Lunasjaya subscription work?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                When you subscribe, you’ll receive a curated selection of exclusive T-shirts delivered every month.
                Choose from plans (e.g., 1, 2, 4-5, or 6-7 T-shirts/month). All tees are freesize for a comfortable fit.
              </p>
            </div>
          </article>

          {{-- 3 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">3</span>
                <span class="faq-q-text">How can I subscribe to Lunasjaya?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                Visit our subscription page, choose your preferred plan, and complete checkout.
                Your subscription begins immediately and your first box ships per the delivery schedule.
              </p>
            </div>
          </article>

          {{-- 4 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">4</span>
                <span class="faq-q-text">Can I change or cancel my subscription?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                Yes. You can change or cancel anytime. Email
                <a href="mailto:support@rabbioz.com">support@rabbioz.com</a>
                and we’ll assist you within 24 hours.
              </p>
            </div>
          </article>

          {{-- 5 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">5</span>
                <span class="faq-q-text">How do I manage my subscription?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                Log into your account to update shipping, change plan, or cancel.
                If you need help, contact our support team.
              </p>
            </div>
          </article>

          {{-- 6 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">6</span>
                <span class="faq-q-text">What is the return and refund policy?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                We offer a 60-day return window. If you're not happy with your T-shirt, return it for a full refund
                to your original payment method. For details, check our Return & Refund Policy.
              </p>
            </div>
          </article>

          {{-- 7 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">7</span>
                <span class="faq-q-text">How do I return a T-shirt?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                Email <a href="mailto:support@rabbioz.com">support@rabbioz.com</a>
                with your order number and reason. We’ll send a prepaid return label and instructions.
              </p>
            </div>
          </article>

          {{-- 8 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">8</span>
                <span class="faq-q-text">How long does it take to receive my order?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                Orders are processed within 1–2 business days. Delivery typically takes 2–6 business days depending on your
                location. For details, check our Shipping Policy.
              </p>
            </div>
          </article>

          {{-- 9 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">9</span>
                <span class="faq-q-text">How can I track my order?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                After your order ships, we’ll email a tracking number and link. Please allow up to 24 hours for tracking
                information to update.
              </p>
            </div>
          </article>

          {{-- 10 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">10</span>
                <span class="faq-q-text">Do you offer international shipping?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                Currently, we only ship within the United States. We’re working on expanding and will notify customers
                when international shipping becomes available.
              </p>
            </div>
          </article>

          {{-- 11 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">11</span>
                <span class="faq-q-text">Are your T-shirts available in different sizes?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                All of our T-shirts come in freesize, designed to fit a wide range of body types comfortably.
                They offer a relaxed and versatile fit.
              </p>
            </div>
          </article>

          {{-- 12 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">12</span>
                <span class="faq-q-text">Can I exchange a product?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                Yes. If your T-shirt is damaged, defective, or incorrect, we will offer an exchange.
                Please refer to our Return & Refund Policy for instructions.
              </p>
            </div>
          </article>

          {{-- 13 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">13</span>
                <span class="faq-q-text">How do I contact customer support?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                Email <a href="mailto:support@rabbioz.com">support@rabbioz.com</a>.
                We’re available Monday – Saturday, 8:00 AM – 7:00 PM (EST) and typically respond within 24 hours.
              </p>
            </div>
          </article>

          {{-- 14 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">14</span>
                <span class="faq-q-text">Are there any hidden fees?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                No. Our pricing is transparent. Any applicable charges (e.g., shipping fees) are clearly stated during checkout.
              </p>
            </div>
          </article>

          {{-- 15 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">15</span>
                <span class="faq-q-text">Can I cancel my order after placing it?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                We begin processing quickly, but if you contact us before your order ships, we may be able to cancel it.
                Email <a href="mailto:support@rabbioz.com">support@rabbioz.com</a> as soon as possible.
              </p>
            </div>
          </article>

          {{-- 16 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">16</span>
                <span class="faq-q-text">How do I unsubscribe from the Lunasjaya newsletter?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                Click the “Unsubscribe” link at the bottom of any email or contact us at
                <a href="mailto:support@rabbioz.com">support@rabbioz.com</a>.
              </p>
            </div>
          </article>

          {{-- 17 --}}
          <article class="faq-item">
            <button class="faq-q" type="button">
              <span class="faq-q-left">
                <span class="faq-num">17</span>
                <span class="faq-q-text">How can I update my personal information?</span>
              </span>
              <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-a">
              <p>
                Log into your account to update shipping address, payment details, and subscription preferences.
                If you need help, email <a href="mailto:support@rabbioz.com">support@rabbioz.com</a>.
              </p>
            </div>
          </article>
        </div>

        {{-- Footer CTA --}}
        <section class="faq-cta" aria-label="Need more help">
          <div class="faq-cta-inner">
            <h2>Still need help?</h2>
            <p>Email our support team and we’ll reply within 24 hours during business hours.</p>
            <a class="faq-btn primary" href="mailto:support@rabbioz.com">Contact Support</a>
          </div>
        </section>

      </div>
    </section>
  </main>

  <script>
    (function(){
      const root = document.querySelector('[data-faq]');
      if(!root) return;

      const items = Array.from(root.querySelectorAll('.faq-item'));
      items.forEach(item => {
        const btn = item.querySelector('.faq-q');
        btn?.addEventListener('click', () => {
          // one-open-at-a-time:
          items.forEach(x => { if(x !== item) x.classList.remove('is-open'); });
          item.classList.toggle('is-open');
        });
      });
    })();
  </script>

  @include('layouts.footer')
</body>
</html>
