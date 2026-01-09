<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>

  <style>
    :root{
      --brand-pink:#F91873;
      --brand-blue:#0348B6;
      --brand-cyan:#03BBD5;

      --bg:#0b0f17;
      --panel: rgba(255,255,255,.06);
      --line: rgba(255,255,255,.14);
      --text: rgba(255,255,255,.92);
      --muted: rgba(255,255,255,.65);
      --shadow: 0 24px 60px rgba(0,0,0,.55);
    }

    *{ box-sizing: border-box; }

    body{
      margin: 0;
      min-height: 100vh;
      display: grid;
      place-items: center;
      padding: 24px;

      font-family: ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
      color: var(--text);
      background:
        radial-gradient(1200px 600px at 15% 10%, rgba(3,72,182,.35), transparent 60%),
        radial-gradient(900px 500px at 85% 20%, rgba(3,187,213,.30), transparent 55%),
        radial-gradient(900px 600px at 50% 95%, rgba(249,24,115,.22), transparent 55%),
        linear-gradient(180deg, #070a10, var(--bg));
    }

    body::before{
      content:"";
      position: fixed;
      inset: 0;
      pointer-events: none;
      background-image: radial-gradient(rgba(255,255,255,.04) 1px, transparent 1px);
      background-size: 3px 3px;
      opacity: .12;
    }

    .fp-container{
      width: min(460px, 100%);
      text-align: left;
      padding: 26px 22px;

      border-radius: 18px;
      background: linear-gradient(180deg, rgba(255,255,255,.08), rgba(255,255,255,.05));
      border: 1px solid rgba(255,255,255,.14);
      box-shadow: var(--shadow);
      backdrop-filter: blur(10px);
      position: relative;
      overflow: hidden;
    }

    .fp-container::after{
      content:"";
      position:absolute;
      inset:-2px;
      border-radius: 20px;
      padding: 1px;
      background: linear-gradient(135deg, rgba(3,187,213,.35), rgba(3,72,182,.35), rgba(249,24,115,.35));
      -webkit-mask:
        linear-gradient(#000 0 0) content-box,
        linear-gradient(#000 0 0);
      -webkit-mask-composite: xor;
              mask-composite: exclude;
      pointer-events:none;
      opacity:.65;
    }

    h1{
      margin: 0 0 8px;
      font-size: 28px;
      letter-spacing: .2px;
      line-height: 1.1;
    }

    .subtext{
      margin: 0 0 18px;
      color: var(--muted);
      font-size: 14px;
      line-height: 1.55;
    }

    .field{
      margin-bottom: 12px;
    }

    .label{
      display:block;
      margin: 0 0 6px;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: .12em;
      text-transform: uppercase;
      color: rgba(255,255,255,.70);
    }

    input{
      width: 100%;
      padding: 12px 12px;

      border-radius: 12px;
      border: 1px solid rgba(255,255,255,.14);
      background: rgba(0,0,0,.35);
      color: var(--text);
      font-size: 15px;
      outline: none;

      transition: border-color .15s ease, box-shadow .15s ease, background .15s ease;
    }

    input::placeholder{ color: rgba(255,255,255,.45); }

    input:focus{
      border-color: rgba(3,187,213,.65);
      box-shadow: 0 0 0 4px rgba(3,187,213,.18);
      background: rgba(0,0,0,.45);
    }

    button{
      width: 100%;
      padding: 12px 14px;
      border: none;
      border-radius: 12px;

      background: linear-gradient(135deg, var(--brand-blue), var(--brand-cyan));
      color: #fff;
      font-size: 15px;
      font-weight: 800;
      cursor: pointer;

      transition: transform .12s ease, filter .15s ease, box-shadow .15s ease;
      box-shadow: 0 16px 34px rgba(3,72,182,.22);
      margin-top: 6px;
    }

    button:hover{
      filter: brightness(1.06);
      transform: translateY(-1px);
    }

    button:active{
      transform: translateY(0);
      filter: brightness(1.02);
    }

    .message{
      margin: 10px 0 0;
      font-size: 14px;
      line-height: 1.4;
      padding: 10px 12px;
      border-radius: 12px;
      border: 1px solid rgba(255,255,255,.14);
      background: rgba(0,0,0,.28);
      color: rgba(255,255,255,.88);
    }

    .message.success{
      border-color: rgba(3,187,213,.35);
      background: rgba(3,187,213,.10);
    }

    .message.error{
      border-color: rgba(249,24,115,.35);
      background: rgba(249,24,115,.10);
    }

    .links{
      margin-top: 14px;
      display:flex;
      justify-content: space-between;
      align-items:center;
      gap: 12px;
      flex-wrap: wrap;
    }

    a{
      color: rgba(255,255,255,.78);
      text-decoration: none;
      font-size: 14px;
      font-weight: 700;
      transition: color .15s ease, transform .15s ease;
    }

    a:hover{
      color: #fff;
      transform: translateY(-1px);
    }

    @media (max-width: 520px){
      .fp-container{ padding: 22px 18px; }
      h1{ font-size: 24px; }
      .links{ flex-direction: column; align-items:flex-start; }
    }
  </style>
</head>
<body>
  <div class="fp-container">
    <h1>Forgot Password</h1>
    <p class="subtext">
      Enter your email address. We will send you a new password so you can log in again and change it.
    </p>

    <form method="POST" action="{{ route('password.forgot') }}">
      @csrf
      <div class="field">
        <span class="label">Email</span>
        <input type="email" name="email" placeholder="you@example.com" required value="{{ old('email') }}">
      </div>
      <button type="submit">Send New Password</button>
    </form>

    @if(session('success'))
      <p class="message success">{{ session('success') }}</p>
    @endif

    @if($errors->any())
      @foreach($errors->all() as $error)
        <p class="message error">{{ $error }}</p>
      @endforeach
    @endif

    <div class="links">
      <a href="{{ route('login.form') }}">← Back to Login</a>
      <a href="{{ route('register.form') }}">Register →</a>
    </div>
  </div>
</body>
</html>
