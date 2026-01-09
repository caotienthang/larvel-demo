<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Privacy Policy | Lunasjaya</title>
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
    <h1>Privacy Policy</h1>
    <p>
      At Lunasjaya, we value and respect your privacy. This policy explains how we collect, use, protect, and disclose
      your personal information when you visit and make purchases on lunasjaya.com.
    </p>

    <div class="policy-highlights">
      <div class="ph-card">
        <div class="ph-k">Payments</div>
        <div class="ph-v">PayPal only</div>
      </div>
      <div class="ph-card">
        <div class="ph-k">Security</div>
        <div class="ph-v">SSL encryption</div>
      </div>
      <div class="ph-card">
        <div class="ph-k">Your choice</div>
        <div class="ph-v">Opt-out anytime</div>
      </div>
    </div>
  </section>

  <section class="policy-content">

    <p>
      By using our website, you agree to the collection and use of information in accordance with this policy.
    </p>

    <h2>1. Information We Collect</h2>

    <h3>1.1 Personal Information</h3>
    <p>When you make a purchase, sign up for our newsletter, or interact with our website, we may collect:</p>
    <ul>
      <li>Name</li>
      <li>Email address</li>
      <li>Shipping address</li>
      <li>Billing address</li>
      <li>Phone number</li>
      <li>Payment information (only via PayPal for processing transactions)</li>
    </ul>

    <h3>1.2 Non-Personal Information</h3>
    <p>We also collect non-personal information to enhance your shopping experience, including:</p>
    <ul>
      <li>IP address</li>
      <li>Browser type and version</li>
      <li>Device type</li>
      <li>Operating system</li>
      <li>Pages visited and interactions on our website</li>
      <li>Cookies and tracking information</li>
    </ul>

    <h2>2. How We Use Your Information</h2>
    <ul>
      <li><strong>To process transactions:</strong> complete orders and fulfill purchase requests.</li>
      <li><strong>To improve our services:</strong> enhance site functionality, customer service, and product offerings.</li>
      <li><strong>To send order updates:</strong> confirmations, shipping updates, and support information.</li>
      <li><strong>To send marketing communications:</strong> if you opt in; you can unsubscribe at any time.</li>
      <li><strong>To personalize your experience:</strong> tailor content and offers based on preferences and browsing history.</li>
    </ul>

    <h2>3. Cookies and Tracking Technologies</h2>
    <p>
      We use cookies and other tracking technologies to recognize you and improve site performance. Cookies help us:
    </p>
    <ul>
      <li>Analyze site traffic</li>
      <li>Remember your preferences</li>
      <li>Improve site functionality</li>
    </ul>
    <p>
      You can set your browser to refuse cookies; however, some features may not work properly without them.
    </p>

    <h2>4. How We Protect Your Information</h2>
    <p>We implement security measures to protect your data, including:</p>
    <ul>
      <li><strong>SSL encryption</strong> on sensitive data during transmission</li>
      <li><strong>Third-party payment processors:</strong> PayPal processes payments; we do not store payment data on our servers</li>
      <li><strong>Regular security audits</strong> and updates to reduce risk of unauthorized access</li>
    </ul>

    <h2>5. Sharing Your Information</h2>
    <p>We do not sell or rent your personal information. We may share data only in these situations:</p>
    <ul>
      <li>
        <strong>With service providers:</strong> trusted partners who help operate our site and services,
        permitted to use data only as needed to perform their services.
      </li>
      <li>
        <strong>With legal authorities:</strong> if required by law, or to protect rights, property, and safety
        of Lunasjaya, our customers, and others.
      </li>
      <li>
        <strong>Business transfer:</strong> if we merge, acquire, or sell assets, your information may be transferred.
      </li>
    </ul>

    <h2>6. Your Rights and Choices</h2>
    <ul>
      <li><strong>Access:</strong> request the personal information we have collected about you.</li>
      <li><strong>Correction:</strong> request corrections to inaccurate or incomplete information.</li>
      <li><strong>Deletion:</strong> request deletion, subject to legal/operational retention needs.</li>
      <li><strong>Opt-out of marketing:</strong> unsubscribe via email link or contact us directly.</li>
      <li><strong>Cookie preferences:</strong> manage cookies via your browser settings.</li>
    </ul>

    <h2>7. Children’s Privacy</h2>
    <p>
      Lunasjaya does not knowingly collect personal information from anyone under the age of 18.
      If we discover such data, we will delete it promptly.
    </p>

    <h2>8. Links to Third-Party Websites</h2>
    <p>
      Our website may contain links to external websites. We are not responsible for the content or privacy practices
      of those sites. Please review their policies separately.
    </p>

    <h2>9. Updates to This Privacy Policy</h2>
    <p>
      We may update this policy periodically. Any changes will be posted on this page with an updated “Last Updated” date.
      Please review it from time to time.
    </p>

    <h2>10. Contact Us</h2>
    <div class="policy-contact">
      <p><strong>Email:</strong> support@rabbioz.com</p>
      <p><strong>Customer Support Hours:</strong> Monday – Saturday, 8:00 AM – 7:00 PM (EST)</p>
      <p>We typically respond within 24 hours.</p>
    </div>

  </section>

</main>

@include('layouts.footer')

</body>
</html>
