<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Subscription & Cancellation Policy | Lunasjaya</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @vite(['resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>

@include('layouts.navigation')

<main class="policy-page">

  <section class="policy-hero">
    <h1>Subscription & Cancellation Policy</h1>
    <p>
      This policy explains how our subscription service works, how to cancel, and what to expect regarding refunds
      and reactivation.
    </p>

    <div class="policy-highlights">
      <div class="ph-card">
        <div class="ph-k">Subscription</div>
        <div class="ph-v">Auto-renews monthly</div>
      </div>
      <div class="ph-card">
        <div class="ph-k">How to cancel</div>
        <div class="ph-v">Email request</div>
      </div>
      <div class="ph-card">
        <div class="ph-k">Support hours</div>
        <div class="ph-v">Mon–Sat, 8 AM–7 PM (EST)</div>
      </div>
    </div>
  </section>

  <section class="policy-content">

    <p>
      At <strong>Lunasjaya</strong>, we offer flexible subscription plans that provide our customers with monthly
      deliveries of stylish and comfortable clothing. We want your shopping experience to be easy and stress-free.
      This policy explains how subscriptions work and how cancellations are handled.
    </p>

    <h2>1. Subscription Overview</h2>
    <p>
      By subscribing to Lunasjaya, you will receive a monthly shipment of clothing based on your chosen plan.
      Our subscription service offers the following benefits:
    </p>
    <ul>
      <li><strong>Monthly deliveries:</strong> Get fresh and exclusive T-shirts delivered directly to your door.</li>
      <li><strong>Flexible plans:</strong> Choose from a variety of subscription plans that suit your preferences.</li>
      <li><strong>Freesize clothing:</strong> All T-shirts are delivered in freesize so you don’t worry about sizing.</li>
    </ul>
    <p>
      Each plan comes with its own terms which you can review during sign-up. Your subscription will
      <strong>automatically renew</strong> unless cancelled.
    </p>

    <h2>2. How to Cancel Your Subscription</h2>
    <p>
      To cancel, email us at <strong>support@rabbioz.com</strong> with the subject line:
      <strong>“Cancel Subscription”</strong>.
    </p>

    <p>In your email, please include:</p>
    <ul>
      <li>Your full name</li>
      <li>Subscription plan details (if applicable)</li>
      <li>Order number (if relevant)</li>
      <li>Reason for cancellation (optional)</li>
    </ul>

    <div class="policy-note">
      <h3>Response Time</h3>
      <p>
        Once we receive your cancellation request, we will contact you within <strong>24 hours</strong>
        (during business hours) to confirm your cancellation and provide any additional instructions if necessary.
      </p>
    </div>

    <h2>3. Cancellation Terms</h2>
    <ul>
      <li>You can cancel your subscription at any time <strong>before the next billing cycle</strong> to avoid being charged.</li>
      <li>Cancellations made <strong>after the billing cycle has begun</strong> will apply to the next cycle.</li>
      <li>Once your cancellation is processed, we will stop sending new boxes and will not charge you for future orders.</li>
    </ul>

    <h2>4. Refunds on Subscription Orders</h2>
    <p>
      If you cancel your subscription after a shipment has already been processed but before it has been shipped,
      we will provide a <strong>full refund</strong> for that shipment to the original payment method.
    </p>
    <p>
      If you have already received your shipment and wish to return items, please refer to our
      <strong>Return & Refund Policy</strong> for return instructions.
    </p>

    <h2>5. Reactivating Your Subscription</h2>
    <p>
      If you change your mind and want to reactivate your subscription, email us at
      <strong>support@rabbioz.com</strong> and we will assist you in setting up your account again.
    </p>

    <h2>6. Customer Support</h2>
    <div class="policy-contact">
      <p><strong>Email:</strong> support@rabbioz.com</p>
      <p><strong>Customer Support Hours:</strong> Monday – Saturday, 8:00 AM – 7:00 PM (EST)</p>
      <p>We respond to inquiries within <strong>24 hours</strong> during business hours.</p>
    </div>

    <h2>7. Updates to This Policy</h2>
    <p>
      Lunasjaya reserves the right to update this policy at any time. Any changes will be posted with a revised
      “Last Updated” date. We encourage you to review it periodically.
    </p>

  </section>

</main>

@include('layouts.footer')

</body>
</html>
