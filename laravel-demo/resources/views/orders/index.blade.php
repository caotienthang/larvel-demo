<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Orders</title>

  @vite([
    'resources/js/app.js'
  ])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>
  @include('layouts.navigation')

  <div class="account-layout">
    <!-- Sidebar -->
    <aside class="account-sidebar">
      <div class="sidebar-title">Account</div>

      <a class="sidebar-link" href="{{ route('profile') }}">
        <span>👤</span> My Profile
      </a>

      <a class="sidebar-link active" href="{{ route('orders.index') }}">
        <span>🧾</span> Orders
      </a>
    </aside>

    <!-- Content -->
    <main class="account-content">
      <div class="account-card">
        <h1 class="account-h1">My Orders</h1>

        @if(session('success'))
          <p class="alert success">{{ session('success') }}</p>
        @endif

        <div class="table-wrap">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Total</th>
                <th>Status</th>
                <th>Created</th>
                <th class="right">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($invoices as $inv)
                <tr>
                  <td>#{{ $inv->id }}</td>
                  <td>${{ number_format($inv->total, 2) }}</td>
                  <td>
                    <span class="badge {{ $inv->status === 'canceled' ? 'bad' : 'ok' }}">
                      {{ $inv->status }}
                    </span>
                  </td>
                  <td>{{ $inv->created_at?->format('Y-m-d H:i') }}</td>
                  <td class="right">
                    <a class="btn small outline" href="{{ route('orders.show', $inv->id) }}">View</a>

                    @if($inv->status !== 'canceled')
                      <form class="inline cancel-form" method="POST" action="{{ route('orders.cancel', $inv->id) }}">
                        @csrf
                        @method('PATCH')
                        <button class="btn small danger" type="submit">Cancel</button>
                      </form>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="empty">No orders found.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        @if ($invoices->hasPages())
          <div class="orders-pagination">

            <div class="op-info">
              Showing <b>{{ $invoices->firstItem() ?? 0 }}</b> to <b>{{ $invoices->lastItem() ?? 0 }}</b>
              of <b>{{ $invoices->total() }}</b> results
            </div>

            <div class="op-links">
              {{-- Prev --}}
              @if ($invoices->onFirstPage())
                <span class="op-btn is-disabled" aria-disabled="true">‹ Prev</span>
              @else
                <a class="op-btn" href="{{ $invoices->previousPageUrl() }}" rel="prev">‹ Prev</a>
              @endif

              {{-- Pages (onEachSide(1)) --}}
              @php
                $current = $invoices->currentPage();
                $last    = $invoices->lastPage();
                $start   = max(1, $current - 1);
                $end     = min($last, $current + 1);
              @endphp

              {{-- First + dots --}}
              @if ($start > 1)
                <a class="op-page" href="{{ $invoices->url(1) }}">1</a>
                @if ($start > 2)
                  <span class="op-dots">…</span>
                @endif
              @endif

              {{-- Middle pages --}}
              @for ($page = $start; $page <= $end; $page++)
                @if ($page == $current)
                  <span class="op-page is-active" aria-current="page">{{ $page }}</span>
                @else
                  <a class="op-page" href="{{ $invoices->url($page) }}">{{ $page }}</a>
                @endif
              @endfor

              {{-- Last + dots --}}
              @if ($end < $last)
                @if ($end < $last - 1)
                  <span class="op-dots">…</span>
                @endif
                <a class="op-page" href="{{ $invoices->url($last) }}">{{ $last }}</a>
              @endif

              {{-- Next --}}
              @if ($invoices->hasMorePages())
                <a class="op-btn" href="{{ $invoices->nextPageUrl() }}" rel="next">Next ›</a>
              @else
                <span class="op-btn is-disabled" aria-disabled="true">Next ›</span>
              @endif
            </div>

          </div>
        @endif



      </div>
    </main>
  </div>
  @include('layouts.footer')
</body>
</html>
