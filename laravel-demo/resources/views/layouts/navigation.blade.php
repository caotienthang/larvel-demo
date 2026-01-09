<nav class="main-nav">
  <div class="nav-container">

    {{-- LEFT: LOGO --}}
    <div class="nav-left">
      <a href="{{ route('home') }}" class="logo">
        <img src="{{ asset('images/Lunasjaya.png') }}" alt="Logo">
      </a>
    </div>

    {{-- CENTER: MENU --}}
    <ul class="nav-center">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('about') }}">About Us</a></li>
      <li><a href="{{ route('services.all') }}">Pricing</a></li>
    </ul>

    {{-- RIGHT: AUTH + CART --}}
    <div class="nav-right">
      @auth
        <a href="{{ route('profile') }}" class="nav-icon" title="Profile">
          <i class="fas fa-user"></i>
        </a>
        <form action="{{ route('logout') }}" method="POST" class="inline-form">
          @csrf
          <button type="submit" class="btn-nav btn-logout">Logout</button>
        </form>
      @else
        <a href="{{ route('login.form') }}" class="btn-nav btn-ghost">Login</a>
        <a href="{{ route('register.form') }}" class="btn-nav btn-primary">Sign Up</a>
      @endauth
    </div>

  </div>
</nav>
