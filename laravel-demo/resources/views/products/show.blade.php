<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $product->name }}</title>

  @vite(['resources/js/app.js'])
</head>
<body>
  @include('layouts.navigation')

  <div class="p-wrap">
    <div class="p-top">
      <div>
        <h1 class="p-title">{{ $product->name }}</h1>
        <a class="p-back" href="{{ url()->previous() }}">← Back</a>
      </div>
    </div>

    {{-- Ảnh trên --}}
    <div class="p-media">
      <img class="p-img" src="{{ $product->image }}" alt="{{ $product->name }}">
    </div>

    {{-- Bảng xuống dưới ảnh --}}
    <div class="p-card">
      <h2 class="p-h2">Product Details</h2>

      <table class="p-table">
        <tbody>
          <tr>
            <th>Description</th>
            <td>
              <div class="p-desc">
                @if(!empty($product->description))
                  {!! $product->description !!}
                @else
                  <span class="muted">No description yet.</span>
                @endif
              </div>
            </td>
          </tr>

          <tr>
            <th>Size</th>
            <td class="muted">— (to be updated)</td>
          </tr>
          <tr>
            <th>Material</th>
            <td class="muted">— (to be updated)</td>
          </tr>
          <tr>
            <th>Color</th>
            <td class="muted">— (to be updated)</td>
          </tr>
          <tr>
            <th>Stock</th>
            <td class="muted">— (to be updated)</td>
          </tr>
          <tr>
            <th>SKU</th>
            <td class="muted">— (to be updated)</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  @include('layouts.footer')
</body>
</html>
