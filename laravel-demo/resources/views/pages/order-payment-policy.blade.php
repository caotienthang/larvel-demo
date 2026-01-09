<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order & Payment Policy | Lunasjaya</title>
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

  <!-- HERO -->
  <section class="policy-hero">
    <h1>Order & Payment Policy</h1>
    <p>
      Transparent, secure, and flexible payment processing for every order placed on Lunasjaya.
    </p>

    <div class="policy-highlights">
      <div class="ph-card">
        <div class="ph-k">Payments</div>
        <div class="ph-v">Multiple methods</div>
      </div>
      <div class="ph-card">
        <div class="ph-k">Security</div>
        <div class="ph-v">TLS encryption</div>
      </div>
      <div class="ph-card">
        <div class="ph-k">Protection</div>
        <div class="ph-v">Fraud monitoring</div>
      </div>
    </div>
  </section>

  <!-- CONTENT -->
  <section class="policy-content">

    <p>
      At <strong>Lunasjaya</strong>, we aim to provide a smooth and trustworthy checkout experience.
      This Order & Payment Policy explains the payment methods we accept, how payments are processed,
      and the measures we take to protect your financial and personal information.
    </p>

    <p>
      This policy applies to all purchases made through <strong>lunasjaya.com</strong>.
      By placing an order, you agree to the terms outlined below.
    </p>

    <!-- 1 -->
    <h2>1. Accepted Payment Methods</h2>
    <p>
      Lunasjaya supports a variety of secure online payment options. Availability may depend on
      your location, device, and payment provider.
    </p>

    <div class="pm-table-wrap">
      <table class="pm-table">
        <thead>
          <tr>
            <th>Payment Method</th>
            <th>Availability</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>PayPal</strong></td>
            <td>Worldwide</td>
            <td>Pay securely using your PayPal account without sharing card details.</td>
          </tr>
          <tr>
            <td><strong>Credit / Debit Cards</strong><br>Visa, Mastercard, American Express</td>
            <td>Worldwide</td>
            <td>Standard card payments processed via a secure payment gateway.</td>
          </tr>
          <tr>
            <td><strong>Apple Pay</strong></td>
            <td>Supported Apple devices</td>
            <td>Fast checkout using Apple Pay where supported.</td>
          </tr>
          <tr>
            <td><strong>Google Pay</strong></td>
            <td>Supported Android devices</td>
            <td>Quick and secure checkout via Google Pay.</td>
          </tr>
          <tr>
            <td><strong>Buy Now, Pay Later</strong><br>(Afterpay / Klarna / Affirm)</td>
            <td>Selected regions</td>
            <td>Split payments into installments when available at checkout.</td>
          </tr>
        </tbody>
      </table>
    </div>

    <p class="pm-note">
      All checkout pages are encrypted using <strong>TLS technology</strong> to protect your data during transmission.
    </p>

    <!-- 2 -->
    <h2>2. Payment Authorization & Order Processing</h2>

    <h3>2.1 Payment Authorization</h3>
    <p>
      When you place an order, your payment method may be authorized for the total order amount.
      This authorization ensures sufficient funds and may appear as a temporary hold.
    </p>

    <h3>2.2 When You Are Charged</h3>
    <p>
      Payments are typically captured immediately after your order is successfully submitted.
      Orders placed before <strong>5:00 PM EST (Monday–Friday)</strong> begin processing the same business day.
    </p>

    <h3>2.3 Billing Information Accuracy</h3>
    <p>
      You are responsible for providing accurate billing details. Incorrect information may
      result in payment failure or order cancellation.
    </p>

    <!-- 3 -->
    <h2>3. Payment Security</h2>
    <ul>
      <li>TLS-encrypted checkout pages</li>
      <li>Secure third-party payment gateways</li>
      <li>Fraud detection and transaction monitoring</li>
      <li>No storage of full card numbers on our servers</li>
    </ul>

    <!-- 4 -->
    <h2>4. Third-Party Payment Processors</h2>
    <p>
      Payments are processed by trusted third-party providers such as <strong>PayPal</strong> and
      <strong>Stripe</strong>, depending on the payment method selected.
      These providers handle payment data in accordance with their own privacy and security policies.
    </p>

    <!-- 5 -->
    <h2>5. Pricing, Fees & Currency</h2>
    <ul>
      <li><strong>Currency:</strong> Prices are displayed in USD unless otherwise stated.</li>
      <li><strong>Taxes:</strong> Calculated at checkout based on your shipping address.</li>
      <li><strong>Fees:</strong> Lunasjaya does not charge additional payment processing fees.</li>
      <li><strong>Currency conversion:</strong> Your bank or provider may apply conversion fees.</li>
    </ul>

    <!-- 6 -->
    <h2>6. Declined or Failed Payments</h2>
    <p>
      Payments may be declined for reasons including insufficient funds, incorrect details,
      bank restrictions, or automated fraud prevention checks.
    </p>

    <!-- 7 -->
    <h2>7. Refunds & Returns</h2>
    <p>
      Approved refunds are issued to the original payment method in accordance with our
      <strong>Return & Refund Policy</strong>. Processing times may vary depending on your provider.
    </p>

    <!-- 8 -->
    <h2>8. Unauthorized Transactions</h2>
    <p>
      If you believe a transaction was unauthorized, contact us immediately and notify your
      payment provider so we can assist with the investigation.
    </p>

    <!-- 9 -->
    <h2>9. Order Verification</h2>
    <p>
      To protect our customers, Lunasjaya may request additional verification or delay shipment
      for orders flagged as high risk.
    </p>

    <!-- 10 -->
    <h2>10. Data Sharing & Retention</h2>
    <p>
      To fulfill your order, we may share necessary information (such as name, address, and order details)
      with manufacturing partners, logistics providers, and tracking services.
    </p>
    <p>
      Order and payment records may be retained for a period required by applicable accounting
      and tax regulations.
    </p>

    <!-- CONTACT -->
    <h2>11. Contact Information</h2>
    <div class="policy-contact">
      <p><strong>Email:</strong> support@rabbioz.com</p>
      <p><strong>Support Hours:</strong> Monday – Saturday, 8:00 AM – 7:00 PM (EST)</p>
      <p>We typically respond within 24 hours.</p>
    </div>

  </section>

</main>

@include('layouts.footer')

</body>
</html>
