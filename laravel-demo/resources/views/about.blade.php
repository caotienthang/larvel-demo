<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | Lunasjaya</title>

  @vite(['resources/js/app.js'])

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
</head>

<body>
  @include('layouts.navigation')

  <main class="about-page">
    {{-- HERO --}}
    <section class="about-hero" aria-label="About Lunasjaya">
      <div class="about-hero-bg"></div>

      <div class="about-container">
        <div class="about-hero-grid">
          <div class="about-hero-copy">
            <p class="about-eyebrow">ABOUT LUNASJAYA</p>
            <h1 class="about-title">Where style meets comfort in every thread</h1>
            <p class="about-lead">
              Welcome to Lunasjaya, where style meets comfort in every thread. At Lunasjaya, we believe that fashion
              should not only look good but also feel great. Our mission is simple: to bring you high-quality, stylish,
              and versatile clothing that suits your lifestyle. Whether you’re looking for the perfect T-shirt to wear
              every day or something to make a statement, we have something for everyone.
            </p>

            <div class="about-hero-actions">
              <a class="about-btn primary" href="{{ route('services.all') }}">Explore Plans</a>
              <a class="about-btn ghost" href="#company">Company Info</a>
            </div>
          </div>

          <div class="about-hero-card">
            <div class="about-stat">
              <div class="about-stat-icon"><i class="fa-solid fa-shirt"></i></div>
              <div class="about-stat-body">
                <p class="about-stat-k">Premium Essentials</p>
                <p class="about-stat-v">Built for everyday wearability</p>
              </div>
            </div>

            <div class="about-stat">
              <div class="about-stat-icon"><i class="fa-solid fa-ruler-combined"></i></div>
              <div class="about-stat-body">
                <p class="about-stat-k">Freestyle sizing</p>
                <p class="about-stat-v">Comfortable fit for everyone</p>
              </div>
            </div>

            <div class="about-stat">
              <div class="about-stat-icon"><i class="fa-solid fa-box"></i></div>
              <div class="about-stat-body">
                <p class="about-stat-k">Subscription ready</p>
                <p class="about-stat-v">Curated tees delivered monthly</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- CONTENT --}}
    <section class="about-content">
      <div class="about-container">

        <article class="about-section" id="story">
          <div class="about-section-head">
            <h2 class="about-h2">Our Story</h2>
            <p class="about-sub">
              Timeless design, comfort, and everyday wearability—crafted with intention.
            </p>
          </div>

          <div class="about-card">
            <p>
              Lunasjaya was founded with a single vision in mind: to create a fashion brand that combines timeless
              design, comfort, and everyday wearability. Our journey began with a passion for creating clothing that
              not only looks good but also feels good, and we’ve stayed true to that ethos ever since.
            </p>
            <p>
              As we grew, so did our commitment to offering a carefully curated selection of clothing essentials. From
              the first stitch to the final packaging, we pay close attention to every detail, ensuring that our products
              meet the highest standards of quality and craftsmanship.
            </p>
            <p>
              Our name, Lunasjaya, reflects our belief in bringing light and joy to your everyday wardrobe. "Luna"
              symbolizes the calming, timeless qualities of the moon, and "Jaya" means victory or success. Together,
              they represent our dedication to empowering you with clothing that enhances your confidence and personal style.
            </p>
          </div>
        </article>

        <article class="about-section" id="offer">
          <div class="about-section-head">
            <h2 class="about-h2">What We Offer</h2>
            <p class="about-sub">Premium essentials you can mix, match, and wear for any occasion.</p>
          </div>

          <div class="about-grid-2">
            <div class="about-card">
              <h3 class="about-h3">Essentials that work anywhere</h3>
              <p>
                At Lunasjaya, we specialize in creating premium clothing essentials that can be mixed, matched, and worn
                for any occasion. Our products are designed to offer the perfect balance between comfort, style, and
                functionality. We are particularly known for our high-quality T-shirts, which are available in freestyle
                sizing, ensuring a comfortable fit for everyone.
              </p>
            </div>

            <div class="about-card">
              <h3 class="about-h3">Subscription plans</h3>
              <p>
                We offer several subscription plans, so you can receive a curated collection of T-shirts delivered
                straight to your door each month. With every box, you'll discover exclusive designs, vibrant prints,
                and thoughtful details that elevate your wardrobe.
              </p>
              <p>
                Our commitment to quality doesn't stop at our products. We focus on delivering exceptional customer service,
                providing support and assistance at every step of your shopping experience.
              </p>
              <a class="about-link" href="{{ route('services.all') }}">View pricing & plans →</a>
            </div>
          </div>
        </article>

        <article class="about-section" id="values">
          <div class="about-section-head">
            <h2 class="about-h2">Our Values</h2>
            <p class="about-sub">What guides every product we design and every experience we deliver.</p>
          </div>

          <div class="about-grid-4">
            <div class="about-feature">
              <div class="about-feature-top">
                <span class="about-chip cyan"><i class="fa-solid fa-face-smile"></i> Comfort</span>
              </div>
              <p>
                We believe that the foundation of any great outfit is comfort. That's why every piece we create is designed
                to be as comfortable as it is stylish.
              </p>
            </div>

            <div class="about-feature">
              <div class="about-feature-top">
                <span class="about-chip blue"><i class="fa-solid fa-leaf"></i> Sustainability</span>
              </div>
              <p>
                We are working hard to reduce our environmental impact by selecting eco-friendly materials, optimizing
                packaging, and supporting ethical production practices.
              </p>
            </div>

            <div class="about-feature">
              <div class="about-feature-top">
                <span class="about-chip pink"><i class="fa-solid fa-wand-magic-sparkles"></i> Innovation</span>
              </div>
              <p>
                We are constantly exploring new designs, trends, and materials to bring you fresh, exciting options that
                reflect both classic style and modern sensibilities.
              </p>
            </div>

            <div class="about-feature">
              <div class="about-feature-top">
                <span class="about-chip blue"><i class="fa-solid fa-people-group"></i> Community</span>
              </div>
              <p>
                We’re more than a clothing brand—we’re a community of individuals who appreciate quality, creativity,
                and authenticity.
              </p>
            </div>
          </div>
        </article>

        <article class="about-section" id="why">
          <div class="about-section-head">
            <h2 class="about-h2">Why Choose Lunasjaya?</h2>
            <p class="about-sub">Clear advantages that make your wardrobe easier and better.</p>
          </div>

          <div class="about-card">
            <ul class="about-list">
              <li><i class="fa-solid fa-check"></i> Stylish and versatile clothing</li>
              <li><i class="fa-solid fa-check"></i> Premium quality fabric and craftsmanship</li>
              <li><i class="fa-solid fa-check"></i> Freestyle sizing for a comfortable fit</li>
              <li><i class="fa-solid fa-check"></i> Exclusive limited-edition designs</li>
              <li><i class="fa-solid fa-check"></i> Flexible subscription plans</li>
            </ul>
          </div>
        </article>

        <article class="about-section" id="promise">
          <div class="about-section-head">
            <h2 class="about-h2">Our Promise</h2>
            <p class="about-sub">What you can always expect from us.</p>
          </div>

          <div class="about-card">
            <ul class="about-list">
              <li><i class="fa-solid fa-check"></i> Deliver premium products that meet your expectations</li>
              <li><i class="fa-solid fa-check"></i> Offer exceptional customer service</li>
              <li><i class="fa-solid fa-check"></i> Continuously improve designs and products</li>
            </ul>
          </div>
        </article>

        <article class="about-section" id="join">
          <div class="about-section-head">
            <h2 class="about-h2">Join Us on Our Journey</h2>
            <p class="about-sub">Feel confident, comfortable, and fully yourself.</p>
          </div>

          <div class="about-card">
            <p>
              At Lunasjaya, we believe that great fashion is about more than just clothes—it’s about how you feel when you
              wear them. It’s about expressing your personality, feeling confident, and being comfortable in your own skin.
            </p>
            <p>
              We invite you to join the Lunasjaya community and experience the perfect blend of style, comfort, and creativity.
              Whether you're purchasing one of our monthly subscription boxes or browsing our latest collections, we are excited
              to have you with us.
            </p>
            <p>
              Thank you for being a part of the Lunasjaya journey. We look forward to continuing to inspire your style,
              one T-shirt at a time.
            </p>

            <div class="about-cta">
              <a class="about-btn primary" href="{{ route('services.all') }}">Get Started</a>
              <a class="about-btn ghost" href="{{ route('home') }}">Back to Home</a>
            </div>
          </div>
        </article>

        <article class="about-section" id="company">
          <div class="about-section-head">
            <h2 class="about-h2">Our Company Information</h2>
            <p class="about-sub">Official details and customer support.</p>
          </div>

          <div class="about-grid-2">
            <div class="about-card">
              <h3 class="about-h3">Rabbioz Apparel LLC</h3>
              <p class="about-muted">
                9107 W Russell Rd, Las Vegas, NV 89148, UNITED STATES
              </p>
              <p class="about-muted">
                Email: <a class="about-link" href="mailto:support@rabbioz.com">support@rabbioz.com</a>
              </p>
            </div>

            <div class="about-card">
              <h3 class="about-h3">Customer Support Hours</h3>
              <p class="about-muted">
                Monday – Saturday, 8:00 AM – 7:00 PM (EST)
              </p>
              <p class="about-muted">
                We aim to respond quickly and help you at every step of your experience.
              </p>
            </div>
          </div>
        </article>

      </div>
    </section>
  </main>

  @include('layouts.footer')
</body>
</html>
