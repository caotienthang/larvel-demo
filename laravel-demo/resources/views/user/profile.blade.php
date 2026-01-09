<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Profile</title>

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

      <a class="sidebar-link active" href="{{ route('profile') }}">
        <span>👤</span> My Profile
      </a>

      <a class="sidebar-link" href="{{ route('orders.index') }}">
        <span>🧾</span> Orders
      </a>
    </aside>

    <!-- Content -->
    <main class="account-content">
      <div class="account-card">
        <h1 class="account-h1">My Profile</h1>

        @if(session('success'))
          <p class="alert success">{{ session('success') }}</p>
        @endif

        <div class="info">
          <div class="row">
            <span class="label">Name</span>
            <span class="value">{{ $user->name }}</span>
          </div>

          <div class="row">
            <span class="label">Email</span>
            <span class="value">{{ $user->email }}</span>
          </div>
          <div class="row">
            <span class="label">Phone Number</span>

            <span class="value">
              <span id="phone-display">
                {{ $user->phone_number ?? 'Not set' }}
                <i
                  class="fa-solid fa-pen edit-icon"
                  onclick="togglePhoneEdit()"
                  title="Edit phone number"
                ></i>
              </span>

              {{-- Form edit (ẩn mặc định) --}}
              <form id="phone-form" action="{{ route('profile.phone.update') }}" method="POST" class="phone-form" style="display: none;">
                @csrf
                @method('PUT')

                <input
                  type="text"
                  name="phone_number"
                  value="{{ old('phone_number', $user->phone_number) }}"
                  placeholder="Enter phone number"
                  required
                >

                <button type="submit" class="btn small primary">Save</button>
                <button type="button" class="btn small outline" onclick="togglePhoneEdit()">Cancel</button>
              </form>
            </span>
          </div>
        </div>

        <div class="actions">
          <a class="btn primary" href="{{ route('password.change.form') }}">Change Password</a>
          <a class="btn outline" href="{{ route('orders.index') }}">View Orders</a>
        </div>
      </div>
    </main>
  </div>
  @include('layouts.footer')
</body>
</html>
