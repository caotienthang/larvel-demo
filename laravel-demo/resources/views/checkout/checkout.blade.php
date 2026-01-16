{{-- resources/views/checkout.blade.php (hoặc file bạn đang dùng) --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout | Lunasjaya</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @vite(['resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>

@include('layouts.navigation')

@php
  // User fallback
  $user = $user ?? auth()->user();

  // Service fallback: ưu tiên $service nếu controller truyền,
  // nếu không có thì lấy từ $invoice->details->first()->service (trường hợp orders.show)
  $detail = null;
  $serviceFromInvoice = null;

  if (isset($invoice) && $invoice) {
    // tránh N+1: controller nên load(['details.service']) rồi
    $detail = $invoice->details->first();
    $serviceFromInvoice = $detail?->service;
  }

  $service = $service ?? $serviceFromInvoice;

  // Giá hiển thị: nếu có invoice_detail.price thì lấy nó (đúng checkout theo hoá đơn),
  // nếu không có thì fallback sang service.price
  $displayPrice = $detail?->price ?? $service?->price ?? null;

  // id để submit form: ưu tiên service
  $serviceId = $service?->id;
@endphp

<main class="checkout-page">

  <section class="checkout-hero">
    <h1>Checkout</h1>
    <p>Please review your plan details and confirm your contact information.</p>
  </section>

  <section class="checkout-grid">

    <!-- Plan summary -->
    <article class="checkout-card">
      <h2 class="checkout-title">Plan Summary</h2>

      <div class="checkout-row">
        <div class="checkout-k">Service</div>
        <div class="checkout-v">
          {{ $service?->name ?? '—' }}
        </div>
      </div>

      {{-- Nếu bạn có description thì mở block này --}}
      @if(!empty($service?->description))
        <div class="checkout-row" style="align-items:flex-start;">
          <div class="checkout-k">Description</div>
          <div class="checkout-v checkout-description">
            {!! $service->description !!}
          </div>
        </div>
      @endif

      <div class="checkout-row">
        <div class="checkout-k">Price</div>
        <div class="checkout-v checkout-price">
          @if($displayPrice !== null)
            ${{ number_format((float)$displayPrice, 2) }} <span>/month</span>
          @else
            —
          @endif
        </div>
      </div>

      <div class="checkout-note">
        You will be redirected to PayPal to complete payment securely.
      </div>

      {{-- Nếu service không tồn tại thì báo rõ để bạn debug --}}
      @if(!$service)
        <div class="checkout-warn" style="margin-top:14px;">
          Service not found. Please ensure the controller passes <code>$service</code> or loads
          <code>$invoice->details->service</code>.
        </div>
      @endif
    </article>

    <!-- User info + Address form -->
    <article class="checkout-card">
      <h2 class="checkout-title">Your Information</h2>

      {{-- Validation errors --}}
      @if ($errors->any())
        <div class="checkout-warn" style="margin-bottom:14px;">
          <strong>Please fix the following:</strong>
          <ul style="margin:10px 0 0 18px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="checkout-row">
        <div class="checkout-k">Full name</div>
        <div class="checkout-v">{{ $user->name ?? '—' }}</div>
      </div>

      <div class="checkout-row">
        <div class="checkout-k">Email</div>
        <div class="checkout-v">{{ $user->email ?? '—' }}</div>
      </div>

      <div class="checkout-row">
        <div class="checkout-k">Phone</div>
        <div class="checkout-v">{{ $user->phone_number ?? ($user->phone ?? '—') }}</div>
      </div>

      {{-- Nếu không có serviceId thì không cho submit để tránh route lỗi --}}
      @if($serviceId)
        <form method="POST" action="{{ route('checkout.fake', ['service' => $serviceId]) }}">
          @csrf

          <div class="checkout-row" style="align-items:flex-start;">
            <label class="checkout-k" for="address">Address</label>

            <div class="checkout-v" style="width:100%;">
              <textarea
                name="address"
                id="address"
                rows="3"
                required
                placeholder="Enter your full address"
                style="width:100%;border-radius:10px;border:1px solid rgba(0,0,0,0.15);outline:none;font-size:15px;"
              >{{ old('address') }}</textarea>

              <div style="margin-top:8px;font-size:13px;opacity:.75;">
                Example: 1500 N Grant St, Denver, CO 80203, United States
              </div>
            </div>
          </div>

          <div class="checkout-actions">
            <a class="btn-secondary" href="{{ url()->previous() }}">← Back</a>
            <button type="submit" class="btn-primary">Continue to PayPal</button>
          </div>
        </form>
      @else
        <div class="checkout-warn">
          Cannot continue: missing service id.
        </div>
        <div class="checkout-actions" style="margin-top:12px;">
          <a class="btn-secondary" href="{{ route('services.all') }}">← Back</a>
        </div>
      @endif

      @if(empty($user?->phone_number) && empty($user?->phone))
        <div class="checkout-warn">
          Tip: You can add a phone number in your profile to help us support your order faster.
        </div>
      @endif
    </article>

  </section>

</main>

@include('layouts.footer')
</body>
</html>