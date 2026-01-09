<footer class="site-footer">
  <div class="site-footer__inner">

    <!-- LOGO ROW -->
    <div class="site-footer__logo-row">
      <a class="site-footer__logo" href="{{ url('/') }}">
        <img src="{{ asset('images/Lunasjaya.png') }}" alt="Lunasjaya">
      </a>
    </div>

    <!-- CONTENT GRID (3 columns: 1fr / 1fr / 2fr) -->
    <div class="site-footer__content">

      <!-- Column 1: Company Info (UPDATED) -->
      <div class="site-footer__col">
        <h3 class="site-footer__title">Rabbioz Apparel LLC</h3>
        <ul class="site-footer__meta">
          <li>
            <span>Address:</span>
            9107 W Russell Rd, Las Vegas, NV 89148, United States
          </li>
          <li>
            <span>Mail Support:</span>
            <a href="mailto:support@rabbioz.com">support@rabbioz.com</a>
          </li>
        </ul>
      </div>

      <!-- Column 2: Company -->
      <nav class="site-footer__col" aria-label="Company">
        <h3 class="site-footer__title">Company</h3>
        <ul class="site-footer__links">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ route('about') }}">About Us</a></li>
          <li><a href="{{ route('contact') }}">Contact Us</a></li>
          <li><a href="{{ route('faqs') }}">FAQs</a></li>
          <li><a href="{{ route('policy.review_feedback') }}">Review</a></li>
          <li><a href="{{ route('terms') }}">Terms of Use</a></li>
        </ul>
      </nav>

      <!-- Column 3: Policy & Support (2fr) -->
      <div class="site-footer__col site-footer__col--policy-support">
        <h3 class="site-footer__title">Policy &amp; Support</h3>

        <!-- Split into 3 parts -->
        <div class="site-footer__split3">

          <!-- Legal & Policy -->
          <nav aria-label="Legal & Policy">
            <ul class="site-footer__links">
              <li><a href="{{ route('policy.payment') }}">Order & Payment Policy</a></li>
              <li><a href="{{ route('policy.shipping') }}">Shipping Policy</a></li>
              <li><a href="{{ route('policy.returns') }}">Return & Refund Policy</a></li>
              <li><a href="{{ route('policy.privacy') }}">Privacy Policy</a></li>
              <li><a href="{{ route('policy.ip') }}">Intellectual Property Policy</a></li>
            </ul>
          </nav>

          <!-- Customer Support -->
          <nav aria-label="Customer Support">
            <ul class="site-footer__links">
              <li><a href="{{ route('policy.payment') }}">Payment Method</a></li>
              <li><a href="{{ route('policy.review_feedback') }}">Review & Feedback Policy</a></li>
              <li><a href="{{ route('policy.support_issue_resolution') }}">Support & Issue Resolution</a></li>
              <li><a href="{{ route('policy.cookie') }}">Cookie Policy</a></li>
              <li><a href="{{ route('policy.subscription') }}">Subscription & Cancellation Policy</a></li>
            </ul>
          </nav>

        </div>
      </div>

    </div>

    <!-- Bottom -->
    <div class="site-footer__bottom">
      <div class="site-footer__copy">
        © {{ date('Y') }} Lunasjaya. All Rights Reserved.
      </div>
      <img
        class="site-footer__payments"
        src="https://shopkinfolks.com/wp-content/uploads/2025/11/icon-payment-scaled-1.png"
        alt="Payment methods">
    </div>

  </div>
</footer>
