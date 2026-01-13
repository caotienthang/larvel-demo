<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Order #{{ $invoice->id }}</title>

  @vite(['resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>
  @include('layouts.navigation')

  @php
    // Invoice chỉ có 1 service
    $detail = $invoice->details->first();
    $service = $detail?->service;
  @endphp

  <div class="order-wrap">

    <div class="order-topbar">
      <div>
        <h1 class="order-title">Order #{{ $invoice->id }}</h1>
        <a class="order-back" href="{{ route('orders.index') }}">← Back to Orders</a>
      </div>

      <span class="order-status badge {{ $invoice->status === 'canceled' ? 'bad' : 'ok' }}">
        {{ $invoice->status }}
      </span>
    </div>

    @if(session('success'))
      <p class="alert success">{{ session('success') }}</p>
    @endif

    <div class="order-grid">
      {{-- LEFT: Service --}}
      <section class="panel">
        <div class="panel-head">
          <h2 class="panel-title">Service</h2>
          <div class="price-pill">
            ${{ number_format($invoice->total, 2) }}
          </div>
        </div>

        <div class="service-block">
          <div class="service-name">
            {{ $service?->name ?? ('Service #' . ($detail?->service_id ?? 'N/A')) }}
          </div>

          <div class="service-desc">
            {!! $service?->description !!}
          </div>

          <div class="meta-list">
            <div class="meta-item">
              <span>Created</span>
              <b>{{ $invoice->created_at?->format('Y-m-d H:i') }}</b>
            </div>

            <div class="meta-item">
              <span>Total</span>
              <b>${{ number_format($invoice->total, 2) }}</b>
            </div>

            {{-- Optional: hiển thị quantity/price từ invoice_details nếu bạn có --}}
            @if($detail)
              <div class="meta-item">
                <span>Quantity</span>
                <b>{{ 1 }}</b>
              </div>
              <div class="meta-item">
                <span>Unit price</span>
                <b>${{ number_format((float)($detail->price ?? 0), 2) }}</b>
              </div>
            @endif
          </div>

          {{-- Thông báo rõ nếu thiếu dữ liệu --}}
          @if(!$detail)
            <p class="alert" style="margin-top:14px;">
              This invoice has no invoice details yet.
            </p>
          @elseif(!$service)
            <p class="alert" style="margin-top:14px;">
              Service not found for service_id: <b>{{ $detail->service_id }}</b>
            </p>
          @endif
        </div>
      </section>

      {{-- RIGHT: Actions / Summary --}}
      <aside class="panel panel-side">
        <h2 class="panel-title">Actions</h2>

        <div class="side-meta">
          <div class="side-row">
            <span>Status</span>
            <b>{{ $invoice->status }}</b>
          </div>
          <div class="side-row">
            <span>Order ID</span>
            <b>#{{ $invoice->id }}</b>
          </div>
        </div>

        @if($invoice->status !== 'canceled')
          <button type="button" class="btn danger w-full" data-open-cancel>
            Cancel Order
          </button>
        @else
          <div class="note-canceled">
            This order has been canceled.
          </div>
        @endif

      </aside>
    </div>

  </div>
    @if($invoice->status !== 'canceled')
    <div class="nfx-overlay" id="cancelOverlay" aria-hidden="true">
      <div class="nfx-modal" role="dialog" aria-modal="true" aria-labelledby="cancelTitle">
        <div class="nfx-modal__head">
          <div>
            <h3 class="nfx-modal__title" id="cancelTitle">Cancel this orderental?</h3>
            <p class="nfx-sub">
              Your order will be canceled immediately. If you change your mind, you’ll need to place a new order.
            </p>
          </div>
          <button class="nfx-close" type="button" aria-label="Close" data-close-cancel>✕</button>
        </div>

        <div class="nfx-modal__body">
          <div class="nfx-warn">
            You won’t be charged again for this order, and access to this service (if any) will end after cancellation.
          </div>

          <form id="cancelForm" class="nfx-form" method="POST" action="{{ route('orders.cancel', $invoice->id) }}">
            @csrf
            @method('PATCH')

            <select name="reason" class="nfx-select">
              <option class="nfx-select-option" value="">Why are you canceling? (optional)</option>
              <option class="nfx-select-option" value="changed_mind">I changed my mind</option>
              <option class="nfx-select-option" value="ordered_by_mistake">I ordered by mistake</option>
              <option class="nfx-select-option" value="found_better_option">I found a better option</option>
              <option class="nfx-select-option" value="delivery_time">Delivery/service time is too long</option>
              <option class="nfx-select-option" value="other">Other</option>
            </select>

            <textarea name="note" class="nfx-textarea" placeholder="Tell us more (optional)"></textarea>

            <!-- Footer buttons live outside form visually, but simplest is to keep them here -->
            <div class="nfx-modal__foot" style="padding:0; border-top:0; margin-top: 10px;">
              <button type="button" class="nfx-btn nfx-btn--ghost" data-close-cancel>
                Keep Order
              </button>

              <button type="submit" class="nfx-btn nfx-btn--danger" id="confirmCancelBtn">
                Yes, Cancel Order
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endif

  @include('layouts.footer')
</body>
</html>
