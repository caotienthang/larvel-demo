<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $service->name }}</title>

  @vite(['resources/js/app.js'])

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>
  @include('layouts.navigation')

  <main class="service-detail">

    {{-- TITLE --}}
    <header class="sd-head">
      <h1 class="service-title">{{ $service->name }}</h1>
      <p class="sd-sub">
        Subscribe monthly and receive your included shirt quota. Items shown below are sample styles for reference.
      </p>
    </header>

    {{-- TOP: PURCHASE BOX --}}
    <section class="sd-buy">
      <div class="sd-buy-left">
        <div class="sd-badge">Subscription Plan</div>
        <h2 class="sd-buy-title">{{ $service->name }}</h2>

        <div class="sd-price">
          <span class="sd-price-amount">${{ number_format($service->price, 2) }}</span>
          <span class="sd-price-term">/month</span>
        </div>

        <ul class="sd-points">
          <li><i class="fa-solid fa-check"></i> Monthly quota granted while active</li>
          <li><i class="fa-solid fa-check"></i> Choose styles up to your quota</li>
          <li><i class="fa-solid fa-check"></i> Cancel or change plan anytime</li>
        </ul>
      </div>

      <div class="sd-buy-right">
        {{-- Bạn thay route/pay theo hệ thống của bạn --}}
        <form method="GET" action="{{ route('checkout.show', $service) }}" class=".sd-cart-form">
          @csrf

          <button type="submit" class="sd-pay">
            <i class="fa-solid fa-credit-card"></i>
            Pay Now
          </button>

          <a href="{{ route('services.all') }}" class="sd-back">← Back to Services</a>
        </form>
      </div>
    </section>

    {{-- SLIDER BANNER --}}
    <section class="sd-slider" aria-label="Sample items slider">
      <div class="sd-slider-head">
        <h2 class="sd-section-title">Sample items you may receive</h2>
        <p class="sd-section-sub">These images are examples to help customers visualize the subscription contents.</p>
      </div>

      <div class="sd-carousel" data-carousel>
        <div class="sd-track" data-track>

          <article class="sd-slide is-active" data-slide style="--bg:url('https://images.unsplash.com/photo-1520975916090-3105956dac38?auto=format&fit=crop&w=2400&q=80');">
            <div class="sd-slide-overlay"></div>
            <div class="sd-slide-content">
              <p class="sd-slide-eyebrow">SAMPLE LOOK</p>
              <h3 class="sd-slide-title">Premium essentials</h3>
              <p class="sd-slide-text">Clean silhouettes and timeless basics.</p>
            </div>
          </article>

          <article class="sd-slide" data-slide style="--bg:url('https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=2400&q=80');">
            <div class="sd-slide-overlay"></div>
            <div class="sd-slide-content">
              <p class="sd-slide-eyebrow">SAMPLE LOOK</p>
              <h3 class="sd-slide-title">Everyday tees</h3>
              <p class="sd-slide-text">Soft fabrics, easy styling, monthly refresh.</p>
            </div>
          </article>

          <article class="sd-slide" data-slide style="--bg:url('https://images.unsplash.com/photo-1520975682034-64a3c1a8f0b2?auto=format&fit=crop&w=2400&q=80');">
            <div class="sd-slide-overlay"></div>
            <div class="sd-slide-content">
              <p class="sd-slide-eyebrow">SAMPLE LOOK</p>
              <h3 class="sd-slide-title">Layer-ready pieces</h3>
              <p class="sd-slide-text">Versatile items to rotate month to month.</p>
            </div>
          </article>

        </div>

        <button type="button" class="sd-nav prev" aria-label="Previous" data-prev>‹</button>
        <button type="button" class="sd-nav next" aria-label="Next" data-next>›</button>

        <div class="sd-dots" data-dots aria-label="Slider pagination">
          <button class="sd-dot is-active" type="button" aria-label="Go to slide 1" data-dot></button>
          <button class="sd-dot" type="button" aria-label="Go to slide 2" data-dot></button>
          <button class="sd-dot" type="button" aria-label="Go to slide 3" data-dot></button>
        </div>
      </div>
    </section>

    {{-- TEXT SECTIONS --}}
    <section class="sd-info">
      <article class="sd-panel">
        <h3 class="sd-panel-title">Description</h3>
        <p class="sd-panel-text">
          This is a monthly subscription service. Once subscribed, you receive a monthly shirt quota based on your plan.
          You can select styles from the available catalog up to your quota. New quota is granted each billing cycle.
        </p>
        <p class="sd-panel-text">
          Items shown are examples. Availability varies by size, season, and stock.
        </p>
      </article>

      <article class="sd-panel">
        <h3 class="sd-panel-title">Payment</h3>
        <ul class="sd-list">
          <li>Billing occurs monthly on the same date you subscribed.</li>
          <li>Payments are processed securely via supported card methods.</li>
          <li>If payment fails, we’ll retry and notify you to update your payment method.</li>
        </ul>
      </article>

      <article class="sd-panel">
        <h3 class="sd-panel-title">Policy</h3>
        <ul class="sd-list">
          <li>You can upgrade, downgrade, or pause your subscription from your account.</li>
          <li>Cancellations apply at the end of the current billing cycle unless stated otherwise.</li>
          <li>Exchange/return eligibility depends on the item and the policy window after delivery.</li>
        </ul>
      </article>
    </section>

  </main>
  @include('layouts.footer')
</body>
</html>
