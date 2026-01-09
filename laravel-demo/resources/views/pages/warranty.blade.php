<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Warranty Policy | Lunasjaya</title>
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
    <h1>Warranty Policy</h1>
    <p>
      This Warranty Policy explains what is covered, how long coverage lasts, and how to submit a warranty claim.
    </p>

    <div class="policy-highlights">
      <div class="ph-card">
        <div class="ph-k">Coverage</div>
        <div class="ph-v">Manufacturing defects</div>
      </div>
      <div class="ph-card">
        <div class="ph-k">Claim response</div>
        <div class="ph-v">Within 24 hours</div>
      </div>
      <div class="ph-card">
        <div class="ph-k">Support hours</div>
        <div class="ph-v">Mon–Sat, 8AM–7PM (EST)</div>
      </div>
    </div>
  </section>

  <section class="policy-content">

    <p>
      At <strong>Lunasjaya</strong>, we are committed to providing high-quality products that meet the expectations of our
      customers. This Warranty Policy outlines the terms and conditions under which we offer warranties on our products.
      We want you to be confident in your purchase and assured that we stand behind the quality of our clothing.
    </p>

    <h2>1. Warranty Coverage</h2>
    <p>
      Lunasjaya offers a limited warranty on our products, which covers manufacturing defects in materials or
      craftsmanship. Our warranty applies only to items purchased directly from Lunasjaya.com.
    </p>

    <h3>What is covered</h3>
    <ul>
      <li><strong>Defects in workmanship:</strong> issues with stitching, seams, or fabric caused by manufacturing defects.</li>
      <li><strong>Faulty materials:</strong> problems caused by inferior materials used in production.</li>
    </ul>

    <div class="policy-note">
      <h3>What is not covered</h3>
      <ul>
        <li><strong>Normal wear and tear:</strong> fading, pilling, stretching, etc.</li>
        <li><strong>Misuse or abuse:</strong> improper care, washing, or handling.</li>
        <li><strong>Alterations:</strong> modifications not authorized by Lunasjaya.</li>
        <li><strong>External causes:</strong> stains, odors, accidents, chemical exposure, etc.</li>
      </ul>
    </div>

    <h2>2. Warranty Period</h2>
    <ul>
      <li><strong>Warranty duration:</strong> 60 days from the date of delivery.</li>
      <li>After 60 days, products are no longer covered under this warranty policy.</li>
    </ul>

    <h2>3. How to Request Warranty Service</h2>
    <p>
      If you believe your item is defective and covered under our warranty, please email us at
      <strong>support@rabbioz.com</strong> with the subject line: <strong>“Warranty Claim”</strong>.
    </p>
    <p>Please include:</p>
    <ul>
      <li>Order number</li>
      <li>Product name and description</li>
      <li>Detailed description of the defect (include photos/videos if possible)</li>
      <li>Your contact information (full name, address, phone number)</li>
    </ul>
    <p>
      Our support team will review your claim and get back to you within 24 hours (Monday–Saturday, 8:00 AM – 7:00 PM EST).
    </p>

    <h2>4. Warranty Resolution Options</h2>
    <p>
      If your product is found to be defective and covered under our warranty, we will provide one of the following options:
    </p>
    <ul>
      <li><strong>Replacement:</strong> we send a replacement product of the same style/size (subject to availability).</li>
      <li><strong>Repair:</strong> in some cases, we may offer to repair the defective item.</li>
      <li><strong>Full Refund:</strong> if replacement/repair is not possible, we issue a full refund to the original payment method.</li>
    </ul>
    <div class="policy-note">
      <h3>Note</h3>
      <p>
        For warranty claims, the product may need to be returned to us for inspection before a resolution is provided.
        We will provide a prepaid return label for eligible returns.
      </p>
    </div>

    <h2>5. Shipping and Handling for Warranty Claims</h2>
    <ul>
      <li><strong>Prepaid return label:</strong> provided for eligible warranty claims.</li>
      <li><strong>Inspection time:</strong> 3–5 business days after we receive the returned product.</li>
      <li><strong>Resolution time:</strong> processed within 10 business days after approval (replacement/repair/refund).</li>
    </ul>

    <h2>6. Non-Warranty Returns</h2>
    <p>
      If a product does not meet the criteria for a warranty claim, customers may still initiate a return under our
      Return & Refund Policy. Standard returns are not covered under this warranty and may be subject to different terms.
    </p>

    <h2>7. Customer Support</h2>
    <div class="policy-contact">
      <p><strong>Email:</strong> support@rabbioz.com</p>
      <p><strong>Customer Support Hours:</strong> Monday – Saturday, 8:00 AM – 7:00 PM (EST)</p>
      <p>We typically respond within 24 hours.</p>
    </div>

    <h2>8. Updates to This Policy</h2>
    <p>
      Lunasjaya reserves the right to update or amend this Warranty Policy at any time. Any changes will be posted with a
      revised “Last Updated” date on this page. We encourage you to review this policy periodically.
    </p>

  </section>

</main>

@include('layouts.footer')

</body>
</html>
