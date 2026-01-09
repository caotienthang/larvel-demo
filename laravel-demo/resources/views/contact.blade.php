<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | Lunasjaya</title>

  @vite(['resources/js/app.js'])

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif&display=swap" rel="stylesheet">
</head>
<body>
  @include('layouts.navigation')

  <main class="contact-page">

    {{-- HERO --}}
    <section class="contact-hero">
      <h1>Contact Us</h1>
      <p>
        We’re here to help! Whether you have a question about our products,
        need assistance with your order, or want to share your feedback,
        feel free to reach out to us.
      </p>
    </section>

    {{-- CONTENT --}}
    <section class="contact-content">

      <article class="contact-card">
        <h2>Ways to Contact Us</h2>

        <div class="contact-item">
          <strong>Email</strong>
          <p>
            <a href="mailto:support@rabbioz.com">support@rabbioz.com</a><br>
            We respond to most emails within 24 hours during business hours.
          </p>
        </div>

        <div class="contact-item">
          <strong>Customer Support Hours</strong>
          <p>
            Monday – Saturday, 8:00 AM – 7:00 PM (EST)<br>
            Closed on Sundays
          </p>
        </div>

        <div class="contact-item">
          <strong>Phone Support</strong>
          <p>
            Currently, we offer email support only.<br>
            For urgent inquiries, please email us and we’ll prioritize your request.
          </p>
        </div>
      </article>

      <article class="contact-card">
        <h2>Business Address</h2>

        <p>
          <strong>Rabbioz Apparel LLC</strong><br>
          9107 W Russell Rd<br>
          Las Vegas, NV 89148<br>
          UNITED STATES
        </p>
      </article>

      <article class="contact-card highlight">
        <h2>We’re Here to Help</h2>
        <p>
          If you have any questions, concerns, or suggestions, don’t hesitate to get in touch.
          Your satisfaction is our priority, and we’re committed to providing you with the best
          shopping experience possible.
        </p>
      </article>

    </section>
  </main>

  @include('layouts.footer')
</body>
</html>
