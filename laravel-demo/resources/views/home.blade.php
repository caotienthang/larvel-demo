<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lunasjaya Shop</title>

  @vite([
    'resources/js/app.js'
  ])

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
</head>

<body>
  @include('layouts.navigation')

{{-- HERO BANNER (FULL WIDTH) --}}
<section class="promo-hero" aria-label="Promotions">
  <div class="promo-track" data-slider-track>

    <article class="promo-slide is-active" data-slide
      style="--bg:url('https://egead.nyc3.cdn.digitaloceanspaces.com/17678570730986dgg2y.webp');">
      <div class="promo-overlay"></div>

      <div class="promo-inner">
        <div class="promo-box">
          <p class="promo-eyebrow">NEW ARRIVALS</p>
          <h1 class="promo-title">Fresh fits for your weekly style</h1>
          <p class="promo-text">Discover curated menswear essentials with premium materials.</p>
          <a href="{{ route('services.all') }}" class="promo-btn">Shop Collection</a>
        </div>
      </div>
    </article>

    <article class="promo-slide" data-slide
      style="--bg:url('https://egead.nyc3.cdn.digitaloceanspaces.com/1768469194069b2rc0m.webp');">
      <div class="promo-overlay"></div>

      <div class="promo-inner">
        <div class="promo-box">
          <p class="promo-eyebrow">LIMITED OFFER</p>
          <h1 class="promo-title">Get 20% off your first month</h1>
          <p class="promo-text">Pick a plan, set preferences, and receive monthly upgrades.</p>
          <a href="#signup" class="promo-btn">Get Started</a>
        </div>
      </div>
    </article>
  </div>

  <button class="promo-nav prev" type="button" aria-label="Previous slide" data-slider-prev>‹</button>
  <button class="promo-nav next" type="button" aria-label="Next slide" data-slider-next>›</button>
</section>


  {{-- SERVICES (Preview on Home) --}}
  <section class="pricing-section">
        <div class="container">
            <h1 class="section-title">Our Services</h1>
            <div class="pricing-grid">
                @foreach($services as $service)
                    <div class="pricing-card">
                        
                        <!-- Image trên cùng -->
                        @if($service->image)
                            <img src="{{ $service->image}}" alt="{{ $service->name }}" class="service-image">
                        @endif

                        <!-- Tên dịch vụ + 2 icon 2 bên -->
                        <div class="service-title-wrapper">
                            <img src="https://ashanmiller.shop/wp-content/uploads/2025/11/plan-left.svg" alt="" class="title-icon left">
                            <p class="service-title">{{ $service->name }}</p>
                            <img src="https://ashanmiller.shop/wp-content/uploads/2025/11/plan-right.svg" alt="" class="title-icon right">
                        </div>

                        <!-- Description -->
                        <div class="description">
                            {!! $service->description !!}
                        </div>

                        <!-- Price -->
                        <div class="price-wrap">
                          <span class="price">${{ number_format($service->price, 0) }}</span>
                          <span class="price-month">/Mo</span>
                        </div>


                        <!-- Actions -->
                        <div class="card-actions">
                        {{-- Add to cart --}}
                        <form method="GET" action="{{ route('checkout.show', $service) }}" class="sd-cart-form">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <button type="submit" class="btn-add-cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Pay Now
                            </button>
                        </form>

                        {{-- View details --}}
                        <a href="{{ route('services.detail', $service->id) }}" class="btn-buy">
                            View Details
                        </a>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

  {{-- FULL IMAGE SPLIT CONTENT --}}
  <section class="hero-split">
    <div class="hero-bg">
    </div>

    <div class="hero-content container">
      <div class="hero-box">
        <p class="hero-eyebrow">ABOUT</p>

        <h2 class="hero-title">World of Rabbioz Apparel LLC</h2>

        <p class="hero-text">
          We’re a diverse team of menswear enthusiasts, tech innovators,
          and culture experts dedicated to redefining how menswear is approached.
          We believe in style—and redefining the way it’s curated, delivered,
          and discussed today.
        </p>

        <a href="{{ route('services.all') }}" class="hero-btn">See More</a>
      </div>
    </div>
  </section>

<section class="sample-products">
  <div class="container">
    <h2 class="section-title sample-section-title">
      Sample Items Included in Our Plans
    </h2>

    <div class="sample-grid">
      @foreach($products as $p)
        <a class="sample-card" href="{{ route('products.show', $p->id) }}">
          <div class="sample-img">
            <img src="{{ asset($p->image) }}" alt="{{ $p->name }}">
          </div>

          <div class="sample-body">
            <h3 class="sample-name">{{ $p->name }}</h3>
            <div class="sample-note">Style example – availability may vary</div>
          </div>
        </a>
      @endforeach
    </div>

  </div>
</section>


