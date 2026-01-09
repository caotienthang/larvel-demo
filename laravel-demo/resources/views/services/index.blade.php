<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    @vite([
        'resources/js/app.js',
    ])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>
    @include('layouts.navigation') <!-- navigation giữ nguyên -->
    <section class="pricing-section">
        <div class="container">
            <h1 class="section-title">Our Services</h1>
            <div class="pricing-grid">
                @foreach($services as $service)
                    <div class="pricing-card">
                        
                        <!-- Image trên cùng -->
                        @if($service->image)
                            <img src="{{ $service->image}}" alt="{{ $service->name }}" class="service-image">
                        @endif

                        <!-- Tên dịch vụ + 2 icon 2 bên -->
                        <div class="service-title-wrapper">
                            <img src="https://ashanmiller.shop/wp-content/uploads/2025/11/plan-left.svg" alt="" class="title-icon left">
                            <p class="service-title">{{ $service->name }}</p>
                            <img src="https://ashanmiller.shop/wp-content/uploads/2025/11/plan-right.svg" alt="" class="title-icon right">
                        </div>

                        <!-- Description -->
                        <div class="description">
                            {!! $service->description !!}
                        </div>

                        <!-- Price -->
                        <div class="price-wrap">
                        <span class="price">${{ $service->price }}</span>
                        <span class="price-month">/Month</span>
                        </div>

                        <!-- Actions -->
                        <div class="card-actions">
                        {{-- Add to cart --}}
                        <form method="POST" action="{{ route('services.all') }}" class="add-cart-form">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <button type="submit" class="btn-add-cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Pay Now
                            </button>
                        </form>

                        {{-- View details --}}
                        <a href="{{ route('services.detail', $service->id) }}" class="btn-buy">
                            View Details
                        </a>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('layouts.footer')
</body>

</html>
