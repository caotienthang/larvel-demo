<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Successful | Lunasjaya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/js/app.js'])

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .success-card {
            max-width: 520px;
            width: 100%;
            background: #ffffff;
            border-radius: 16px;
            padding: 36px 32px;
            box-shadow: 0 20px 50px rgba(0,0,0,.08);
            text-align: center;
        }

        .success-icon {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: #22c55e;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: 0 auto 20px;
        }

        h1 {
            font-size: 26px;
            margin-bottom: 12px;
            color: #0f172a;
        }

        p {
            font-size: 15px;
            color: #475569;
            margin-bottom: 24px;
        }

        .btn-home {
            display: inline-block;
            padding: 12px 22px;
            background: #2563eb;
            color: #fff;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all .2s ease;
        }

        .btn-home:hover {
            background: #1e40af;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

    <div class="success-card">
        <div class="success-icon">✓</div>

        <h1>Payment Successful</h1>

        <p>
            @if(session('success'))
                {{ session('success') }}
            @else
                Your payment has been completed successfully.
            @endif
        </p>

        <a href="{{ route('orders.index') }}" class="btn-home">
            Back to Order
        </a>
    </div>

</body>
</html>