{{-- HOW IT WORKS (EN) --}}
<section id="how-it-works" class="hiw-section">
  <div class="hiw-container">

    <header class="hiw-header">
      <p class="hiw-eyebrow">HOW IT WORKS</p>
      <h2 class="hiw-title">Subscribe once — get your monthly shirt quota</h2>
      <p class="hiw-subtitle">
        Pick a plan, set your size and delivery details, then choose shirts up to your monthly quota.
        New quota is granted every month while your subscription is active.
      </p>
    </header>

    <div class="hiw-grid">
      <div class="hiw-visual">
        <img
          src="https://ashanmiller.shop/wp-content/uploads/2025/11/box.webp"
          alt="Monthly box"
          class="hiw-main-image"
          loading="lazy"
        >
        <img
          src="https://ashanmiller.shop/wp-content/uploads/2025/11/large-right.svg"
          alt=""
          class="hiw-decor"
          aria-hidden="true"
          loading="lazy"
        >
      </div>

      <div class="hiw-steps">
        <article class="hiw-step">
          <div class="hiw-step-num">1</div>
          <div class="hiw-step-body">
            <h3 class="hiw-step-title">Choose a plan</h3>
            <p class="hiw-step-text">
              Select the plan that fits your budget. Each plan includes a monthly shirt quota and perks.
            </p>
          </div>
        </article>

        <article class="hiw-step">
          <div class="hiw-step-num">2</div>
          <div class="hiw-step-body">
            <h3 class="hiw-step-title">Set your details</h3>
            <p class="hiw-step-text">
              Save your size, preferences, and delivery address so every shipment arrives the way you want.
            </p>
          </div>
        </article>

        <article class="hiw-step">
          <div class="hiw-step-num">3</div>
          <div class="hiw-step-body">
            <h3 class="hiw-step-title">Pick shirts for the month</h3>
            <p class="hiw-step-text">
              Your quota is available in your account. Choose shirts up to the quota—no extra charge.
            </p>
          </div>
        </article>

        <article class="hiw-step">
          <div class="hiw-step-num">4</div>
          <div class="hiw-step-body">
            <h3 class="hiw-step-title">Receive & renew monthly</h3>
            <p class="hiw-step-text">
              Get your package delivered. Next month, a fresh quota is granted automatically.
            </p>
          </div>
        </article>
      </div>
    </div>

    <div class="hiw-policies">
      <div class="hiw-policies-head">
        <p class="hiw-eyebrow">POLICIES</p>
        <h2 class="hiw-title hiw-title-sm">Flexible, transparent, and easy to manage</h2>
      </div>

      <div class="hiw-policy-grid">
        <div class="hiw-policy">
          <h3>Monthly delivery</h3>
          <p>We deliver on a monthly cycle based on your saved address.</p>
        </div>

        <div class="hiw-policy">
          <h3>Size support</h3>
          <p>Need a different size? We support exchanges under our policy window.</p>
        </div>

        <div class="hiw-policy">
          <h3>Subscription control</h3>
          <p>Upgrade, downgrade, or pause whenever your needs change.</p>
        </div>

        <div class="hiw-policy">
          <h3>Easy cancellation</h3>
          <p>Cancel anytime according to the monthly cutoff and delivery schedule.</p>
        </div>
      </div>
    </div>

    {{-- SIGN UP CTA (MOST PROMINENT) --}}
    <section id="signup" class="signup-cta" aria-label="Sign up">
      <div class="signup-cta-inner">
        <div class="signup-copy">
          <h2 class="signup-title">Create your account to get started</h2>
          <p class="signup-sub">
            Enter your email to sign up. Then choose a plan and claim your monthly shirt quota.
          </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="signup-form">
          @csrf

          <label class="signup-label" for="signupEmail">Email</label>
          <div class="signup-field">
            <input
              id="signupEmail"
              type="email"
              name="email"
              placeholder="you@example.com"
              required
              class="email-input"
              value="{{ old('email') }}"
              autocomplete="email"
            >
            <button type="submit" class="btn-submit">Get Started</button>
          </div>

          @error('email')
            <p class="error-message">{{ $message }}</p>
          @enderror

          <p class="signup-note">
            By signing up, you agree to our Terms and Privacy Policy.
          </p>
        </form>
      </div>
    </section>

  </div>
</section>



  {{-- FAQ --}}
  <section id="faq" class="netflix-faq-section">
    <h2 class="section-title">Frequently Asked Questions</h2>

    <div class="faq-item">
      <h3>What is this service?</h3>
      <p>This is a subscription-based service that gives you access to curated products and features tailored to your needs.</p>
    </div>

    <div class="faq-item">
      <h3>How does the subscription work?</h3>
      <p>Choose a plan, complete your preferences, and receive your selected services each month.</p>
    </div>

    <div class="faq-item">
      <h3>How much does it cost?</h3>
      <p>Pricing depends on the plan you select. Plans start at an affordable monthly rate.</p>
    </div>

    <div class="faq-item">
      <h3>Can I change or pause my subscription?</h3>
      <p>You can upgrade, downgrade, pause, or resume anytime from your account dashboard.</p>
    </div>
  </section>

  @include('layouts.footer')
</body>
</html>
