<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký</title>

  <style>
    /* === GIỮ NGUYÊN CSS CỦA BẠN === */
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
    *{ box-sizing:border-box; }
    body{ margin:0; min-height:100vh; display:grid; place-items:center; padding:24px; font-family:system-ui; color:var(--text); background:#0b0f17; }
    .register-container{ width:min(480px,100%); padding:26px 22px; border-radius:18px; background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.14); }
    h1{ margin:0 0 8px; font-size:28px; }
    .sub{ margin-bottom:18px; color:var(--muted); font-size:14px; }
    .field{ margin-bottom:12px; }
    .label{ display:block; margin-bottom:6px; font-size:12px; font-weight:700; letter-spacing:.12em; text-transform:uppercase; }
    input{ width:100%; padding:12px; border-radius:12px; border:1px solid rgba(255,255,255,.14); background:#000; color:#fff; }
    .grid-2{ display:grid; grid-template-columns:1fr 1fr; gap:12px; }
    button{ width:100%; padding:12px; border:none; border-radius:12px; background:linear-gradient(135deg,#0348B6,#03BBD5); color:#fff; font-weight:800; cursor:pointer; }
    .message{ margin-top:10px; padding:10px 12px; border-radius:12px; font-size:14px; }
    .message.error{ background:rgba(249,24,115,.15); border:1px solid rgba(249,24,115,.45); }
    .message.success{ background:rgba(3,187,213,.15); border:1px solid rgba(3,187,213,.45); }
    .footer{ margin-top:14px; }
    a{ color:#fff; font-weight:700; text-decoration:none; }
    @media (max-width:520px){ .grid-2{ grid-template-columns:1fr; } }
  </style>
</head>

<body>
<div class="register-container">
  <h1>Register</h1>
  <p class="sub">Tạo tài khoản mới để tiếp tục sử dụng dịch vụ.</p>

  {{-- FE ERROR --}}
  <div id="fe-error" class="message error" style="display:none;"></div>

  <form id="registerForm" method="POST" action="{{ route('register') }}" novalidate>
    @csrf

    <div class="field">
      <span class="label">Name</span>
      <input type="text" name="name" id="name" placeholder="Your name">
    </div>

    <div class="grid-2">
      <div class="field">
        <span class="label">Email</span>
        <input type="email" name="email" id="email" placeholder="you@example.com">
      </div>

      <div class="field">
        <span class="label">Phone</span>
        <input type="tel" name="phone_number" id="phone" placeholder="Phone number">
      </div>
    </div>

    <div class="grid-2">
      <div class="field">
        <span class="label">Password</span>
        <input type="password" name="password" id="password">
      </div>

      <div class="field">
        <span class="label">Confirm</span>
        <input type="password" name="password_confirmation" id="password_confirmation">
      </div>
    </div>

    <button type="submit">Create Account</button>
  </form>

  {{-- BACKEND ERRORS --}}
  @if($errors->any())
    @foreach($errors->all() as $error)
      <p class="message error">{{ $error }}</p>
    @endforeach
  @endif

  <div class="footer">
    <a href="{{ route('login.form') }}">Already have an account? Login →</a>
  </div>
</div>

<script>
document.getElementById('registerForm').addEventListener('submit', function(e){
  const errorBox = document.getElementById('fe-error');
  errorBox.style.display = 'none';
  errorBox.innerHTML = '';

  const name = document.getElementById('name').value.trim();
  const email = document.getElementById('email').value.trim();
  const phone = document.getElementById('phone').value.trim();
  const password = document.getElementById('password').value;
  const confirm = document.getElementById('password_confirmation').value;

  let errors = [];

  if(!name) errors.push('Name is required.');
  if(!email || !/^\S+@\S+\.\S+$/.test(email)) errors.push('Valid email is required.');
  if(!phone || !/^[0-9+\-\s]{8,15}$/.test(phone)) errors.push('Valid phone number is required.');
  if(!password || password.length < 8) errors.push('Password must be at least 8 characters.');
  if(password !== confirm) errors.push('Password confirmation does not match.');

  if(errors.length){
    e.preventDefault();
    errorBox.innerHTML = errors.join('<br>');
    errorBox.style.display = 'block';
  }
});
</script>
</body>
</html>
