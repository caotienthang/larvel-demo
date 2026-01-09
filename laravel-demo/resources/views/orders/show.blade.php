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
  <style>
    /* ========== Description list (DB HTML) ========== */
      .service-desc {
        margin-top: 14px;
      }

      /* Override Bootstrap-like helpers inside description */
      .service-desc .list-unstyled {
        list-style: none;
        padding-left: 0;
        margin: 0;              /* reset */
      }

      /* mt-4 */
      .service-desc .mt-4 {
        margin-top: 14px;
      }

      /* Each item */
      .service-desc .list-unstyled li,
      .service-desc li.mb-3 {
        display: grid;
        grid-template-columns: 22px 1fr;
        column-gap: 12px;

        padding: 12px 14px;
        margin: 0 0 10px 0;      /* override mb-3 */
        border-radius: 12px;

        background: #f8fafc;
        border: 1px solid rgba(15, 23, 42, 0.08);
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06);

        font-size: 15px;
        line-height: 1.55;
        color: #0f172a;
      }

      /* Remove last margin */
      .service-desc .list-unstyled li:last-child {
        margin-bottom: 0;
      }

      /* Icon */
      .service-desc .feature-icon {
        width: 22px;
        height: 22px;
        display: inline-grid;
        place-items: center;

        font-size: 16px;
        color: #2563eb;

        margin: 0;              /* override me-3 */
        transform: translateY(2px);
      }

      /* me-3 */
      .service-desc .me-3 {
        margin-right: 0;
      }

      /* Make the <br> line look intentional */
      .service-desc li br {
        content: "";
        display: block;
        margin-top: 4px;
      }

      /* Optional: dim the parenthetical line "(random curated pick)" */
      .service-desc li br + text,
      .service-desc li {
        /* nothing special needed; keep simple */
      }

      /* Hover */
      .service-desc .list-unstyled li:hover {
        background: #eff6ff;
        border-color: rgba(37, 99, 235, 0.25);
        box-shadow: 0 10px 26px rgba(37, 99, 235, 0.10);
      }

      /* Mobile */
      @media (max-width: 640px) {
        .service-desc .list-unstyled li,
        .service-desc li.mb-3 {
          padding: 10px 12px;
          font-size: 14px;
        }
      }

  </style>
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
          <form class="cancel-form" method="POST" action="{{ route('orders.cancel', $invoice->id) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn danger w-full">Cancel Order</button>
          </form>
        @else
          <div class="note-canceled">
            This order has been canceled.
          </div>
        @endif
      </aside>
    </div>

  </div>

  @include('layouts.footer')
</body>
</html>
